<?php
function lime_blog_custom_searchresults($wp_customize)
{
    // Section
    $wp_customize->add_section('searchresults', array(
        'title' => __('Search Results', 'lime-blog'),
        'priority' => 30,
        'description' => __('Options for the search results.', 'lime-blog'),
    ));

    // Layout
    $wp_customize->add_setting('searchresults_style', array(
        'default' => 'search_engine',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $lime_blog_post_list_layouts;
    $wp_customize->add_control('searchresults_style', array(
        'type' => 'select',
        'section' => 'searchresults',
        'label' => __('Layout', 'lime-blog'),
        'choices' => $lime_blog_post_list_layouts,
    ));

    // Sidebar
    $wp_customize->add_setting('searchresults_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('searchresults_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'lime-blog'),
        'section' => 'searchresults',
    ));

    function searchresults_sidebar_active_callback($control)
    {
        return $control->manager->get_setting('searchresults_sidebar')->value();
    }

    // Sidebar Layout
    $wp_customize->add_setting('searchresults_sidebar_layout', array(
        'default' => 'blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $lime_blog_sidebar_layouts;
    $wp_customize->add_control('searchresults_sidebar_layout', array(
        'type' => 'select',
        'section' => 'searchresults',
        'label' => __('Layout Sidebar', 'lime-blog'),
        'choices' => $lime_blog_sidebar_layouts,
        'active_callback' => 'searchresults_sidebar_active_callback',
    ));
}
add_action('customize_register', 'lime_blog_custom_searchresults');
