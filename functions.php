<?php
/**
 * Global static theme path
 */
define( 'BULA_URL_TO_THEME', get_stylesheet_directory_uri() );
define( 'CACHE', WP_DEBUG ? time() : '20220405' );

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

/**
 * Add inline styling
 */
add_action( 'wp_enqueue_scripts', 'bula_styles_method' );
function bula_styles_method() {
	$hauptpartner = get_field( 'hauptpartnerlogos-breite', 'options' );
	$partner      = get_field( 'partnerlogos-breite', 'options' );
	$custom_css   = '
                :root {
                        --hauptpartner-logo-width: ' . $hauptpartner . 'px;
                        --partner-logo-width: ' . $partner . 'px;
                }';
	wp_add_inline_style( 'bula-dist-style', $custom_css );
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
		wp_enqueue_script( 'bula-dist-script-dev-helper', BULA_URL_TO_THEME . '/dev/mod-dev-helper.js', array( 'jquery' ), CACHE, true );
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
 * Register WP-Menu and other init stuff
 */
add_action( 'init', 'bula_register_menu' );
function bula_register_menu() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Hauptnavigation', 'bula21' ),
			'meta-menu' => __( 'Metanavigation', 'bula21' )
		)
	);

	$subRole = get_role( 'subscriber' );
	$subRole->add_cap( 'read_private_posts' );
	$subRole->add_cap( 'read_private_pages' );

	if ( ! current_user_can( 'edit_posts' ) ) {
		add_filter( 'show_admin_bar', '__return_false' );
	}

	if ( isset( $_GET['content-only'] ) && $_GET['content-only'] == 1 ) {
		add_filter( 'body_class', function ( $classes ) {
			return array_merge( $classes, array( 'content-only' ) );
		} );
	}
}

/** images */
add_image_size( 'bula-gallery-preview', 400, 300, array( 'center', 'center' ) );
add_image_size( 'bula-gallery-preview_2x', 800, 600, array( 'center', 'center' ) );
add_image_size( 'bula-fullwidth', 1400 );
add_image_size( 'bula-fullwidth_2x', 2800 );
function the_aid_picture_tag( $image_id = null, $size = 'medium', $size_2x = 'large', $classlist = '' ) {
	$src  = wp_get_attachment_image_src( $image_id, $size );
	$full = wp_get_attachment_image_url( $image_id, 'full' );
	$src2 = wp_get_attachment_image_src( $image_id, $size_2x );
	$alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	?>
    <picture class="<?php echo $classlist; ?>" data-mfp-src="<?php echo $full; ?>" title="<?php echo $alt; ?>">
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

add_filter( 'private_title_format', function ( $format ) {
	return '%s';
} );

/**
 * New button label text
 */
add_filter( 'openid-connect-generic-login-button-text', function ( $text ) {
	return __( 'Mit dem Mova Login anmelden', 'bula21' );
} );

/**
 * redirect users after login to intranet page
 */
add_action( 'openid-connect-generic-redirect-user-back', function ( $redirect_url, $user ) {
	wp_redirect( __( '/intranet', 'bula21' ) );
	exit();
}, 10, 2 );

//Redirect from wp-admin
add_action( 'admin_init', 'my_admin_redirect' );
function my_admin_redirect() {
	if ( ! defined( 'DOING_AJAX' ) ) {
		if ( current_user_can( 'subscriber' ) ) {
			$refer = wp_get_referer();
			if ( ! $refer || strpos( $refer, 'wp-admin' ) ) {
				wp_safe_redirect( home_url() );
			} else {
				wp_safe_redirect( $refer );
			}
		}
	}
}

/**
 * ninja forms fuehrungen booking date stuff
 */
add_filter( 'ninja_forms_render_options', function ( $options, $settings ) {
	if ( 'mova_datum_fuehrung' == $settings['key'] ) {

		if ( have_rows( 'dates_for_tours', 'option' ) ) {
			while ( have_rows( 'dates_for_tours', 'option' ) ) {
				the_row();
				$datum      = get_sub_field( 'datum' );
				$limit      = get_sub_field( 'limit' );
				$open_seats = $limit - bula_count_submissions_with_date( $datum );
				if ( $datum && $open_seats > 0 ) {
					$options[] = [
						'label'    => $datum . ' (Verfügbare Plätze: ' . $open_seats . ')',
						'value'    => $datum,
						'calc'     => 0,
						'selected' => false
					];
				}
			}
		}
	}

	return $options;
}, 10, 2 );

function bula_count_submissions_with_date( $date ) {
	$has_date = 0;
	if ( function_exists( 'Ninja_Forms' ) ) {

		$forms = Ninja_Forms()->form()->get_forms();

		foreach ( $forms as $form ) {
			$subs = Ninja_Forms()->form( $form->get_id() )->get_subs();
			foreach ( $subs as $sub ) {

				if ( $sub->get_field_value( 'mova_datum_fuehrung' ) == $date ) {
					$count = $sub->get_field_value( 'anzahl_teilnehmende' );
					if ( $count && intval( $count ) ) {
						$has_date += $count;
					} else {
						$has_date ++;
					}
				}
			}
		}
	}

	return $has_date;
}


add_filter( 'rest_prepare_post', function ( $post_response, $post, $context ) {
	ob_start();
	$args = array( 'p' => $post->ID );
	query_posts( $args );
	get_template_part( 'single' );
	$full_content = ob_get_clean();
	wp_reset_postdata();
	$post_response->data['content_api'] = trim( $full_content );

	return $post_response;

}, 0, 3 );


if ( ! function_exists( 'is_rest' ) ) {
	/**
	 * Checks if the current request is a WP REST API request.
	 *
	 * Case #1: After WP_REST_Request initialisation
	 * Case #2: Support "plain" permalink settings and check if `rest_route` starts with `/`
	 * Case #3: It can happen that WP_Rewrite is not yet initialized,
	 *          so do this (wp-settings.php)
	 * Case #4: URL Path begins with wp-json/ (your REST prefix)
	 *          Also supports WP installations in subfolders
	 *
	 * @returns boolean
	 * @author matzeeable
	 */
	function is_rest() {
		if ( defined( 'REST_REQUEST' ) && REST_REQUEST // (#1)
		     || isset( $_GET['rest_route'] ) // (#2)
		        && strpos( $_GET['rest_route'], '/', 0 ) === 0 ) {
			return true;
		}

		// (#3)
		global $wp_rewrite;
		if ( $wp_rewrite === null ) {
			$wp_rewrite = new WP_Rewrite();
		}

		// (#4)
		$rest_url    = wp_parse_url( trailingslashit( rest_url() ) );
		$current_url = wp_parse_url( add_query_arg( array() ) );

		return strpos( $current_url['path'] ?? '/', $rest_url['path'], 0 ) === 0;
	}
}

add_filter( 'walker_nav_menu_start_el', 'bula_menu_item_custom_output', 10, 4 );
function bula_menu_item_custom_output( $item_output, $item, $depth, $args ) {
    if ($args->theme_location == 'meta-menu' && $item->url == '#playradio' ) {
        $item_output = str_replace('#playradio',"javascript:open('https://sonar.42m.ch/','_blank','width=500,height=1000,popup=1')",$item_output);
    }

    return $item_output;
}
