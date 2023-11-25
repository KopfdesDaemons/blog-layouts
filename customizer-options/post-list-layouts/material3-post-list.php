<?php
function blog_layouts_material3_post_list($wp_customize)
{
    // Background color
    $wp_customize->add_setting('material3_post_list_color', array(
        'default' => '#212121',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'material3_post_list_color', array(
        'label' => __('Cards background color', 'blog-layouts'),
        'section' => 'material3_post_list',
        'settings' => 'material3_post_list_color'
    )));

    // Posts Spacing
    $wp_customize->add_setting('material3_post_list_spacing', array(
        'default' => '3',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('material3_post_list_spacing', array(
        'type' => 'range',
        'label' => __('Spacing between posts', 'blog-layouts'),
        'section' => 'material3_post_list',
        'input_attrs' => array(
            'min' => 0,
            'max' => 10,
            'step' => 0.1,
        ),
    ));

    // Show image
    $wp_customize->add_setting('material3_post_list_image', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('material3_post_list_image', array(
        'type' => 'checkbox',
        'label' => __('Show image', 'blog-layouts'),
        'section' => 'material3_post_list',
    ));

    // Date
    $wp_customize->add_setting('material3_post_list_date', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('material3_post_list_date', array(
        'type' => 'checkbox',
        'label' => __('Show date', 'blog-layouts'),
        'section' => 'material3_post_list',
    ));

    // Categorys
    $wp_customize->add_setting('material3_post_list_categories', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('material3_post_list_categories', array(
        'type' => 'checkbox',
        'label' => __('Show categories', 'blog-layouts'),
        'section' => 'material3_post_list',
    ));

    // Number of word in snippet
    $wp_customize->add_setting('material3_post_list_words_in_snippet', array(
        'default' => 30,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('material3_post_list_words_in_snippet', array(
        'type' => 'number',
        'label' => __('Number of words in the snippet', 'blog-layouts'),
        'section' => 'material3_post_list',
        'priority' => 10,
        'input_attrs' => array(
            'min' => 1,
            'max' => 100,
            'step' => 1,
        ),
    ));

    // Line height
    $wp_customize->add_setting('material3_post_list_line_height', array(
        'default' => '20',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('material3_post_list_line_height', array(
        'type' => 'range',
        'label' => __('Line height in text snippet', 'blog-layouts'),
        'section' => 'material3_post_list',
        'input_attrs' => array(
            'min' => 15,
            'max' => 50,
            'step' => 1,
        ),
    ));

    // Tags
    $wp_customize->add_setting('material3_post_list_tags', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('material3_post_list_tags', array(
        'type' => 'checkbox',
        'label' => __('Show tags', 'blog-layouts'),
        'section' => 'material3_post_list',
    ));

    // Comments link
    $wp_customize->add_setting('material3_post_list_comments', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('material3_post_list_comments', array(
        'type' => 'checkbox',
        'label' => __('Show comments', 'blog-layouts'),
        'section' => 'material3_post_list',
    ));

    // Read more link
    $wp_customize->add_setting('material3_post_list_read_more', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_layouts_sanitize_checkbox',
    ));

    $wp_customize->add_control('material3_post_list_read_more', array(
        'type' => 'checkbox',
        'label' => __('Show read more button', 'blog-layouts'),
        'section' => 'material3_post_list',
    ));
}
add_action('customize_register', 'blog_layouts_material3_post_list');

// Number of words previewed in the feed
function blog_layouts_material3_custom_excerpt_length($length)
{
    return get_theme_mod('material3_post_list_words_in_snippet', 30);
}
add_filter('excerpt_length', 'blog_layouts_material3_custom_excerpt_length', 999);
