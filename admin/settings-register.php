<?php
// New Custom --Settings Register

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


// register plugin settings
function new_custom_register_settings() {
	
	/*
	
	register_setting( 
		string   $option_group, 
		string   $option_name, 
		callable $sanitize_callback
	);
	
	*/
	
	register_setting( 
		'new_custom_options', 
		'new_custom_options', 
		'new_custom_callback_validate_options' 
	);


    /*
	
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	
	*/
	
	add_settings_section( 
		'new_custom_section_login', 
		esc_html__('Customize Login Page', 'new_custom'), 
		'new_custom_callback_section_login', 
		'newcustom'
	);
	
	add_settings_section( 
		'new_custom_section_admin', 
		esc_html__('Customize Admin Area', 'new_custom'), 
		'new_custom_callback_section_admin', 
		'newcustom'
	);


    /*

	add_settings_field(
    	string   $id,
		string   $title,
		callable $callback,
		string   $page,
		string   $section = 'default',
		array    $args = []
	);

	*/

	add_settings_field(
		'custom_url',
		esc_html__('Custom URL', 'new_custom'),
		'new_custom_callback_field_text',
		'newcustom',
		'new_custom_section_login',
		[ 'id' => 'custom_url', 'label' => esc_html__('Custom URL for the login logo link', 'new_custom') ]
	);
	
	/*
	add_settings_field(
		'custom_title',
		esc_html__('Custom Title', 'new_custom'),
		'new_custom_callback_field_text',
		'newcustom',
		'new_custom_section_login',
		[ 'id' => 'custom_title', 'label' => esc_html__('Custom title attribute for the logo link'), 'new_custom' ]
	);
	*/

	add_settings_field(
		'custom_style',
		esc_html__('Custom Style', 'new_custom'),
		'new_custom_callback_field_radio',
		'newcustom',
		'new_custom_section_login',
		[ 'id' => 'custom_style', 'label' => esc_html__('Custom CSS for the Login screen', 'new_custom') ]
	);

	add_settings_field(
		'custom_message',
		esc_html__('Custom Message', 'new_custom'),
		'new_custom_callback_field_textarea',
		'newcustom',
		'new_custom_section_login',
		[ 'id' => 'custom_message', 'label' => esc_html__('Custom text and/or markup', 'new_custom') ]
	);

	add_settings_field(
		'custom_footer',
		esc_html__('Custom Footer', 'new_custom'),
		'new_custom_callback_field_text',
		'newcustom',
		'new_custom_section_admin',
		[ 'id' => 'custom_footer', 'label' => esc_html__('Custom footer text', 'new_custom') ]
	);

	add_settings_field(
		'custom_toolbar',
		esc_html__('Custom Toolbar', 'new_custom'),
		'new_custom_callback_field_checkbox',
		'newcustom',
		'new_custom_section_admin',
		[ 'id' => 'custom_toolbar', 'label' => esc_html__('Remove new post and comment links from the Toolbar', 'new_custom') ]
	);

	add_settings_field(
		'custom_scheme',
		esc_html__('Custom Scheme', 'new_custom'),
		'new_custom_callback_field_select',
		'newcustom',
		'new_custom_section_admin',
		[ 'id' => 'custom_scheme', 'label' => esc_html__('Default color scheme for new users', 'new_custom') ]
	);





}
add_action( 'admin_init', 'new_custom_register_settings' );

