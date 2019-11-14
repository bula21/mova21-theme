<div class="container">
	<?php if ( has_nav_menu( 'service-menu' ) ) {
		wp_nav_menu( array( 'theme_location' => 'service-menu', 'container_class' => 'bula-service-menu' ) );
	} ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
