<?php get_header(); ?>
<main role="main" <?php if (get_theme_mod('searchresults_sidebar', true)) echo 'class="lime_blog_has_sidebar"' ?>>
    <section class="lime_blog_content_spacer">
        <div class="lime_blog_search_container" id="lime_blog_main_content">
            <?php
            $search_query = get_search_query();

            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => -1,
                's'              => $search_query,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                echo '<h1 class="lime_blog_search_headline">' . sprintf(esc_html__('Search results for "%s"', 'lime-blog'), esc_html($search_query)) . '</h1>';

                $searchresults_style = get_theme_mod('searchresults_style', 'search-engine');
                require_once get_template_directory() . '/template-parts/layout-manager.php';
                echo lime_blog_display_posts_list($query, $searchresults_style);

                
                // Pagination only if needed
                if ($wp_query->max_num_pages > 1) {
                    ?>
                    <div class="lime_blog_pagination lime_blog_shadow">
                        <div class="lime_blog_pagination_content">
                            <div class="lime_blog_pagination_controls">
                                <?php previous_posts_link(__('« Previous', 'lime-blog')); ?>
                            </div>
                            <div class="lime_blog_pagination_pages">
                                <?php
                                echo paginate_links(array(
                                    'total' => $wp_query->max_num_pages,
                                    'current' => $paged,
                                    'prev_next' => false,
                                ));
                                ?>
                            </div>
                            <div class="lime_blog_pagination_controls">
                                <?php next_posts_link(__('Next »', 'lime-blog'), $wp_query->max_num_pages); ?>
                            </div>
                        </div>
                    </div>
            <?php
                }

                wp_reset_postdata();
            } else {
                echo '<h1>' . __('No posts found.', 'lime-blog') . '</h1>';
            }
            ?>
        </div>
    </section>
</main>
<?php
if(get_theme_mod('searchresults_sidebar', true)) {
    echo '<aside id="lime_blog_sidebar" class="' . 'lime_blog_sidebar_layout_' . get_theme_mod('searchresults_sidebar_layout', 'social') . '">';
    get_sidebar();
    echo '</aside>';
}
?>
<?php get_footer(); ?>