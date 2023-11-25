<?php
get_header();
?>
<main>
    <section class="blog_layouts_content_spacer">
        <div class="blog_layouts_content" id="blog_layouts_main_content">
            <?php
            while (have_posts()) {
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('blog_layouts_user_content_container'); ?>>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </article>
                <footer class="blog_layouts_post_footer">
                    <!-- Pagination-->
                    <?php
                    wp_link_pages(
                        array(
                            'before'         => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'blog-layouts') . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span class="page-number">',
                            'link_after'  => '</span>',
                        )
                    );
                    ?>

                    <!-- Comments -->
                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>
                </footer>
            <?php } ?>
        </div>
    </section>
</main>
<?php
if(get_theme_mod('pages_sidebar', true)){
    echo '<aside id="blog_layouts_sidebar" class="' . 'blog_layouts_sidebar_layout_' . get_theme_mod('pages_sidebar_layout', 'social') . '">';
    get_sidebar();
    echo '</aside>';
}
get_footer();
