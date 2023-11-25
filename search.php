<?php get_header(); ?>
<main role="main" <?php if (get_theme_mod('searchresults_sidebar', true)) echo 'class="blog_layouts_has_sidebar"' ?>>
    <section class="blog_layouts_content_spacer">
        <div class="blog_layouts_search_container" id="blog_layouts_main_content">
            <?php
            $search_query = get_search_query();

            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => -1,
                's'              => $search_query,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                echo '<h1 class="blog_layouts_search_headline">' . sprintf(esc_html__('Search results for "%s"', 'blog-layouts'), esc_html($search_query)) . '</h1>';

                $searchresults_style = get_theme_mod('searchresults_style', 'search-engine');
                require_once get_template_directory() . '/template-parts/layout-manager.php';
                echo blog_layouts_display_posts_list($query, $searchresults_style);

                
                // Pagination only if needed
                if ($wp_query->max_num_pages > 1) {
                    ?>
                    <div class="blog_layouts_pagination blog_layouts_shadow">
                        <div class="blog_layouts_pagination_content">
                            <div class="blog_layouts_pagination_controls">
                                <?php previous_posts_link(__('« Previous', 'blog-layouts')); ?>
                            </div>
                            <div class="blog_layouts_pagination_pages">
                                <?php
                                echo paginate_links(array(
                                    'total' => $wp_query->max_num_pages,
                                    'current' => $paged,
                                    'prev_next' => false,
                                ));
                                ?>
                            </div>
                            <div class="blog_layouts_pagination_controls">
                                <?php next_posts_link(__('Next »', 'blog-layouts'), $wp_query->max_num_pages); ?>
                            </div>
                        </div>
                    </div>
            <?php
                }

                wp_reset_postdata();
            } else {
                echo '<h1>' . __('No posts found.', 'blog-layouts') . '</h1>';
            }
            ?>
        </div>
    </section>
</main>
<?php
if(get_theme_mod('searchresults_sidebar', true)) {
    echo '<aside id="blog_layouts_sidebar" class="' . 'blog_layouts_sidebar_layout_' . get_theme_mod('searchresults_sidebar_layout', 'social') . '">';
    get_sidebar();
    echo '</aside>';
}
?>
<?php get_footer(); ?>