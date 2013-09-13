<?php
/* Load Core */
require_once( get_template_directory() . '/core/auto-install/auto-install.php' );
require_once( get_template_directory() . '/core/plugins/init.php' );
require_once( get_template_directory() . '/core/post-types/news-post-type.php' );
require_once( get_template_directory() . '/core/post-types/portfolio-post-type.php' );
require_once( get_template_directory() . '/core/post-types/slideshow-post-type.php' );
require_once( get_template_directory() . '/core/add-theme-support.php' );
require_once( get_template_directory() . '/core/allowed-upload-mimes.php' );
require_once( get_template_directory() . '/core/body-class.php' );
require_once( get_template_directory() . '/core/comments.php' );
require_once( get_template_directory() . '/core/content-width.php' );
require_once( get_template_directory() . '/core/excerpt.php' );
require_once( get_template_directory() . '/core/wp-title.php' );

/* Load Admin */
require_once( get_template_directory() . '/admin/pages.php' );
require_once( get_template_directory() . '/admin/metaboxes.php' );

function flow_wp_admin_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-widget' );
	
	// Styling page - UI Slider
	wp_enqueue_script( 'jquery-ui-slider' );
	
	// WP3.5 Media Library
	wp_enqueue_media();
	wp_register_script( 'flow-uploader', get_template_directory_uri() . '/admin/js/flow-uploader.js', array( 'jquery', 'media-upload' ) );
	wp_register_style( 'flow-uploader', get_template_directory_uri() . '/admin/css/flow-uploader.css' );
	wp_enqueue_script( 'thickbox' );
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_script( 'flow-uploader' );
	wp_enqueue_style( 'flow-uploader' );
	
	// WordPress Colorpicker
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	
	// Admin Styles
	wp_register_style( 'flow-admin-css', get_template_directory_uri() . '/admin/css/admin.css' );
	wp_enqueue_style( 'flow-admin-css' );
	
	// Admin Scripts
	wp_register_script( 'flow-admin-js', get_template_directory_uri() . '/admin/js/admin.js' );
	wp_enqueue_script( 'flow-admin-js' );
	
	// Thumbnail Color Picker
	wp_register_script( 'flow-image-sampler', get_template_directory_uri() . '/admin/js/jquery.ImageColorPicker.js', array( 'jquery', 'jquery-ui-widget' ), '1.0', true );
	wp_enqueue_script( 'flow-image-sampler' );
}
add_action( 'admin_enqueue_scripts', 'flow_wp_admin_scripts' );

/* Load Front End */
/*require_once( get_template_directory() . '/modules/shortcodes.php' );*/
/*require_once( get_template_directory() . '/modules/module-info-box/info-box.php' );*/
/*require_once( get_template_directory() . '/modules/module-wpml/wpml-language-switcher.php' );*/
/*require_once( get_template_directory() . '/modules/shortcode-content-slider/content-slider.php' );*/
/*require_once( get_template_directory() . '/modules/shortcode-gmap/gmap.php' );*/

function flow_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-widget' );
	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	
	// Load other libraries.
	/*wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/modules/library-modernizr/modernizr.custom.js', array( 'jquery' ), '2.6.2', true );*/
	/*wp_enqueue_script( 'iscroll', get_template_directory_uri() . '/modules/library-iscroll4/iscroll.js', array( 'jquery' ), '4.1.9', true );*/
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/modules/library-isotope/jquery.isotope.js', array( 'jquery' ), '1.5.25', true );
	wp_enqueue_script( 'jquery-bbq', get_template_directory_uri() . '/modules/library-isotope/jquery.ba-bbq.min.js', array( 'jquery' ), '1.2.1', true );
	
	// Load JavaScript files with functionality specific to this theme.
	wp_enqueue_script( 'flow-scripts', get_template_directory_uri() . '/modules/functions/functions.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'flow-portfolio-script', get_template_directory_uri() . '/modules/library-isotope/portfolio.js', array( 'jquery' ), false, true );
	
	/*
	 * Adds JavaScript to pages with the comment form to support sites with
	 * threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Loads our main stylesheet.
	wp_enqueue_style( 'flow-style', get_stylesheet_uri() );
	
	// Loads other stylesheets.
	/*wp_enqueue_style( 'flow-fonts', get_template_directory_uri() . '/modules/fonts/fonts.css' );*/
	wp_enqueue_style( 'flow-portfolio-style', get_template_directory_uri() . '/modules/library-isotope/portfolio.css' );
	wp_enqueue_style( 'flow-slideshow-style', get_template_directory_uri() . '/modules/library-iscroll4/slideshow.css' );
}
add_action( 'wp_enqueue_scripts', 'flow_scripts' );
