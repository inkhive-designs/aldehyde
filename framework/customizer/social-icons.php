<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 1/12/2018
 * Time: 11:45 AM
 */
function aldehyde_customize_register_social( $wp_customize ) {

// Social Icons
$wp_customize->add_section('aldehyde_social_section', array(
    'title' => __('Social Icons','aldehyde'),
    'priority' => 44 ,
    'panel'      => 'aldehyde_header_panel'

));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','aldehyde'),
    'facebook' => __('Facebook','aldehyde'),
    'twitter' => __('Twitter','aldehyde'),
    'google-plus' => __('Google Plus','aldehyde'),
    'instagram' => __('Instagram','aldehyde'),
    'rss' => __('RSS Feeds','aldehyde'),
    'vine' => __('Vine','aldehyde'),
    'vimeo-square' => __('Vimeo','aldehyde'),
    'youtube' => __('Youtube','aldehyde'),
    'flickr' => __('Flickr','aldehyde'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'aldehyde_social_'.$x, array(
        'sanitize_callback' => 'aldehyde_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'aldehyde_social_'.$x, array(
        'settings' => 'aldehyde_social_'.$x,
        'label' => __('Icon ','aldehyde').$x,
        'section' => 'aldehyde_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'aldehyde_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'aldehyde_social_url'.$x, array(
        'settings' => 'aldehyde_social_url'.$x,
        'description' => __('Icon ','aldehyde').$x.__(' Url','aldehyde'),
        'section' => 'aldehyde_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;


function aldehyde_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}


}

add_action( 'customize_register', 'aldehyde_customize_register_social' );