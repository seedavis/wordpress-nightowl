<?php
/**
 * Sets up theme defaults and registers the various WordPress features that
 * this theme supports.
 *
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 *
 * @return void
 */
function flow_setup() {
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme does not support post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	//add_theme_support( 'post-formats', array(
	//	'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	//) );
	
	/*
	 * Switches default core markup for comments, comments form and
	 * search form to output valid HTML5. Default is 'xhtml'.
	 */
	// Switches default core markup for search form to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts.
	 */
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	//set_post_thumbnail_size( 700, 280, true ); // Disabled because some users may want to upload larger images for high PPI displays
}
add_action( 'after_setup_theme', 'flow_setup' );
