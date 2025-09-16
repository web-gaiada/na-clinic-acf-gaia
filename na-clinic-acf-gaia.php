<?php
/**
 * Plugin Name: NA Clinic ACF Gaia
 * Description: Adds custom page templates & ACF Block from plugin.
 * Version: 1.0
 * Author: Gaia Digital Agency
 * Author URL: https://gaiada.com
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// 1. Register the template in dropdown
add_filter( 'theme_page_templates', function( $templates ) {
    $templates['custom-acf-block-template.php'] = 'Custom Gaia Template';
    return $templates;
});

// 2. Load the template when selected
add_filter( 'template_include', function( $template ) {
    if ( is_page() ) {
        $plugin_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
        if ( $plugin_template === 'custom-acf-block-template.php' ) {
            $file = plugin_dir_path( __FILE__ ) . 'templates/' . $plugin_template;
            if ( file_exists( $file ) ) {
                return $file;
            }
        }
    }
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
