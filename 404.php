<?php get_header(); ?>


<div class="container mod-404">

	<?php
	$queried_object = get_queried_object();
	if ( isset( $queried_object->post_status ) && 'private' == $queried_object->post_status && ! is_user_logged_in() ) {
		?>
        <div class="row">
            <div class="col-12 col-md-4 offset-md-4">
                <h1><?php _e( 'Login', 'bula21' ); ?></h1>
                <p><?php _e( 'Um diese Seite zu sehen musst du dich anmelden.', 'bula21' ); ?></p>
				<?php echo do_shortcode( '[openid_connect_generic_login_button]' ); ?>
            </div>
        </div>
	<?php } else { ?>
        <h1><?php _e( '404 - Diese Seite wurde leiter nicht gefunden', 'bula21' ); ?></h1>
        <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php _e( 'Zurück zur Startseite', 'bula21' ); ?></a></p>
		<?php
	}
	?>
</div>

<?php get_footer(); ?>
