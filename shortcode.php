<?php
// Create Shortcode source-data
// Use the shortcode: [source-data source_id=""]
function create_sourcedata_shortcode($atts) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'source_id' => '',
		),
		$atts,
		'source-data'
	);
	// Attributes in var
	$source_id = $atts['source_id'];
	$source_data = get_source_data($source_id);
	echo $source_data;
}
add_shortcode( 'source-data', 'create_sourcedata_shortcode' );

function get_source_data($source_id){

	$source_url = get_post_meta($source_id, 'sourceurl_18744',true);
	$source_data = get_transient('source_data'.$source_id);
	if($source_data !== false){
		return get_data_formated($source_data); 	// Format and return 
	}else{
		
		$rest_data = get_data_from_rest($source_url);	// fetch data
		if($rest_data){
			set_transient( 'source_data'.$source_id, $rest_data, 60*60*3 );	// save in transient
			return get_data_formated($rest_data);	// format and return
		}else{
			return "Unfortunately we could not fetch data for this Blog, Please Try Again.";
		}
	}
}

function get_data_from_rest($url){
	
	$url = rtrim($url,"/");
	$url = $url."/wp-json/wp/v2/posts";
	$request = wp_remote_get($url);
	if( is_wp_error( $request ) ) {
		return false; // Bail early
	}else{
		$body = wp_remote_retrieve_body( $request );
		$data = json_decode( $body );
		if(!empty($data)){
			foreach ($data as $blogpost) {
				$source['title'] = $blogpost->title->rendered;	
				$source['excerpt'] = $blogpost->excerpt->rendered;	
				$source['link'] = $blogpost->link;
				$source_data[]=$source;
			}
		}
		return $source_data;
	}
}

function get_data_formated($data){
	$tmp_str = "";
	foreach ($data as $blogpost){
		$formated_post ="";

		$post_link = $blogpost['link'];
		$post_title = $blogpost['title'];
		$link_alt = strip_tags($blogpost['excerpt']);
		$excerpt = $blogpost['excerpt'];

		// Just titles
		$formated_post = '<h3><a href="'.$post_link.'" title="'.$link_alt.'" target="_blank">'.$post_title.'</a></h3>';

		// Blog Format
			//$formated_post = '<h3><a href="'.$post_link.'" title="'.$link_alt.'">'.$post_title.'</a></h3><br /><div class="excerpt">'.$excerpt.'</div>';
		$tmp_str.=$formated_post;
	}
	return $tmp_str;
}