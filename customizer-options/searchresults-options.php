<?php
function lime_blog_custom_searchresults($wp_customize)
{
    // Section
    $wp_customize->add_section('searchresults', array(
        'title' => __('Search Results', 'lime-blog'),
        'priority' => 30,
        'description' => __('Options for the search results.', 'lime-blog'),
    ));

    // Sidebar
    $wp_customize->add_setting('pages_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('pages_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'lime-blog'),
        'section' => 'searchresults',
    ));

    // Style
    $wp_customize->add_setting('searchresults_style', array(
        'default' => 'search_engine',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $searchresults_styles;
    $wp_customize->add_control('searchresults_style', array(
        'type' => 'select',
        'section' => 'searchresults',
        'label' => __('Search results style', 'lime-blog'),
        'choices' => $searchresults_styles,
    ));
}
add_action('customize_register', 'lime_blog_custom_searchresults');
