<?php
get_header();
?>
<main>
    <section class="clean_space_content_spacer">
        <div class="clean_space_content" id="clean_space_main_content">
            <?php
            while (have_posts()) {
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('clean_space_content_container'); ?>>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </article>
                <footer class="clean_space_post_footer">
                    <!-- Pagination-->
                    <?php
                    wp_link_pages(
                        array(
                            'before'         => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'clean-space') . '</span>',
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
get_footer();
