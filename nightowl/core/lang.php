<?php
/*
 * Makes this theme available for translation.
 *
 * Translations can be added to the /languages/ directory.
 * If you're building a theme based on this theme, use a find and
 * replace to change 'flowthemes' to the name of your theme in all
 * template files.
 *
 * @return void
 */
function flow_translation_setup() {
	load_theme_textdomain( 'flowthemes', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
}
add_action( 'after_setup_theme', 'flow_translation_setup' );
