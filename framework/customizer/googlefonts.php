<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 1/12/2018
 * Time: 11:39 AM
 */

function aldehyde_customize_register_fonts( $wp_customize ) {
    //google fonts
    $wp_customize->add_section(
        'aldehyde_typo_options',
        array(
            'title'     => __('Google Web Fonts','aldehyde'),
            'priority'  => 41,
            'panel' => 'aldehyde_design_panel'

        )
    );

    $font_array = array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'aldehyde_title_font',
        array(
            'default'=> 'Open Sans',
            'sanitize_callback' => 'aldehyde_sanitize_gfont'
        )
    );

    function aldehyde_sanitize_gfont( $input ) {
        if ( in_array($input, array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'aldehyde_title_font',array(
            'label' => __('Title','aldehyde'),
            'settings' => 'aldehyde_title_font',
            'section'  => 'aldehyde_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'aldehyde_body_font',
        array(	'default'=> 'Open Sans',
            'sanitize_callback' => 'aldehyde_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'aldehyde_body_font',array(
            'label' => __('Body','aldehyde'),
            'settings' => 'aldehyde_body_font',
            'section'  => 'aldehyde_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}

add_action( 'customize_register', 'aldehyde_customize_register_fonts' );
