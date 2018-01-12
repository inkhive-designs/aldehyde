<?php /**
* Enqueue scripts and styles.
*/
function aldehyde_scripts() {
wp_enqueue_style( 'aldehyde-style', get_stylesheet_uri(),array(),121212);

wp_enqueue_style('aldehyde-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('aldehyde_title_font', 'Raleway') ) );

wp_enqueue_style('aldehyde-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('aldehyde_body_font', 'Khula') ) );

wp_enqueue_style( 'aldehyde-fontawesome-style', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

wp_enqueue_style( 'aldehyde-nivo-style', get_template_directory_uri() . '/assets/css/nivo-slider.css' );

wp_enqueue_style( 'aldehyde-nivo-skin-style', get_template_directory_uri() . '/assets/css/nivo-default/default.css' );

wp_enqueue_style( 'aldehyde-bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );


wp_enqueue_style( 'aldehyde-hover-style', get_template_directory_uri() . '/assets/css/hover.min.css' );

wp_enqueue_style( 'aldehyde-slicknav', get_template_directory_uri() . '/assets/css/slicknav.css' );


//wp_enqueue_style( 'aldehyde-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/default.css' );

    wp_enqueue_style( 'aldehyde-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/'.get_theme_mod('aldehyde_skin', 'default').'.css', array(), filemtime( get_template_directory() . '/assets/theme-styles/css/'.get_theme_mod('aldehyde_skin', 'default').'.css' ) );


wp_enqueue_script( 'aldehyde-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

wp_enqueue_script( 'aldehyde-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

wp_enqueue_script( 'aldehyde-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}

wp_enqueue_script( 'aldehyde-custom-js', get_template_directory_uri() . '/js/custom.js' );
}

add_action( 'wp_enqueue_scripts', 'aldehyde_scripts' );