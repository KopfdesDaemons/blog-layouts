<?php
function blog_layouts_custom_category_list($wp_customize)
{
    // Section
    $wp_customize->add_section('category_list', array(
        'title' => __('Category Results List', 'blog-layouts'),
        'priority' => 30,
        'description' => __('Settings for the results when calling a category.', 'blog-layouts'),
    ));

    // Layout
    $wp_customize->add_setting('category_list_style', array(
        'default' => 'cards',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_post_list_layouts;
    $wp_customize->add_control('category_list_style', array(
        'type' => 'select',
        'section' => 'category_list',
        'label' => __('Layout', 'blog-layouts'),
        'choices' => $blog_layouts_post_list_layouts,
    ));

    // Sidebar
    $wp_customize->add_setting('category_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('category_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'blog-layouts'),
        'section' => 'category_list',
    ));

    function category_sidebar_active_callback($control)
    {
        return $control->manager->get_setting('category_sidebar')->value();
    }

    // Sidebar Layout
    $wp_customize->add_setting('category_sidebar_layout', array(
        'default' => 'social',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_sidebar_layouts;
    $wp_customize->add_control('category_sidebar_layout', array(
        'type' => 'select',
        'section' => 'category_list',
        'label' => __('Layout Sidebar', 'blog-layouts'),
        'choices' => $blog_layouts_sidebar_layouts,
        'active_callback' => 'category_sidebar_active_callback',
    ));
}
add_action('customize_register', 'blog_layouts_custom_category_list');
