<?php
function clean_space_display_post_card($post_classes)
{
    ob_start(); // Start output buffering
?>
<li class="<?php echo implode(' ', $post_classes) ?>">
    <div class="clean_space_post_card_row_1">
        <?php if (has_post_thumbnail() && get_theme_mod('feed_post_card_image', true)) { ?>
        <a class="clean_space_post_card_image_container" href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </a>
        <?php } ?>
        <div class="clean_space_post_card_content_div">
            <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
            </a>
            <span class="clean_space_post_card_image_date"><?php the_date(); ?></span>
            <?php the_excerpt(); ?>
            <div class="clean_space_post_card_buttom_row">
                <div class="clean_space_post_card_link_div">
                    <?php if (get_theme_mod('feed_post_card_comments', true)) { ?>

                    <a href="<?php comments_link(); ?>" class="clean_space_post_card_comments_count">
                        <?php
                                echo get_comments_number() . ' ' . __('comments', 'clean-space')
                                ?>
                    </a>
                    <?php } ?>

                    <?php if (get_theme_mod('feed_post_card_read_more', true)) {
                            echo '<a class="clean_space_post_card_read_more" href="' . esc_url(get_permalink()) . '">' . __('read more', 'clean-space') . '</a>';
                        } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clean_space_post_card_tags_div">
        <?php
            if (get_theme_mod('feed_post_card_tags', true)) {
                $tags = get_the_tags();
                if ($tags) {
                    echo '<ul>';
                    foreach ($tags as $tag) {
                        $tag_link = esc_url(get_tag_link($tag->term_id));
                        echo '<li class="clean_space_tag"><a href="' . $tag_link . '">' . $tag->name . '</a></li>';
                    }
                    echo '</ul>';
                }
            }
            ?>
    </div>
</li>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}