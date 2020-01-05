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
    <div class="mod-navigation row">
            <div class="mod-logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo BULA_URL_TO_THEME; ?>/img/movo_logo.svg">
                </a>
            </div>
            <div class="navigation-wrapper">
				<?php if ( has_nav_menu( 'main-menu' ) ) {
					wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'bula-main-menu' ) );
				} ?>
                <div class="search-icon">
                    <img src="<?php echo BULA_URL_TO_THEME;?>/img/search-icon.svg">
                </div>
                <div class="lang-menu">
                    <div>D</div>
                    <div>I</div>
                    <div>F</div>
                    <div>E</div>
                </div>
            </div>
        </div>
</div>

