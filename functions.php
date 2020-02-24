<?php
/**
 * Global static theme path
 */
define( 'BULA_URL_TO_THEME', get_stylesheet_directory_uri() );
define( 'CACHE', WP_DEBUG ? time() : date( 'Ym' ) );

foreach ( glob( __DIR__ . '/acf/*.php' ) as $filename ) {
	require_once( $filename );
}


/**
 * enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'bula_enqueue_style' );
function bula_enqueue_style() {
	wp_enqueue_style( 'bula-dist-style', BULA_URL_TO_THEME . '/dist/css/style.css', array(), CACHE );
}

add_action( 'wp_enqueue_scripts', 'bula_enqueue_script' );
function bula_enqueue_script() {
	wp_enqueue_script( 'bula-dist-script', BULA_URL_TO_THEME . '/dist/js/script.js', array(), CACHE, true );
	// add localized js vars
	$config = array(
		'themeUrl' 			=> BULA_URL_TO_THEME,
	);
	wp_localize_script( 'bula-dist-script', 'config', $config );
	wp_enqueue_script( 'aid-dist-script' );

	if ( WP_DEBUG ) {
		wp_enqueue_script( 'bula-dist-script-dev-helper', BULA_URL_TO_THEME . '/dev/mod-dev-helper.js', array(), CACHE, true );
	}
}

/**
 * Theme support
 */
add_theme_support( 'post-thumbnails' );

/**
 * add wysiwyg toolbar
 */
add_filter( 'acf/fields/wysiwyg/toolbars', 'bula_acf_toolbars' );
function bula_acf_toolbars( $toolbars ) {
	$toolbars['Very Simple'][1] = array( 'undo', 'bullist', 'charmap', 'removeformat', 'link', 'unlink', 'pastetext' );

	return $toolbars;
}


/**
 * Register WP-Menu
 */
add_action( 'init', 'bula_register_menu' );
function bula_register_menu() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Hauptnavigation', 'bula21' )
		)
	);
}

/** images */
add_image_size('bula-fullwidth', 1400);
add_image_size('bula-fullwidth_2x', 2800);
function the_aid_picture_tag( $image_id = null, $size = 'medium', $size_2x = 'large', $classlist = '' ) {
	$src  = wp_get_attachment_image_src( $image_id, $size );
	$src2 = wp_get_attachment_image_src( $image_id, $size_2x );
	$alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	?>
    <picture class="<?php echo $classlist; ?>">
        <img srcset="<?php echo $src[0]; ?> 1x, <?php echo $src2[0]; ?> 2x" alt="<?php echo $alt; ?>">
    </picture>
	<?php
}

function bula_get_current_url_in( $lang = 'de' ) {
	global $wp;
	$url = home_url( $wp->request );

	return apply_filters( 'wpml_permalink', $url, $lang );
}
