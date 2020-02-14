<?php
if ( function_exists( 'acf_add_local_field_group' ) ):

	acf_add_local_field_group( array(
		'key'                   => 'group_5e443fb80dbaa',
		'title'                 => 'Uns Helfen Page',
		'fields'                => array(
			array(
				'key'               => 'field_5e443fc05edff',
				'label'             => 'Content 2',
				'name'              => 'content_2',
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
				'tabs'              => 'all',
				'toolbar'           => 'full',
				'media_upload'      => 1,
				'delay'             => 0,
			),
			array(
				'key'               => 'field_5e44401415548',
				'label'             => 'Collapse',
				'name'              => 'collapse',
				'type'              => 'clone',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'clone'             => array(
					0 => 'group_5e16225f53617',
				),
				'display'           => 'seamless',
				'layout'            => 'block',
				'prefix_label'      => 0,
				'prefix_name'       => 0,
			),
			array(
				'key'               => 'field_5e44427eb6535',
				'label'             => 'Content 3',
				'name'              => 'content_3',
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
				'tabs'              => 'all',
				'toolbar'           => 'full',
				'media_upload'      => 1,
				'delay'             => 0,
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'uns-helfen.php',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
	) );

endif;