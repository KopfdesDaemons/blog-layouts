<?php
function blog_layouts_custom_posts($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_article', array(
        'title' => __('Posts', 'blog-layouts'),
        'priority' => 30,
        'description' => __('Settings of the individual posts.', 'blog-layouts')
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
        'label' => __('Maximum hero width', 'blog-layouts'),
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
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('hero_background', array(
        'type' => 'checkbox',
        'label' => __('Show hero gradient background', 'blog-layouts'),
        'section' => 'custom_theme_article',
    ));

    // Post Image
    $wp_customize->add_setting('post_image', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_image', array(
        'type' => 'checkbox',
        'label' => __('Show post image', 'blog-layouts'),
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
        'label' => __('Maximum width of posts', 'blog-layouts'),
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
        'label' => __('Posts background color', 'blog-layouts'),
        'section' => 'custom_theme_article',
        'settings' => 'background_color_posts'
    )));

    // Sidebar
    $wp_customize->add_setting('post_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'blog-layouts'),
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

    global $blog_layouts_sidebar_layouts;
    $wp_customize->add_control('posts_sidebar_layout', array(
        'type' => 'select',
        'section' => 'custom_theme_article',
        'label' => __('Layout Sidebar', 'blog-layouts'),
        'choices' => $blog_layouts_sidebar_layouts,
        'active_callback' => 'post_sidebar_active_callback',
    ));

    // Date
    $wp_customize->add_setting('post_date', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_date', array(
        'type' => 'checkbox',
        'label' => __('Show date', 'blog-layouts'),
        'section' => 'custom_theme_article',
    ));

    // Categories
    $wp_customize->add_setting('post_categories', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_categories', array(
        'type' => 'checkbox',
        'label' => __('Show categories', 'blog-layouts'),
        'section' => 'custom_theme_article',
    ));

    function post_categories_active_callback($control)
    {
        return $control->manager->get_setting('post_categories')->value();
    }

    // Categories Layout
    $wp_customize->add_setting('posts_categories_layout', array(
        'default' => 'color-blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_chips_layouts;
    $wp_customize->add_control('posts_categories_layout', array(
        'type' => 'select',
        'section' => 'custom_theme_article',
        'label' => __('Layout Categories', 'blog-layouts'),
        'choices' => $blog_layouts_chips_layouts,
        'active_callback' => 'post_categories_active_callback',
    ));

    // Tags
    $wp_customize->add_setting('tags', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('tags', array(
        'type' => 'checkbox',
        'label' => __('Show tags', 'blog-layouts'),
        'section' => 'custom_theme_article',
    ));

    // Tags Layout
    $wp_customize->add_setting('posts_tags_layout', array(
        'default' => 'portal',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_chips_layouts;
    $wp_customize->add_control('posts_tags_layout', array(
        'type' => 'select',
        'section' => 'custom_theme_article',
        'label' => __('Tags Layout', 'blog-layouts'),
        'choices' => $blog_layouts_chips_layouts,
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
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_details', array(
        'type' => 'checkbox',
        'label' => __('Show author details', 'blog-layouts'),
        'section' => 'custom_theme_article',
    ));

    function post_authorbox_active_callback($control)
    {
        return $control->manager->get_setting('author_details')->value();
    }

    // Authorbox Layout
    $wp_customize->add_setting('posts_authorbox_layout', array(
        'default' => 'neon',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_authorbox_layouts;
    $wp_customize->add_control('posts_authorbox_layout', array(
        'type' => 'select',
        'section' => 'custom_theme_article',
        'label' => __('Authorbox Layout', 'blog-layouts'),
        'choices' => $blog_layouts_authorbox_layouts,
        'active_callback' => 'post_authorbox_active_callback',
    ));

    // Pagination
    $wp_customize->add_setting('post_pagination', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('post_pagination', array(
        'type' => 'checkbox',
        'label' => __('Show post pagination', 'blog-layouts'),
        'section' => 'custom_theme_article',
    ));
}
add_action('customize_register', 'blog_layouts_custom_posts');
