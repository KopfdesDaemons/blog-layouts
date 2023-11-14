<?php
function clean_space_custom_posts($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_article', array(
        'title' => __('Posts', 'clean-space'),
        'priority' => 30,
        'description' => __('Settings of the individual posts.', 'clean-space')
    ));

    // Maximum hero width
    $wp_customize->add_setting('maximum_hero_width', array(
        'default' => '70',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('maximum_hero_width', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Maximum hero width', 'clean-space'),
        'section' => 'custom_theme_article',
        'input_attrs' => array(
            'min' => 50,
            'max' => 150,
            'step' => 1,
        ),
    ));

    // Hero Background
    $wp_customize->add_setting('hero_background', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('hero_background', array(
        'type' => 'checkbox',
        'label' => __('Show hero gradient background', 'clean-space'),
        'section' => 'custom_theme_article',
    ));

    // Maximum width of the post
    $wp_customize->add_setting('maximum_width_of_posts', array(
        'default' => '70',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('maximum_width_of_posts', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Maximum width of posts', 'clean-space'),
        'section' => 'custom_theme_article',
        'input_attrs' => array(
            'min' => 50,
            'max' => 150,
            'step' => 1,
        ),
    ));

    // Background color
    $wp_customize->add_setting('background_color_posts', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Posts_background_color', array(
        'label' => __('Posts background color', 'clean-space'),
        'section' => 'custom_theme_article',
        'settings' => 'background_color_posts'
    )));

    // Sidebar
    $wp_customize->add_setting('post_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'clean-space'),
        'section' => 'custom_theme_article',
    ));

    // Post Image
    $wp_customize->add_setting('post_image', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_image', array(
        'type' => 'checkbox',
        'label' => __('Show post image', 'clean-space'),
        'section' => 'custom_theme_article',
    ));

    // Date
    $wp_customize->add_setting('post_date', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_date', array(
        'type' => 'checkbox',
        'label' => __('Show date', 'clean-space'),
        'section' => 'custom_theme_article',
    ));

    // Categories
    $wp_customize->add_setting('post_categories', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_categories', array(
        'type' => 'checkbox',
        'label' => __('Show categories', 'clean-space'),
        'section' => 'custom_theme_article',
    ));

    // Tags
    $wp_customize->add_setting('tags', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('tags', array(
        'type' => 'checkbox',
        'label' => __('Show tags', 'clean-space'),
        'section' => 'custom_theme_article',
    ));

    // Author details
    $wp_customize->add_setting('author_details', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_details', array(
        'type' => 'checkbox',
        'label' => __('Show author details', 'clean-space'),
        'section' => 'custom_theme_article',
    ));

    // Pagination
    $wp_customize->add_setting('post_pagination', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_pagination', array(
        'type' => 'checkbox',
        'label' => __('Show post pagination', 'clean-space'),
        'section' => 'custom_theme_article',
    ));
}
add_action('customize_register', 'clean_space_custom_posts');
