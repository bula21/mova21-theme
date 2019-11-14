<?php
/**
 * Global static theme path
 */
define( 'BULA_URL_TO_THEME', get_stylesheet_directory_uri() );
define( 'CACHE', WP_DEBUG ? time() : date( 'Ym' ) );

require_once( __DIR__ . '/acf/acf-config.php' );

/**
 * enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'bula_enqueue_style' );
function bula_enqueue_style() {
	wp_enqueue_style( 'bula-dist-style', BULA_URL_TO_THEME . '/dist/css/style.css', array(), CACHE );
}

add_action( 'wp_enqueue_scripts', 'bula_enqueue_script' );
function bula_enqueue_script() {
	wp_enqueue_script( 'bula-dist-script', BULA_URL_TO_THEME . '/dist/js/script.js', array(), CACHE );
	if ( WP_DEBUG ) {
		wp_enqueue_script( 'bula-dist-script-dev-helper', BULA_URL_TO_THEME . '/dev/mod-dev-helper.js', array(), CACHE, true );
	}
}


/**
 * wysiwyg style same as frontend
 */
add_action( 'admin_init', 'bula_theme_add_editor_styles' );
function bula_theme_add_editor_styles() {
	add_editor_style( BULA_URL_TO_THEME . '/dist/css/style.css' );
}

/**
 * remove gutenberg styles
 */
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
}

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
			'main-menu'    => __( 'Hauptnavigation', 'bula21' ),
			'service-menu' => __( 'Servicenavigation', 'bula21' )
		)
	);
}


/**
 * Example for ACF-Gutenberg Block
 */
function register_acf_block_types() {

	// register a testimonial block.
	acf_register_block_type( array(
		'name'            => 'text-bild',
		'title'           => __( 'Text-Bild Komponente', 'bula21' ),
		'description'     => __( 'Eine Komponente mit einem Text und einem Bild.', 'bula21' ),
		'render_template' => 'template-parts/blocks/text-bild/text-bild.php',
		'category'        => 'formatting',
		'icon'            => 'admin-comments',
		'keywords'        => array( 'bild', 'text' ),
	) );
}

// Check if function exists and hook into setup.
if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'register_acf_block_types' );
}