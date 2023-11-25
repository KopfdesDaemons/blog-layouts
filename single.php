<?php get_header(); ?>

<section class="blog_layouts_hero">
    <header>
        <h1 class="title"><?php the_title(); ?></h1>
        <?php if (get_theme_mod('post_image', true) & has_post_thumbnail()) : ?>
            <div class="blog_layouts_post_thumbnail">
                <div>
                    <?php the_post_thumbnail(); ?>
                </div>
            </div>
        <?php endif; ?>
    </header>
</section>
<main <?php if (get_theme_mod('post_sidebar', true)) echo 'class="blog_layouts_has_sidebar"' ?>>
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <section class="blog_layouts_content_spacer" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="blog_layouts_content">

                <div class="blog_layouts_post_row_1">
                    <!-- Date -->
                    <?php
                    $post_date = get_theme_mod('post_date', true);
                    if ($post_date) { ?>
                        <time class="blog_layouts_post_date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time>

                        <!-- Categories -->
                    <?php }
                    $post_categories = get_theme_mod('post_categories', true);
                    if ($post_categories) { ?>
                        <div class="blog_layouts_post_categories">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo '<ul>';
                                foreach ($categories as $category) {
                                    echo '<li class="' . 'blog_layouts_chips_layout_' . str_replace("-", "_", get_theme_mod('posts_categories_layout', 'color-blocks')) . '"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->name . '</a></li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                        </div>
                    <?php } ?>
                </div>

                <article class="blog_layouts_user_content_container" id="blog_layouts_main_content">
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

                    <!-- Tags -->
                    <?php
                    $tags_options = get_theme_mod('tags', true);
                    $tags = get_the_tags();
                    if ($tags_options & !empty($tags)) {
                        echo '<div class="blog_layouts_post_tags"><ul>';
                        foreach ($tags as $tag) {
                            echo '<li class="' . 'blog_layouts_chips_layout_' . str_replace("-", "_", get_theme_mod('posts_tags_layout', 'youtube-music')) . '"><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . $tag->name . '</a></li>';
                        }
                        echo '</ul></div>';
                    }

                    // Author
                    $author_info = get_theme_mod('author_details', true);
                    if ($author_info) {
                        $author_id = get_the_author_meta('ID');
                        $author_name = esc_html(get_the_author_meta('display_name'));
                        $author_description = esc_html(get_the_author_meta('description'));
                        $author_website = esc_url(get_the_author_meta('user_url'));
                        $author_avatar = get_avatar($author_id, 500);
                    ?>
                        <div <?php echo 'class="' . 'blog_layouts_authobox_layout_' . str_replace("-", "_", get_theme_mod('posts_authorbox_layout', 'neon')) . '"'; ?>>
                            <div class="blog_layouts_author_avatar">
                                <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
                                    <?php echo $author_avatar; ?>
                                </a>
                            </div>
                            <div class="blog_layouts_author_details">
                                <div class="blog_layouts_author_name_row">
                                    <h3><a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>"><?php echo $author_name; ?></a>
                                    </h3>
                                    <?php if ($author_website) : ?>
                                        <a href="<?php echo $author_website; ?>" target="_blank">
                                            <i class="fa-solid fa-globe"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <p><?php echo $author_description; ?></p>
                            </div>
                        </div>
                    <?php } ?>

                    <?php
                    $post_pagination = get_theme_mod('post_pagination', true);
                    if ($post_pagination) { ?>
                        <div class="blog_layouts_post_pagination">
                            <div class="blog_layouts_post_pagination_prev">
                                <?php previous_post_link('%link', __('&laquo; Previous Post', 'blog-layouts')); ?> </div>
                            <div class="blog_layouts_post_pagination_next">
                                <?php next_post_link('%link', __('Next Post &raquo;', 'blog-layouts')); ?> </div>
                        </div>
                    <?php } ?>

                    <!-- Comments -->
                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
            endwhile;
                ?>
                </footer>
            </div>
        </section>
</main>
<?php if (get_theme_mod('post_sidebar', true)) {
    echo '<aside id="blog_layouts_sidebar" class="' . 'blog_layouts_sidebar_layout_' . get_theme_mod('posts_sidebar_layout', 'social') . '">';
    get_sidebar();
    echo '</aside>';
}; ?>
<?php get_footer(); ?>