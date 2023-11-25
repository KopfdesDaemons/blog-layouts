<footer id="blog_layouts_footer">
    <nav>
        <?php
        if (has_nav_menu('footer-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'footer-menu',
            ));
        } else {
            echo '<div>' . esc_html__('Select a menu in the customizer', 'blog-layouts') .'</div>';
        }
        ?>
    </nav>
    <div class="blog_layouts_footer_info">
        <div>
            <a href="https://wordpress.org/themes/blog-layouts/" target="_blank">Blog Layouts WordPress Theme</a>
        <?php
                printf(
                    esc_html__('created by %1$s', 'blog-layouts'),
                    '<a href="https://ricoswebsite.com/" target="_blank" rel="designer">Rico</a>'
                );
            ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>