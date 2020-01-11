<?php

acf_add_local_field_group( array(
	'key'                   => 'group_5e062dfc79f45',
	'title'                 => 'Content',
	'fields'                => array(
		array(
			'key'               => 'field_5e062e034abc2',
			'label'             => 'Aufklapbare Elemente',
			'name'              => 'elements',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'collapsed'         => '',
			'min'               => 0,
			'max'               => 0,
			'layout'            => 'block',
			'button_label'      => 'Element hinzufügen',
			'sub_fields'        => array(
				array(
					'key'               => 'field_5e062e144abc3',
					'label'             => 'Clone',
					'name'              => 'clone',
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
			),
		),
		array(
			'key'               => 'field_5ccae01e0b11a',
			'label'             => 'More Content',
			'name'              => 'more-content',
			'type'              => 'wysiwyg',
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
		),
	),
	'location'              => array(
		array(
			array(
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'content.php',
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
