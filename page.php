<?php
get_header();
?>
<main>
    <section class="lime_blog_content_spacer">
        <div class="lime_blog_content" id="lime_blog_main_content">
            <?php
            while (have_posts()) {
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('lime_blog_content_container'); ?>>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </article>
                <footer class="lime_blog_post_footer">
                    <!-- Pagination-->
                    <?php
                    wp_link_pages(
                        array(
                            'before'         => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'lime-blog') . '</span>',
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
get_sidebar();
if (!is_active_sidebar('my-sidebar')) echo '<aside id="lime_blog_sidebar" class="lime_blog_empty_sidebar"><div class="widget"><p>' . esc_html__('Fill the sidebar in the customizer', 'lime-blog') .'</p></div></aside>';
get_footer();
