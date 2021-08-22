<?php

acf_add_local_field_group( array(
	'key'                   => 'group_5e162dfc79f45',
	'title'                 => 'FAQ',
	'fields'                => array(
        array(
			'key' => 'field_5e3d84b12d1aa',
			'label' => 'Text intro',
			'name' => 'text_intro',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key'               => 'field_5e162e034abc2',
			'label'             => 'FAQs',
			'name'              => 'faqs',
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
			'button_label'      => 'Block hinzufügen',
			'sub_fields'        => array(
				array(
					'key'               => 'field_5e162e144abc3',
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
				'value'    => 'faq.php',
			),
		),
	),
	'menu_order'            => 0,
	'position'              => 'normal',
	'style'                 => 'default',
	'label_placement'       => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
	),
	'active'                => true,
	'description'           => '',
) );
