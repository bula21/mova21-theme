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
        <form role="search" method="get" id="searchform" class="searchform" action="/">
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

<?php if ( has_nav_menu( 'meta-menu' ) ): ?>
    <div class="mod-navigation meta">
        <div class="container">
            <div class="banner-wrapper">
                <div></div>
                <div class="navigation-wrapper">
                    <div class="inner-wrapper">
						<?php wp_nav_menu( array( 'theme_location' => 'meta-menu', 'container_class' => 'bula-meta-menu', 'depth' => 1 ) ); ?>

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
<?php endif; ?>

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
                <div class="inner-wrapper main">
					<?php if ( has_nav_menu( 'main-menu' ) ) {
						wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'bula-main-menu', 'depth' => 3 ) );
					} ?>

					<?php if ( has_nav_menu( 'meta-menu' ) ): ?>
						<?php wp_nav_menu( array( 'theme_location' => 'meta-menu', 'container_class' => 'bula-meta-menu', 'depth' => 1 ) ); ?>
					<?php endif; ?>

                    <button class="search-icon" aria-label="<?php _e( 'Search', 'bula21' ); ?>">
                        <img src="<?php echo BULA_URL_TO_THEME; ?>/img/search-icon.svg" alt="<?php _e( 'Search icon' ); ?>">
                    </button>

                    <div class="lang-menu">
                        <a class="lang-switch" href="<?php echo bula_get_current_url_in( 'de' ); ?>">D</a>
                        <a class="lang-switch" href="<?php echo bula_get_current_url_in( 'fr' ); ?>">F</a>
                        <a class="lang-switch" href="<?php echo bula_get_current_url_in( 'it' ); ?>">I</a>
                        <a class="lang-switch" href="/en/international/">E</a>
                    </div>
                    <div class="mobile-spacer">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ( WP_DEBUG ) : ?>
    <div class="dev-banner" style="background-color: red; position: fixed; width: 200px;top: 0;z-index: 999; text-align: center;left: calc( 50% - 100px );font-size: 1.2em;">
        DEV SYSTEM!
    </div>
<?php
endif;


if ( post_password_required() ) :
$post  = get_post();
$label = 'pwbox-' . ( empty( $post->ID ) ? wp_rand() : $post->ID );
?>

<div class="container mod-content">
    <div class="header">
        <h1><?php _e( 'Diese Seite ist Passwortgeschützt' ); ?></h1>
    </div>
    <div class="entry-content">

        <p class="post-password-message"><?php echo esc_html__( 'This content is password protected. Please enter a password to view.', 'twentytwentyone' ); ?></p>
        <form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ); ?>" class="post-password-form" method="post">
            <label class="post-password-form__label" for="<?php echo esc_attr( $label ); ?>">
				<?php echo esc_html_x( 'Password', 'Post password form', 'twentytwentyone' ); ?>
            </label>
            <input class="post-password-form__input" name="post_password" id="<?php echo esc_attr( $label ); ?>" type="password" size="20"/>
            <input type="submit" class="post-password-form__submit" name="<?php echo esc_attr_x( 'Submit', 'Post password form', 'twentytwentyone' ); ?>"
                   value="<?php echo esc_attr_x( 'Enter', 'Post password form', 'twentytwentyone' ); ?>"/>
        </form>
    </div>
</div>
<?php
get_footer();
die();

endif;
