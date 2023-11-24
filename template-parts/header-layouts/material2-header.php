<?php
function lime_blog_display_material2_header()
{
    ob_start(); // Start output buffering
?>

    <div class="lime_blog_material2_header_content">
        <?php
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
        ?>
        <div class="lime_blog_material2_header_search_div">
            <i id="lime_blog_header_search_icon" class="fa-solid fa-magnifying-glass"></i>
            <?php get_search_form(array('button_text' => 's')); ?>
        </div>
    </div>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
