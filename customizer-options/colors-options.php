<?php

function clean_space_custom_colors($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_colors', array(
        'title' => __('Colors', 'clean-space'),
        'priority' => 30,
    ));

    // Primary color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#2a30d4',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'clean-space'),
        'section' => 'custom_theme_colors',
        'settings' => 'primary_color'
    )));

    // Background color
    $wp_customize->add_setting('body_background_color', array(
        'default' => '#2d2d31',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_background_color', array(
        'label' => __('Background color', 'clean-space'),
        'section' => 'custom_theme_colors',
        'settings' => 'body_background_color'
    )));
}
add_action('customize_register', 'clean_space_custom_colors');
