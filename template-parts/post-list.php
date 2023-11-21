<?php
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
