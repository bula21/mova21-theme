<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php the_field( 'analyticsscript-header', 'options' ); ?>
    <title><?php wp_title( '|', 1, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php if ( function_exists( 'body_class' ) ) {
	body_class();
} ?>>
<?php the_field( 'analyticsscript-body', 'options' ); ?>

<div class="container">
	<?php if ( has_nav_menu( 'main-menu' ) ) {
		wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'bula-main-menu' ) );
	} ?>
</div>

