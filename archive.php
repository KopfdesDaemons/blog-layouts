<?php
    get_header();
    $blog_layouts_side_bar;
    $blog_layouts_archive_title = esc_html__('Archive', 'blog-layouts');
    $blog_layouts_archive_post_list_style = 'cards';

    if (is_author()) {
        $blog_layouts_side_bar = get_theme_mod('author_page_sidebar', true);
        $blog_layouts_sidebar_layout_setting = get_theme_mod('author_page_sidebar_layout', 'social');
        $blog_layouts_archive_title = get_the_author();
        $blog_layouts_archive_post_list_style = get_theme_mod('author_posts_style', 'cards');
    } elseif (is_tag()) {
        $blog_layouts_side_bar = get_theme_mod('tags_sidebar', true);
        $blog_layouts_sidebar_layout_setting = get_theme_mod('tags_sidebar_layout', 'social');
        $blog_layouts_archive_title = single_tag_title('', false);
        $blog_layouts_archive_post_list_style = get_theme_mod('tag_list_style', 'cards');
    } elseif (is_category()) {
        $blog_layouts_side_bar = get_theme_mod('category_sidebar', true);
        $blog_layouts_sidebar_layout_setting = get_theme_mod('category_sidebar_layout', 'social');
        $blog_layouts_archive_title = single_cat_title('', false);
        $blog_layouts_archive_post_list_style = get_theme_mod('category_list_style', 'cards');
    } elseif (is_date()) {
        $blog_layouts_side_bar = get_theme_mod('date_sidebar', true);
        $blog_layouts_sidebar_layout_setting = get_theme_mod('date_sidebar_layout', 'social');
        if (is_day()) {
            $blog_layouts_archive_title = esc_html__('Archive for', 'blog-layouts') . ' ' . get_the_date();
        } elseif (is_month()) {
            $blog_layouts_archive_title = esc_html__('Archive for', 'blog-layouts') . ' ' . get_the_date('F Y');
        } elseif (is_year()) {
            $blog_layouts_archive_title = esc_html__('Archive for', 'blog-layouts') . ' ' . get_the_date('Y');
        }
        $blog_layouts_archive_post_list_style = get_theme_mod('date_list_style', 'cards');
    } elseif (is_search()) {
        $blog_layouts_side_bar = get_theme_mod('search_sidebar', true);
        $blog_layouts_sidebar_layout_setting = get_theme_mod('search_sidebar_layout', 'social');
        $blog_layouts_archive_post_list_style = get_theme_mod('searchresults_style', 'cards');
    } elseif (is_archive()) {
        $blog_layouts_side_bar = get_theme_mod('archive_sidebar', true);
    } else {
        $blog_layouts_side_bar = true;
    }
?>


<?php if (!is_author()) { ?>
    <section class="blog_layouts_hero">
        <header>
            <h1>
                <?php echo $blog_layouts_archive_title; ?>
            </h1>
        </header>
    </section>
<?php } ?>


<!-- author header -->
<?php if (is_author()) {
    $author_id = get_the_author_meta('ID');
    $author_name = esc_html(get_the_author_meta('display_name'));
    $author_description = esc_html(get_the_author_meta('description'));
    $author_website = esc_url(get_the_author_meta('user_url'));
    $author_posts_count = count_user_posts($author_id);
    $author_roles = get_the_author_meta('roles');

    $user_registered = get_the_author_meta('user_registered');
    $timestamp = strtotime($user_registered);
    $formatted_date = date_i18n(get_option('date_format'), $timestamp);

    // Avatar
    $image_size = esc_attr(get_theme_mod('image_size_setting', '150'));
    $author_avatar = get_avatar($author_id, $image_size);
?>
    <section class="blog_layouts_post_author_headline_section">
        <header>
            <div class="blog_layouts_author_row_1">
                <?php echo $author_avatar ?>
                <div class="blog_layouts_author_headline_container">
                    <h1>
                        <?php
                        if (is_author()) {
                            the_post();
                            echo get_the_author(); // Author name
                            rewind_posts();
                        } ?>
                    </h1>
                    <ul class="blog_layouts_author_stats">
                        <?php if (get_theme_mod('author_page_role', true)) { ?>
                            <li>
                                <div class="blog_layouts_author_stats_data"> <?php echo $author_roles[0] ?></div>
                                <label class="blog_layouts_author_stats_label"><?php echo esc_html(__('Role', 'blog-layouts')) ?></label>
                            </li>
                        <?php } ?>
                        <?php if (get_theme_mod('author_registration_date', true)) { ?>
                            <li>
                                <div class="blog_layouts_author_stats_data">
                                    <?php
                                    $registration_date = get_the_author_meta('user_registered', $author_id);
                                    $formatted_date = date_i18n('d.m.Y', strtotime($registration_date));
                                    ?>
                                    <time datetime="<?php echo date('Y-m-d', strtotime($registration_date)); ?>"><?php echo $formatted_date; ?></time>
                                </div>
                                <label class="blog_layouts_author_stats_label">
                                    <?php echo esc_html(__('Registration date', 'blog-layouts')); ?>
                                </label>
                            </li>
                        <?php } ?>
                        <?php if (get_theme_mod('author_number_of_posts', true)) { ?>
                            <li>
                                <div class="blog_layouts_author_stats_data"> <?php echo $author_posts_count ?></div>
                                <label class="blog_layouts_author_stats_label"><?php echo esc_html(__('Number of posts', 'blog-layouts')) ?></label>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </header>
        <nav class="blog_layouts_author_nav">
            <ul>
                <li>
                    <button id="blog_layouts_author_posts" onclick="click_author_posts()"><?php echo esc_html(__('Posts', 'blog-layouts')) ?></button>
                </li>
                <?php if (get_theme_mod('author_page_latest_comments', true)) { ?>
                    <li>
                        <button id="blog_layouts_author_comments" onclick="click_author_comments()"><?php echo esc_html(__('Comments', 'blog-layouts')) ?></button>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <?php if (!empty($author_description)) : ?>
            <div class="blog_layouts_author_bio_container">
                <div class="blog_layouts_author_bio">
                    <h2><?php printf(esc_html__('About %s:', 'blog-layouts'), get_the_author()); ?></h2>
                    <p><?php echo $author_description; ?></p>
                    <?php if (get_theme_mod('author_website', true) && $author_website) { ?>
                        <a class="blog_layouts_author_website" href="<?php echo $author_website; ?>" target="_blank">🌐
                            <?php echo esc_html(__('Website', 'blog-layouts')) ?></a>
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>

    </section>
<?php } ?>

<main role="main" <?php if ($blog_layouts_side_bar) echo 'class="blog_layouts_has_sidebar"' ?>>
    <section class="blog_layouts_content_spacer blog_layouts_content_spacer_feed blog_layouts_content_and_sidebar_grid">
        <?php if (is_author()) {; ?>
            <div class="blog_layouts_autor_content">
                <div class="blog_layouts_author_comments_container">
                    <?php
                    $args = array(
                        'user_id' => $author_id,
                        'number' => 5, // Number of comments
                    );
                    $author_comments = get_comments($args);
                    ?>
                    <h3 class="blog_layouts_author_last_comments_headline">
                        <?php echo __('Last comments from', 'blog-layouts') . ' ' . $author_name; ?></h3>
                    <ol class="has-avatars has-dates has-excerpts wp-block-latest-comments">
                        <?php
                        if ($author_comments) {
                            foreach ($author_comments as $comment) {
                                echo '<li class="wp-block-latest-comments__comment">';
                                echo get_avatar($comment->comment_author_email, 48); // Gravatar-Avatar
                                echo '<article>';
                                echo '<footer class="wp-block-latest-comments__comment-meta">';
                                echo '<a class="wp-block-latest-comments__comment-author" href="' . esc_url($comment->comment_author_url) . '">' . $comment->comment_author . '</a>';
                                echo ' zu <a class="wp-block-latest-comments__comment-link" href="' . esc_url(get_comment_link($comment)) . '">' . get_the_title($comment->comment_post_ID) . '</a>';
                                echo '<time datetime="' . esc_attr(get_comment_date('c', $comment)) . '" class="wp-block-latest-comments__comment-date">' . get_comment_date('j. F Y', $comment) . '</time>';
                                echo '</footer>';
                                echo '<div class="wp-block-latest-comments__comment-excerpt">';
                                echo '<p>' . get_comment_excerpt($comment) . '</p>'; // Comment snippet
                                echo '</div>';
                                echo '</article>';
                                echo '</li>';
                            }
                        } else {
                            echo __('No comments found.', 'blog-layouts');
                        }
                        ?>
                    </ol>
                <?php } ?>
                </div>

                <?php
                if (have_posts()) {
                    global $wp_query;
                    $wp_query->set('paged', 1);

                    require_once get_template_directory() . '/template-parts/layout-manager.php';
                    echo blog_layouts_display_posts_list($wp_query, $blog_layouts_archive_post_list_style);

                    // Pagination 
                    $total_pages = $wp_query->max_num_pages;
                    if ($total_pages > 1) {
                        echo '<div class="blog_layouts_pagination blog_layouts_shadow">';
                        echo '<div class="blog_layouts_pagination_content">';

                        echo '<div class="blog_layouts_pagination_controls">';
                        previous_posts_link(__('« Previous', 'blog-layouts'));
                        echo '</div>';

                        echo '<div class="blog_layouts_pagination_pages">';
                        echo paginate_links(array(
                            'total' => $wp_query->max_num_pages,
                            'current' => $paged,
                            'prev_next' => false,
                        ));
                        echo '</div>';

                        echo '<div class="blog_layouts_pagination_controls">';
                        next_posts_link(__('Next »', 'blog-layouts'), $wp_query->max_num_pages);
                        echo '</div>';

                        echo '</div>';
                    }
                } else {
                    echo esc_html__('No posts found.', 'blog-layouts');
                }
                ?>
            </div>
            </div>
    </section>
</main>
<?php
if ($blog_layouts_side_bar) {
    echo '<aside id="blog_layouts_sidebar" class="' . 'blog_layouts_sidebar_layout_' . $blog_layouts_sidebar_layout_setting . '">';
    get_sidebar();
    echo '</aside>';
}
get_footer(); ?>