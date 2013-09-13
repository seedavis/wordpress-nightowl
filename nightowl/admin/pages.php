<?php
add_action('admin_menu', 'flow_create_admin_menu');
add_action('admin_menu', 'flow_create_background_menu');

function flow_create_admin_menu() {
	add_menu_page(__('Daisho', 'flowthemes'), __('Daisho', 'flowthemes'), 'manage_options', 'flow-menu', 'flow_general_menu', '', '40.4' );
	add_submenu_page('flow-menu', __( 'General', 'flowthemes' ), __( 'General', 'flowthemes' ), 'manage_options', 'flow-menu', 'flow_general_menu');
}

function flow_create_background_menu() {
	add_submenu_page('flow-menu', __('Styling','flowthemes'), __('Styling','flowthemes'), 'manage_options', 'sub-page41', 'flow_styling_menu');
}

require_once( get_template_directory() . '/admin/page-main.php' );
require_once( get_template_directory() . '/admin/page-styling.php' );
