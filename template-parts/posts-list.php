<?php
function lime_blog_display_posts_list($query, $layout, $show_sticky_posts = false)
{
    
    $layout_name_underscore = str_replace("-", "_", $layout);
    $template_path = get_template_directory() . '/template-parts/post-list-layouts/';
    $container_class = 'lime_blog_' . $layout_name_underscore . '_posts_list';
    $display_function = 'lime_blog_display_' .$layout_name_underscore . '_posts_list';
    
    require_once $template_path . $layout . '-posts-list.php';
    
    ob_start(); // Start output buffering
    echo '<ul class="' . esc_attr($container_class) . '">';

    while ($query->have_posts()) {
        $query->the_post();
        echo call_user_func($display_function, $show_sticky_posts);
    }

    echo '</ul>';

    return ob_get_clean(); // Return the buffered output as a string
}
