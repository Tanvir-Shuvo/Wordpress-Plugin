<?php

/**
 * Plugin Name:       New Custom
 * Plugin URI:        https://rownakh8.sg-host.com/shop/
 * Description:       Custimize Login page and Admin Area
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Tanvir Shuvo
 * Author URI:        https://rownakh8.sg-host.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       new-custom
 * Domain Path:       /languages
 */


// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


// load text domain
function new_custom_load_textdomain() {
	
	load_plugin_textdomain( 'new_custom', false, plugin_dir_path( __FILE__ ) . 'languages/' );
	
}
add_action( 'plugins_loaded', 'new_custom_load_textdomain' );



// if admin area

if(is_admin()){

    //include dependencies
    require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-register.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-validate.php';
}


// includes dependencies admin and public
require_once plugin_dir_path(__FILE__) . 'includes/core-functions.php';


// default plugin options
function new_custom_options_default(){
    
    return array(
        'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => esc_html__('Powered by WordPress','new-custom'),
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">'. esc_html__('My custom message', 'new-custom') . '</p>',
		'custom_footer'  => esc_html__('Special message for users','new-custom'),
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
    );
}

