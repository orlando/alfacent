<?php
/*
Widget Name: Post Custom
Description: Gives you a widget to display your posts with custom format.
Author: Hashlabs
Author URI: https://
*/

class HashCore_Widget_Post_Custom extends HashCore_Widget {

	function __construct() {
		parent::__construct(
			'hashcore-post-custom',
			__( 'HashCore Post Custom show', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'Display your posts as custom.', 'hashcore-widgets-bundle' ),
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

			'text_size' => array(
				'type' => 'select',
				'label' => __( 'Font size text', 'hashcore-widgets-bundle' ),
				'default' => '1',
				'options' => array(
					'1' => __( 'Normal', 'hashcore-widgets-bundle' ),
					'1.15' => __( 'Medium', 'hashcore-widgets-bundle' ),
					'1.3' => __( 'Large', 'hashcore-widgets-bundle' ),
					'1.45' => __( 'Extra large', 'hashcore-widgets-bundle' ),
				),
			),

			'rounding' => array(
				'type' => 'select',
				'label' => __( 'Rounding container of post', 'hashcore-widgets-bundle' ),
				'default' => '0.25',
				'options' => array(
					'0' => __( 'None', 'hashcore-widgets-bundle' ),
					'.25' => __( 'Slightly rounded', 'hashcore-widgets-bundle' ),
					'.5' => __( 'Very rounded', 'hashcore-widgets-bundle' ),
					'1.5' => __( 'Completely rounded', 'hashcore-widgets-bundle' ),
				),
			),

			'padding' => array(
				'type' => 'select',
				'label' => __( 'Padding between container and text', 'hashcore-widgets-bundle' ),
				'default' => '1',
				'options' => array(
					'.5' => __( 'Low', 'hashcore-widgets-bundle' ),
					'1' => __( 'Medium', 'hashcore-widgets-bundle' ),
					'1.4' => __( 'High', 'hashcore-widgets-bundle' ),
					'1.8' => __( 'Very high', 'hashcore-widgets-bundle' ),
				),
			),

			'title_color' => array(
				'type' => 'color',
				'label' => __( 'Title color', 'hashcore-widgets-bundle' ),
			),

			'text_color' => array(
				'type' => 'color',
				'label' => __( 'Text color', 'hashcore-widgets-bundle' ),
			),

			'text_weight' => array(
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

			'post_background' => array(
				'type' => 'color',
				'label' => __( 'Background color', 'hashcore-widgets-bundle' ),
			),

			'opacity' => array(
				'label' => __( 'Background image opacity', 'hashcore-widgets-bundle' ),
				'type' => 'slider',
				'min' => 1,
				'max' => 100,
				'default' => 100,
			),
		);
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	// function get_style_name( $instance ) {
	// 	return false;
	// }

	function get_less_variables( $instance) {
		return array(
			'font_size' => $instance['font_size'] . 'em',
			'text_size' => $instance['text_size'] . 'em',
			'rounding' => $instance['rounding'] . 'em',
			'padding' => $instance['padding'] . 'em',
			'text_color' => ! empty( $instance['text_color'] ) ? $instance['text_color'] : '#444444',
			'title_color' => ! empty( $instance['title_color'] ) ? $instance['title_color'] : '#444444',
			'post_background' => ! empty( $instance['post_background'] ) ? $instance['post_background'] : 'transparent',
			'opacity' => $instance['opacity'],
			'text_weight' => $instance['text_weight'],
		);
	}
}

hashcore_widget_register( 'hashcore-post-custom', __FILE__, 'HashCore_Widget_Post_Custom' );
