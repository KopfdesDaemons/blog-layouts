<?php
// Function to convert a hex color code to HSL
function clean_space_hex2hsl($hex)
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
$clean_space_primary_color = esc_attr(get_theme_mod('primary_color', '#2a30d4'));
// Convert the primary color to HSL
list($primary_hue, $saturation, $lightness) = clean_space_hex2hsl($clean_space_primary_color);
$lightness = 50;

// Define other colors based on the primary color
$clean_space_primary_variant_darker = "hsl($primary_hue, " . (max(0, $saturation - 20)) . "%, " . (max(0, $lightness - 20)) . "%)";
$clean_space_primary_variant_much_darker = "hsl($primary_hue, " . (max(0, $saturation - 35)) . "%, " . (max(0, $lightness - 35)) . "%)";
$clean_space_primary_variant_brighter = "hsl($primary_hue, " . (min(100, $saturation + 20)) . "%, " . (min(100, $lightness + 20)) . "%)";
$clean_space_primary_variant_much_brighter = "hsl($primary_hue, " . (min(100, $saturation + 25)) . "%, " . (min(100, $lightness + 25)) . "%)";
$clean_space_background_inputfield = "hsl($primary_hue, " . (min(100, $saturation + 45)) . "%, " . (min(100, $lightness + 45)) . "%)";
$clean_space_background_variant = "hsl($primary_hue, " . (min(100, $saturation + 45)) . "%, " . (min(100, $lightness + 45)) . "%)";
$clean_space_background_variant_darker = "hsl($primary_hue, " . (min(100, $saturation + 35)) . "%, " . (min(100, $lightness + 35)) . "%)";
?>

<style>
    :root {
        --clean_space_background_color: <?php echo esc_attr(get_theme_mod('body_background_color', '#2d2d31')) ?>;

        --clean_space_primary_color: <?php echo $clean_space_primary_color ?>;
        --clean_space_primary_variant_darker: <?php echo $clean_space_primary_variant_darker ?>;
        --clean_space_primary_variant_much_darker: <?php echo $clean_space_primary_variant_much_darker ?>;
        --clean_space_primary_variant_brighter: <?php echo $clean_space_primary_variant_brighter ?>;
        --clean_space_primary_variant_much_brighter: <?php echo $clean_space_primary_variant_much_brighter ?>;
        --clean_space_element_background_inputfeld: <?php echo $clean_space_background_inputfield ?>;
        --clean_space_element_background_variant: <?php echo $clean_space_background_variant ?>;
        --clean_space_element_background_variant_darker: <?php echo $clean_space_background_variant_darker ?>;

        --clean_space_background_color_sidebar_widget_blocks: <?php echo esc_attr(get_theme_mod('body_background_color_sidebar_widget_blocks', '#303030')) ?>;
        --clean_space_tag_color: <?php echo esc_attr(get_theme_mod('tags_color', '#303030')) ?>;
        --clean_space_font_color: <?php echo esc_attr(get_theme_mod('font_color', '#eeeeee')) ?>;
        --clean_space_body_font: <?php echo esc_attr(get_theme_mod('body_font', 'Fragment Mono')) ?>;
        --clean_space_comments_background_color: <?php echo esc_attr(get_theme_mod('comments_background_color', '#1d2027')) ?>;

        --clean_space_header_menu_font_size: <?php echo esc_attr(get_theme_mod('header_menu_font_size_setting', '14')) . 'px;'
                                                ?>;
        --clean_space_margin_to_header: 10em;

        /* Post Settings */
        --clean_space_background_color_posts: <?php echo esc_attr(get_theme_mod('background_color_posts', ''))
                                                ?>;
        --clean_space_max_posts_width: <?php echo esc_attr(get_theme_mod('maximum_width_of_posts', '70')) . 'em'; ?>;
        --clean_space_max_hero_width: <?php echo esc_attr(get_theme_mod('maximum_hero_width', '70')) . 'em'; ?>;
        --clean_space_gradient: linear-gradient(90deg, var(--clean_space_primary_variant_darker) 0%, var(--clean_space_primary_color) 75%, var(--clean_space_primary_variant_darker) 100%);
        --clean_space_hero_background: <?php echo get_theme_mod('hero_background', true) ? 'var(--clean_space_gradient)' : 'none'; ?>;


        /* Feed Setting */
        --clean_space_feed_post_card_line_height: <?php echo esc_attr(get_theme_mod('feed_post_card_line_height', '20')) . 'px;';
                                                    ?>;
        --clean_space_feed_post_card_border_radius: <?php echo esc_attr(get_theme_mod('feed_post_card_border_radius', '12')) . 'px;';
                                                    ?>;
        --clean_space_feed_post_card_padding: <?php echo esc_attr(get_theme_mod('feed_post_card_padding', '1')) . 'em;';
                                                ?>;
        --clean_space_feed_post_card_border_radius_image: <?php echo esc_attr(get_theme_mod('feed_post_card_border_radius_image', '6')) . 'px;';
                                                            ?>;
        --clean_space_feed_post_card_spacing: <?php echo esc_attr(get_theme_mod('feed_post_card_spacing', '3')) . 'em;';
                                                ?>;
        --clean_space_tags_border_radius: <?php echo esc_attr(get_theme_mod('tags_border_radius', '4')) . 'px;';
                                            ?>;
        --clean_space_max_feed_width: <?php echo esc_attr(get_theme_mod('maximum_width_of_the_feed', '70')) . 'em';
                                        ?>;
        --clean_space_feed_post_card_background_color: <?php echo esc_attr(get_theme_mod('feed_post_card_color', '#000000')) ?>;
    }
</style>