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
			__('HashCore Post Custom show', 'hashcore-widgets-bundle'),
			array(
				'description' => __('Display your posts as custom.', 'hashcore-widgets-bundle'),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(

			),
			false ,
			plugin_dir_path(__FILE__).'../'
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
		);
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}

hashcore_widget_register('hashcore-post-custom', __FILE__, 'HashCore_Widget_Post_Custom');
