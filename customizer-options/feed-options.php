<?php
function blog_layouts_custom_feed($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_feed', array(
        'title' => __('Feed', 'blog-layouts'),
        'priority' => 30,
    ));

    // Landingpage area
    $wp_customize->add_setting('landingpage_section', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('landingpage_section', array(
        'type' => 'checkbox',
        'label' => __('Show landingpage section', 'blog-layouts'),
        'section' => 'custom_feed',
    ));

    // Landingpage image animation
    $wp_customize->add_setting('landingpage_image_animation', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('landingpage_image_animation', array(
        'type' => 'checkbox',
        'label' => __('Landingpage image animation', 'blog-layouts'),
        'section' => 'custom_feed',
        'active_callback' => 'landingpage_active_callback',
    ));

    // Minimal height landingpage
    $wp_customize->add_setting('minimal_height_of_the_landingpage', array(
        'default' => '60',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('minimal_height_of_the_landingpage', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Minimal height of the landingpage', 'blog-layouts'),
        'section' => 'custom_feed',
        'active_callback' => 'landingpage_active_callback',
        'input_attrs' => array(
            'min' => 5,
            'max' => 100,
            'step' => 1,
        ),
    ));

    function landingpage_active_callback($control)
    {
        return $control->manager->get_setting('landingpage_section')->value();
    }

    // Style
    $wp_customize->add_setting('feed_style', array(
        'default' => 'cards',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_post_list_layouts;
    $wp_customize->add_control('feed_style', array(
        'type' => 'select',
        'section' => 'custom_feed',
        'label' => __('Layout', 'blog-layouts'),
        'choices' => $blog_layouts_post_list_layouts,
    ));

    // Sidebar
    $wp_customize->add_setting('feed_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'blog-layouts'),
        'section' => 'custom_feed',
    ));

    function feed_sidebar_active_callback($control)
    {
        return $control->manager->get_setting('feed_sidebar')->value();
    }

    // Sidebar Layout
    $wp_customize->add_setting('feed_sidebar_layout', array(
        'default' => 'social',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_sidebar_layouts;
    $wp_customize->add_control('feed_sidebar_layout', array(
        'type' => 'select',
        'section' => 'custom_feed',
        'label' => __('Layout Sidebar', 'blog-layouts'),
        'choices' => $blog_layouts_sidebar_layouts,
        'active_callback' => 'feed_sidebar_active_callback',
    ));
}
add_action('customize_register', 'blog_layouts_custom_feed');
