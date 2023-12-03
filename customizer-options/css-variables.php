<?php
// Function to convert a hex color code to HSL
function blog_layouts_hex2hsl($hex)
{
    // Extract RGB values from the hex color code
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

    // Convert RGB to HSL
    $r /= 255.0;
    $g /= 255.0;
    $b /= 255.0;

    $max = max($r, $g, $b);
    $min = min($r, $g, $b);

    $h = 0;
    $s = 0;
    $l = ($max + $min) / 2;

    if ($max != $min) {
        $d = $max - $min;
        $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);

        switch ($max) {
            case $r:
                $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
                break;
            case $g:
                $h = ($b - $r) / $d + 2;
                break;
            case $b:
                $h = ($r - $g) / $d + 4;
                break;
        }

        $h /= 6;
    }

    return array(round($h * 360), round($s * 100), round($l * 100));
}

// Get the primary color from the Customizer
$blog_layouts_primary_color = esc_attr(get_theme_mod('primary_color', '#1e73be'));
// Convert the primary color to HSL
list($blog_layouts_primary_hue, $blog_layouts_saturation, $lightness) = blog_layouts_hex2hsl($blog_layouts_primary_color);
$blog_layouts_lightness = 50;

// Define other colors based on the primary color
$blog_layouts_primary_variant_darker = "hsl($blog_layouts_primary_hue, " . (max(0, $blog_layouts_saturation - 20)) . "%, " . (max(0, $blog_layouts_lightness - 20)) . "%)";
$blog_layouts_primary_variant_much_darker = "hsl($blog_layouts_primary_hue, " . (max(0, $blog_layouts_saturation - 35)) . "%, " . (max(0, $blog_layouts_lightness - 35)) . "%)";
$blog_layouts_primary_variant_brighter = "hsl($blog_layouts_primary_hue, " . (min(100, $blog_layouts_saturation + 20)) . "%, " . (min(100, $blog_layouts_lightness + 20)) . "%)";
$blog_layouts_primary_variant_much_brighter = "hsl($blog_layouts_primary_hue, " . (min(100, $blog_layouts_saturation + 25)) . "%, " . (min(100, $blog_layouts_lightness + 25)) . "%)";

$blog_layouts_search_row = (get_theme_mod('searchbar', true) || get_theme_mod('logo', true));
$blog_layouts_header_menu = get_theme_mod('header_menu', true);

$blog_layouts_hero_background = get_theme_mod('hero_background', true);
?>

<style>
    :root {
        --blog_layouts_background_color: <?php echo esc_attr(get_theme_mod('body_background_color', '#2d2d31')); ?>;

        /* Color Settings */
        --blog_layouts_primary_color: <?php echo $blog_layouts_primary_color; ?>;
        --blog_layouts_primary_variant_darker: <?php echo $blog_layouts_primary_variant_darker; ?>;
        --blog_layouts_primary_variant_much_darker: <?php echo $blog_layouts_primary_variant_much_darker; ?>;
        --blog_layouts_primary_variant_brighter: <?php echo $blog_layouts_primary_variant_brighter; ?>;
        --blog_layouts_primary_variant_much_brighter: <?php echo $blog_layouts_primary_variant_much_brighter; ?>;

        --blog_layouts_tag_color: <?php echo esc_attr(get_theme_mod('tags_color', '#303030')); ?>;
        --blog_layouts_font_color: <?php echo esc_attr(get_theme_mod('font_color', '#eeeeee')); ?>;
        --blog_layouts_body_font: <?php echo esc_attr(get_theme_mod('body_font', 'Fragment Mono')); ?>;

        /* Header Settings */
        --blog_layouts_header_menu_font_size: <?php echo esc_attr(get_theme_mod('header_menu_font_size_setting', '14')) . 'px'; ?>;
        
        /* Post Settings */
        --blog_layouts_background_color_posts: <?php echo esc_attr(get_theme_mod('background_color_posts', '')); ?>;
        --blog_layouts_max_posts_width: <?php echo esc_attr(get_theme_mod('maximum_width_of_posts', '70')) . 'em'; ?>;
        --blog_layouts_max_hero_width: <?php echo esc_attr(get_theme_mod('maximum_hero_width', '70')) . 'em'; ?>;
        --blog_layouts_gradient: linear-gradient(90deg, var(--blog_layouts_primary_variant_darker) 0%, var(--blog_layouts_primary_color) 75%, var(--blog_layouts_primary_variant_darker) 100%);
        --blog_layouts_hero_background: <?php echo $blog_layouts_hero_background ? 'var(--blog_layouts_gradient)' : 'none'; ?>;

        /* Pages Settings */
        --blog_layouts_max_page_width: <?php echo esc_attr(get_theme_mod('maximum_width_of_pages', '70')) . 'em'; ?>;
        --blog_layouts_background_color_pages: <?php echo esc_attr(get_theme_mod('background_color_pages', '')); ?>;

        /* Feed Settings */
        --blog_layouts_feed_landingpage_minimal_height: <?php echo esc_attr(get_theme_mod('minimal_height_of_the_landingpage', '60')) . 'vh'; ?>;

        /* Post List Cards */
        --blog_layouts_feed_post_card_line_height: <?php echo esc_attr(get_theme_mod('feed_post_card_line_height', '20')) . 'px'; ?>;
        --blog_layouts_feed_post_card_border_radius: <?php echo esc_attr(get_theme_mod('feed_post_card_border_radius', '12')) . 'px'; ?>;
        --blog_layouts_feed_post_card_padding: <?php echo esc_attr(get_theme_mod('feed_post_card_padding', '1')) . 'em'; ?>;
        --blog_layouts_feed_post_card_border_radius_image: <?php echo esc_attr(get_theme_mod('feed_post_card_border_radius_image', '6')) . 'px'; ?>;
        --blog_layouts_feed_post_card_spacing: <?php echo esc_attr(get_theme_mod('feed_post_card_spacing', '3')) . 'em'; ?>;
        --blog_layouts_tags_border_radius: <?php echo esc_attr(get_theme_mod('tags_border_radius', '4')) . 'px'; ?>;
        --blog_layouts_feed_post_card_background_color: <?php echo esc_attr(get_theme_mod('feed_post_card_color', '#000000')); ?>;

        /* Post List Frameless */
        --blog_layouts_frameless_post_list_line_height: <?php echo esc_attr(get_theme_mod('frameless_post_list_line_height', '20')) . 'px'; ?>;
        --blog_layouts_frameless_post_list_padding: <?php echo esc_attr(get_theme_mod('frameless_post_list_padding', '1')) . 'em'; ?>;
        --blog_layouts_frameless_post_list_border_radius_image: <?php echo esc_attr(get_theme_mod('frameless_post_list_border_radius_image', '6')) . 'px'; ?>;
        --blog_layouts_frameless_post_list_spacing: <?php echo esc_attr(get_theme_mod('frameless_post_list_spacing', '3')) . 'em'; ?>;
        --blog_layouts_frameless_post_list_tags_border_radius: <?php echo esc_attr(get_theme_mod('frameless_post_list_tags_border_radius', '4')) . 'px'; ?>;
        --blog_layouts_frameless_post_list_color: <?php echo esc_attr(get_theme_mod('frameless_post_list_color', '')); ?>;

        /* Material2 List Frameless */
        --blog_layouts_material2_post_list_line_height: <?php echo esc_attr(get_theme_mod('material2_post_list_line_height', '20')) . 'px'; ?>;
        --blog_layouts_material2_post_list_spacing: <?php echo esc_attr(get_theme_mod('material2_post_list_spacing', '3')) . 'em'; ?>;
        --blog_layouts_material2_post_list_color: <?php echo esc_attr(get_theme_mod('material2_post_list_color', '#212121')); ?>;

        /* Material3 List Frameless */
        --blog_layouts_material3_post_list_line_height: <?php echo esc_attr(get_theme_mod('material3_post_list_line_height', '20')) . 'px'; ?>;
        --blog_layouts_material3_post_list_spacing: <?php echo esc_attr(get_theme_mod('material3_post_list_spacing', '3')) . 'em'; ?>;
        --blog_layouts_material3_post_list_color: <?php echo esc_attr(get_theme_mod('material3_post_list_color', '#212121')); ?>;
    }
</style>