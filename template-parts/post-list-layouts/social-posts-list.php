<?php
function blog_layouts_display_social_posts_list($show_sticky)
{
    ob_start(); // Start output buffering
    $author_id = get_the_author_meta('ID');
    $author_avatar = get_avatar($author_id, 100);
?>
    <li class="blog_layouts_social_post_list_item <?php if ($show_sticky && is_sticky()) echo 'blog_layouts_sticky_post' ?>">
        <div class="blog_layouts_social_post_list_item_row_1">
            <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="blog_layouts_social_post_list_item_author_image">
                <?php echo $author_avatar; ?>
            </a>
            <div class="blog_layouts_social_post_list_item_name_div">
                <a class="blog_layouts_social_post_list_item_name" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <?php echo get_the_author(); ?>
                    </a>
                <span class="blog_layouts_social_post_list_item_date"><?php echo get_the_date() ?></span>
            </div>
            <i class="blog_layouts_social_post_list_item_sticky_pin fa-solid fa-thumbtack"></i>
        </div>
        <div class="blog_layouts_social_post_list_item_excerpt">
            <?php the_excerpt(); ?>
        </div>
        <?php if (has_post_thumbnail()) { ?>
            <a class="blog_layouts_social_post_list_item_image_container" href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
        <?php } ?>
        <a href="<?php the_permalink(); ?>" class="blog_layouts_social_post_list_item_headline_row">
            <h2><?php echo the_title() ?></h2>
        </a>
        <div class="blog_layouts_social_post_list_item_comments_row">
            <a href="<?php comments_link(); ?>">
                <?php
                echo get_comments_number() . ' ' . esc_html__('Comments', 'blog-layouts')
                ?>
            </a>
        </div>
        <div class="blog_layouts_social_post_list_item_icon_row">
            <a href="<?php comments_link(); ?>">
                <i class="fa-regular fa-comment"></i>
                <span>
                    <?php
                    echo  esc_html__('Comments', 'blog-layouts')
                    ?>
                </span>
            </a>
            <a href="<?php the_permalink(); ?>">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span><?php echo esc_html__('read more', 'blog-layouts') ?></span>
            </a>
        </div>
    </li>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
