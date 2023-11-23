<?php
function lime_blog_global($wp_customize)
{
    // Section
    $wp_customize->add_section('global_section', array(
        'title'      => __('Global', 'lime-blog'),
        'priority'   => 30,
    ));

    // Fonts
    $wp_customize->add_setting('body_font', array(
        'default'   => 'Fragment Mono',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('body_font', array(
        'description' => __('All fonts are hosted locally. Consent according to the GDPR is not required for this theme (cookie banner).', 'lime-blog'),
        'label'      => __('Main text font', 'lime-blog'),
        'section'    => 'global_section',
        'type'       => 'select',
        'choices'    => array(
            'Arial, sans-serif' => 'Arial',
            'Courier New, monospace' => 'Courier New',
            'Fragment Mono' => 'Fragment Mono',
            'Georgia, serif' => 'Georgia',
            'Lato, sans-serif' => 'Lato',
            'Lucida Console, monospace' => 'Lucida Console',
            'Montserrat, sans-serif' => 'Montserrat',
            'Noto Sans JP, sans-serif' => 'Noto Sans JP',
            'Open Sans, sans-serif' => 'Open Sans',
            'Poppins, sans-serif' => 'Poppins',
            'Quicksand, sans-serif' => 'Quicksand',
            'Roboto, sans-serif' => 'Roboto',
            'Tahoma, sans-serif' => 'Tahoma',
            'Times New Roman, serif' => 'Times New Roman',
            'Trebuchet MS, sans-serif' => 'Trebuchet MS',
            'Verdana, sans-serif' => 'Verdana',
            'monospace' => 'Monospace',
        ),
    ));

    // Primary color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#1e73be',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary color', 'lime-blog'),
        'section' => 'global_section',
        'settings' => 'primary_color'
    )));

    // Background color
    $wp_customize->add_setting('body_background_color', array(
        'default' => '#2d2d31',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_background_color', array(
        'label' => __('Background color', 'lime-blog'),
        'section' => 'global_section',
        'settings' => 'body_background_color'
    )));

    // Comments Background color
    $wp_customize->add_setting('comments_background_color', array(
        'default' => '#1d2027',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'comments_background_color', array(
        'label' => __('Comments background color', 'lime-blog'),
        'section' => 'global_section',
        'settings' => 'comments_background_color'
    )));

    // Font color
    $wp_customize->add_setting('font_color', array(
        'default' => '#eeeeee',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'font_color', array(
        'label' => __('Font color', 'lime-blog'),
        'section' => 'global_section',
        'settings' => 'font_color'
    )));
}
add_action('customize_register', 'lime_blog_global');
