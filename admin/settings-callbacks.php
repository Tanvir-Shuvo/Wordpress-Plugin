<?php
// New Custom --Setting Callbacks

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// callback: login section
function new_custom_callback_section_login() {
	
	echo '<p>' . esc_html__( 'These settings enable you to customize the WP Login screen.', 'new_custom' ) . '</p>';
	
}


// callback: admin section
function new_custom_callback_section_admin() {
	
	echo '<p>' . esc_html__( 'These settings enable you to customize the WP Admin Area.', 'new_custom' ) . '</p>';
	
}




// callback: text field
function new_custom_callback_field_text( $args ) {
	
	$options = get_option( 'new_custom_options', new_custom_options_default() );
	
	$id    = isset( $args['id'] )    ? esc_attr( $args['id'] )    : '';
	$label = isset( $args['label'] ) ? esc_html( $args['label'] ) : '';
	
	$value = isset( $options[$id] ) ? esc_attr( sanitize_text_field( $options[$id] ) ) : '';
	
	echo '<input id="new_custom_options_'. $id .'" name="new_custom_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="new_custom_options_'. $id .'">'. $label .'</label>';
	
}




// callback: radio field
function new_custom_callback_field_radio( $args ) {
	
	$options = get_option( 'new_custom_options', new_custom_options_default() );
	
	$id    = isset( $args['id'] )    ? esc_attr( $args['id'] )    : '';
	$label = isset( $args['label'] ) ? esc_html( $args['label'] ) : '';
	
	$selected_option = isset( $options[$id] ) ? esc_attr( sanitize_text_field( $options[$id] ) ) : '';
	
	$radio_options = array(
		
		'enable'  => esc_html__( 'Enable custom styles', 'new_custom' ),
		'disable' => esc_html__( 'Disable custom styles', 'new_custom' )
		
	);
	
	foreach ( $radio_options as $value => $label ) {
		
		$checked = checked( $selected_option === $value, true, false );
		
		echo '<label><input name="new_custom_options[' . $id . ']" type="radio" value="'. esc_attr( $value ) .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
		
	}
	
}



// callback: text area field

function new_custom_callback_field_textarea($args) {
    $options = get_option('new_custom_options', new_custom_options_default());

    $id = isset($args['id']) ? $args['id'] : '';
    
	$label = isset($args['label']) ? $args['label'] : '';
    
	$value = isset($options[$id]) ? esc_html(stripslashes_deep($options[$id])) : '';
    
	echo '<textarea id="new_custom_options_' . esc_attr($id) . '" name="new_custom_options[' . esc_attr($id) . ']" rows="5" cols="50">' . $value . '</textarea></br>';
    echo '<label for="new_custom_options_'. esc_attr($id) .'">'. esc_html($label) .'</label>';
}

// callback: checkbox field
function new_custom_callback_field_checkbox( $args){

	$options = get_option('new_custom_options', new_custom_options_default() );

	$id = isset( $args['id'] ) ? $args['id'] : '';
	$label = isset( $args['label'] ) ? esc_html($args['label']) : '';

	$checked = isset( $options[$id] ) ? checked( esc_attr($options[$id]), 1, false ) : '';

	echo '<input id="new_custom_options_'. esc_attr($id) .'" name="new_custom_options['. esc_attr($id) .']" type="checkbox" value="1"'. $checked .' >';
	echo '<label for="new_custom_options_'. esc_attr($id) .'">'.$label.'</label>';
}


// callback: select field
function new_custom_callback_field_select( $args ) {
	
	$options = get_option( 'new_custom_options', new_custom_options_default() );

	$id    = isset( $args['id'] )    ? esc_attr($args['id'])    : '';
	$label = isset( $args['label'] ) ? esc_html($args['label']) : '';

	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

	$select_options = array(
		
		'default'   => esc_html__('Default', 'new_custom'),
		'light'     => esc_html__('Light', 'new_custom'),
		'blue'      => esc_html__('Blue', 'new_custom'),
		'coffee'    => esc_html__('Coffee', 'new_custom'),
		'ectoplasm' => esc_html__('Ectoplasm', 'new_custom'),
		'midnight'  => esc_html__('Midnight', 'new_custom'),
		'ocean'     => esc_html__('Ocean', 'new_custom'),
		'sunrise'   => esc_html__('Sunrise', 'new_custom'),
		
	);

	echo '<select id="new_custom_options_'. esc_attr($id) .'" name="new_custom_options['. esc_attr($id) .']">';

	foreach ( $select_options as $value => $option ) {
		
		$selected = selected( esc_attr($selected_option) === $value, true, false );
		
		echo '<option value="'. esc_attr($value) .'"'. $selected .'>'. esc_html($option) .'</option>';
		
	}

	echo '</select> <label for="new_custom_options_'. esc_attr($id) .'">'. $label .'</label>';
	
}





///////////






