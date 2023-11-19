<footer id="lime_blog_footer">
    <nav>
        <?php
        if (has_nav_menu('footer-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'footer-menu',
            ));
        } else {
            echo '<div>' . esc_html__('Select a menu in the customizer', 'lime-blog') .'</div>';
        }
        ?>
    </nav>
</footer>
<?php wp_footer(); ?>
</body>

</html>