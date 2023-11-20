<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Open Graph Markup -->
    <meta property="og:title" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta property="og:description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
    <meta property="og:image" content="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <meta property="og:type" content="article">
    <meta property="og:locale" content="<?php echo esc_attr(get_locale()); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">

    <!-- Other Meta Tags for SEO and Other Purposes -->
    <meta name="description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
    <!-- <meta name="author" content="<?php the_author_meta('user_nicename', $post->post_author); ?>"> -->
    <?php
    $tags = get_the_tags();
    if ($tags) {
        $tag_list = array();
        foreach ($tags as $tag) {
            $tag_list[] = $tag->name;
        }
        $tag_string = implode(', ', $tag_list);
    } else {
        $tag_string = '';
    }
    ?>
    <meta name="keywords" content="<?php echo esc_attr($tag_string); ?>">
    <meta name="robots" content="index, follow">

    <?php if (is_singular() && pings_open()) { ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php }

    wp_head(); ?>

    <?php require_once get_template_directory() . '/customizer-options/css-variables.php'; ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header id="lime_blog_header">
        <a href="#lime_blog_main_content" class="lime_blog_skip_link"><?php echo esc_html__('Skip to main content', 'lime-blog') ?></a>

        <!-- Mobile -->
        <div class="lime_blog_header_mobile_content">
            <?php
            $favicon_url = get_site_icon_url();
            $home_url = esc_url(home_url('/'));

            if (get_theme_mod('logo', true) && $favicon_url) {
                echo '<a class="lime_blog_header_logo" href="' . $home_url . '"><img src="' . esc_url($favicon_url) . '" alt="Favicon" /></a>';
            }

            if (get_theme_mod('searchbar', true)) get_search_form(array('button_text' => 's'));
            ?>
        </div>
        <?php
        if (get_theme_mod('header_menu', true)) { ?>
            <button id="lime_blog_header_menu_button" onclick="lime_blog_toggle_menu()" aria-label="<?php echo esc_attr('open menu', 'lime-blog') ?>"><i class="fa-solid fa-bars"></i></button>
        <?php } ?>


        <!-- desktop -->
        <?php
        if (get_theme_mod('header_menu', true)) {
            if (has_nav_menu('header-menu')) {
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'menu_class' => 'lime_blog_header_menu',
                    'container' => false,
                    'walker' => new lime_blog_menu_walker(),
                ));
            } else {
                echo '<div class="lime_blog_header_menu">' . esc_html__('Select a menu in the customizer', 'lime-blog') . '</div>';
            }
        }
        ?>
        <div class="lime_blog_header_content">
            <?php
            $favicon_url = get_site_icon_url();
            $home_url = esc_url(home_url('/'));

            if (get_theme_mod('logo', true) && $favicon_url) {
                echo '<a class="lime_blog_header_logo" href="' . $home_url . '"><img src="' . esc_url($favicon_url) . '" alt="Favicon" /></a>';
            }

            if (get_theme_mod('searchbar', true)) get_search_form(array('button_text' => 's'));
            ?>
        </div>
    </header>