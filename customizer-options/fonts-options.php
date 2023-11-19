<?php
function lime_blog_custom_fonts($wp_customize)
{
    // Section
    $wp_customize->add_section('theme_fonts_section', array(
        'title'      => __('Font', 'lime-blog'),
        'description' => __('All fonts are hosted locally. Consent according to the GDPR is not required for this theme (cookie banner).', 'lime-blog'),
        'priority'   => 30,
    ));

    // Fonts
    $wp_customize->add_setting('body_font', array(
        'default'   => 'Fragment Mono',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('body_font', array(
        'label'      => __('Main text font', 'lime-blog'),
        'section'    => 'theme_fonts_section',
        'type'       => 'select',
        'choices'    => array(
            'Arial, sans-serif' => 'Arial',
            'Courier New, monospace' => 'Courier New',
            'Fragment Mono' => 'Fragment Mono',
            'Georgia, serif' => 'Georgia',
            'Lato, sans-serif' => 'Lato',
            'Lucida Console, monospace' => 'Lucida Console',
            'Montserrat, sans-serif' => 'Montserrat',
            'Noto Sans JP, sans-serif' => 'Noto Sans JP',
            'Open Sans, sans-serif' => 'Open Sans',
            'Poppins, sans-serif' => 'Poppins',
            'Quicksand, sans-serif' => 'Quicksand',
            'Roboto, sans-serif' => 'Roboto',
            'Tahoma, sans-serif' => 'Tahoma',
            'Times New Roman, serif' => 'Times New Roman',
            'Trebuchet MS, sans-serif' => 'Trebuchet MS',
            'Verdana, sans-serif' => 'Verdana',
            'monospace' => 'Monospace',            
        ),
    ));

    // Font color
    $wp_customize->add_setting('font_color', array(
        'default' => '#eeeeee',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'font_color', array(
        'label' => __('Font color', 'lime-blog'),
        'section' => 'theme_fonts_section',
        'settings' => 'font_color'
    )));
}
add_action('customize_register', 'lime_blog_custom_fonts');
