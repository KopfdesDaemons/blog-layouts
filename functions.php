<?php
function blog_layouts_styles()
{
    $theme_directory = get_stylesheet_directory_uri();

    $styles = array(
        'blog-layouts-styles' => '/style.css',
        'blog-layouts-fontawesome' => '/fonts/fontawesome/css/all.min.css',
    );

    foreach ($styles as $handle => $file) {
        wp_enqueue_style($handle, $theme_directory . $file, array(), '1', 'all');
    }
}
add_action('wp_enqueue_scripts', 'blog_layouts_styles');


// Theme Support
add_theme_support('post-thumbnails');
add_theme_support("title-tag");
add_theme_support('automatic-feed-links');
add_theme_support('html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption',
));
add_theme_support('align-wide');
add_theme_support('responsive-embeds');

function blog_layouts_enqueue_scripts()
{
    // Load the wordpress comment script from the “\wordpress\wp-includes\js” directory.
    // This allows the comment response form to be located below the corresponding comment
    // and not at the very bottom of the page.
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    // Header Script
    wp_enqueue_script('blog_layouts_header_script', get_template_directory_uri() . '/js/blog_layouts_header_script.js', null, '1.0', true);
    
    // Author Script
    if(get_theme_mod('author_page_latest_comments', true)) {
        wp_enqueue_script('blog_layouts_author_script', get_template_directory_uri() . '/js/blog_layouts_author_page.js', null, '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'blog_layouts_enqueue_scripts');

function blog_layouts_after_setup_theme()
{
    // For the translation
    load_theme_textdomain('blog-layouts', get_template_directory() . '/languages');
    // defaults to the feed as the homepage
    update_option('show_on_front', 'posts');

    global $blog_layouts_post_list_layouts;
    $blog_layouts_post_list_layouts = array(
        'cards' => __('Cards', 'blog-layouts'),
        'content-creator' => __('Content Creator', 'blog-layouts'),
        'discover' => __('Discover', 'blog-layouts'),
        'frameless' => __('Frameless', 'blog-layouts'),
        'material2' => 'Material 2',
        'material3' => 'Material 3',
        'search-engine' => __('Search Engine', 'blog-layouts'),
        'social' => __('Social', 'blog-layouts'),
    );
    
    global $blog_layouts_sidebar_layouts;
    $blog_layouts_sidebar_layouts = array(
        'blocks' => __('Blocks', 'blog-layouts'),
        'frameless' => __('Frameless', 'blog-layouts'),
        'frames' => __('Frames', 'blog-layouts'),
        'material2' => 'Material 2',
        'material3' => 'Material 3',
        'neon' => __('Neon', 'blog-layouts'),
        'network' => __('Network', 'blog-layouts'),
        'social' => __('Social', 'blog-layouts'),
        'soft' => __('Soft', 'blog-layouts'),
    );
    
    global $blog_layouts_chips_layouts;
    $blog_layouts_chips_layouts = array(
        'blocks' => __('Blocks', 'blog-layouts'),
        'coder' => __('Coder', 'blog-layouts'),
        'color-blocks' => __('Color Blocks', 'blog-layouts'),
        'content-creator' => __('Content Creator', 'blog-layouts'),
        'hashtag' => __('Hashtag', 'blog-layouts'),
        'hub' => __('Hub', 'blog-layouts'),
        'frames' => __('Frames', 'blog-layouts'),
        'links' => __('Links', 'blog-layouts'),
        'material2' => 'Material 2',
        'material3' => 'Material 3',
        'neon' => __('Neon', 'blog-layouts'),
        'network' => __('Network', 'blog-layouts'),
        'portal' => __('Portal', 'blog-layouts'),
        'social' => __('Social', 'blog-layouts'),
    );
    
    global $blog_layouts_header_layouts;
    $blog_layouts_header_layouts = array(
        'coder' => __('Coder', 'blog-layouts'),
        'gradient' => __('Gradient', 'blog-layouts'),
        'material2' => 'Material 2',
        'material3' => 'Material 3',
    );
    
    global $blog_layouts_authorbox_layouts;
    $blog_layouts_authorbox_layouts = array(
        'border' => __('Border', 'blog-layouts'),
        'frameless' => __('Frameless', 'blog-layouts'),
        'neon' => __('Neon', 'blog-layouts'),
        'material2' => 'Material 2',
        'material3' => 'Material 3',
    );
    
    global $blog_layouts_comments_layouts;
    $blog_layouts_comments_layouts = array(
        'dark-cards' => __('Dark Cards', 'blog-layouts'),
        'frameless' => __('Frameless', 'blog-layouts'),
        'material2' => 'Material 2',
        'material3' => 'Material 3',
        'neon' => __('Neon', 'blog-layouts'),
        'portal' => __('Portal', 'blog-layouts'),
        'social' => __('Social', 'blog-layouts'),
    );
}
add_action('after_setup_theme', 'blog_layouts_after_setup_theme');

function blog_layouts_register_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'blog-layouts'),
            'footer-menu' => __('Footer Menu', 'blog-layouts')
        )
    );
}
add_action('init', 'blog_layouts_register_menus');

function blog_layouts_register_sidebar()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'blog-layouts'),
        'id' => 'my-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'blog_layouts_register_sidebar');

function blog_layouts_register_landigpage_widget_area()
{
    register_sidebar(array(
        'name' => __('Landingpage Widget Area', 'blog-layouts'),
        'id' => 'landingpage-widget-area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'blog_layouts_register_landigpage_widget_area');

// Custom menu structure
class blog_layouts_menu_walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        if (empty($item->title)) return;

        $output .= "<li class='" .  implode(" ", (array)$item->classes) . "'>";
        $output .= "<div class='blog_layouts_menuitem_container'>";
        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= $item->title;
        $output .= '</a>';

        if ($args->walker->has_children) {
            $output .= '<i tabindex="0" class="blog_layouts_submenu_toggle fa fa-caret-down"></i>';
        }
        $output .= "</div>";
    }
}

// customizer settings
$blog_layouts_customizer_options = [
    'global-options.php',
    'header-options.php',
    'feed-options.php',
    'posts-options.php',
    'pages-options.php',
    'author-page-options.php',
    'searchresults-options.php',
    'layout-options.php',
    'post-list-layouts/cards-options.php',
    'post-list-layouts/frameless-post-list.php',
    'post-list-layouts/material2-post-list.php',
    'post-list-layouts/material3-post-list.php',
    'tag-list-options.php',
    'category-list-options.php',
    'date-list-options.php'
];

foreach ($blog_layouts_customizer_options as $option) {
    require_once get_template_directory() . '/customizer-options/' . $option;
}

// Sanitize function to check checkbox value (true/false)
function blog_layouts_sanitize_checkbox($input)
{
    return (isset($input) && true === $input) ? true : false;
}