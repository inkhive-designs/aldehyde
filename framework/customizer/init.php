<?php
/**
 * aldehyde Theme Customizer
 *
 * @package aldehyde
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aldehyde_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_section( 'header_image' )->panel  = 'aldehyde_header_panel';
    $wp_customize->get_section( 'colors' )->panel  = 'aldehyde_design_panel';
    $wp_customize->get_section( 'background_image' )->panel  = 'aldehyde_design_panel';
}
add_action( 'customize_register', 'aldehyde_customize_register' );



//Load All Individual Settings Based on Sections/Panels.
require_once get_template_directory().'/framework/customizer/sanitization.php';
require_once get_template_directory().'/framework/customizer/header.php';
require_once get_template_directory().'/framework/customizer/layout.php';
require_once get_template_directory().'/framework/customizer/slider.php';
require_once get_template_directory().'/framework/customizer/skins.php';
require_once get_template_directory().'/framework/customizer/social-icons.php';
require_once get_template_directory().'/framework/customizer/googlefonts.php';
require_once get_template_directory().'/framework/customizer/misc-scripts.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aldehyde_customize_preview_js() {
    wp_enqueue_script( 'aldehyde_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'aldehyde_customize_preview_js' );
