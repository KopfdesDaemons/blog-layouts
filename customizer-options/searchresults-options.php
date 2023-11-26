<?php
function blog_layouts_custom_searchresults($wp_customize)
{
    // Section
    $wp_customize->add_section('searchresults', array(
        'title' => __('Search Results', 'blog-layouts'),
        'priority' => 30,
        'description' => __('Options for the search results.', 'blog-layouts'),
    ));

    // Layout
    $wp_customize->add_setting('searchresults_style', array(
        'default' => 'search-engine',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_post_list_layouts;
    $wp_customize->add_control('searchresults_style', array(
        'type' => 'select',
        'section' => 'searchresults',
        'label' => __('Layout', 'blog-layouts'),
        'choices' => $blog_layouts_post_list_layouts,
    ));

    // Sidebar
    $wp_customize->add_setting('searchresults_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('searchresults_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'blog-layouts'),
        'section' => 'searchresults',
    ));

    function searchresults_sidebar_active_callback($control)
    {
        return $control->manager->get_setting('searchresults_sidebar')->value();
    }

    // Sidebar Layout
    $wp_customize->add_setting('searchresults_sidebar_layout', array(
        'default' => 'social',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $blog_layouts_sidebar_layouts;
    $wp_customize->add_control('searchresults_sidebar_layout', array(
        'type' => 'select',
        'section' => 'searchresults',
        'label' => __('Layout Sidebar', 'blog-layouts'),
        'choices' => $blog_layouts_sidebar_layouts,
        'active_callback' => 'searchresults_sidebar_active_callback',
    ));
}
add_action('customize_register', 'blog_layouts_custom_searchresults');
