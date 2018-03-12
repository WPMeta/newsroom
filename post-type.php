<?php



function news_source_post_type() {

	$labels = array(
		'name'                  => 'News Sources',
		'singular_name'         => 'News Source',
		'menu_name'             => 'News Source',
		'name_admin_bar'        => 'News Source',
		'archives'              => 'Source Archives',
		'attributes'            => 'Source Attributes',
		'parent_item_colon'     => 'Parent Source:',
		'all_items'             => 'All Source',
		'add_new_item'          => 'Add New Source',
		'add_new'               => 'Add New',
		'new_item'              => 'New Source',
		'edit_item'             => 'Edit Source',
		'update_item'           => 'Update Source',
		'view_item'             => 'View Source',
		'view_items'            => 'View Source',
		'search_items'          => 'Search Source',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Source',
		'uploaded_to_this_item' => 'Uploaded to this Source',
		'items_list'            => 'Source list',
		'items_list_navigation' => 'Source list navigation',
		'filter_items_list'     => 'Filter Source list',
	);
	$args = array(
		'label'                 => 'News Source',
		'description'           => 'Source For News Room',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-smiley',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'news_source', $args );

}
?>