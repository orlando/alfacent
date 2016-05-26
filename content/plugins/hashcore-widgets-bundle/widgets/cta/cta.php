<?php
/*
Widget Name: Call-To-Action
Description: A simple call-to-action widget. You can do what ever you want with a call-to-action widget.
Author:
Author URI: https://
*/

class HashCore_Widget_Cta_Widget extends HashCore_Widget {

	function __construct() {

		parent::__construct(
			'sow-cta',
			__('HashCore Call-to-action', 'hashcore-widgets-bundle'),
			array(
				'description' => __('A simple call-to-action widget with massive power.', 'hashcore-widgets-bundle'),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
				'help' => 'https:///widgets-bundle/call-action-widget/'
			),
			array(

			),
			false ,
			plugin_dir_path(__FILE__)
		);
	}

	/**
	 * Initialize the CTA widget
	 */
	function initialize(){
		// This widget requires the button widget
		if( !class_exists('HashCore_Widget_Button_Widget') ) {
			HashCore_Widgets_Bundle::single()->include_widget( 'button' );
		}
		$this->register_frontend_styles(
			array(
				array(
					'sow-cta-main',
					plugin_dir_url(__FILE__) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
		$this->register_frontend_scripts(
			array(
				array(
					'sow-cta-main',
					plugin_dir_url(__FILE__) . 'js/cta' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' ),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	function initialize_form(){
		return array(

			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'hashcore-widgets-bundle'),
			),

			'sub_title' => array(
				'type' => 'text',
				'label' => __('Subtitle', 'hashcore-widgets-bundle')
			),

			'design' => array(
				'type' => 'section',
				'label' => __('Design', 'hashcore-widgets-bundle'),
				'fields' => array(
					'background_color' => array(
						'type' => 'color',
						'label' => __('Background color', 'hashcore-widgets-bundle'),
					),
					'border_color' => array(
						'type' => 'color',
						'label' => __('Border color', 'hashcore-widgets-bundle'),
					),
					'title_color' => array(
						'type' => 'color',
						'label' => __('Title color', 'hashcore-widgets-bundle'),
					),
					'sub_title_color' => array(
						'type' => 'color',
						'label' => __('Sub title color', 'hashcore-widgets-bundle'),
					),
					'font_size' => array(
						'type' => 'select',
						'label' => __( 'Font size title', 'hashcore-widgets-bundle' ),
						'default' => '2',
						'options' => array(
							'1.5' => __( 'Normal', 'hashcore-widgets-bundle' ),
							'2' => __( 'Medium', 'hashcore-widgets-bundle' ),
							'2.5' => __( 'Large', 'hashcore-widgets-bundle' ),
							'3' => __( 'Extra large', 'hashcore-widgets-bundle' ),
						),
					),
					'padding_top' => array(
						'type' => 'select',
						'label' => __( 'Padding top/bottom', 'hashcore-widgets-bundle' ),
						'default' => '0',
						'options' => array(
							'0' => __( 'None', 'hashcore-widgets-bundle' ),
							'.5' => __( 'Tiny', 'hashcore-widgets-bundle' ),
							'1' => __( 'Small', 'hashcore-widgets-bundle' ),
							'1.5' => __( 'Normal', 'hashcore-widgets-bundle' ),
							'2' => __( 'Medium', 'hashcore-widgets-bundle' ),
							'2.5' => __( 'Large', 'hashcore-widgets-bundle' ),
							'3' => __( 'Extra large', 'hashcore-widgets-bundle' ),
						),
					),
					'padding_side' => array(
						'type' => 'select',
						'label' => __( 'Padding left/right', 'hashcore-widgets-bundle' ),
						'default' => '0',
						'options' => array(
							'0' => __( 'None', 'hashcore-widgets-bundle' ),
							'.5' => __( 'Tiny', 'hashcore-widgets-bundle' ),
							'1' => __( 'Small', 'hashcore-widgets-bundle' ),
							'1.5' => __( 'Normal', 'hashcore-widgets-bundle' ),
							'2' => __( 'Medium', 'hashcore-widgets-bundle' ),
							'2.5' => __( 'Large', 'hashcore-widgets-bundle' ),
							'3' => __( 'Extra large', 'hashcore-widgets-bundle' ),
						),
					),
					'button_align' => array(
						'type' => 'select',
						'label' => __( 'Button align', 'hashcore-widgets-bundle' ),
						'default' => 'right',
						'options' => array(
							'left' => __( 'Left', 'hashcore-widgets-bundle'),
							'right' => __( 'Right', 'hashcore-widgets-bundle'),
						)
					)
				)
			),

			'button' => array(
				'type' => 'widget',
				'class' => 'HashCore_Widget_Button_Widget',
				'label' => __('Button', 'hashcore-widgets-bundle'),
			),
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return 'basic';
	}

	function get_less_variables($instance) {
		if( empty( $instance ) ) return array();

		return array(
			'border_color' => ! empty( $instance['design']['border_color'] ) ? $instance['design']['border_color'] : 'transparent',
			'background_color' => ! empty( $instance['design']['background_color'] ) ? $instance['design']['background_color'] : 'transparent',
			'button_align' => $instance['design']['button_align'],
			'title_color' => ! empty( $instance['design']['title_color'] ) ? $instance['design']['title_color'] : '#444444',
			'sub_title_color' => ! empty( $instance['design']['sub_title_color'] ) ? $instance['design']['sub_title_color'] : '#bbbbbb',
			'font_size' => $instance['design']['font_size'] . 'em',
			'padding_top' => $instance['design']['padding_top'] . 'em',
			'padding_side' => $instance['design']['padding_side'] . 'em',
		);
	}

	function modify_child_widget_form($child_widget_form, $child_widget) {
		unset( $child_widget_form['design']['fields']['align'] );
		return $child_widget_form;
	}

}

hashcore_widget_register('sow-cta', __FILE__, 'HashCore_Widget_Cta_Widget');
