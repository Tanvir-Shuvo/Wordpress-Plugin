<?php
/**
 * Plugin Name: Custom Header Image
 * Plugin URI: https://example.com/
 * Description: Set a custom header image for any pages and posts.
 * Version: 1.0.0
 * Author: Tanvir Shuvo
 * Author URI: https://example.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: custom-header-image
 * Domain Path: /languages
 */

// Add custom header image field to pages and posts
function custom_header_image_meta_box() {
    add_meta_box( 'custom_header_image', 'Custom Header Image', 'custom_header_image_callback', array( 'page', 'post' ), 'side', 'default' );
}
add_action( 'add_meta_boxes', 'custom_header_image_meta_box' );

// Display custom header image field in the meta box
function custom_header_image_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'custom_header_image_nonce' );
    $custom_header_image = get_post_meta( $post->ID, 'custom_header_image', true );
    ?>
    <p>
        <input type="text" name="custom_header_image" id="custom_header_image" value="<?php echo esc_attr( $custom_header_image ); ?>" style="width: 100%;">
    </p>
    <p>
        <input type="button" class="button-primary" value="Upload Image" id="custom_header_image_button">
    </p>
<script>
    jQuery(document).ready(function($){
        var custom_uploader;
        $('#custom_header_image_button').click(function(e) {
            e.preventDefault();
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }
            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            custom_uploader.on('select', function() {
                attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#custom_header_image').val(attachment.url);
            });
            custom_uploader.open();
        });
    });
</script>
    <?php
}

// Save custom header image field value
function custom_header_image_save( $post_id ) {
    if ( ! isset( $_POST['custom_header_image_nonce'] ) || ! wp_verify_nonce( $_POST['custom_header_image_nonce'], basename( __FILE__ ) ) ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['custom_header_image'] ) ) {
        update_post_meta( $post_id, 'custom_header_image', $_POST['custom_header_image'] );
    }
}
add_action( 'save_post', 'custom_header_image_save' );

// Display header image in the front-end
function custom_header_image() {
    $custom_header_image = get_post_meta( get_the_ID(), 'custom_header_image', true );
    if ( ! empty( $custom_header_image ) ) {
        echo '<img src="' . esc_url( $custom_header_image ) . '" alt="Header Image">';
    }
}


