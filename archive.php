<?php get_header(); ?>

<!-- header with headline and gradient -->
<?php if (!is_author()) { ?>
    <section class="clean_space_post_headline_section">
        <header>
            <h1>
                <?php
                if (is_category()) {
                    echo single_cat_title(); // Category name
                } elseif (is_tag()) {
                    echo single_tag_title(); // Tag
                } elseif (is_day()) {
                    echo esc_html__('Archive for', 'clean-space') . ' ' . get_the_date(); // Archive for day
                } elseif (is_month()) {
                    echo esc_html__('Archive for', 'clean-space') . ' ' . get_the_date('F Y'); // Archive for month
                } elseif (is_year()) {
                    echo esc_html__('Archive for', 'clean-space') . ' ' . get_the_date('Y'); // Archive for year
                } else {
                    echo esc_html__('Archive', 'clean-space'); // default
                }
                ?>
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
    // Convert the date to a timestamp
    $timestamp = strtotime($user_registered);
    // Format the date using date_i18n() into the national representation
    $formatted_date = date_i18n(get_option('date_format'), $timestamp);

    // Avatar
    $image_size = esc_attr(get_theme_mod('image_size_setting', '150'));
    $author_avatar = get_avatar($author_id, $image_size);
?>
    <section class="clean_space_post_author_headline_section">
        <header>
            <div class="clean_space_author_row_1">
                <?php echo $author_avatar ?>
                <div class="clean_space_author_headline_container">
                    <h1>
                        <?php
                        if (is_author()) {
                            the_post();
                            echo get_the_author(); // Author name
                            rewind_posts();
                        } ?>
                    </h1>
                    <ul class="clean_space_author_stats">
                        <li>
                            <div class="clean_space_author_stats_data"> <?php echo $author_roles[0] ?></div>
                            <label class="clean_space_author_stats_label"><?php echo esc_html(__('Role', 'clean-space')) ?></label>
                        </li>
                        <li>
                            <div class="clean_space_author_stats_data">
                                <?php
                                $registration_date = get_the_author_meta('user_registered', $author_id);
                                $formatted_date = date_i18n('d.m.Y', strtotime($registration_date));
                                ?>
                                <time datetime="<?php echo date('Y-m-d', strtotime($registration_date)); ?>"><?php echo $formatted_date; ?></time>
                            </div>
                            <label class="clean_space_author_stats_label">
                                <?php echo esc_html(__('Registration date', 'clean-space')); ?>
                            </label>
                        </li>
                        <li>
                            <div class="clean_space_author_stats_data"> <?php echo $author_posts_count ?></div>
                            <label class="clean_space_author_stats_label"><?php echo esc_html(__('Number of posts', 'clean-space')) ?></label>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <nav class="clean_space_author_nav">
            <ul>
                <li>
                    <button id="clean_space_author_posts" onclick="click_author_posts()"><?php echo esc_html(__('Posts', 'clean-space')) ?></button>
                </li>
                <li>
                    <button id="clean_space_author_comments" onclick="click_author_comments()"><?php echo esc_html(__('Comments', 'clean-space')) ?></button>
                </li>
            </ul>
        </nav>
        <?php if (!empty($author_description)) : ?>
            <div class="clean_space_author_bio_container">
                <div class="clean_space_author_bio">
                    <h2><?php printf(esc_html__('About %s:', 'clean-space'), get_the_author()); ?></h2>
                    <p><?php echo $author_description; ?></p>
                    <?php if ($author_website) : ?>
                        <a class="clean_space_author_website" href="<?php echo $author_website; ?>" target="_blank">🌐
                            <?php echo esc_html(__('Website', 'clean-space')) ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </section>
<?php } ?>



<main role="main">
    <section class="clean_space_content_spacer clean_space_content_spacer_feed clean_space_content_and_sidebar_grid">
        <?php if (is_author()) {; ?>
            <div class="clean_space_autor_content">
                <div class="clean_space_author_comments_container">
                    <?php
                    $args = array(
                        'user_id' => $author_id,
                        'number' => 5, // Number of comments
                    );
                    $author_comments = get_comments($args);
                    ?>
                    <h3 class="clean_space_author_last_comments_headline">
                        <?php echo __('Last comments from', 'clean-space') . ' ' . $author_name; ?></h3>
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
                            echo __('No comments found.', 'clean-space');
                        }
                        ?>
                    </ol>
                <?php } ?>
                </div>
                <!-- Show latest comments -->

                <?php
                if (have_posts()) {
                    echo '<div class="clean_space_feed">';
                    while (have_posts()) {
                        the_post();
                        $post_classes = array('clean_space_post_card clean_space_shadow');
                        if (is_sticky()) {
                            $post_classes[] = 'clean_space_sticky_post';
                        }

                        // Show cards
                        require_once get_template_directory() . '/template-parts/post-card.php';
                        echo clean_space_display_post_card($post_classes);
                    }

                    // Pagination 
                    global $wp_query;
                    $total_pages = $wp_query->max_num_pages;
                    if ($total_pages > 1) {
                        echo '<div class="clean_space_pagination clean_space_shadow">';
                        echo '<div class="clean_space_pagination_content">';

                        echo '<div class="clean_space_pagination_controls">';
                        previous_posts_link(__('« Previous', 'clean-space'));
                        echo '</div>';

                        echo '<div class="clean_space_pagination_pages">';
                        echo paginate_links(array(
                            'total' => $wp_query->max_num_pages,
                            'current' => $paged,
                            'prev_next' => false,
                        ));
                        echo '</div>';

                        echo '<div class="clean_space_pagination_controls">';
                        next_posts_link(__('Next »', 'clean-space'), $wp_query->max_num_pages);
                        echo '</div>';

                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo esc_html__('No posts found.', 'clean-space');
                }
                ?>
            </div>
            </div>
    </section>
</main>
<?php
get_sidebar();
get_footer(); ?>