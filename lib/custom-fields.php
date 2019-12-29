<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5dd601e272931',
	'title' => 'Category Fields',
	'fields' => array(
		array(
			'key' => 'field_5dd6021f9ec7b',
			'label' => 'Color',
			'name' => 'color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'all',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5ddadec710989',
	'title' => 'Home Options',
	'fields' => array(
		array(
			'key' => 'field_5ddadedcfd794',
			'label' => 'Post Lists',
			'name' => 'show_post_list',
			'type' => 'true_false',
			'instructions' => 'Show or hide generic post list on homepage.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Display Generic Post List on Homepage?',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-home',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5dd855317b713',
	'title' => 'Menu Item Fields',
	'fields' => array(
		array(
			'key' => 'field_5dd855441cca0',
			'label' => 'Menu Item Color',
			'name' => 'color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5ddb14d4ed2af',
			'label' => 'Show Dropdown',
			'name' => 'show_dropdown',
			'type' => 'true_false',
			'instructions' => 'Select checkbox to show children in a dropdown.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Show children as dropdown?',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'nav_menu_item',
				'operator' => '==',
				'value' => 'all',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5e068870e3183',
	'title' => 'Newsletter Options',
	'fields' => array(
		array(
			'key' => 'field_5e0688827a1a0',
			'label' => 'Titulo',
			'name' => 'form_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Mantente Informado',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-general-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5e068870e3183',
	'title' => 'Contact Info',
	'fields' => array(
		array(
			'key' => 'field_5e06b0c28e55f',
			'label' => 'Contact Email',
			'name' => 'contact_email',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'service@noticiasya.com',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_5e06b0ed9650e',
			'label' => 'Contact Telephone',
			'name' => 'contact_telephone',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '(213) 247-4523',
			'placeholder' => '(213) 247-4523',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5e06b11890510',
			'label' => 'Hours of Operation',
			'name' => 'hours_of_operation',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'M – F, 9:00 AM – 5:00 PM PST',
			'placeholder' => 'M – F, 9:00 AM – 5:00 PM PST',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-general-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_footer_right_5e0688827a1a0',
	'title' => 'Footer Right',
	'fields' => array(
		array(
			'key' => 'field_footer_right_title',
			'label' => 'Titulo',
			'name' => 'footer_right_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Mantente Informado',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-footer',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));


acf_add_local_field_group(array(
	'key' => 'group_5e06c107171ed',
	'title' => 'Social Media',
	'fields' => array(
		array(
			'key' => 'field_5e06c1071a50d',
			'label' => 'Social Links',
			'name' => 'social_links',
			'type' => 'repeater',
			'instructions' => 'Add Social Links',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5e06c4dadd222',
			'min' => 4,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Social Link',
      'default_value' => array(
          array(
              'field_5e06c4dadd222' => 'Facebook',
              'field_5e06c4eadd223' => 'My content',
          ),
          array(
              'field_5e06c4dadd222' => 'Instagram',
              'field_5e06c4eadd223' => 'My content',
          ),
          array(
              'field_5e06c4dadd222' => 'My title',
              'field_5e06c4eadd223' => 'My content',
          ),
          array(
              'field_5e06c4dadd222' => 'My title',
              'field_5e06c4eadd223' => 'My content',
          ),
      ),
			'sub_fields' => array(
				array(
					'key' => 'field_5e06c4dadd222',
					'label' => 'Name',
					'name' => 'name',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
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
					'key' => 'field_5e06c4eadd223',
					'label' => 'Url',
					'name' => 'url',
					'type' => 'url',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-general-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
