<?php
/*
Widget Name: Button
Description: A powerful yet simple button widget for your sidebars or Page Builder pages.
Author:
Author URI: https://
*/

class HashCore_Widget_Button_Widget extends HashCore_Widget {
	function __construct() {

		parent::__construct(
			'sow-button',
			__('HashCore Button', 'hashcore-widgets-bundle'),
			array(
				'description' => __('A customizable button widget.', 'hashcore-widgets-bundle'),
				'help' => 'https:///widgets-bundle/button-widget-documentation/'
			),
			array(

			),
			array(
				'text' => array(
					'type' => 'text',
					'label' => __('Button text', 'hashcore-widgets-bundle'),
				),

				'url' => array(
					'type' => 'link',
					'label' => __('Destination URL', 'hashcore-widgets-bundle'),
				),

				'new_window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('Open in a new window', 'hashcore-widgets-bundle'),
				),

				'button_icon' => array(
					'type' => 'section',
					'label' => __('Icon', 'hashcore-widgets-bundle'),
					'fields' => array(
						'icon_selected' => array(
							'type' => 'icon',
							'label' => __('Icon', 'hashcore-widgets-bundle'),
						),

						'icon_color' => array(
							'type' => 'color',
							'label' => __('Icon color', 'hashcore-widgets-bundle'),
						),

						'icon' => array(
							'type' => 'media',
							'label' => __('Image icon', 'hashcore-widgets-bundle'),
							'description' => __('Replaces the icon with your own image icon.', 'hashcore-widgets-bundle'),
						),
					),
				),

				'design' => array(
					'type' => 'section',
					'label' => __('Design and layout', 'hashcore-widgets-bundle'),
					'hide' => true,
					'fields' => array(
						'align' => array(
							'type' => 'select',
							'label' => __('Align', 'hashcore-widgets-bundle'),
							'default' => 'center',
							'options' => array(
								'left' => __('Left', 'hashcore-widgets-bundle'),
								'right' => __('Right', 'hashcore-widgets-bundle'),
								'center' => __('Center', 'hashcore-widgets-bundle'),
								'justify' => __('Justify', 'hashcore-widgets-bundle'),
							),
						),

						'theme' => array(
							'type' => 'select',
							'label' => __('Button theme', 'hashcore-widgets-bundle'),
							'default' => 'atom',
							'options' => array(
								'atom' => __('Atom', 'hashcore-widgets-bundle'),
								'flat' => __('Flat', 'hashcore-widgets-bundle'),
								'wire' => __('Wire', 'hashcore-widgets-bundle'),
							),
						),


						'button_color' => array(
							'type' => 'color',
							'label' => __('Button color', 'hashcore-widgets-bundle'),
						),

						'text_color' => array(
							'type' => 'color',
							'label' => __('Text color', 'hashcore-widgets-bundle'),
						),

						'hover' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => __('Use hover effects', 'hashcore-widgets-bundle'),
						),

						'font_size' => array(
							'type' => 'select',
							'label' => __('Font size', 'hashcore-widgets-bundle'),
							'options' => array(
								'1' => __('Normal', 'hashcore-widgets-bundle'),
								'1.15' => __('Medium', 'hashcore-widgets-bundle'),
								'1.3' => __('Large', 'hashcore-widgets-bundle'),
								'1.45' => __('Extra large', 'hashcore-widgets-bundle'),
							),
						),

						'rounding' => array(
							'type' => 'select',
							'label' => __('Rounding', 'hashcore-widgets-bundle'),
							'default' => '0.25',
							'options' => array(
								'0' => __('None', 'hashcore-widgets-bundle'),
								'0.25' => __('Slightly rounded', 'hashcore-widgets-bundle'),
								'0.5' => __('Very rounded', 'hashcore-widgets-bundle'),
								'1.5' => __('Completely rounded', 'hashcore-widgets-bundle'),
							),
						),

						'padding' => array(
							'type' => 'select',
							'label' => __('Padding', 'hashcore-widgets-bundle'),
							'default' => '1',
							'options' => array(
								'0.5' => __('Low', 'hashcore-widgets-bundle'),
								'1' => __('Medium', 'hashcore-widgets-bundle'),
								'1.4' => __('High', 'hashcore-widgets-bundle'),
								'1.8' => __('Very high', 'hashcore-widgets-bundle'),
							),
						),

					),
				),

				'attributes' => array(
					'type' => 'section',
					'label' => __('Other attributes and SEO', 'hashcore-widgets-bundle'),
					'hide' => true,
					'fields' => array(
						'id' => array(
							'type' => 'text',
							'label' => __('Button ID', 'hashcore-widgets-bundle'),
							'description' => __('An ID attribute allows you to target this button in Javascript.', 'hashcore-widgets-bundle'),
						),

						'title' => array(
							'type' => 'text',
							'label' => __('Title attribute', 'hashcore-widgets-bundle'),
							'description' => __('Adds a title attribute to the button link.', 'hashcore-widgets-bundle'),
						),

						'onclick' => array(
							'type' => 'text',
							'label' => __('Onclick', 'hashcore-widgets-bundle'),
							'description' => __('Run this Javascript when the button is clicked. Ideal for tracking.', 'hashcore-widgets-bundle'),
						),
					)
				),
			),
			plugin_dir_path(__FILE__)
		);

	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'sow-button-base',
					plugin_dir_url(__FILE__) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				),
			)
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		if(empty($instance['design']['theme'])) return 'atom';
		return $instance['design']['theme'];
	}

	/**
	 * Get the variables that we'll be injecting into the less stylesheet.
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	function get_less_variables($instance){
		if( empty( $instance ) || empty( $instance['design'] ) ) return array();

		return array(
			'button_color' => $instance['design']['button_color'],
			'text_color' => $instance['design']['text_color'],

			'font_size' => $instance['design']['font_size'] . 'em',
			'rounding' => $instance['design']['rounding'] . 'em',
			'padding' => $instance['design']['padding'] . 'em',
			'has_text' => empty( $instance['text'] ) ? 'false' : 'true',
		);
	}

	/**
	 * Make sure the instance is the most up to date version.
	 *
	 * @param $instance
	 *
	 * @return mixed
	 */
	function modify_instance($instance){

		if( empty($instance['button_icon']) ) {
			$instance['button_icon'] = array();

			if(isset($instance['icon_selected'])) $instance['button_icon']['icon_selected'] = $instance['icon_selected'];
			if(isset($instance['icon_color'])) $instance['button_icon']['icon_color'] = $instance['icon_color'];
			if(isset($instance['icon'])) $instance['button_icon']['icon'] = $instance['icon'];

			unset($instance['icon_selected']);
			unset($instance['icon_color']);
			unset($instance['icon']);
		}

		if( empty($instance['design']) ) {
			$instance['design'] = array();

			if(isset($instance['align'])) $instance['design']['align'] = $instance['align'];
			if(isset($instance['theme'])) $instance['design']['theme'] = $instance['theme'];
			if(isset($instance['button_color'])) $instance['design']['button_color'] = $instance['button_color'];
			if(isset($instance['text_color'])) $instance['design']['text_color'] = $instance['text_color'];
			if(isset($instance['hover'])) $instance['design']['hover'] = $instance['hover'];
			if(isset($instance['font_size'])) $instance['design']['font_size'] = $instance['font_size'];
			if(isset($instance['rounding'])) $instance['design']['rounding'] = $instance['rounding'];
			if(isset($instance['padding'])) $instance['design']['padding'] = $instance['padding'];

			unset($instance['align']);
			unset($instance['theme']);
			unset($instance['button_color']);
			unset($instance['text_color']);
			unset($instance['hover']);
			unset($instance['font_size']);
			unset($instance['rounding']);
			unset($instance['padding']);
		}

		if( empty($instance['attributes']) ) {
			$instance['attributes'] = array();
			if(isset($instance['id'])) $instance['attributes']['id'] = $instance['id'];
			unset($instance['id']);
		}

		return $instance;
	}
}

hashcore_widget_register('sow-button', __FILE__, 'HashCore_Widget_Button_Widget');
