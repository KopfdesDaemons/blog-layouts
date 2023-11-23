<?php
function lime_blog_custom_posts($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_article', array(
        'title' => __('Posts', 'lime-blog'),
        'priority' => 30,
        'description' => __('Settings of the individual posts.', 'lime-blog')
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
        'label' => __('Maximum hero width', 'lime-blog'),
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
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('hero_background', array(
        'type' => 'checkbox',
        'label' => __('Show hero gradient background', 'lime-blog'),
        'section' => 'custom_theme_article',
    ));

    // Post Image
    $wp_customize->add_setting('post_image', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_image', array(
        'type' => 'checkbox',
        'label' => __('Show post image', 'lime-blog'),
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
        'label' => __('Maximum width of posts', 'lime-blog'),
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
        'label' => __('Posts background color', 'lime-blog'),
        'section' => 'custom_theme_article',
        'settings' => 'background_color_posts'
    )));

    // Sidebar
    $wp_customize->add_setting('post_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'lime-blog'),
        'section' => 'custom_theme_article',
    ));

    function post_sidebar_active_callback($control)
    {
        return $control->manager->get_setting('post_sidebar')->value();
    }

    // Sidebar Layout
    $wp_customize->add_setting('posts_sidebar_layout', array(
        'default' => 'social',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $lime_blog_sidebar_layouts;
    $wp_customize->add_control('posts_sidebar_layout', array(
        'type' => 'select',
        'section' => 'custom_theme_article',
        'label' => __('Layout Sidebar', 'lime-blog'),
        'choices' => $lime_blog_sidebar_layouts,
        'active_callback' => 'post_sidebar_active_callback',
    ));

    // Date
    $wp_customize->add_setting('post_date', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_date', array(
        'type' => 'checkbox',
        'label' => __('Show date', 'lime-blog'),
        'section' => 'custom_theme_article',
    ));

    // Categories
    $wp_customize->add_setting('post_categories', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_categories', array(
        'type' => 'checkbox',
        'label' => __('Show categories', 'lime-blog'),
        'section' => 'custom_theme_article',
    ));

    function post_categories_active_callback($control)
    {
        return $control->manager->get_setting('post_categories')->value();
    }

    // Categories Layout
    $wp_customize->add_setting('posts_categories_layout', array(
        'default' => 'blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $lime_blog_chips_layouts;
    $wp_customize->add_control('posts_categories_layout', array(
        'type' => 'select',
        'section' => 'custom_theme_article',
        'label' => __('Layout Categories', 'lime-blog'),
        'choices' => $lime_blog_chips_layouts,
        'active_callback' => 'post_categories_active_callback',
    ));

    // Tags
    $wp_customize->add_setting('tags', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('tags', array(
        'type' => 'checkbox',
        'label' => __('Show tags', 'lime-blog'),
        'section' => 'custom_theme_article',
    ));

    // Tags Layout
    $wp_customize->add_setting('posts_tags_layout', array(
        'default' => 'blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $lime_blog_chips_layouts;
    $wp_customize->add_control('posts_tags_layout', array(
        'type' => 'select',
        'section' => 'custom_theme_article',
        'label' => __('Tags Layout', 'lime-blog'),
        'choices' => $lime_blog_chips_layouts,
        'active_callback' => 'post_tags_active_callback',
    ));

    function post_tags_active_callback($control)
    {
        return $control->manager->get_setting('tags')->value();
    }

    // Author details
    $wp_customize->add_setting('author_details', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_details', array(
        'type' => 'checkbox',
        'label' => __('Show author details', 'lime-blog'),
        'section' => 'custom_theme_article',
    ));

    // Pagination
    $wp_customize->add_setting('post_pagination', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_pagination', array(
        'type' => 'checkbox',
        'label' => __('Show post pagination', 'lime-blog'),
        'section' => 'custom_theme_article',
    ));
}
add_action('customize_register', 'lime_blog_custom_posts');
