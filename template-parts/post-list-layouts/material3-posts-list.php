<?php
function lime_blog_display_material3_post_list($show_sticky)
{
    $categories = get_the_category();
    $tags = get_the_tags();
    ob_start(); // Start output buffering
?>
    <li class="lime_blog_material3_post_list_item <?php if ($show_sticky && is_sticky()) echo 'lime_blog_sticky_post' ?>">
        <?php if (get_theme_mod('material3_post_list_image', true) && has_post_thumbnail()) { ?>
            <a class="lime_blog_material3_post_list_item_image_container" href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
        <?php } ?>
        <a href="<?php the_permalink(); ?>" class="lime_blog_material3_post_list_item_headline_row">
            <h2><?php echo the_title() ?></h2>
        </a>
        <?php if (get_theme_mod('material3_post_list_date', true)) { ?>
            <div class="lime_blog_material3_post_list_item_date">
                <span><?php the_date() ?></span>
            </div>
        <?php } ?>
        <?php
        if (get_theme_mod('material3_post_list_categorys', true) && !empty($categories)) {
            echo '<ul class="lime_blog_material3_post_list_item_categorys">';
            foreach ($categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            echo '</ul>';
        } ?>
        <div class="lime_blog_material3_post_list_item_excerpt">
            <?php the_excerpt(); ?>
        </div>
        <?php
        if (get_theme_mod('material3_post_list_tags', true) && !empty($tags)) {
            echo '<ul class="lime_blog_material3_post_list_item_tags">';
            foreach ($categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            echo '</ul>';
        } ?>
        <div class="lime_blog_materiale_post_list_item_icon_row">
            <?php if(get_theme_mod('material3_post_list_comments')) { ?>
            <a href="<?php comments_link(); ?>" class="lime_blog_materiale_post_list_item_comments">
                    <?php
                    echo  esc_html__('Comments', 'lime-blog')
                    ?>
            </a>
            <?php } ?>
            <?php if(get_theme_mod('material3_post_list_read_more')) { ?>
            <a href="<?php the_permalink(); ?>">
                <?php echo esc_html__('read more', 'lime-blog') ?>
            </a>
            <?php } ?>
        </div>
    </li>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}