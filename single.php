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
                    $blog_layouts_post_date = get_theme_mod('post_date', true);
                    if ($blog_layouts_post_date) { ?>
                        <time class="blog_layouts_post_date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time>

                        <!-- Categories -->
                    <?php }
                    $blog_layouts_post_categories = get_theme_mod('blog_layouts_post_categories', true);
                    if ($blog_layouts_post_categories) { ?>
                        <div class="blog_layouts_post_categories">
                            <?php
                            $blog_layouts_categories = get_the_category();
                            if (!empty($blog_layouts_categories)) {
                                echo '<ul>';
                                foreach ($blog_layouts_categories as $category) {
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
                    $blog_layouts_tags_options = get_theme_mod('tags', true);
                    $blog_layouts_tags = get_the_tags();
                    if ($blog_layouts_tags_options & !empty($blog_layouts_tags)) {
                        echo '<div class="blog_layouts_post_tags"><ul>';
                        foreach ($blog_layouts_tags as $tag) {
                            echo '<li class="' . 'blog_layouts_chips_layout_' . str_replace("-", "_", esc_attr(get_theme_mod('posts_tags_layout', 'portal'))) . '"><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . $tag->name . '</a></li>';
                        }
                        echo '</ul></div>';
                    }

                    // Author
                    $blog_layouts_author_info = get_theme_mod('author_details', true);
                    if ($blog_layouts_author_info) {
                        $blog_layouts_author_id = get_the_author_meta('ID');
                        $blog_layouts_author_name = esc_html(get_the_author_meta('display_name'));
                        $blog_layouts_author_description = esc_html(get_the_author_meta('description'));
                        $blog_layouts_author_website = esc_url(get_the_author_meta('user_url'));
                        $blog_layouts_author_avatar = get_avatar($blog_layouts_author_id, 500);
                    ?>
                        <div <?php echo 'class="' . 'blog_layouts_authorbox_layout_' . str_replace("-", "_", esc_attr(get_theme_mod('posts_authorbox_layout', 'material2'))) . '"'; ?>>
                            <div class="blog_layouts_author_avatar">
                                <a href="<?php echo esc_url(get_author_posts_url($blog_layouts_author_id)); ?>">
                                    <?php echo $blog_layouts_author_avatar; ?>
                                </a>
                            </div>
                            <div class="blog_layouts_author_details">
                                <div class="blog_layouts_author_name_row">
                                    <h3><a href="<?php echo esc_url(get_author_posts_url($blog_layouts_author_id)); ?>"><?php echo $blog_layouts_author_name; ?></a>
                                    </h3>
                                    <?php if ($blog_layouts_author_website) : ?>
                                        <a href="<?php echo $blog_layouts_author_website; ?>" target="_blank">
                                            <i class="fa-solid fa-globe"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <p><?php echo $blog_layouts_author_description; ?></p>
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
    echo '<aside id="blog_layouts_sidebar" class="' . 'blog_layouts_sidebar_layout_' . esc_attr(get_theme_mod('posts_sidebar_layout', 'social')) . '">';
    get_sidebar();
    echo '</aside>';
}; ?>
<?php get_footer(); ?>