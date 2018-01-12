<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 1/12/2018
 * Time: 11:51 AM
 */

//upgrade
function aldehyde_customize_register_misc( $wp_customize ) {
    $wp_customize->add_section(
        'aldehyde_sec_upgrade',
        array(
            'title'     => __('Aldehyde - Help & Support','aldehyde'),
            'priority'  => 1,
        )
    );

    $wp_customize->add_setting(
        'aldehyde_upgrade',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Aldehyde_WP_Customize_Upgrade_Control(
            $wp_customize,
            'aldehyde_upgrade',
            array(
                'label' => __('Free Email Support','aldehyde'),
                'description' => __('Currently We are Offering Free Email Support with our theme. If you have any queries or require help please <a target="_blank" href="#">Read our FAQs</a> and if your problem is still not solved then contact us. <br><br> If you are looking for more features in your site like Unlimited Colors, More Layouts, Better Pages, More Social Icons, More Skins, More Widgets then please consider upgrading to <a href="#" target="_blank">Aldehyde Plus</a>.','aldehyde'),
                'section' => 'aldehyde_sec_upgrade',
                'settings' => 'aldehyde_upgrade',
            )
        )
    );
}
add_action( 'customize_register', 'aldehyde_customize_register_misc' );