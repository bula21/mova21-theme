<?php

acf_add_local_field_group( array(
	'key'                   => 'group_5e161dfc79f45',
	'title'                 => 'Groupes',
	'fields'                => array(
		array(
			'key'               => 'field_5e161e034abc2',
			'label'             => 'Timeline Items',
			'name'              => 'timeline',
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
			'button_label'      => 'Item hinzufügen',
			'sub_fields'        => array(
				array(
					'key'            => 'bula21_timeline_date',
					'label'          => 'Datum',
					'name'           => 'date',
					'type'           => 'date_picker',
					'display_format' => 'd.m.Y',
					'return_format'  => 'd.m.Y',
					'wrapper'        => array(
						'width' => '20',
						'class' => '',
						'id'    => '',
					),
				),
				array(
					'key'     => 'bula21_timeline_timeline_text',
					'label'   => 'Timeline Text',
					'name'    => 'timeline-text',
					'type'    => 'wysiwyg',
					'wrapper' => array(
						'width' => '60',
						'class' => '',
						'id'    => '',
					),
				),
				array(
					'key'     => 'bula21_timeline_timeline_link',
					'label'   => 'Timeline Link',
					'name'    => 'timeline-link',
					'type'    => 'link',
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id'    => '',
					),
				),
			),
		),
		array(
			'key'     => 'field_5cdae01e0b11a',
			'label'   => 'More Content',
			'name'    => 'more-content',
			'type'    => 'wysiwyg',
			'wrapper' => array(
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
				'value'    => 'groupes.php',
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
