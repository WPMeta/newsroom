<?php

/*
Plugin Name: News Room
Plugin URI: https://www.wpmeta.in/news-room/
Description: News Room Plugin for WPMeta
Author: Abhishek Deshpande
Version: 1.0
Author URI: https://www.whoisabhi.com
*/

// Register Custom Post Type

include('post-type.php');
include('metabox.php');
include('shortcode.php');

add_action( 'init', 'news_source_post_type', 0 );

if (class_exists('newssourcedataMetabox')) {
	new newssourcedataMetabox;
};

?>
