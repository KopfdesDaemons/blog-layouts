<?php
function lime_blog_display_post_list($query, $style, $show_sticky_posts = false)
{
    ob_start(); // Start output buffering

    $container_class = '';
    $display_function = '';
    $template_path = get_template_directory() . '/template-parts/';

    switch ($style) {
        case 'search_engine':
            $container_class = 'lime_blog_searchresults';
            $display_function = 'lime_blog_display_searchresult';
            require_once $template_path . 'searchresult.php';
            break;

        default:
            $container_class = 'lime_blog_feed';
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
?>
