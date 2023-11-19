<?php get_header(); ?>
<main role="main">
    <section class="clean_space_content_spacer">
        <div class="clean_space_error" id="clean_space_main_content">
            <div class="clean_space_404_headline_row">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h1><?php esc_html_e('File not found', 'clean-space'); ?></h1>
            </div>
            <p><?php echo esc_html__("The page you are looking for could not be found. Please check the URL or go back to the homepage.", 'clean-space'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo __('Go to the home page', 'clean-space'); ?></a>
        </div>
    </section>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>