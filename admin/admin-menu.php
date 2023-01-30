<?php
// New Custom --Admin menu


// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

/*
// add top-level administrative menu
function new_custom_add_toplevel_menu() {
	
	/* 
		add_menu_page(
			string   $page_title, 
			string   $menu_title, 
			string   $capability, 
			string   $menu_slug, 
			callable $function = '', 
			string   $icon_url = '', 
			int      $position = null 
		)
	*/
	
/*	add_menu_page(
		esc_html__('New Custom Plugin Settings', 'New Custom'),
		esc_html__('New Custom', 'New Custom'),
		'manage_options',
		'newcustom',
		'new_custom_display_settings_page',
		'dashicons-admin-generic',
		null
	);
	
}
add_action( 'admin_menu', 'new_custom_add_toplevel_menu' );

*/


// add sub-level administrative menu
function new_custom_add_sublevel_menu() {
	
	/*
	
	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = ''
	);
	
	*/
	
	add_submenu_page(
		'options-general.php',
		'new_custom Settings',
		'new_custom',
		'manage_options',
		'new_custom',
		'new_custom_display_settings_page',
		
	);
	
}
add_action( 'admin_menu', 'new_custom_add_sublevel_menu' );