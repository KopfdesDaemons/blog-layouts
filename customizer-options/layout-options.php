<?php
function lime_blog_layout_options($wp_customize)
{
    // Section
    $wp_customize->add_panel('layouts', array(
        'title' => __('Layouts', 'lime-blog'),
        'priority' => 31,
        'description' => __('Settings for the individual layouts.', 'lime-blog'),
    ));

    // Section
    $wp_customize->add_section('custom_theme_cards', array(
        'title' => __('Cards', 'lime-blog'),
        'priority' => 30,
        'panel' => 'layouts',
    ));

    $wp_customize->add_section('frameless_post_list', array(
        'title' => __('Frameless posts list', 'lime-blog'),
        'priority' => 30,
        'panel' => 'layouts',
    ));
}
add_action('customize_register', 'lime_blog_layout_options');
