<?php
function enqueue_custom_styles()
{
    $theme_directory = get_stylesheet_directory_uri();

    $styles = array(
        'animations' => "/animations.css",
        'custom-font' => '/fonts/fonts.css',
        'custom-styles' => '/style.css',
        'header-styles' => '/header.css',
        'footer-styles' => '/footer.css',
        'comments-styles' => '/comments.css',
        'archive-styles' => '/archive.css',
        'single-styles' => '/single.css',
        'page-style' => '/page.css',
        'search-style' => '/search.css',
        'wp-block-style' => '/wp-block.css',
        'paginantion-style' => '/pagination.css',
        '404-styles' => '/404.css',
        'fontawesome' => '/fonts/fontawesome/css/all.min.css',

        //  template-parts
        'post-card' => '/template-parts/post-list-layouts/post-card.css',
        'searchresult' => '/template-parts/post-list-layouts/searchresult.css',
        'frameless-post-list' => '/template-parts/post-list-layouts/frameless-post-list.css',
        'social-post-list' => '/template-parts/post-list-layouts/social-posts-list.css',
        'material2-post-list' => '/template-parts/post-list-layouts/material2-posts-list.css',
    );

    foreach ($styles as $handle => $file) {
        wp_enqueue_style($handle, $theme_directory . $file, array(), '1', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


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

// Author Script
function lime_blog_author_script()
{
    wp_enqueue_script('lime_blog_author_script', get_template_directory_uri() . '/js/lime_blog_author_page.js', null, '1.0', true);
}
if(get_theme_mod('author_page_latest_comments', true)) add_action('wp_enqueue_scripts', 'lime_blog_author_script');

// Load the wordpress comment script from the “\wordpress\wp-includes\js” directory.
// This allows the comment response form to be located below the corresponding comment
// and not at the very bottom of the page.
function lime_blog_enqueue_comments_reply()
{
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'lime_blog_enqueue_comments_reply');


// For the translation
function lime_blog_load_theme_textdomain()
{
    load_theme_textdomain('lime-blog', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'lime_blog_load_theme_textdomain');


// defaults to the feed as the homepage
function lime_blog_set_default_front_page()
{
    update_option('show_on_front', 'posts');
}
add_action('after_setup_theme', 'lime_blog_set_default_front_page');

// Header Script
function lime_blog_header_script()
{
    wp_enqueue_script('lime_blog_header_script', get_template_directory_uri() . '/js/lime_blog_header_script.js', null, '1.0', true);
}
add_action('wp_enqueue_scripts', 'lime_blog_header_script');

function lime_blog_register_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'lime-blog'),
            'footer-menu' => __('Footer Menu', 'lime-blog')
        )
    );
}
add_action('init', 'lime_blog_register_menus');

function lime_blog_register_sidebar()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'lime-blog'),
        'id' => 'my-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'lime_blog_register_sidebar');

function lime_blog_register_landigpage_widget_area()
{
    register_sidebar(array(
        'name' => __('Landingpage Widget Area', 'lime-blog'),
        'id' => 'landingpage-widget-area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'lime_blog_register_landigpage_widget_area');

// Custom menu structure
class lime_blog_menu_walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        if (empty($item->title)) return;

        $output .= "<li class='" .  implode(" ", (array)$item->classes) . "'>";
        $output .= "<div class='lime_blog_menuitem_container'>";
        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= $item->title;
        $output .= '</a>';

        if ($args->walker->has_children) {
            $output .= '<i tabindex="0" class="lime_blog_submenu_toggle fa fa-caret-down"></i>';
        }
        $output .= "</div>";
    }
}

// Custom Settings
require_once get_template_directory() . '/customizer-options/colors-options.php';
require_once get_template_directory() . '/customizer-options/header-options.php';
require_once get_template_directory() . '/customizer-options/posts-options.php';
require_once get_template_directory() . '/customizer-options/feed-options.php';
require_once get_template_directory() . '/customizer-options/fonts-options.php';
require_once get_template_directory() . '/customizer-options/author-page-options.php';
require_once get_template_directory() . '/customizer-options/pages-options.php';
require_once get_template_directory() . '/customizer-options/searchresults-options.php';
require_once get_template_directory() . '/customizer-options/layout-options.php';
require_once get_template_directory() . '/customizer-options/post-list-layouts/cards-options.php';
require_once get_template_directory() . '/customizer-options/post-list-layouts/frameless-post-list.php';
require_once get_template_directory() . '/customizer-options/tag-list-options.php';
require_once get_template_directory() . '/customizer-options/category-list-options.php';
require_once get_template_directory() . '/customizer-options/date-list-options.php';

// Sanitize function to check checkbox value (true/false)
function lime_blog_sanitize_checkbox($input)
{
    return (isset($input) && true === $input) ? true : false;
}

$searchresults_styles = array(
    'search_engine' => 'search engine',
    'cards' => 'cards',
    'frameless' => 'frameless',
    'social' => 'social',
    'material2' => 'material2',
);