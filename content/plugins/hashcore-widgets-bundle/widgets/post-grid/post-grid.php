<?php
/*
Widget Name: Post in a Grid
Description: Display your posts in a grid.
Author: Hashlabs
Author URI: https://
*/

class HashCore_Widget_Post_Grid extends HashCore_Widget {

	function __construct() {
		parent::__construct(
			'hashcore-post-grid',
			__( 'HashCore Post Grid', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'Display your posts in a grid.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			false ,
			plugin_dir_path( __FILE__ ).'../'
		);
	}

	function initialize_form(){
		return array(
			'title' => array(
				'type' => 'text',
				'label' => __( 'Title', 'hashcore-widgets-bundle' ),
			),

			'posts' => array(
				'type' => 'posts',
				'label' => __( 'Posts query', 'hashcore-widgets-bundle' ),
			),

			'settings' => array(
				'type' => 'section',
				'label' => __( 'Setting', 'hashcore-widgets-bundle' ),
				'hide' => false,
				'fields' => array(
					'title_options' => array(
						'type' => 'section',
						'label' => __( 'Title setting', 'hashcore-widgets-bundle' ),
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
								'default' => '1.3em',
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
							'position' => array(
								'type' => 'select',
								'label' => __( 'Title position button', 'hashcore-widgets-bundle' ),
								'default' => 'below',
								'options' => array(
									'hidden' => __( 'Hidden', 'hashcore-widgets-bundle' ),
									'above' => __( 'Above', 'hashcore-widgets-bundle' ),
									'below' => __( 'Below', 'hashcore-widgets-bundle' ),
								),
							),

						), // Fileds.
					), // Tittle option.

					'description_options' => array(
						'type' => 'section',
						'label' => __( 'Description Options', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'length' => array(
								'type' => 'number',
								'label' => __( 'Number of characters for description', 'widget-form-fields-text-domain' ),
								'default' => '60',
							),
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
							'hover' => array(
								'type' => 'checkbox',
								'default' => false,
								'label' => __( 'Show description only in hover', 'hashcore-widgets-bundle' ),
							),

						), // Filds of description
					), // Description Option.

					'container_options' => array(
						'type' => 'section',
						'label' => __( 'Container Options', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'rounding' => array(
								'type' => 'select',
								'label' => __( 'Rounding image of post', 'hashcore-widgets-bundle' ),
								'default' => '0.25',
								'options' => array(
									'0' => __( 'None', 'hashcore-widgets-bundle' ),
									'.25' => __( 'Slightly rounded', 'hashcore-widgets-bundle' ),
									'.5' => __( 'Very rounded', 'hashcore-widgets-bundle' ),
									'1.5' => __( 'Completely rounded', 'hashcore-widgets-bundle' ),
								),
							),
							'gutter' => array(
								'type' => 'select',
								'label' => __( 'Padding between container and text', 'hashcore-widgets-bundle' ),
								'default' => '.5',
								'options' => array(
									'0' => __( 'None', 'hashcore-widgets-bundle' ),
									'.2' => __( 'Low', 'hashcore-widgets-bundle' ),
									'.5' => __( 'Medium', 'hashcore-widgets-bundle' ),
									'.8' => __( 'High', 'hashcore-widgets-bundle' ),
									'1' => __( 'Very high', 'hashcore-widgets-bundle' ),
								),
							),
							'background' => array(
								'type' => 'color',
								'label' => __( 'Background color for title and description', 'hashcore-widgets-bundle' ),
							),

							'opacity' => array(
								'label' => __( 'Opacity of background', 'hashcore-widgets-bundle' ),
								'type' => 'slider',
								'min' => 1,
								'max' => 100,
								'default' => 100,
							),

						), // Filds od Container
					), // Container Option.

					'grid_options' => array(
						'type' => 'section',
						'label' => __( 'Grid Options', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'desktop' => array(
								'label' => __( 'Opacity of background', 'hashcore-widgets-bundle' ),
								'type' => 'slider',
								'min' => 1,
								'max' => 8,
								'default' => 5,
							),
							'tablet' => array(
								'label' => __( 'Opacity of background', 'hashcore-widgets-bundle' ),
								'type' => 'slider',
								'min' => 1,
								'max' => 6,
								'default' => 3,
							),
							'mobile' => array(
								'label' => __( 'Opacity of background', 'hashcore-widgets-bundle' ),
								'type' => 'slider',
								'min' => 1,
								'max' => 4,
								'default' => 2,
							),
							'hide' => array(
								'type' => 'checkbox',
								'default' => false,
								'label' => __( 'Show only the number of items specified for each view  ', 'hashcore-widgets-bundle' ),
							),

						), // Filds od Container
					), // Container Option.

				), // Filds of settings.
			), // Settings.

		);
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return 'post-grid';
	}

	function get_less_variables( $instance) {
		$less_vars = array();

		$settings = $instance['settings'];
		$styleable_fields = array( 'title', 'description' );
		$styleable_fields_option = array( 'size', 'color', 'weight', 'align' );
		$container = $settings['container_options'];
		$container_option = array( 'rounding', 'gutter', 'background', 'opacity' );
		$grid = $settings['grid_options'];
		$grid_option = array( 'desktop', 'tablet', 'mobile' );

		$less_vars['title_position'] = $settings['title_options']['position'];
		$less_vars['description_length'] = $settings['description_options']['length'];
		$less_vars['description_hover'] = ! empty( $settings['description_options']['hover'] ) ? 1 : 0;

		foreach ( $container_option as $option_name ) {
			$less_vars['container_'.$option_name] = $container[$option_name];
		}

		$less_vars['container_rounding'] = $less_vars['container_rounding'] . 'em';
		$less_vars['container_gutter'] = $less_vars['container_gutter'] . 'em';

		foreach ( $grid_option as $option_name ) {
			$less_vars['grid_'.$option_name] = $grid[$option_name];
		}

		foreach ( $styleable_fields as $field_name ) {
			$styles = $settings[$field_name.'_options'];

			foreach ( $styleable_fields_option as $option_name ) {
				$less_vars[$field_name.'_'.$option_name] = $styles[$option_name];
			}

			if ( ! empty( $styles['font'] ) ) {
				$font = hashcore_widget_get_font( $styles['font'] );
				$less_vars[$field_name.'_font'] = $font['family'];
			}
		}

		return $less_vars;
	}
}

hashcore_widget_register( 'hashcore-post-grid', __FILE__, 'HashCore_Widget_Post_Grid' );
