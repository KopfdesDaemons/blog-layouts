<?php
function blog_layouts_display_stackoverflow_header()
{
    ob_start(); // Start output buffering
?>
    <div class="blog_layouts_stackoverflow_header_content">
        <a href="" class="blog_layouts_stackoverflow_website_name">
            <?php echo get_bloginfo( 'name' ); ?>
        </a>
        <div class="blog_layouts_stackoverflow_header_search_div">
            <button id="blog_layouts_header_search_icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <?php get_search_form(array('button_text' => 's')); ?>
        </div>
        <ul class="blog_layouts_stackoverflow_header_icons">
            <li>                
                <a href="<?php esc_url(get_theme_mod('stackoverflow_icon_1_link'), '')?>">
                    <i class="<?php echo esc_attr(get_theme_mod('stackoverflow_icon_1', 'fa-solid fa-inbox')) ?>"></i>
                </a>
            </li>
            <li>
                <a href="<?php esc_url(get_theme_mod('stackoverflow_icon_2_link'), '')?>">
                    <i class="<?php echo esc_attr(get_theme_mod('stackoverflow_icon_2', 'fa-solid fa-trophy')) ?>"></i>
                </a>
            </li>
            <li>
                <a href="<?php esc_url(get_theme_mod('stackoverflow_icon_3_link'), '')?>">
                    <i class="<?php echo esc_attr(get_theme_mod('stackoverflow_icon_3', 'fa-solid fa-circle-question')) ?>"></i>
                </a>
            </li>
            <li>
                <a href="<?php esc_url(get_theme_mod('stackoverflow_icon_4_link'), '')?>">
                    <i class="<?php echo esc_attr(get_theme_mod('stackoverflow_icon_4', 'fa-regular fa-message')) ?>"></i>
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
