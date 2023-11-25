<?php
function blog_layouts_display_gradient_header()
{
    ob_start(); // Start output buffering
?>
    <!-- Mobile -->
    <div class="blog_layouts_header_mobile_content">
        <?php
        $favicon_url = get_site_icon_url();
        $home_url = esc_url(home_url('/'));

        if (get_theme_mod('logo', true) && $favicon_url) {
            echo '<a class="blog_layouts_header_logo" href="' . $home_url . '"><img src="' . esc_url($favicon_url) . '" alt="Favicon" /></a>';
        }

        if (get_theme_mod('searchbar', true)) get_search_form(array('button_text' => 's'));
        ?>
    </div>
    <?php
    if (get_theme_mod('header_menu', true)) { ?>
        <button id="blog_layouts_mobile_menu_toggle_button" aria-label="<?php echo esc_attr('open menu', 'blog-layouts') ?>"><i class="fa-solid fa-bars"></i></button>
    <?php } ?>


    <!-- desktop -->
    <?php
    if (get_theme_mod('header_menu', true)) {
        if (has_nav_menu('header-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'menu_class' => 'blog_layouts_header_menu',
                'container' => false,
                'walker' => new blog_layouts_menu_walker(),
            ));
        } else {
            echo '<div class="blog_layouts_header_menu">' . esc_html__('Select a menu in the customizer', 'blog-layouts') . '</div>';
        }
    }
    ?>
    <div class="blog_layouts_header_content">
        <?php
        $favicon_url = get_site_icon_url();
        $home_url = esc_url(home_url('/'));

        if (get_theme_mod('logo', true) && $favicon_url) {
            echo '<a class="blog_layouts_header_logo" href="' . $home_url . '"><img src="' . esc_url($favicon_url) . '" alt="Favicon" /></a>';
        }

        if (get_theme_mod('searchbar', true)) get_search_form(array('button_text' => 's'));
        ?>
    </div>

<?php
    return ob_get_clean(); // Return the buffered output as a string
}
