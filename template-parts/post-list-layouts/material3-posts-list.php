<?php
function blog_layouts_display_material3_posts_list($show_sticky)
{
    $blog_layouts_categories = get_the_category();
    $blog_layouts_tags = get_the_tags();
    ob_start(); // Start output buffering
?>
    <li class="blog_layouts_material3_post_list_item <?php if ($show_sticky && is_sticky()) echo 'blog_layouts_sticky_post' ?>">
        <?php if (get_theme_mod('material3_post_list_image', true) && has_post_thumbnail()) { ?>
            <a class="blog_layouts_material3_post_list_item_image_container" href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
        <?php } ?>
        <a href="<?php the_permalink(); ?>" class="blog_layouts_material3_post_list_item_headline_row">
            <h2><?php echo the_title() ?></h2>
        </a>
        <?php if (get_theme_mod('material3_post_list_date', true)) { ?>
            <div class="blog_layouts_material3_post_list_item_date">
                <span><?php the_date() ?></span>
            </div>
        <?php } ?>
        <?php
        if (get_theme_mod('material3_post_list_categories', true) && !empty($blog_layouts_categories)) {
            echo '<ul class="blog_layouts_material3_post_list_item_categories">';
            foreach ($blog_layouts_categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            echo '</ul>';
        } ?>
        <div class="blog_layouts_material3_post_list_item_excerpt">
            <?php the_excerpt(); ?>
        </div>
        <?php
        if (get_theme_mod('material3_post_list_tags', true) && !empty($blog_layouts_tags)) {
            echo '<ul class="blog_layouts_material3_post_list_item_tags">';
            foreach ($blog_layouts_categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            echo '</ul>';
        } ?>
        <div class="blog_layouts_materiale_post_list_item_icon_row">
            <i class="blog_layouts_material3_post_list_item_sticky_pin fa-solid fa-thumbtack"></i>
            <?php if (get_theme_mod('material3_post_list_comments')) { ?>
                <a href="<?php comments_link(); ?>" class="blog_layouts_materiale_post_list_item_comments">
                    <?php
                    echo  esc_html__('Comments', 'blog-layouts')
                    ?>
                </a>
            <?php } ?>
            <?php if (get_theme_mod('material3_post_list_read_more')) { ?>
                <a href="<?php the_permalink(); ?>">
                    <?php echo esc_html__('read more', 'blog-layouts') ?>
                </a>
            <?php } ?>
        </div>
    </li>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
