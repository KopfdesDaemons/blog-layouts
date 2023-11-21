<?php
function lime_blog_custom_category_list($wp_customize)
{
    // Section
    $wp_customize->add_section('category_list', array(
        'title' => __('Category Results List', 'lime-blog'),
        'priority' => 30,
        'description' => __('Settings for the results when calling a category.', 'lime-blog'),
    ));

    // Sidebar
    $wp_customize->add_setting('category_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('category_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'lime-blog'),
        'section' => 'category_list',
    ));

    // Style
    $wp_customize->add_setting('category_list_style', array(
        'default' => 'cards',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $searchresults_styles;
    $wp_customize->add_control('category_list_style', array(
        'type' => 'select',
        'section' => 'category_list',
        'label' => __('Layout', 'lime-blog'),
        'choices' => $searchresults_styles,
    ));
}
add_action('customize_register', 'lime_blog_custom_category_list');
