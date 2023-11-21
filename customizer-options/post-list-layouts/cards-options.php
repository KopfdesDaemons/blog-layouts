<?php
function lime_blog_cards($wp_customize)
{
    // Background color
    $wp_customize->add_setting('feed_post_card_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'feed_post_card_color', array(
        'label' => __('Cards background color', 'lime-blog'),
        'section' => 'custom_theme_cards',
        'settings' => 'feed_post_card_color'
    )));

    // Posts Spacing
    $wp_customize->add_setting('feed_post_card_spacing', array(
        'default' => '3',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_spacing', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Spacing between posts', 'lime-blog'),
        'section' => 'custom_theme_cards',
        'input_attrs' => array(
            'min' => 0,
            'max' => 10,
            'step' => 0.1,
        ),
    ));

    // Number of word in snippet
    $wp_customize->add_setting('words_in_snippet', array(
        'default' => 30,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('words_in_snippet', array(
        'type' => 'number',
        'label' => __('Number of words in the snippet', 'lime-blog'),
        'section' => 'custom_theme_cards',
        'priority' => 10,
        'input_attrs' => array(
            'min' => 1,
            'max' => 100,
            'step' => 1,
        ),
    ));

    // Tags
    $wp_customize->add_setting('feed_post_card_tags', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_post_card_tags', array(
        'type' => 'checkbox',
        'label' => __('Show tags', 'lime-blog'),
        'section' => 'custom_theme_cards',
    ));

    // Tags border radius
    $wp_customize->add_setting('tags_border_radius', array(
        'default' => '4',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('tags_border_radius', array(
        'type' => 'range',
        'label' => __('Tags border radius', 'lime-blog'),
        'section' => 'custom_theme_cards',
        'active_callback' => 'tags_active_callback',
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
    ));

    // Read more link
    $wp_customize->add_setting('feed_post_card_read_more', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_post_card_read_more', array(
        'type' => 'checkbox',
        'label' => __('Show read more button', 'lime-blog'),
        'section' => 'custom_theme_cards',
    ));

    // Comments link
    $wp_customize->add_setting('feed_post_card_comments', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_post_card_comments', array(
        'type' => 'checkbox',
        'label' => __('Show comments', 'lime-blog'),
        'section' => 'custom_theme_cards',
    ));

    // Line height
    $wp_customize->add_setting('feed_post_card_line_height', array(
        'default' => '20',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_line_height', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Line height in text snippet', 'lime-blog'),
        'section' => 'custom_theme_cards',
        'input_attrs' => array(
            'min' => 15,
            'max' => 50,
            'step' => 1,
        ),
    ));

    // Border radius
    $wp_customize->add_setting('feed_post_card_border_radius', array(
        'default' => '12',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_border_radius', array(
        'type' => 'range',
        'label' => __('Border radius', 'lime-blog'),
        'section' => 'custom_theme_cards',
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
    ));

    // Padding
    $wp_customize->add_setting('feed_post_card_padding', array(
        'default' => '1',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_padding', array(
        'type' => 'range',
        'label' => __('Padding', 'lime-blog'),
        'section' => 'custom_theme_cards',
        'input_attrs' => array(
            'min' => 0,
            'max' => 3,
            'step' => 1,
        ),
    ));

    // Show image
    $wp_customize->add_setting('feed_post_card_image', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'lime_blog_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_post_card_image', array(
        'type' => 'checkbox',
        'label' => __('Show image', 'lime-blog'),
        'section' => 'custom_theme_cards',
    ));

    // Border radius image
    $wp_customize->add_setting('feed_post_card_border_radius_image', array(
        'default' => '6',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_border_radius_image', array(
        'type' => 'range',
        'label' => __('Image radius', 'lime-blog'),
        'section' => 'custom_theme_cards',
        'active_callback' => 'image_active_callback',
        'input_attrs' => array(
            'min' => 0,
            'max' => 150,
            'step' => 1,
        ),
    ));

    function image_active_callback($control)
    {
        return $control->manager->get_setting('feed_post_card_image')->value();
    }

    function tags_active_callback($control)
    {
        return $control->manager->get_setting('feed_post_card_tags')->value();
    }
}
add_action('customize_register', 'lime_blog_cards');

// Number of words previewed in the feed
function lime_blog_custom_excerpt_length($length)
{
    return get_theme_mod('words_in_snippet', 30);
}
add_filter('excerpt_length', 'lime_blog_custom_excerpt_length', 999);

// Characters after snippet
function lime_blog_custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'lime_blog_custom_excerpt_more');
