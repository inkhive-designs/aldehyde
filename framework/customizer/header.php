<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 1/12/2018
 * Time: 11:46 AM
 */

function aldehyde_customize_register_header( $wp_customize ) {

//Logo Settings
    $wp_customize->add_panel('aldehyde_header_panel', array(
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Header Settings', 'aldehyde'),
    ));


$wp_customize->add_section( 'title_tagline' , array(
    'title'      => __( 'Title, Tagline & Logo', 'aldehyde' ),
    'priority'   => 30,
    'panel'      => 'aldehyde_header_panel'
) );

$wp_customize->add_setting( 'aldehyde_logo' , array(
    'default'     => '',
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'aldehyde_logo',
        array(
            'label' => 'Upload Logo',
            'section' => 'title_tagline',
            'settings' => 'aldehyde_logo',
            'priority' => 5,
        )
    )
);

$wp_customize->add_setting( 'aldehyde_logo_resize' , array(
    'default'     => 100,
    'sanitize_callback' => 'aldehyde_sanitize_positive_number',
) );
$wp_customize->add_control(
    'aldehyde_logo_resize',
    array(
        'label' => 'Resize & Adjust Logo',
        'section' => 'title_tagline',
        'settings' => 'aldehyde_logo_resize',
        'priority' => 6,
        'type' => 'range',
        'active_callback' => 'aldehyde_logo_enabled',
        'input_attrs' => array(
            'min'   => 30,
            'max'   => 200,
            'step'  => 5,
        ),
    )
);

function aldehyde_logo_enabled($control) {
    $option = $control->manager->get_setting('aldehyde_logo');
    return $option->value() == true;
}



//Replace Header Text Color with, separate colors for Title and Description
//Override aldehyde_site_titlecolor
$wp_customize->remove_control('display_header_text');
$wp_customize->remove_setting('header_textcolor');
$wp_customize->add_setting('aldehyde_site_titlecolor', array(
    'default'     => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'aldehyde_site_titlecolor', array(
        'label' => __('Site Title Color','aldehyde'),
        'section' => 'colors',
        'settings' => 'aldehyde_site_titlecolor',
        'type' => 'color'
    ) )
);

$wp_customize->add_setting('aldehyde_header_desccolor', array(
    'default'     => '#6bd233',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'aldehyde_header_desccolor', array(
        'label' => __('Site Tagline Color','aldehyde'),
        'section' => 'colors',
        'settings' => 'aldehyde_header_desccolor',
        'type' => 'color'
    ) )
);


$wp_customize->add_setting( 'aldehyde_himg_align' , array(
    'default'     => true,
    'sanitize_callback' => 'aldehyde_sanitize_himg_align'
) );

/* Sanitization Function */
function aldehyde_sanitize_himg_align( $input ) {
    if (in_array( $input, array('center','left','right') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'aldehyde_himg_align', array(
    'label' => __('Header Image Alignment','aldehyde'),
    'section' => 'header_image',
    'settings' => 'aldehyde_himg_align',
    'type' => 'select',
    'choices' => array(
        'center' => __('Center','aldehyde'),
        'left' => __('Left','aldehyde'),
        'right' => __('Right','aldehyde'),
    )

) );

$wp_customize->add_setting( 'aldehyde_himg_darkbg' , array(
    'default'     => false,
    'sanitize_callback' => 'aldehyde_sanitize_checkbox'
) );

$wp_customize->add_control(
    'aldehyde_himg_darkbg', array(
    'label' => __('Add a Dark Filter to make the text Above the Image More Clear and Easy to Read.','aldehyde'),
    'section' => 'header_image',
    'settings' => 'aldehyde_himg_darkbg',
    'type' => 'checkbox'

) );




//Settings For Logo Area

$wp_customize->add_setting(
    'aldehyde_hide_title_tagline',
    array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
);

$wp_customize->add_control(
    'aldehyde_hide_title_tagline', array(
        'settings' => 'aldehyde_hide_title_tagline',
        'label'    => __( 'Hide Title and Tagline.', 'aldehyde' ),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'aldehyde_branding_below_logo',
    array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
);

$wp_customize->add_control(
    'aldehyde_branding_below_logo', array(
        'settings' => 'aldehyde_branding_below_logo',
        'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'aldehyde' ),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
        'active_callback' => 'aldehyde_title_visible'
    )
);

function aldehyde_title_visible( $control ) {
    $option = $control->manager->get_setting('aldehyde_hide_title_tagline');
    return $option->value() == false ;
}

$wp_customize->add_setting(
    'aldehyde_center_logo',
    array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
);

$wp_customize->add_control(
    'aldehyde_center_logo', array(
        'settings' => 'aldehyde_center_logo',
        'label'    => __( 'Center Align.', 'aldehyde' ),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
    )
);
}

add_action( 'customize_register', 'aldehyde_customize_register_header' );