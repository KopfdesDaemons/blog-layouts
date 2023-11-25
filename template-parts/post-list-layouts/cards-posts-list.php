<?php
function blog_layouts_display_cards_posts_list($show_sticky)
{
    ob_start(); // Start output buffering
?>
    <li class="blog_layouts_post_card blog_layouts_shadow <?php if($show_sticky && is_sticky()) echo 'blog_layouts_sticky_post' ?>">
        <div class="blog_layouts_post_card_row_1">
            <?php if (has_post_thumbnail() && get_theme_mod('feed_post_card_image', true)) { ?>
                <a class="blog_layouts_post_card_image_container" href="<?php the_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </a>
            <?php } ?>
            <div class="blog_layouts_post_card_content_div">
                <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                </a>
                <span class="blog_layouts_post_card_image_date"><?php the_date(); ?></span>
                <?php the_excerpt(); ?>
                <div class="blog_layouts_post_card_buttom_row">
                    <div class="blog_layouts_post_card_link_div">
                        <?php if (get_theme_mod('feed_post_card_comments', true)) { ?>

                            <a href="<?php comments_link(); ?>" class="blog_layouts_post_card_comments_count">
                                <?php
                                echo get_comments_number() . ' ' . esc_html__('Comments', 'blog-layouts')
                                ?>
                            </a>
                        <?php } ?>

                        <?php if (get_theme_mod('feed_post_card_read_more', true)) {
                            echo '<a class="blog_layouts_post_card_read_more" href="' . esc_url(get_permalink()) . '">' . esc_html__('read more', 'blog-layouts') . '</a>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog_layouts_post_card_footer_row">
            <i class="blog_layouts_post_card_sticky_pin fa-solid fa-thumbtack"></i>
            <div class="blog_layouts_post_card_tags_div">
                <?php
                if (get_theme_mod('feed_post_card_tags', true)) {
                    $tags = get_the_tags();
                    if ($tags) {
                        echo '<ul>';
                        foreach ($tags as $tag) {
                            $tag_link = esc_url(get_tag_link($tag->term_id));
                            echo '<li class="blog_layouts_tag"><a href="' . $tag_link . '">' . $tag->name . '</a></li>';
                        }
                        echo '</ul>';
                    }
                }
                ?>
            </div>
        </div>
    </li>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
