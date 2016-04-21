<?php

/*
Widget Name: Icon
Description: An iconic icon.
Author:
Author URI: https://
*/

class HashCore_Widget_Icon_Widget extends HashCore_Widget {

	function __construct() {

		parent::__construct(
			'sow-icon',
			__( 'HashCore Icon', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'An icon widget.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			false,
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize_form() {
		return array(
			'icon' => array(
				'type'  => 'icon',
				'label' => __( 'Icon', 'hashcore-widgets-bundle' ),
			),

			'color' => array(
				'type'  => 'color',
				'label' => __( 'Color', 'hashcore-widgets-bundle' ),
			),

			'size' => array(
				'type'  => 'measurement',
				'label' => __( 'Size', 'hashcore-widgets-bundle' ),
			),

			'alignment' => array(
				'type'  => 'select',
				'label' => __( 'Alignment', 'hashcore-widgets-bundle' ),
				'options' => array(
					'center' => __( 'Center', 'hashcore-widgets-bundle' ),
					'left' => __( 'Left', 'hashcore-widgets-bundle' ),
					'right' => __( 'Right', 'hashcore-widgets-bundle' ),
				),
				'default' => 'center',
			),

			'url' => array(
				'type'  => 'link',
				'label' => __( 'Destination URL', 'hashcore-widgets-bundle' ),
			),

			'new_window' => array(
				'type'    => 'checkbox',
				'default' => false,
				'label'   => __( 'Open in a new window', 'hashcore-widgets-bundle' ),
			),
		);
	}

	function get_style_name( $instance ) {
		return 'sow-icon';
	}

	function get_less_variables( $instance ) {
		return array(
			'color'    => $instance['color'],
			'alignment'    => $instance['alignment'],
			'size'     => $instance['size'],
			'has_size' => empty( $instance['size'] ) ? 'false' : 'true',
		);
	}


	/**
	 * Get the template for the headline widget
	 *
	 * @param $instance
	 *
	 * @return mixed|string
	 */
	function get_template_name( $instance ) {
		return 'icon';
	}

	/**
	 * Get the template variables for the headline
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return array
	 */
	function get_template_variables( $instance, $args ) {
		return array(
			'icon' => $instance['icon'],
			'url' => $instance['url'],
			'new_window' => $instance['new_window'],
		);
	}
}

hashcore_widget_register( 'sow-icon', __FILE__, 'HashCore_Widget_Icon_Widget' );
