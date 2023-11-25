<?php get_header(); ?>
<main role="main">
    <section class="blog_layouts_content_spacer">
        <div class="blog_layouts_error" id="blog_layouts_main_content">
            <div class="blog_layouts_404_headline_row">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h1><?php esc_html_e('File not found', 'blog-layouts'); ?></h1>
            </div>
            <p><?php echo esc_html__("The page you are looking for could not be found. Please check the URL or go back to the homepage.", 'blog-layouts'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo __('Go to the home page', 'blog-layouts'); ?></a>
        </div>
    </section>
</main>
<?php get_footer(); ?>