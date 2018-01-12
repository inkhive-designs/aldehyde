<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 1/12/2018
 * Time: 11:41 AM
 */

function hanne_customize_register_aldehyde( $wp_customize )
{

// Layout and Design
    $wp_customize->add_panel('aldehyde_design_panel', array(
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Design & Layout', 'aldehyde'),
    ));

    $wp_customize->add_section(
        'aldehyde_design_options',
        array(
            'title' => __('Blog Layout', 'aldehyde'),
            'priority' => 0,
            'panel' => 'aldehyde_design_panel'
        )
    );


    $wp_customize->add_setting(
        'aldehyde_blog_layout',
        array('sanitize_callback' => 'aldehyde_sanitize_blog_layout')
    );

    function aldehyde_sanitize_blog_layout($input)
    {
        if (in_array($input, array('grid', 'aldehyde', 'grid_2_column', 'grid_3_column')))
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'aldehyde_blog_layout', array(
            'label' => __('Select Layout', 'aldehyde'),
            'settings' => 'aldehyde_blog_layout',
            'section' => 'aldehyde_design_options',
            'type' => 'select',
            'choices' => array(
                'aldehyde' => __('Aldehyde Layout', 'aldehyde'),
                'grid' => __('Basic Blog Layout', 'aldehyde'),
                'grid_2_column' => __('Grid - 2 Column', 'aldehyde'),
                'grid_3_column' => __('Grid - 3 Column', 'aldehyde'),
            )
        )
    );

    $wp_customize->add_section(
        'aldehyde_sidebar_options',
        array(
            'title' => __('Sidebar Layout', 'aldehyde'),
            'priority' => 0,
            'panel' => 'aldehyde_design_panel'
        )
    );

    $wp_customize->add_setting(
        'aldehyde_disable_sidebar',
        array('sanitize_callback' => 'aldehyde_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'aldehyde_disable_sidebar', array(
            'settings' => 'aldehyde_disable_sidebar',
            'label' => __('Disable Sidebar Everywhere.', 'aldehyde'),
            'section' => 'aldehyde_sidebar_options',
            'type' => 'checkbox',
            'default' => false
        )
    );

    $wp_customize->add_setting(
        'aldehyde_disable_sidebar_home',
        array('sanitize_callback' => 'aldehyde_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'aldehyde_disable_sidebar_home', array(
            'settings' => 'aldehyde_disable_sidebar_home',
            'label' => __('Disable Sidebar on Home/Blog.', 'aldehyde'),
            'section' => 'aldehyde_sidebar_options',
            'type' => 'checkbox',
            'active_callback' => 'aldehyde_show_sidebar_options',
            'default' => false
        )
    );

    $wp_customize->add_setting(
        'aldehyde_disable_sidebar_front',
        array('sanitize_callback' => 'aldehyde_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'aldehyde_disable_sidebar_front', array(
            'settings' => 'aldehyde_disable_sidebar_front',
            'label' => __('Disable Sidebar on Front Page.', 'aldehyde'),
            'section' => 'aldehyde_sidebar_options',
            'type' => 'checkbox',
            'active_callback' => 'aldehyde_show_sidebar_options',
            'default' => false
        )
    );


    $wp_customize->add_setting(
        'aldehyde_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'aldehyde_sanitize_positive_number')
    );

    $wp_customize->add_control(
        'aldehyde_sidebar_width', array(
            'settings' => 'aldehyde_sidebar_width',
            'label' => __('Sidebar Width', 'aldehyde'),
            'description' => __('Min: 25%, Default: 33%, Max: 40%', 'aldehyde'),
            'section' => 'aldehyde_sidebar_options',
            'type' => 'range',
            'active_callback' => 'aldehyde_show_sidebar_options',
            'input_attrs' => array(
                'min' => 3,
                'max' => 5,
                'step' => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function aldehyde_show_sidebar_options($control)
    {

        $option = $control->manager->get_setting('aldehyde_disable_sidebar');
        return $option->value() == false;

    }

    class Aldehyde_Custom_CSS_Control extends WP_Customize_Control
    {
        public $type = 'textarea';

        public function render_content()
        {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="8"
                          style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }
    }

    $wp_customize->add_section(
        'aldehyde_custom_codes',
        array(
            'title' => __('Custom CSS', 'aldehyde'),
            'description' => __('Enter your Custom CSS to Modify design.', 'aldehyde'),
            'priority' => 11,
            'panel' => 'aldehyde_design_panel'
        )
    );

    $wp_customize->add_setting(
        'aldehyde_custom_css',
        array(
            'default' => '',
            'sanitize_callback' => 'aldehyde_sanitize_text'
        )
    );

    $wp_customize->add_control(
        new Aldehyde_Custom_CSS_Control(
            $wp_customize,
            'aldehyde_custom_css',
            array(
                'section' => 'aldehyde_custom_codes',
                'settings' => 'aldehyde_custom_css'
            )
        )
    );

    function aldehyde_sanitize_text($input)
    {
        return wp_kses_post(force_balance_tags($input));
    }

    $wp_customize->add_section(
        'aldehyde_custom_footer',
        array(
            'title' => __('Custom Footer Text', 'aldehyde'),
            'description' => __('Enter your Own Copyright Text.', 'aldehyde'),
            'priority' => 11,
            'panel' => 'aldehyde_design_panel'
        )
    );

    $wp_customize->add_setting(
        'aldehyde_footer_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'aldehyde_footer_text',
        array(
            'section' => 'aldehyde_custom_footer',
            'settings' => 'aldehyde_footer_text',
            'type' => 'text'
        )
    );
}
add_action( 'customize_register', 'hanne_customize_register_aldehyde' );