<?php
function blog_layouts_custom_date_list($wp_customize)
{
    // Section
    $wp_customize->add_section('date_list', array(
        'title' => __('Date Results List', 'blog-layouts'),
        'priority' => 30,
        'description' => __('Settings for the results when calling a date.', 'blog-layouts'),
    ));

    // Style
    $wp_customize->add_setting('date_list_style', array(
        'default' => 'cards',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_post_list_layouts;
    $wp_customize->add_control('date_list_style', array(
        'type' => 'select',
        'section' => 'date_list',
        'label' => __('Layout', 'blog-layouts'),
        'choices' => $blog_layouts_post_list_layouts,
    ));

    // Sidebar
    $wp_customize->add_setting('date_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('date_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'blog-layouts'),
        'section' => 'date_list',
    ));

    function date_sidebar_active_callback($control)
    {
        return $control->manager->get_setting('date_sidebar')->value();
    }

    // Sidebar Layout
    $wp_customize->add_setting('date_sidebar_layout', array(
        'default' => 'social',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_sidebar_layouts;
    $wp_customize->add_control('date_sidebar_layout', array(
        'type' => 'select',
        'section' => 'date_list',
        'label' => __('Layout Sidebar', 'blog-layouts'),
        'choices' => $blog_layouts_sidebar_layouts,
        'active_callback' => 'date_sidebar_active_callback',
    ));
}
add_action('customize_register', 'blog_layouts_custom_date_list');
