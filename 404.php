<?php get_header(); ?>
<main role="main">
    <section class="lime_blog_content_spacer">
        <div class="lime_blog_error" id="lime_blog_main_content">
            <div class="lime_blog_404_headline_row">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h1><?php esc_html_e('File not found', 'lime-blog'); ?></h1>
            </div>
            <p><?php echo esc_html__("The page you are looking for could not be found. Please check the URL or go back to the homepage.", 'lime-blog'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo __('Go to the home page', 'lime-blog'); ?></a>
        </div>
    </section>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>