<?php
/**
 * Plugin Name: NA Clinic ACF Gaia
 * Description: Adds custom page templates & ACF Block from plugin.
 * Version: 1.0
 * Author: Gaia Digital Agency
 * Author URL: https://gaiada.com
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * 1. Register the custom template for multiple post types (Posts and Pages).
 */
function gaia_register_custom_template( $templates ) {
    // Add our template to the list of templates.
    // The key is the filename and the value is the display name.
    $templates['custom-acf-block-template.php'] = 'Custom Gaia Template';
    return $templates;
}
// Hook our function into the filters for both pages and posts.
add_filter( 'theme_page_templates', 'gaia_register_custom_template' );
add_filter( 'theme_post_templates', 'gaia_register_custom_template' );


/**
 * 2. Load the template file when a post or page with this template is viewed.
 */
add_filter( 'template_include', function( $template ) {
    // Check if we are on a single view of either a 'post' or a 'page'.
    if ( is_singular( ['post', 'page'] ) ) {
        // Get the template slug stored in post meta.
        $plugin_template = get_post_meta( get_the_ID(), '_wp_page_template', true );

        // Check if our custom template is selected.
        if ( $plugin_template === 'custom-acf-block-template.php' ) {
            // Construct the full path to the template file in our plugin.
            $file = plugin_dir_path( __FILE__ ) . 'templates/' . $plugin_template;

            // If the file exists, load it.
            if ( file_exists( $file ) ) {
                return $file;
            }
        }
    }

    // Otherwise, return the default template.
    return $template;
});

function get_base_plugin_path() {
    return plugin_dir_path( __FILE__ );
}

function get_blocks_path() {
    return get_base_plugin_path() . 'blocks';
}

function get_base_plugin_url() {
    return plugin_dir_url( __FILE__ );
}

require_once 'includes/main.php';
require_once 'includes/blocks.php';
require_once 'includes/template-tags.php';
require_once 'includes/tinymce.php';
require_once 'includes/fields.php';
require_once 'includes/post-type.php';
