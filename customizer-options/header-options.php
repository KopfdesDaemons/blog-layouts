<?php
function clean_space_header($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_header', array(
        'title' => __('Header', 'clean-space'),
        'priority' => 30,
    ));

    // Header menu
    $wp_customize->add_setting('header_menu', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('header_menu', array(
        'type' => 'checkbox',
        'label' => __('Show menu in header', 'clean-space'),
        'section' => 'custom_theme_header',
    ));

    // Home page link
    $wp_customize->add_setting('logo', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('logo', array(
        'type' => 'checkbox',
        'label' => __('Show logo with link to home page', 'clean-space'),
        'section' => 'custom_theme_header',
    ));

    // Searchbar
    $wp_customize->add_setting('searchbar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('searchbar', array(
        'type' => 'checkbox',
        'label' => __('Show search bar', 'clean-space'),
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
        'label' => __('Menu font size', 'clean-space'),
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
add_action('customize_register', 'clean_space_header');