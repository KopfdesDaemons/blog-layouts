<?php

function lime_blog_custom_colors($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_colors', array(
        'title' => __('Colors', 'lime-blog'),
        'priority' => 30,
    ));

    // Primary color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#81d742',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary color', 'lime-blog'),
        'section' => 'custom_theme_colors',
        'settings' => 'primary_color'
    )));

    // Background color
    $wp_customize->add_setting('body_background_color', array(
        'default' => '#2d2d31',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_background_color', array(
        'label' => __('Background color', 'lime-blog'),
        'section' => 'custom_theme_colors',
        'settings' => 'body_background_color'
    )));

    // Tags color
    $wp_customize->add_setting('tags_color', array(
        'default' => '#303030',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tags_color', array(
        'label' => __('Tags and chips color', 'lime-blog'),
        'section' => 'custom_theme_colors',
        'settings' => 'tags_color'
    )));

    // Comments Background color
    $wp_customize->add_setting('comments_background_color', array(
        'default' => '#1d2027',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'comments_background_color', array(
        'label' => __('Comments background color', 'lime-blog'),
        'section' => 'custom_theme_colors',
        'settings' => 'comments_background_color'
    )));
}
add_action('customize_register', 'lime_blog_custom_colors');
