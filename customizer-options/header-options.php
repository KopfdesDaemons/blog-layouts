<?php
function blog_layouts_header($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_theme_header', array(
        'title' => __('Header', 'blog-layouts'),
        'priority' => 30,
    ));

    // Header Layout
    $wp_customize->add_setting('header_layout', array(
        'default' => 'gradient',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_header_layouts;
    $wp_customize->add_control('header_layout', array(
        'type' => 'select',
        'section' => 'custom_theme_header',
        'label' => __('Layout', 'blog-layouts'),
        'choices' => $blog_layouts_header_layouts,
    ));

    // Header menu
    $wp_customize->add_setting('fixed_header', array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('fixed_header', array(
        'type' => 'checkbox',
        'label' => __('Fix Header', 'blog-layouts'),
        'section' => 'custom_theme_header',
    ));

    // Header menu
    $wp_customize->add_setting('header_menu', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('header_menu', array(
        'type' => 'checkbox',
        'label' => __('Show menu in header', 'blog-layouts'),
        'section' => 'custom_theme_header',
        'active_callback' => 'gradient_header_active_callback'
    ));

    // Home page link
    $wp_customize->add_setting('logo', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('logo', array(
        'type' => 'checkbox',
        'label' => __('Show logo with link to home page', 'blog-layouts'),
        'section' => 'custom_theme_header',
        'active_callback' => 'gradient_header_active_callback'
    ));

    // Searchbar
    $wp_customize->add_setting('searchbar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('searchbar', array(
        'type' => 'checkbox',
        'label' => __('Show search bar', 'blog-layouts'),
        'section' => 'custom_theme_header',
        'active_callback' => 'gradient_header_active_callback'
    ));

    function searchbar_active_callback($control)
    {
        return $control->manager->get_setting('searchbar')->value();
    }

    function gradient_header_active_callback($control)
    {
        return $control->manager->get_setting('header_layout', 'gradient')->value() == 'gradient';
    }

    function stackoverflow_header_active_callback($control)
    {
        return $control->manager->get_setting('header_layout', 'gradient')->value() == 'stackoverflow';
    }

    // Title size setting
    $wp_customize->add_setting('header_menu_font_size_setting', array(
        'default' => '14',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('header_menu_font_size_setting', array(
        'type' => 'range',
        'label' => __('Menu font size', 'blog-layouts'),
        'section' => 'custom_theme_header',
        'input_attrs' => array(
            'min' => 10,
            'max' => 25,
            'step' => 1,
        ),
        'active_callback' => function ($control) {
            return (
                header_menu_callback($control)
                &&
                gradient_header_active_callback($control)
            );
        },
    ));

    function header_menu_callback($control)
    {
        return $control->manager->get_setting('header_menu')->value();
    }

    // Stackoverflow Icon
    $wp_customize->add_setting('stackoverflow_icon_1', array(
        'default'           => 'fa-solid fa-inbox',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stackoverflow_icon_1', array(
        'label'    => __('Icon 1 Font Awesome Icon Class', 'theme-text-domain'),
        'section'  => 'custom_theme_header',
        'type'     => 'text',
        'active_callback' => 'stackoverflow_header_active_callback'
    ));

    // Stackoverflow Icon Link
    $wp_customize->add_setting('stackoverflow_icon_1_link', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stackoverflow_icon_1_link', array(
        'label'    => __('Icon 1 Link', 'theme-text-domain'),
        'section'  => 'custom_theme_header',
        'type'     => 'text',
        'active_callback' => 'stackoverflow_header_active_callback'
    ));

    // Stackoverflow Icon
    $wp_customize->add_setting('stackoverflow_icon_2', array(
        'default'           => 'fa-solid fa-trophy',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stackoverflow_icon_2', array(
        'label'    => __('Icon 2 Font Awesome Icon Class', 'theme-text-domain'),
        'section'  => 'custom_theme_header',
        'type'     => 'text',
        'active_callback' => 'stackoverflow_header_active_callback'
    ));

    // Stackoverflow Icon Link
    $wp_customize->add_setting('stackoverflow_icon_2_link', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stackoverflow_icon_2_link', array(
        'label'    => __('Icon 2 Link', 'theme-text-domain'),
        'section'  => 'custom_theme_header',
        'type'     => 'text',
        'active_callback' => 'stackoverflow_header_active_callback'
    ));

    // Stackoverflow Icon
    $wp_customize->add_setting('stackoverflow_icon_3', array(
        'default'           => 'fa-solid fa-circle-question',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stackoverflow_icon_3', array(
        'label'    => __('Icon 3 Font Awesome Icon Class', 'theme-text-domain'),
        'section'  => 'custom_theme_header',
        'type'     => 'text',
        'active_callback' => 'stackoverflow_header_active_callback'
    ));

    // Stackoverflow Icon Link
    $wp_customize->add_setting('stackoverflow_icon_3_link', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stackoverflow_icon_3_link', array(
        'label'    => __('Icon 3 Link', 'theme-text-domain'),
        'section'  => 'custom_theme_header',
        'type'     => 'text',
        'active_callback' => 'stackoverflow_header_active_callback'
    ));

    // Stackoverflow Icon
    $wp_customize->add_setting('stackoverflow_icon_4', array(
        'default'           => 'fa-regular fa-message',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stackoverflow_icon_4', array(
        'label'    => __('Icon 4 Font Awesome Icon Class', 'theme-text-domain'),
        'section'  => 'custom_theme_header',
        'type'     => 'text',
        'active_callback' => 'stackoverflow_header_active_callback'
    ));

    // Stackoverflow Icon Link
    $wp_customize->add_setting('stackoverflow_icon_4_link', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stackoverflow_icon_4_link', array(
        'label'    => __('Icon 4 Link', 'theme-text-domain'),
        'section'  => 'custom_theme_header',
        'type'     => 'text',
        'active_callback' => 'stackoverflow_header_active_callback'
    ));
}
add_action('customize_register', 'blog_layouts_header');
