<?php
function lime_blog_display_clean_header()
{
    ob_start(); // Start output buffering
?>
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
        <button id="lime_blog_mobile_menu_toggle_button" aria-label="<?php echo esc_attr('open menu', 'lime-blog') ?>"><i class="fa-solid fa-bars"></i></button>
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

<?php
    return ob_get_clean(); // Return the buffered output as a string
}
