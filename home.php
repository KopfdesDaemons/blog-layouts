<?php get_header(); ?>
<section class="clean_space_landing_page_section">
    <div class="clean_space_content_spacer">
        <?php
        if (is_active_sidebar('landingpage-widget-area')) {
            echo '<div id="clean_space_landingpage_widget_area">';
            dynamic_sidebar('landingpage-widget-area');
            echo '</div>';
        }
        ?>
    </div>
</section>
<main role="main">
    <section class="clean_space_content_spacer">
        <h2 class="clean_space_h2_latest_posts"><?php echo esc_html(__('Latest Posts', 'clean-space')) ?></h2>
        <ul class="clean_space_feed" id="clean_space_main_content">
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
                    $post_classes = array('clean_space_post_card clean_space_shadow');
                    if (is_sticky()) {
                        $post_classes[] = 'clean_space_sticky_post';
                    }

                    // Show Cards
                    require_once get_template_directory() . '/template-parts/post-card.php';
                    echo clean_space_display_post_card($post_classes);
                }
            } else {
                echo esc_html__('No posts found.', 'clean-space');
            }
            ?>
        </ul>
        <?php
        // Pagination only if needed
        if ($query->max_num_pages > 1) {
            echo '<div class="clean_space_pagination">';
            echo '<div class="clean_space_pagination_content">';

            echo '<div class="clean_space_pagination_controls">';
            previous_posts_link(__('« Previous', 'clean-space'));
            echo '</div>';

            echo '<div class="clean_space_pagination_pages">';
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => $paged,
                'prev_next' => false,
            ));
            echo '</div>';

            echo '<div class="clean_space_pagination_controls">';
            next_posts_link(__('Next »', 'clean-space'), $query->max_num_pages);
            echo '</div>';

            echo '</div>';
            echo '</div>';
        }

        wp_reset_postdata();
        ?>
    </section>
</main>
<?php if (get_theme_mod('feed_sidebar', true)) get_sidebar(); ?>
<?php get_footer(); ?>