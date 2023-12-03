<?php get_header(); ?>
<?php if (get_theme_mod('landingpage_section', true)) { ?>
    <section class="blog_layouts_landing_page_section <?php if(get_theme_mod('landingpage_image_animation', true)) echo 'blog_layouts_landing_page_image_animation' ?>">
        <div class="blog_layouts_content_spacer">
            <?php
            if (is_active_sidebar('landingpage-widget-area')) {
                echo '<div id="blog_layouts_landingpage_widget_area">';
                dynamic_sidebar('landingpage-widget-area');
                echo '</div>';
            } else {
                echo '<div>' . esc_html__('Fill the landing page in the customizer', 'blog-layouts') .'</div>';
            }
            ?>

        </div>
    </section>
<?php } ?>
<main role="main" <?php if (get_theme_mod('feed_sidebar', true)) echo 'class="blog_layouts_has_sidebar"' ?>>
    <section class="blog_layouts_content_spacer blog_layouts_feed" id="blog_layouts_main_content">
    <?php
            $blog_layouts_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $blog_layouts_posts_per_page = get_option('posts_per_page');
            $blog_layouts_args = array(
                'post_type' => 'post',
                'posts_per_page' => $blog_layouts_posts_per_page,
                'paged' => $blog_layouts_paged
            );

            $blog_layouts_query = new WP_Query($blog_layouts_args);

            if ($blog_layouts_query->have_posts()) {
                $searchresults_style = get_theme_mod('feed_style', 'cards');
                require_once get_template_directory() . '/template-parts/layout-manager.php';
                echo blog_layouts_display_posts_list($blog_layouts_query, $searchresults_style, true);
            } else {
                echo esc_html__('No posts found.', 'blog-layouts');
            }
            ?>
        <?php
        // Pagination only if needed
        if ($blog_layouts_query->max_num_pages > 1) {
            echo '<div class="blog_layouts_pagination">';
            echo '<div class="blog_layouts_pagination_content">';

            echo '<div class="blog_layouts_pagination_controls">';
            previous_posts_link('«');
            echo '</div>';

            echo '<div class="blog_layouts_pagination_pages">';
            echo paginate_links(array(
                'total' => $blog_layouts_query->max_num_pages,
                'current' => $blog_layouts_paged,
                'prev_next' => false,
            ));
            echo '</div>';

            echo '<div class="blog_layouts_pagination_controls">';
            next_posts_link('»', $blog_layouts_query->max_num_pages);
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
    echo '<aside id="blog_layouts_sidebar" class="' . 'blog_layouts_sidebar_layout_' . esc_attr(get_theme_mod('feed_sidebar_layout', 'social')) . '">';
    get_sidebar();
    echo '</aside>';
}
?>

<?php get_footer(); ?>