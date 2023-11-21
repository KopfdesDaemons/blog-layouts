<?php
function lime_blog_frameless_post_list($wp_customize)
{
    // Background color
    $wp_customize->add_setting('frameless_post_list_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'frameless_post_list_color', array(
        'label' => __('Cards background color', 'lime-blog'),
        'section' => 'frameless_post_list',
        'settings' => 'frameless_post_list_color'
    )));

    // Posts Spacing
    $wp_customize->add_setting('frameless_post_list_spacing', array(
        'default' => '3',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('frameless_post_list_spacing', array(
        'type' => 'range',
        'label' => __('Spacing between posts', 'lime-blog'),
        'section' => 'frameless_post_list',
        'input_attrs' => array(
            'min' => 0,
            'max' => 10,
            'step' => 0.1,
        ),
    ));

    // Number of word in snippet
    $wp_customize->add_setting('frameless_post_list_words_in_snippet', array(
        'default' => 30,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('frameless_post_list_words_in_snippet', array(
        'type' => 'number',
        'label' => __('Number of words in the snippet', 'lime-blog'),
        'section' => 'frameless_post_list',
        'priority' => 10,
        'input_attrs' => array(
            'min' => 1,
            'max' => 100,
            'step' => 1,
        ),
    ));

    // Tags
    $wp_customize->add_setting('frameless_post_list_tags', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('frameless_post_list_tags', array(
        'type' => 'checkbox',
        'label' => __('Show tags', 'lime-blog'),
        'section' => 'frameless_post_list',
    ));

    // Tags border radius
    $wp_customize->add_setting('frameless_post_list_tags_border_radius', array(
        'default' => '4',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('frameless_post_list_tags_border_radius', array(
        'type' => 'range',
        'label' => __('Tags border radius', 'lime-blog'),
        'section' => 'frameless_post_list',
        'active_callback' => 'tags_active_callback_frameless_post_list',
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
    ));

    // Read more link
    $wp_customize->add_setting('frameless_post_list_read_more', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('frameless_post_list_read_more', array(
        'type' => 'checkbox',
        'label' => __('Show read more button', 'lime-blog'),
        'section' => 'frameless_post_list',
    ));

    // Comments link
    $wp_customize->add_setting('frameless_post_list_comments', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('frameless_post_list_comments', array(
        'type' => 'checkbox',
        'label' => __('Show comments', 'lime-blog'),
        'section' => 'frameless_post_list',
    ));

    // Line height
    $wp_customize->add_setting('frameless_post_list_line_height', array(
        'default' => '20',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('frameless_post_list_line_height', array(
        'type' => 'range',
        'label' => __('Line height in text snippet', 'lime-blog'),
        'section' => 'frameless_post_list',
        'input_attrs' => array(
            'min' => 15,
            'max' => 50,
            'step' => 1,
        ),
    ));

    // Padding
    $wp_customize->add_setting('frameless_post_list_padding', array(
        'default' => '1',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('frameless_post_list_padding', array(
        'type' => 'range',
        'label' => __('Padding', 'lime-blog'),
        'section' => 'frameless_post_list',
        'input_attrs' => array(
            'min' => 0,
            'max' => 3,
            'step' => 1,
        ),
    ));

    // Show image
    $wp_customize->add_setting('frameless_post_list_image', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('frameless_post_list_image', array(
        'type' => 'checkbox',
        'label' => __('Show image', 'lime-blog'),
        'section' => 'frameless_post_list',
    ));

    // Border radius image
    $wp_customize->add_setting('frameless_post_list_border_radius_image', array(
        'default' => '6',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('frameless_post_list_border_radius_image', array(
        'type' => 'range',
        'label' => __('Image radius', 'lime-blog'),
        'section' => 'frameless_post_list',
        'active_callback' => 'image_active_callback_frameless_post_list',
        'input_attrs' => array(
            'min' => 0,
            'max' => 150,
            'step' => 1,
        ),
    ));

    function image_active_callback_frameless_post_list($control)
    {
        return $control->manager->get_setting('frameless_post_list_image')->value();
    }

    function tags_active_callback_frameless_post_list($control)
    {
        return $control->manager->get_setting('frameless_post_list_tags')->value();
    }
}
add_action('customize_register', 'lime_blog_frameless_post_list');

// Number of words previewed in the feed
function lime_blog_custom_excerpt_length_frameless_post_list($length)
{
    return get_theme_mod('frameless_post_list_words_in_snippet', 30);
}
add_filter('excerpt_length', 'lime_blog_custom_excerpt_length_frameless_post_list', 999);
