<?php get_header(); ?>
<main role="main">
    <section class="clean_space_content_spacer">
        <div class="clean_space_searchresults" id="clean_space_main_content">
            <?php

            if (have_posts()) {
                $query = get_search_query();
                echo '<h1 class="clean_space_search_headline">' . sprintf(esc_html__('Suchergebnisse für "%s"', 'clean-space'), esc_html($query)) . '</h1>';

                while (have_posts()) {
                    the_post(); ?>

                    <div class="clean_space_searchresult">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="clean_space_searchresult_image_a">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </a>
                        <?php endif; ?>
                        <div class="clean_space_searchresult_content">
                            <a href="<?php the_permalink(); ?>">
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <span><?php the_date(); ?></span>
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
            <?php
                }

                // Pagination only if needed
                if ($wp_query->max_num_pages > 1) {
                    echo '<div class="clean_space_pagination clean_space_shadow">';
                    echo '<div class="clean_space_pagination_content">';

                    echo '<div class="clean_space_pagination_controls">';
                    previous_posts_link(__('« Previous', 'clean-space'));
                    echo '</div>';

                    echo '<div class="clean_space_pagination_pages">';
                    echo paginate_links(array(
                        'total' => $wp_query->max_num_pages,
                        'current' => $paged,
                        'prev_next' => false,
                    ));
                    echo '</div>';

                    echo '<div class="clean_space_pagination_controls">';
                    next_posts_link(__('Next »', 'clean-space'), $wp_query->max_num_pages);
                    echo '</div>';

                    echo '</div>';
                    echo '</div>';
                }

                wp_reset_postdata();
            } else {
                echo '<h1>' . __('No posts found.', 'clean-space') . '</h1>';
            }
            ?>
        </div>
    </section>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>