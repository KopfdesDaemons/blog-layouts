<?php
function blog_layouts_display_material2_header()
{
    ob_start(); // Start output buffering
?>
    <div class="blog_layouts_material_header_content">
        <button id="blog_layouts_mobile_menu_toggle_button">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="blog_layouts_material_header_sidemenu" id="blog_layouts_header_mobile_menu">
            <button class="blog_layouts_material_header_sidemenu_close_button" id="blog_layouts_mobile_menu_close_button">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <?php
            if (has_nav_menu('header-menu')) {
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'menu_class' => 'blog_layouts_header_menu',
                    'container' => false,
                ));
            } else {
                echo '<div class="blog_layouts_header_menu">' . esc_html__('Select a menu in the customizer', 'blog-layouts') . '</div>';
            }
            ?>
        </div>
        <a class="blog_layouts_material_header_home_link" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
        <?php
        if (has_nav_menu('header-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'menu_class' => 'blog_layouts_header_menu_desktop',
                'container' => false,
                'walker' => new blog_layouts_menu_walker(),
            ));
        } else {
            echo '<div class="blog_layouts_header_menu">' . esc_html__('Select a menu in the customizer', 'blog-layouts') . '</div>';
        }
        ?>
        <div class="blog_layouts_material_header_search_div">
            <button id="blog_layouts_header_search_icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <?php get_search_form(array('button_text' => 's')); ?>
        </div>
    </div>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
