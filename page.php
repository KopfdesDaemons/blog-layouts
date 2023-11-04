<?php
get_header();
?>
<main>
    <section class="clean_space_content_spacer">
        <?php
        while (have_posts()) {
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('clean_space_content_container'); ?>>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
            <!-- Comments -->
            <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
        <?php
        }
        ?>
    </section>
</main>
<?php
get_sidebar();
get_footer();
