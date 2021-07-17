<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php the_field( 'analyticsscript-header', 'options' ); ?>
    <title><?php wp_title( '|', 1, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php if ( function_exists( 'body_class' ) ) {
	body_class( 'navigation-visible' );
} ?>>
<?php the_field( 'analyticsscript-body', 'options' ); ?>

<?php if ( get_field( 'blacksite', 'option' ) ) : ?>
    <div class="mod-blacksite">
        <div class="container">
            <div class="row">
                <div class="wysiwyg">
					<?php the_field( 'blacksite-content', 'option' ); ?>
                </div>
            </div>
        </div>

    </div>
	<?php die(); endif; ?>
<div class="mod-search">
    <div class="search-form-wrapper">
        <button class="search-form-close" aria-label="<?php _e( 'Schliessen', 'bula21' ); ?>">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </button>
        <form role="search" method="get" id="searchform" class="searchform" action="https://bula21.local/">
            <div>
                <label class="screen-reader-text sr-only" for="s"><?php _e( 'Suche nach:', 'bula21' ); ?></label>
                <div class="search-element">
                    <button class="search-icon" role="button" form="searchform">
                        <img src="<?php echo BULA_URL_TO_THEME; ?>/img/search-icon.svg" alt="<?php _e( 'Search icon' ); ?>">
                    </button>
                    <input type="text"
                           class="search-input"
                           placeholder="<?php _e( 'Suche nach', 'bula21' ); ?>"
                           value="<?php echo get_search_query(); ?>" name="s" id="s">
                </div>
                <input type="submit" id="searchsubmit" value="Suche" class="sr-only">
            </div>
            <input type="hidden" name="lang" value="de"></form>
    </div>
</div>

<div class="mod-navigation">
    <div class="container">
        <div class="banner-wrapper">
            <div class="mod-logo">
                <a class="logo-link" href="<?php echo home_url(); ?>">
                    <img src="<?php echo BULA_URL_TO_THEME; ?>/img/mova_logo.svg" alt="<?php _e( 'Mova Logo' ); ?>">
                </a>
            </div>
            <button class="burger-button" aria-label="<?php _e( 'Navigation', 'bula21' ); ?>">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </button>
            <div class="navigation-wrapper">
                <div class="inner-wrapper">
					<?php if ( has_nav_menu( 'main-menu' ) ) {
						wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'bula-main-menu', 'depth' => 3 ) );
					} ?>

                    <button class="search-icon" aria-label="<?php _e( 'Search', 'bula21' ); ?>">
                        <img src="<?php echo BULA_URL_TO_THEME; ?>/img/search-icon.svg" alt="<?php _e( 'Search icon' ); ?>">
                    </button>
                    <div class="mobile-spacer">&nbsp;</div>
                    <div class="lang-menu">
                        <a class="lang-switch" href="<?php echo bula_get_current_url_in( 'de' ); ?>">D</a>
                        <a class="lang-switch" href="<?php echo bula_get_current_url_in( 'fr' ); ?>">F</a>
                        <a class="lang-switch" href="<?php echo bula_get_current_url_in( 'it' ); ?>">I</a>
                        <a class="lang-switch" href="/en/international/">E</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="navi-spacer">&nbsp;</div>

<?php if ( WP_DEBUG ) : ?>
<div class="dev-banner" style="background-color: red; position: fixed; width: 200px;top: 0;z-index: 999; text-align: center;left: calc( 50% - 100px );font-size: 1.5em;">
    DEV SYSTEM!
</div>
<?php
endif;
