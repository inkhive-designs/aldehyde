<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 1/12/2018
 * Time: 11:44 AM
 */

function aldehyde_customize_register_slider( $wp_customize ) {


// SLIDER PANEL
$wp_customize->add_panel( 'aldehyde_slider_panel', array(
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Main Slider',
) );

$wp_customize->add_section(
    'aldehyde_sec_slider_options',
    array(
        'title'     => 'Enable/Disable',
        'priority'  => 0,
        'panel'     => 'aldehyde_slider_panel'
    )
);


$wp_customize->add_setting(
    'aldehyde_main_slider_enable',
    array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
);

$wp_customize->add_control(
    'aldehyde_main_slider_enable', array(
        'settings' => 'aldehyde_main_slider_enable',
        'label'    => __( 'Enable Slider.', 'aldehyde' ),
        'section'  => 'aldehyde_sec_slider_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'aldehyde_main_slider_count',
    array(
        'default' => '0',
        'sanitize_callback' => 'aldehyde_sanitize_positive_number'
    )
);

// Select How Many Slides the User wants, and Reload the Page.
$wp_customize->add_control(
    'aldehyde_main_slider_count', array(
        'settings' => 'aldehyde_main_slider_count',
        'label'    => __( 'No. of Slides(Min:0, Max: 10)' ,'aldehyde'),
        'section'  => 'aldehyde_sec_slider_options',
        'type'     => 'number',
        'description' => __('Save the Settings, and Reload this page to Configure the Slides.','aldehyde'),

    )
);



if ( get_theme_mod('aldehyde_main_slider_count') > 0 ) :
    $slides = get_theme_mod('aldehyde_main_slider_count');

    for ( $i = 1 ; $i <= $slides ; $i++ ) :

        //Create the settings Once, and Loop through it.

        $wp_customize->add_setting(
            'aldehyde_slide_img'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'aldehyde_slide_img'.$i,
                array(
                    'label' => '',
                    'section' => 'aldehyde_slide_sec'.$i,
                    'settings' => 'aldehyde_slide_img'.$i,
                )
            )
        );


        $wp_customize->add_section(
            'aldehyde_slide_sec'.$i,
            array(
                'title'     => 'Slide '.$i,
                'priority'  => $i,
                'panel'     => 'aldehyde_slider_panel'
            )
        );

        $wp_customize->add_setting(
            'aldehyde_slide_title'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'aldehyde_slide_title'.$i, array(
                'settings' => 'aldehyde_slide_title'.$i,
                'label'    => __( 'Slide Title','aldehyde' ),
                'section'  => 'aldehyde_slide_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'aldehyde_slide_desc'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'aldehyde_slide_desc'.$i, array(
                'settings' => 'aldehyde_slide_desc'.$i,
                'label'    => __( 'Slide Description','aldehyde' ),
                'section'  => 'aldehyde_slide_sec'.$i,
                'type'     => 'text',
            )
        );



        $wp_customize->add_setting(
            'aldehyde_slide_CTA_button'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'aldehyde_slide_CTA_button'.$i, array(
                'settings' => 'aldehyde_slide_CTA_button'.$i,
                'label'    => __( 'Custom Call to Action Button Text(Optional)','aldehyde' ),
                'section'  => 'aldehyde_slide_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'aldehyde_slide_url'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'aldehyde_slide_url'.$i, array(
                'settings' => 'aldehyde_slide_url'.$i,
                'label'    => __( 'Target URL','aldehyde' ),
                'section'  => 'aldehyde_slide_sec'.$i,
                'type'     => 'url',
            )
        );

    endfor;


endif;

}

add_action( 'customize_register', 'aldehyde_customize_register_slider' );