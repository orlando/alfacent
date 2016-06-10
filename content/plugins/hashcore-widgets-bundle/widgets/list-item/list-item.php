<?php
/*
Widget Name: List Item
Description: Displays a list of item with title.
Author:
Author URI: https://
*/

class HashCore_Widget_List_Item extends HashCore_Widget {
	function __construct() {
		parent::__construct(
			'hashcore-list-item',
			__( 'HashCore List Item', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'Displays a list of item.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			false,
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize_form(){

		return array(
			'description' => array(
				'type' => 'text',
				'label' => __( 'Description of  widget', 'hashcore-widgets-bundle' ),
				'description' => __( 'Only show in page builder.', 'hashcore-widgets-bundle' ),
				'default' => 'Description of widget',
			),

			'list' => array(
				'type' => 'repeater',
				'label' => __( 'Lists', 'hashcore-widgets-bundle' ),
				'item_name' => __( 'List', 'hashcore-widgets-bundle' ),
				'item_label' => array(
					'selector' => "[id*='list-title']",
					'update_event' => 'change',
					'value_method' => 'val',
				),
				'fields' => array(
					'title' => array(
						'type' => 'text',
						'label' => __( 'Title text', 'hashcore-widgets-bundle' ),
					),

					'item' => array(
						'type' => 'repeater',
						'label' => __( 'Items', 'hashcore-widgets-bundle' ),
						'item_name' => __( 'Item', 'hashcore-widgets-bundle' ),
						'item_label' => array(
							'selector' => "[id*='item-text']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'fields' => array(
							'text' => array(
								'type' => 'text',
								'label' => __( 'Text', 'hashcore-widgets-bundle' )
							),
							'url' => array(
				        'type' => 'media',
				        'label' => __( 'Choose a file or write the url', 'hashcore-widgets-bundle' ),
				        'choose' => __( 'Choose file', 'hashcore-widgets-bundle' ),
								'update' => __( 'Set file', 'hashcore-widgets-bundle' ),
								'library' => 'application',
				    	),
							'url_ext' => array(
				        'type' => 'text',
				        'label' => __( 'Link of external file', 'hashcore-widgets-bundle' ),
				        'description' => __( 'Please only external file, "choose file" is first option if both options are set.', 'hashcore-widgets-bundle' ),
								'placeholder' => 'http://www.example.com/file.pdf'
				    	),

						),
					),
				),
			),

			'fonts' => array(
				'type' => 'section',
				'label' => __( 'Fonts setting', 'hashcore-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'title_options' => array(
						'type' => 'section',
						'label' => __( 'Title', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'font' => array(
								'type' => 'font',
								'label' => __( 'Font', 'hashcore-widgets-bundle' ),
								'default' => 'default',
							),
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '1.5em',
							),
							'color' => array(
								'type' => 'color',
								'label' => __( 'Color', 'hashcore-widgets-bundle' ),
								'default' => '#444444',
							),
							'weight' => array(
								'type' => 'select',
								'label' => __( 'Text type', 'hashcore-widgets-bundle' ),
								'default' => '400',
								'options' => array(
									'300' => __( 'lighter', 'hashcore-widgets-bundle' ),
									'400' => __( 'Normal', 'hashcore-widgets-bundle' ),
									'600' => __( 'Bold', 'hashcore-widgets-bundle' ),
									'700' => __( 'Bolder', 'hashcore-widgets-bundle' ),
								),
							),
							'align' => array(
								'type' => 'select',
								'label' => __( 'Align', 'hashcore-widgets-bundle' ),
								'default' => 'center',
								'options' => array(
									'left' => __( 'Left', 'hashcore-widgets-bundle' ),
									'left-center' => __( 'Left and center in mobile', 'hashcore-widgets-bundle' ),
									'right' => __( 'Right', 'hashcore-widgets-bundle' ),
									'right-center' => __( 'right and center in mobile', 'hashcore-widgets-bundle' ),
									'center' => __( 'Center', 'hashcore-widgets-bundle' ),
								),
							),
						),
					),

					'text_options' => array(
						'type' => 'section',
						'label' => __( 'Item text setting', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(

							'font' => array(
								'type' => 'font',
								'label' => __( 'Font', 'hashcore-widgets-bundle' ),
								'default' => 'default',
							),
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '1em',
							),
							'color' => array(
								'type' => 'color',
								'label' => __( 'Color', 'hashcore-widgets-bundle' ),
								'default' => '#444444',
							),
							'weight' => array(
								'type' => 'select',
								'label' => __( 'Text type', 'hashcore-widgets-bundle' ),
								'default' => '400',
								'options' => array(
									'300' => __( 'lighter', 'hashcore-widgets-bundle' ),
									'400' => __( 'Normal', 'hashcore-widgets-bundle' ),
									'600' => __( 'Bold', 'hashcore-widgets-bundle' ),
									'700' => __( 'Bolder', 'hashcore-widgets-bundle' ),
								),
							),
						),
					),

				),
			),

			'icon' => array(
				'type' => 'section',
				'label' => __( 'Icons setting', 'hashcore-widgets-bundle' ),
				'hide' => true,
				'fields' => array(

					'list' => array(
						'type' => 'checkbox',
						'label' => __( 'Show item with bullet', 'hashcore-widgets-bundle' ),
						'default' => true,
					),
					'list_color' => array(
						'type' => 'color',
						'label' => __( 'Color of bullet', 'hashcore-widgets-bundle' ),
						'default' => '#444444',
					),
					'download' => array(
						'type' => 'icon',
						'label' => __( 'Icon of download for each item', 'hashcore-widgets-bundle' ),
						'default' => 'fontawesome-arrow-down',
					),
					'download_color' => array(
						'type' => 'color',
						'label' => __( 'Icon of download for each item color', 'hashcore-widgets-bundle' ),
						'default' => '#444444',
					),
					'download_check' => array(
						'type' => 'checkbox',
						'label' => __( 'Show download button', 'hashcore-widgets-bundle' ),
						'default' => true,
					),
					'view' => array(
						'type' => 'icon',
						'label' => __( 'Icon of view for each item', 'hashcore-widgets-bundle' ),
						'default' => 'fontawesome-eye',
					),
					'view_color' => array(
						'type' => 'color',
						'label' => __( 'Icon of view for each item color', 'hashcore-widgets-bundle' ),
						'default' => '#444444',
					),
					'view_check' => array(
						'type' => 'checkbox',
						'label' => __( 'Show view button', 'hashcore-widgets-bundle' ),
						'default' => true,
					),
				),
			),

			'container' => array(
				'type' => 'section',
				'label' => __( 'Container setting', 'hashcore-widgets-bundle' ),
				'hide' => true,
				'fields' => array(

					'width' => array(
						'type' => 'slider',
						'label' => __( 'Choose the width of container', 'hashcore-widgets-bundle' ),
						'default' => 100,
		        'min' => 50,
		        'max' => 100,
		        'integer' => true
					),
					'mobile' => array(
						'type' => 'checkbox',
						'label' => __( 'full width on tablet and mobile', 'hashcore-widgets-bundle' ),
						'default' => true,
					),
				),
			),

		);
	}

	function get_style_name($instance){
		return 'list-item';
	}

	function get_less_variables( $instance ) {
		$less_vars = array();

		$fonts = $instance['fonts'];
		$icons = $instance['icon'];
		$styleable_text_fields = array( 'title', 'text' );
		$styleable_icon = array( 'list', 'list_color', 'download_color', 'view_color' );

		$less_vars['container_width'] = $instance['container']['width'] . '%';
		$less_vars['container_mobile'] = $instance['container']['mobile'];

		foreach ( $styleable_icon as $field_name ) {
			$less_vars['icon_'.$field_name] = $icons[$field_name];
		}

		foreach ( $styleable_text_fields as $field_name ) {

			if ( ! empty( $fonts[$field_name.'_options'] ) ) {
				$styles = $fonts[$field_name.'_options'];
				if ( ! empty( $styles['size'] ) ) {
					$less_vars[$field_name.'_size'] = $styles['size'];
				}
				if ( ! empty( $styles['color'] ) ) {
					$less_vars[$field_name.'_color'] = $styles['color'];
				}
				if ( ! empty( $styles['align'] ) ) {
					$less_vars[$field_name.'_align'] = $styles['align'];
				}
				if ( ! empty( $styles['font'] ) ) {
					$font = hashcore_widget_get_font( $styles['font'] );
					$less_vars[$field_name.'_font'] = $font['family'];
					if ( ! empty( $styles['weight'] ) ) {
						$less_vars[$field_name.'_font_weight'] = $styles['weight'];
					}
				}
			}
		}

		return $less_vars;
	}

	function get_google_font_fields( $instance ) {

		$fonts = $instance['fonts'];

		return array(
			$fonts['title_options']['font'],
			$fonts['text_options']['font'],
		);
	}

	function get_template_name( $instance ) {
		return 'base';
	}
}

hashcore_widget_register('hashcore-list-item', __FILE__, 'HashCore_Widget_List_Item');
