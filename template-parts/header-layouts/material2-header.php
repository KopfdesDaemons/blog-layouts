<?php
function lime_blog_display_material2_header()
{
    ob_start(); // Start output buffering
?>
    <div class="lime_blog_material_header_content">
        <button id="lime_blog_mobile_menu_toggle_button">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="lime_blog_material_header_sidemenu" id="lime_blog_header_mobile_menu">
            <button class="lime_blog_material_header_sidemenu_close_button" id="lime_blog_mobile_menu_close_button">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <?php
            if (has_nav_menu('header-menu')) {
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'menu_class' => 'lime_blog_header_menu',
                    'container' => false,
                ));
            } else {
                echo '<div class="lime_blog_header_menu">' . esc_html__('Select a menu in the customizer', 'lime-blog') . '</div>';
            }
            ?>
        </div>
        <a class="lime_blog_material_header_home_link" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
        <?php
        if (has_nav_menu('header-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'menu_class' => 'lime_blog_header_menu_desktop',
                'container' => false,
                'walker' => new lime_blog_menu_walker(),
            ));
        } else {
            echo '<div class="lime_blog_header_menu">' . esc_html__('Select a menu in the customizer', 'lime-blog') . '</div>';
        }
        ?>
        <div class="lime_blog_material_header_search_div">
            <button id="lime_blog_header_search_icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <?php get_search_form(array('button_text' => 's')); ?>
        </div>
    </div>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
