<?php
/**
 * Global static theme path
 */
define( 'BULA_URL_TO_THEME', get_stylesheet_directory_uri() );
define( 'CACHE', WP_DEBUG ? time() : date( 'Ym' ) . '2' );

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
		'themeUrl' => BULA_URL_TO_THEME,
	);
	wp_localize_script( 'bula-dist-script', 'config', $config );
	wp_enqueue_script( 'aid-dist-script' );

	if ( WP_DEBUG ) {
		wp_enqueue_script( 'bula-dist-script-dev-helper', BULA_URL_TO_THEME . '/dev/mod-dev-helper.js', array(), CACHE, true );
	}
}


/**
 * remove gutenberg styles
 */
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'cookie-notice-front' );
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
add_image_size( 'bula-fullwidth', 1400 );
add_image_size( 'bula-fullwidth_2x', 2800 );
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


/**
 * [list_searcheable_acf list all the custom fields we want to include in our search query]
 * @return [array] [list of custom fields]
 */
function list_searcheable_acf() {
	$list_searcheable_acf = array( "title", "name", "text_intro", "intro_text", "org_title", "job", "event_name", "event_text", "text_bloc", "group_text", "inscription_bloc" );

	return $list_searcheable_acf;
}

function advanced_custom_search( $where, $wp_query ) {

	global $wpdb;

	if ( empty( $where ) ) {
		return $where;
	}

	// get search expression
	$terms = $wp_query->query_vars['s'];

	// explode search expression to get search terms
	$exploded = explode( ' ', $terms );
	if ( $exploded === false || count( $exploded ) == 0 ) {
		$exploded = array( 0 => $terms );
	}

	// reset search in order to rebuilt it as we whish
	$where = '';

	// get searcheable_acf, a list of advanced custom fields you want to search content in
	$list_searcheable_acf = list_searcheable_acf();

	foreach ( $exploded as $tag ) :
		$where .= " 
          AND (
            (wp_posts.post_title LIKE '%$tag%')
            OR (wp_posts.post_content LIKE '%$tag%')
            OR EXISTS (
              SELECT * FROM wp_postmeta
	              WHERE post_id = wp_posts.ID
	                AND (";

		foreach ( $list_searcheable_acf as $searcheable_acf ) :
			if ( $searcheable_acf == $list_searcheable_acf[0] ):
				$where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
			else :
				$where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
			endif;
		endforeach;

		$where .= ")
            )
            OR EXISTS (
              SELECT * FROM wp_comments
              WHERE comment_post_ID = wp_posts.ID
                AND comment_content LIKE '%$tag%'
            )
            OR EXISTS (
              SELECT * FROM wp_terms
              INNER JOIN wp_term_taxonomy
                ON wp_term_taxonomy.term_id = wp_terms.term_id
              INNER JOIN wp_term_relationships
                ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
              WHERE (
          		taxonomy = 'post_tag'
            		OR taxonomy = 'category'          		
            		OR taxonomy = 'myCustomTax'
          		)
              	AND object_id = wp_posts.ID
              	AND wp_terms.name LIKE '%$tag%'
            )
        )";
	endforeach;

	return $where;
}

add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );