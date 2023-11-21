<?php
function lime_blog_display_material2_post_list($show_sticky)
{
    ob_start(); // Start output buffering
?>
    <li class="lime_blog_material2_post_list_item <?php if ($show_sticky && is_sticky()) echo 'lime_blog_sticky_post' ?>">
        <?php if (has_post_thumbnail()) { ?>
            <a class="lime_blog_material2_post_list_item_image_container" href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
        <?php } ?>
        <a href="<?php the_permalink(); ?>" class="lime_blog_material2_post_list_item_headline_row">
            <h2><?php echo the_title() ?></h2>
        </a>
        <div class="lime_blog_material2_post_list_item_excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="lime_blog_materiale_post_list_item_icon_row">
            <a href="<?php comments_link(); ?>">
                    <?php
                    echo  esc_html__('Comments', 'lime-blog')
                    ?>
            </a>
            <a href="<?php the_permalink(); ?>">
                <?php echo esc_html__('read more', 'lime-blog') ?>
            </a>
        </div>
    </li>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}