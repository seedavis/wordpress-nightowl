<?php
/**
 * Create WordPress menu areas.
 *
 * @uses register_nav_menu() To add support for a navigation menu.
 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
 */
function flow_menus() {
	register_nav_menus( array( 'main_menu' => 'Main Menu' ) );
}
add_action( 'after_setup_theme', 'flow_menus' );
