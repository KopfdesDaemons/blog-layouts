<?php
function blog_layouts_display_material3_header()
{
    ob_start(); // Start output buffering
    require_once get_template_directory() . '/template-parts/header-layouts/material2-header.php';
    echo blog_layouts_display_material2_header();
    return ob_get_clean(); // Return the buffered output as a string
}
