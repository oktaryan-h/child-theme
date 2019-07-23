<hr>

<footer>
    
    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
    <p>© <?php echo of_get_option('footer-copyright','Copyright 2077'); ?> </p>
    
</footer>

</div> <!-- /container -->

<?php wp_footer(); ?>

</body>
</html>