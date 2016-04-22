<?php
/**
 * Name: Hashcore Spacer
 * Description: Spacer.
 * Author:
 * URI: http://
 */

class HashCore_Widget_Spacer extends HashCore_Widget {
	function __construct() {
		parent::__construct(
			'hashcore-spacer',
			__( 'Spacer', 'spacer-text-domain' ),
			array(
				'description' => __( 'Spacer.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			array(
				'widget_title' => array(
						'type' => 'text',
						'label' => __( 'Widget Title.', 'hashcore-widgets-bundle' ),
						'default' => '',
				),

				'spacer' => array(
						'type' => 'slider',
						'label' => __( 'Set Height', 'hashcore-widgets-bundle' ),
						'default' => 3,
						'min' => 20,
						'max' => 500,
						'integer' => true,
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'spacer-template';
	}

	function get_style_name( $instance ) {
		return 'spacer-style';
	}
}

hashcore_widget_register( 'hashcore-spacer', __FILE__, 'HashCore_Widget_Spacer' );
