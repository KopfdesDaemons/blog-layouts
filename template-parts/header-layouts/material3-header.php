<?php
function lime_blog_display_material3_header()
{
    ob_start(); // Start output buffering
    require_once('material2-header.php');
    echo lime_blog_display_material2_header();
    return ob_get_clean(); // Return the buffered output as a string
}
