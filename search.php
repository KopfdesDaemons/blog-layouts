<?php get_header(); ?>
<main role="main" class="lime_blog_has_sidebar">
    <section class="lime_blog_content_spacer">
        <div class="lime_blog_searchresults" id="lime_blog_main_content">
            <?php

            if (have_posts()) {
                $query = get_search_query();
                echo '<h1 class="lime_blog_search_headline">' . sprintf(esc_html__('Search results for "%s"', 'lime-blog'), esc_html($query)) . '</h1>';

                while (have_posts()) {
                    the_post(); ?>

                    <div class="lime_blog_searchresult">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="lime_blog_searchresult_image_a">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </a>
                        <?php endif; ?>
                        <div class="lime_blog_searchresult_content">
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
                    echo '<div class="lime_blog_pagination lime_blog_shadow">';
                    echo '<div class="lime_blog_pagination_content">';

                    echo '<div class="lime_blog_pagination_controls">';
                    previous_posts_link(__('« Previous', 'lime-blog'));
                    echo '</div>';

                    echo '<div class="lime_blog_pagination_pages">';
                    echo paginate_links(array(
                        'total' => $wp_query->max_num_pages,
                        'current' => $paged,
                        'prev_next' => false,
                    ));
                    echo '</div>';

                    echo '<div class="lime_blog_pagination_controls">';
                    next_posts_link(__('Next »', 'lime-blog'), $wp_query->max_num_pages);
                    echo '</div>';

                    echo '</div>';
                    echo '</div>';
                }

                wp_reset_postdata();
            } else {
                echo '<h1>' . __('No posts found.', 'lime-blog') . '</h1>';
            }
            ?>
        </div>
    </section>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>