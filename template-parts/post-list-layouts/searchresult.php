<?php
function lime_blog_display_searchresult($show_sticky)
{
    ob_start(); // Start output buffering
?>
    <li class="lime_blog_searchresult <?php if ($show_sticky && is_sticky()) echo 'lime_blog_sticky_post' ?>">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="lime_blog_searchresult_image_a">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
        <?php endif; ?>
        <div class="lime_blog_searchresult_content">
            <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
            </a>
            <i class="lime_blog_searchresult_sticky_pin fa-solid fa-thumbtack"></i>
            <span><?php the_date(); ?></span>
            <?php the_excerpt(); ?>
        </div>
    </li>
<?php
    return ob_get_clean(); // Return the buffered output as a string
}
