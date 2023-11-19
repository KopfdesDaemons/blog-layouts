<?php get_header(); ?>
<?php if (get_theme_mod('landingpage_section')) { ?>
    <section class="lime_blog_landing_page_section">
        <div class="lime_blog_content_spacer">
            <?php
            if (is_active_sidebar('landingpage-widget-area')) {
                echo '<div id="lime_blog_landingpage_widget_area">';
                dynamic_sidebar('landingpage-widget-area');
                echo '</div>';
            } else {
                echo '<div>' . esc_html__('Fill the landing page in the customizer', 'lime-blog') .'</div>';
            }
            ?>

        </div>
    </section>
<?php } ?>
<main role="main" <?php if (get_theme_mod('feed_sidebar', true)) echo 'class="lime_blog_has_sidebar"' ?>>
    <section class="lime_blog_content_spacer">
        <h2 class="lime_blog_h2_latest_posts"><?php echo esc_html(__('Latest Posts', 'lime-blog')) ?></h2>
        <ul class="lime_blog_feed" id="lime_blog_main_content">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts_per_page = get_option('posts_per_page');
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_classes = array('lime_blog_post_card lime_blog_shadow');
                    if (is_sticky()) {
                        $post_classes[] = 'lime_blog_sticky_post';
                    }

                    // Show Cards
                    require_once get_template_directory() . '/template-parts/post-card.php';
                    echo lime_blog_display_post_card($post_classes);
                }
            } else {
                echo esc_html__('No posts found.', 'lime-blog');
            }
            ?>
        </ul>
        <?php
        // Pagination only if needed
        if ($query->max_num_pages > 1) {
            echo '<div class="lime_blog_pagination">';
            echo '<div class="lime_blog_pagination_content">';

            echo '<div class="lime_blog_pagination_controls">';
            previous_posts_link(__('« Previous', 'lime-blog'));
            echo '</div>';

            echo '<div class="lime_blog_pagination_pages">';
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => $paged,
                'prev_next' => false,
            ));
            echo '</div>';

            echo '<div class="lime_blog_pagination_controls">';
            next_posts_link(__('Next »', 'lime-blog'), $query->max_num_pages);
            echo '</div>';

            echo '</div>';
            echo '</div>';
        }

        wp_reset_postdata();
        ?>
    </section>
</main>
<?php
if (get_theme_mod('feed_sidebar', true)) {
    get_sidebar();
    if (!is_active_sidebar('my-sidebar')) {
        echo '<aside id="lime_blog_sidebar" class="lime_blog_empty_sidebar"><div class="widget"><p>' . esc_html__('Fill the sidebar in the customizer', 'lime-blog') . '</p></div></aside>';
    }
}
?>

<?php get_footer(); ?>