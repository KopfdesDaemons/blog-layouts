<?php
function lime_blog_header($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_header', array(
        'title' => __('Header', 'lime-blog'),
        'priority' => 30,
    ));

    // Header Layout
    $wp_customize->add_setting('header_layout', array(
        'default' => 'clean',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $lime_blog_header_layouts;
    $wp_customize->add_control('header_layout', array(
        'type' => 'select',
        'section' => 'custom_theme_header',
        'label' => __('Layout', 'lime-blog'),
        'choices' => $lime_blog_header_layouts,
    ));

    // Header menu
    $wp_customize->add_setting('header_menu', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('header_menu', array(
        'type' => 'checkbox',
        'label' => __('Show menu in header', 'lime-blog'),
        'section' => 'custom_theme_header',
    ));

    // Home page link
    $wp_customize->add_setting('logo', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('logo', array(
        'type' => 'checkbox',
        'label' => __('Show logo with link to home page', 'lime-blog'),
        'section' => 'custom_theme_header',
    ));

    // Searchbar
    $wp_customize->add_setting('searchbar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('searchbar', array(
        'type' => 'checkbox',
        'label' => __('Show search bar', 'lime-blog'),
        'section' => 'custom_theme_header',
    ));

    function searchbar_active_callback($control)
    {
        return $control->manager->get_setting('searchbar')->value();
    }

    // Title size setting
    $wp_customize->add_setting('header_menu_font_size_setting', array(
        'default' => '14',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('header_menu_font_size_setting', array(
        'type' => 'range',
        'label' => __('Menu font size', 'lime-blog'),
        'section' => 'custom_theme_header',
        'input_attrs' => array(
            'min' => 10,
            'max' => 25,
            'step' => 1,
        ),
        'active_callback' => 'header_menu_callback'
    ));

    function header_menu_callback($control)
    {
        return $control->manager->get_setting('header_menu')->value();
    }
}
add_action('customize_register', 'lime_blog_header');
