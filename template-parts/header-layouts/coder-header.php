<?php
function blog_layouts_display_coder_header()
{
    ob_start(); // Start output buffering
?>
    <div class="blog_layouts_coder_header_content">
        <div class="blog_layouts_coder_mobile_toggle_button_container">
            <button id="blog_layouts_mobile_menu_toggle_button">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div id="blog_layouts_header_mobile_menu">
                <ul class="blog_layouts_coder_header_mobile_icons">
                    <li>
                        <a href="<?php echo esc_url(get_theme_mod('coder_icon_1_link', '')) ?>">
                            <i class="<?php echo esc_attr(get_theme_mod('coder_icon_1', 'fa-solid fa-inbox')) ?>"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(get_theme_mod('coder_icon_2_link', '')) ?>">
                            <i class="<?php echo esc_attr(get_theme_mod('coder_icon_2', 'fa-solid fa-trophy')) ?>"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(get_theme_mod('coder_icon_3_link', '')) ?>">
                            <i class="<?php echo esc_attr(get_theme_mod('coder_icon_3', 'fa-solid fa-circle-question')) ?>"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(get_theme_mod('coder_icon_4_link', '')) ?>">
                            <i class="<?php echo esc_attr(get_theme_mod('coder_icon_4', 'fa-regular fa-message')) ?>"></i>
                        </a>
                    </li>
                </ul>
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
        </div>
        <a href="/" class="blog_layouts_coder_website_name">
            <?php echo get_bloginfo('name'); ?>
        </a>
        <div class="blog_layouts_coder_header_search_div">
            <button id="blog_layouts_header_search_icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <?php get_search_form(array('button_text' => 's')); ?>
        </div>
        <ul class="blog_layouts_coder_header_icons">
            <li>
                <a href="<?php echo esc_url(get_theme_mod('coder_icon_1_link', 'x')) ?>">
                    <i class="<?php echo esc_attr(get_theme_mod('coder_icon_1', 'fa-solid fa-inbox')) ?>"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url(get_theme_mod('coder_icon_2_link', '')) ?>">
                    <i class="<?php echo esc_attr(get_theme_mod('coder_icon_2', 'fa-solid fa-trophy')) ?>"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url(get_theme_mod('coder_icon_3_link', '')) ?>">
                    <i class="<?php echo esc_attr(get_theme_mod('coder_icon_3', 'fa-solid fa-circle-question')) ?>"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url(get_theme_mod('coder_icon_4_link', '')) ?>">
                    <i class="<?php echo esc_attr(get_theme_mod('coder_icon_4', 'fa-regular fa-message')) ?>"></i>
                </a>
            </li>
        </ul>
    </div>
    <div id="blog_layouts_expandable_search_field">
        <?php get_search_form(array('button_text' => 's')); ?>
    </div>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
