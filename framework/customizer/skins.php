<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 1/12/2018
 * Time: 3:40 PM
 */



function aldehyde_customize_register_skins( $wp_customize )
{
//Select the Default Theme Skin
    $wp_customize->add_section(
        'aldehyde_skin_options',
        array(
            'title' => __('Theme Skins', 'aldehyde'),
            'priority' => 39,
            'panel'   => 'aldehyde_design_panel'
        )
    );

    $wp_customize->add_setting(
        'aldehyde_skin',
        array(
            'default' => 'default',
            'sanitize_callback' => 'aldehyde_sanitize_skin'
        )
    );

    $skins = array('default' => __('Default(Green)', 'aldehyde'),
        'red' => __('Roman', 'aldehyde'),
        'pink' => __('Sweet Pink', 'aldehyde'),
        'caribbean-green' => __('Caribbean Green', 'aldehyde'),

    );

    $wp_customize->add_control(
        'aldehyde_skin', array(
            'settings' => 'aldehyde_skin',
            'section' => 'aldehyde_skin_options',
            'label' => __('Choose from the Skins Below', 'aldehyde'),
            'type' => 'select',
            'choices' => $skins,
        )
    );

    function aldehyde_sanitize_skin($input)
    {
        if (in_array($input, array('default', 'red', 'caribbean-green','pink')))
            return $input;
        else
            return '';
    }
}

add_action( 'customize_register', 'aldehyde_customize_register_skins' );