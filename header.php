<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php if (is_singular() && pings_open()) { ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php }

    wp_head(); ?>

    <?php require_once get_template_directory() . '/customizer-options/css-variables.php'; ?>
</head>

<body <?php
        body_class();?>>
        <?php
        wp_body_open();
        require_once get_template_directory() . '/template-parts/layout-manager.php';
        echo blog_layouts_display_header(get_theme_mod('header_layout', 'gradient'));
        ?>