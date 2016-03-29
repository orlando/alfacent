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
				'help' => 'https:///widgets-bundle/call-action-widget/'
			),
			array(

			),
			array(

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

			),
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

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return 'basic';
	}

	function get_less_variables($instance) {
		if( empty( $instance ) ) return array();

		return array(
			'border_color' => $instance['design']['border_color'],
			'background_color' => $instance['design']['background_color'],
			'button_align' => $instance['design']['button_align'],
		);
	}

	function modify_child_widget_form($child_widget_form, $child_widget) {
		unset( $child_widget_form['design']['fields']['align'] );
		return $child_widget_form;
	}

}

hashcore_widget_register('sow-cta', __FILE__, 'HashCore_Widget_Cta_Widget');
