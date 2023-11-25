<?php
function blog_layouts_display_content_creator_posts_list($show_sticky)
{
    $categories = get_the_category();
    $tags = get_the_tags();
    $author_id = get_the_author_meta('ID');
    $author_avatar = get_avatar($author_id, 48);
    ob_start(); // Start output buffering
?>
    <li class="blog_layouts_content_creator_post_list_item <?php if ($show_sticky && is_sticky()) echo 'blog_layouts_sticky_post' ?>">
        <div class="blog_layouts_content_creator_post_list_item_headline_div">
            <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="blog_layouts_content_creator_post_list_item_author_image">
                <?php echo $author_avatar; ?>
            </a>
            <div class="blog_layouts_content_creator_post_list_item_headline_div_right">
                <div class="blog_layouts_content_creator_post_list_item_headline_and_name">
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <?php echo get_the_author(); ?>
                    </a>
                    <h2><?php the_title() ?></h2>
                </div>
                <div class="blog_layouts_content_creator_post_list_date">
                    <?php echo get_the_date('d. M Y'); ?>
                    <i class="blog_layouts_content_creator_post_list_item_sticky_pin fa-solid fa-thumbtack"></i>
                </div>
            </div>
        </div>
        <div class="blog_layouts_content_creator_post_list_item_excerpt">
            <?php the_excerpt(); ?>
        </div>
        <?php
        if (has_post_thumbnail()) {
        ?>
            <a class="blog_layouts_content_creator_post_list_item_image_container" href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
        <?php
        }
        ?>
        <div class="blog_layouts_content_creator_post_list_item_icon_row">
            <a href="<?php comments_link(); ?>" class="blog_layouts_content_creator_post_list_item_comments">
                <i class="fa-regular fa-comment"></i>
            </a>
            <a href="<?php the_permalink(); ?>">
                <?php echo esc_html__('read more', 'blog-layouts') ?>
            </a>
        </div>
        <?php
        if (!empty($tags)) {
            echo '<ul class="blog_layouts_content_creator_post_list_item_tags">';
            foreach ($tags as $tag) {
                echo '<li><a href="' . esc_url(get_category_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></li>';
            }
            echo '</ul>';
        }       ?>
    </li>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
