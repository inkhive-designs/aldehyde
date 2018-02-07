<?php
/**
 * Aldehyde Theme Customizer
 *
 * @package aldehyde
 */

function aldehyde_customize_register_showcase( $wp_customize ) {

    //CUSTOM SHOWCASE
    $wp_customize->add_panel( 'aldehyde_showcase_panel', array(
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Custom Showcase','aldehyde'),
    ) );

    $wp_customize->add_section(
        'aldehyde_sec_showcase_options',
        array(
            'title'     => __('Enable/Disable','aldehyde'),
            'priority'  => 0,
            'panel'     => 'aldehyde_showcase_panel',
            'description' => __('1. First Showcase Image should be 1280 X 600 and description should be 80 words <br><br>
                                 2.  Second and Third image should be 300 X 600 and description should be 5 words <br><br>
                                 3.  Fourth Image should be 600 X 600 and description should be 24 words','aldehyde' )
        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_enable',
        array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_enable', array(
            'settings' => 'aldehyde_showcase_enable',
            'label'    => __( 'Enable Showcase', 'aldehyde' ),
            'section'  => 'aldehyde_sec_showcase_options',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'aldehyde_showcase_priority',
        array( 'default'=> 10, 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_priority', array(
            'settings' => 'aldehyde_showcase_priority',
            'label'    => __( 'Priority', 'aldehyde' ),
            'section'  => 'aldehyde_sec_showcase_options',
            'type'     => 'number',
            'description' => __('Elements with Low Value of Priority will appear first.','aldehyde'),
        )
    );


    //Showcase 1
    $wp_customize->add_section(
        'aldehyde_showcase_sec1',
        array(
            'title'     => __('ShowCase 1','aldehyde'),
            'priority'  => 1,
            'panel'     => 'aldehyde_showcase_panel',

        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_img1',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'aldehyde_showcase_img1',
            array(
                'label' => '',
                'section' => 'aldehyde_showcase_sec1',
                'settings' => 'aldehyde_showcase_img1',
            )
        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_title1',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_title1', array(
            'settings' => 'aldehyde_showcase_title1',
            'label'    => __( 'Showcase Title 1','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec1',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_desc1',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_desc1', array(
            'settings' => 'aldehyde_showcase_desc1',
            'label'    => __( 'Showcase Description','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec1',
            'type'     => 'textarea',
        )
    );


    $wp_customize->add_setting(
        'aldehyde_showcase_url1',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_url1', array(
            'settings' => 'aldehyde_showcase_url1',
            'label'    => __( 'Target URL','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec1',
            'type'     => 'url',
        )
    );

//Showcase 2
    $wp_customize->add_section(
        'aldehyde_showcase_sec2',
        array(
            'title'     => __('ShowCase 2','aldehyde'),
            'priority'  => 2,
            'panel'     => 'aldehyde_showcase_panel',

        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_img2',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'aldehyde_showcase_img2',
            array(
                'label' => '',
                'section' => 'aldehyde_showcase_sec2',
                'settings' => 'aldehyde_showcase_img2',
            )
        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_title2',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_title2', array(
            'settings' => 'aldehyde_showcase_title2',
            'label'    => __( 'Showcase Title 2','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec2',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_desc2',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_desc2', array(
            'settings' => 'aldehyde_showcase_desc2',
            'label'    => __( 'Showcase Description','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec2',
            'type'     => 'textarea',
        )
    );


    $wp_customize->add_setting(
        'aldehyde_showcase_url2',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_url2', array(
            'settings' => 'aldehyde_showcase_url2',
            'label'    => __( 'Target URL','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec2',
            'type'     => 'url',
        )
    );



    //Showcase 3

    $wp_customize->add_section(
        'aldehyde_showcase_sec3',
        array(
            'title'     => __('ShowCase 3','aldehyde'),
            'priority'  => 3,
            'panel'     => 'aldehyde_showcase_panel',

        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_img3',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'aldehyde_showcase_img3',
            array(
                'label' => '',
                'section' => 'aldehyde_showcase_sec3',
                'settings' => 'aldehyde_showcase_img3',
            )
        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_title3',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_title3', array(
            'settings' => 'aldehyde_showcase_title3',
            'label'    => __( 'Showcase Title 3','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec3',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_desc3',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_desc3', array(
            'settings' => 'aldehyde_showcase_desc3',
            'label'    => __( 'Showcase Description','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec3',
            'type'     => 'textarea',
        )
    );


    $wp_customize->add_setting(
        'aldehyde_showcase_url3',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_url3', array(
            'settings' => 'aldehyde_showcase_url3',
            'label'    => __( 'Target URL','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec3',
            'type'     => 'url',
        )
    );

//Showcase 4

    $wp_customize->add_section(
        'aldehyde_showcase_sec4',
        array(
            'title'     => __('ShowCase 4','aldehyde'),
            'priority'  => 4,
            'panel'     => 'aldehyde_showcase_panel',

        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_img4',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'aldehyde_showcase_img4',
            array(
                'label' => '',
                'section' => 'aldehyde_showcase_sec4',
                'settings' => 'aldehyde_showcase_img4',
            )
        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_title4',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_title4', array(
            'settings' => 'aldehyde_showcase_title4',
            'label'    => __( 'Showcase Title 4','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec4',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'aldehyde_showcase_desc4',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_desc4', array(
            'settings' => 'aldehyde_showcase_desc4',
            'label'    => __( 'Showcase Description','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec4',
            'type'     => 'textarea',
        )
    );


    $wp_customize->add_setting(
        'aldehyde_showcase_url4',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'aldehyde_showcase_url4', array(
            'settings' => 'aldehyde_showcase_url4',
            'label'    => __( 'Target URL','aldehyde' ),
            'section'  => 'aldehyde_showcase_sec4',
            'type'     => 'url',
        )
    );

}

add_action( 'customize_register', 'aldehyde_customize_register_showcase' );