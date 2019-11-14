<?php get_header(); ?>

<div class="container">
    <h1><?php _e( '404 - Diese Seite wurde leiter nicht gefunden', 'bula21' ); ?></h1>
    <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php _e( 'Zurück zur Startseite', 'bula21' ); ?></a></p>
</div>

<?php get_footer(); ?>
