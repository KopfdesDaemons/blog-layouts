<?php
function blog_layouts_custom_author_page($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_author_page', array(
        'title' => __('Author Page', 'blog-layouts'),
        'priority' => 30,
    ));

    // Sidebar
    $wp_customize->add_setting('author_page_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_page_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'blog-layouts'),
        'section' => 'custom_author_page',
    ));

    function author_page_sidebar_active_callback($control)
    {
        return $control->manager->get_setting('author_page_sidebar')->value();
    }
    
    // Sidebar Layout
    $wp_customize->add_setting('author_page_sidebar_layout', array(
        'default' => 'social',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_sidebar_layouts;
    $wp_customize->add_control('author_page_sidebar_layout', array(
        'type' => 'select',
        'section' => 'custom_author_page',
        'label' => __('Layout Sidebar', 'blog-layouts'),
        'choices' => $blog_layouts_sidebar_layouts,
        'active_callback' => 'author_page_sidebar_active_callback',
    ));

    // Comments
    $wp_customize->add_setting('author_page_latest_comments', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_page_latest_comments', array(
        'type' => 'checkbox',
        'label' => __('Show recent comments', 'blog-layouts'),
        'section' => 'custom_author_page',
    ));

    // Role
    $wp_customize->add_setting('author_page_role', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_page_role', array(
        'type' => 'checkbox',
        'label' => __('Show author role', 'blog-layouts'),
        'section' => 'custom_author_page',
    ));

    // Registration date
    $wp_customize->add_setting('author_registration_date', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_registration_date', array(
        'type' => 'checkbox',
        'label' => __('Show registration date', 'blog-layouts'),
        'section' => 'custom_author_page',
    ));

    // Number of posts
    $wp_customize->add_setting('author_number_of_posts', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_number_of_posts', array(
        'type' => 'checkbox',
        'label' => __('Show number of posts', 'blog-layouts'),
        'section' => 'custom_author_page',
    ));

    // Website
    $wp_customize->add_setting('author_website', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('author_website', array(
        'type' => 'checkbox',
        'label' => __('Show author website', 'blog-layouts'),
        'section' => 'custom_author_page',
    ));

    // Image size
    $wp_customize->add_setting('image_size_setting', array(
        'default' => '150',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('image_size_setting', array(
        'type' => 'range',
        'label' => __('Image size', 'blog-layouts'),
        'section' => 'custom_author_page',
        'input_attrs' => array(
            'min' => 50,
            'max' => 300,
            'step' => 10,
        ),
    ));

    // Style
    $wp_customize->add_setting('author_posts_style', array(
        'default' => 'cards',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_post_list_layouts;
    $wp_customize->add_control('author_posts_style', array(
        'type' => 'select',
        'section' => 'custom_author_page',
        'label' => __('Layout', 'blog-layouts'),
        'choices' => $blog_layouts_post_list_layouts,
    ));
}
add_action('customize_register', 'blog_layouts_custom_author_page');
