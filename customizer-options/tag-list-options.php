<?php
function lime_blog_custom_tag_list($wp_customize)
{
    // Section
    $wp_customize->add_section('tag_list', array(
        'title' => __('Tag Results List', 'lime-blog'),
        'priority' => 30,
        'description' => __('Settings for the results when calling a tag.', 'lime-blog'),
    ));

    // Sidebar
    $wp_customize->add_setting('tags_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('tags_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'lime-blog'),
        'section' => 'tag_list',
    ));

    // Style
    $wp_customize->add_setting('tag_list_style', array(
        'default' => 'cards',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $lime_blog_post_list_layouts;
    $wp_customize->add_control('tag_list_style', array(
        'type' => 'select',
        'section' => 'tag_list',
        'label' => __('Layout', 'lime-blog'),
        'choices' => $lime_blog_post_list_layouts,
    ));

    // Sidebar Layout
    $wp_customize->add_setting('tags_sidebar_layout', array(
        'default' => 'blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    global $lime_blog_sidebar_layouts;
    $wp_customize->add_control('tags_sidebar_layout', array(
        'type' => 'select',
        'section' => 'tag_list',
        'label' => __('Layout Sidebar', 'lime-blog'),
        'choices' => $lime_blog_sidebar_layouts,
    ));
}
add_action('customize_register', 'lime_blog_custom_tag_list');
