<?php
function lime_blog_layout_options($wp_customize)
{
    // Section
    $wp_customize->add_panel('layouts', array(
        'title' => __('Posts List Layouts', 'lime-blog'),
        'priority' => 31,
        'description' => __('Settings for the individual layouts.', 'lime-blog'),
    ));

    // Section
    $wp_customize->add_section('custom_theme_cards', array(
        'title' => 'Cards',
        'priority' => 30,
        'panel' => 'layouts',
    ));

    $wp_customize->add_section('frameless_post_list', array(
        'title' => 'Frameless',
        'priority' => 30,
        'panel' => 'layouts',
    ));

    $wp_customize->add_section('material2_post_list', array(
        'title' => 'Material2',
        'priority' => 30,
        'panel' => 'layouts',
    ));

    $wp_customize->add_section('material3_post_list', array(
        'title' => 'Material3',
        'priority' => 30,
        'panel' => 'layouts',
    ));
}
add_action('customize_register', 'lime_blog_layout_options');
