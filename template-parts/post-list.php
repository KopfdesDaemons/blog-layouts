<?php

function enqueue_post_list_styles()
{
    global $post_list_layouts;
    $theme_directory = get_stylesheet_directory_uri();

    // Add the appropriate stylesheet based on the name
    foreach ($post_list_layouts as $style_key => $style_name) {
        $handle = sanitize_title($style_key);
        $file = '/template-parts/post-list-layouts/' . $style_key . '-post-list' . '.css';

        wp_enqueue_style($handle, $theme_directory . $file, array(), '1', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_post_list_styles');


function lime_blog_display_post_list($query, $style, $show_sticky_posts = false)
{
    ob_start(); // Start output buffering

    $container_class = '';
    $display_function = '';
    $template_path = get_template_directory() . '/template-parts/post-list-layouts/';

    switch ($style) {
        case 'search_engine':
            $container_class = 'lime_blog_searchresults';
            $display_function = 'lime_blog_display_searchresult';
            require_once $template_path . 'searchresult.php';
            break;

        case 'frameless':
            $container_class = 'lime_blog_framless_post_list';
            $display_function = 'lime_blog_display_frameless';
            require_once $template_path . 'frameless-posts-list.php';
            break;

        case 'social':
            $container_class = 'social_post_list';
            $display_function = 'lime_blog_display_social_post_list';
            require_once $template_path . 'social-posts-list.php';
            break;

        case 'material2':
            $container_class = 'material2_post_list';
            $display_function = 'lime_blog_display_material2_post_list';
            require_once $template_path . 'material2-posts-list.php';
            break;

        case 'material3':
            $container_class = 'material3_post_list';
            $display_function = 'lime_blog_display_material3_post_list';
            require_once $template_path . 'material3-posts-list.php';
            break;

        default:
            $container_class = 'lime_blog_cards_post_list';
            $display_function = 'lime_blog_display_post_card';
            require_once $template_path . 'post-card.php';
            break;
    }

    echo '<ul class="' . esc_attr($container_class) . '">';

    while ($query->have_posts()) {
        $query->the_post();
        echo call_user_func($display_function, $show_sticky_posts);
    }

    echo '</ul>';

    return ob_get_clean(); // Return the buffered output as a string
}
