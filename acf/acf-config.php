<?php

// add options page
if ( function_exists( 'acf_add_options_page' ) ) {
	$bula_options = array(
		'page_title'      => 'Allgemeines',
		'menu_title'      => 'Optionen',
		'menu_slug'       => 'bula-options',
		'capability'      => 'edit_posts',
		'position'        => false,
		'parent_slug'     => '',
		'icon_url'        => false,
		'redirect'        => false,
		'post_id'         => 'options',
		'autoload'        => false,
		'update_button'   => __( 'Update', 'bula21' ),
		'updated_message' => __( 'Optionen aktualisiert', 'bula21' ),
	);
	acf_add_options_page( $bula_options );
} else {
	echo( '<h1 style="color:red;font-size: 10em;text-align: center;">ACF nicht installiert!</h1>' );
}

if ( function_exists( 'acf_add_local_field_group' ) ):

	acf_add_local_field_group( array(
		'key'                   => 'group_5ccadff89b669',
		'title'                 => 'Allgemeines',
		'fields'                => array(
			array(
				'key'               => 'field_5d00f2201e356',
				'label'             => 'Angaben',
				'type'              => 'tab',
				'required'          => 0,
				'conditional_logic' => 0,
				'placement'         => 'top',
				'endpoint'          => 0,
			),
			array(
				'key'               => 'field_5ccae01e0b27d',
				'label'             => 'Footer Adresse',
				'name'              => 'footer-adresse',
				'type'              => 'wysiwyg',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_5ccae9b9c2e5b',
				'label'             => 'Facebook-URL',
				'name'              => 'facebook-url',
				'type'              => 'url',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '33',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_5ccae9ecc2e5c',
				'label'             => 'Twitter-URL',
				'name'              => 'twitter-url',
				'type'              => 'url',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '33',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_5ccae9ecc2e1d',
				'label'             => 'Instagram-URL',
				'name'              => 'instagram-url',
				'type'              => 'url',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '33',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_5ccae9ecc2e1e',
				'label'             => 'Newsletter abonnieren URL',
				'name'              => 'newsletter-url',
				'type'              => 'url',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '100',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
			),
			array(
				'key'               => 'field_5d00f2201e358',
				'label'             => 'Google Analytics',
				'type'              => 'tab',
				'required'          => 0,
				'conditional_logic' => 0,
				'placement'         => 'top',
				'endpoint'          => 0,
			),
			array(
				'key'     => 'field_5c29da2c695b4',
				'label'   => 'Analytics Script (Header)',
				'name'    => 'analyticsscript-header',
				'type'    => 'textarea',
				'wrapper' => array(
					'width' => '50'
				)
			),
			array(
				'key'     => 'field_5c29da2c695b5',
				'label'   => 'Analytics Script (Body)',
				'name'    => 'analyticsscript-body',
				'type'    => 'textarea',
				'wrapper' => array(
					'width' => '50'
				)
			)
		),
		'location'              => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'bula-options',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => '',
	) );

endif;
