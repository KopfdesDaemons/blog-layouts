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

function lime_blog_display_header($layout)
{
    $layout_name_underscore = str_replace("-", "_", $layout);
    $template_path = get_template_directory() . '/template-parts/header-layouts/';
    $container_class = 'lime_blog_' . $layout_name_underscore . '_header';
    $fixed_header = (get_theme_mod('fixed_header', false)) ? 'lime_blog_fixed_header' : '';
    $display_function = 'lime_blog_display_' .$layout_name_underscore . '_header';
    
    require_once $template_path . $layout . '-header.php';
    
    ob_start(); // Start output buffering
    echo '<header class="' . esc_attr($container_class) . ' ' . $fixed_header. '" id="lime_blog_header">';
    echo ' <a href="#lime_blog_main_content" class="lime_blog_skip_link">' . esc_html__('Skip to main content', 'lime-blog') . '</a>';
    echo call_user_func($display_function);

    echo '</header>';
    return ob_get_clean(); // Return the buffered output as a string
}
