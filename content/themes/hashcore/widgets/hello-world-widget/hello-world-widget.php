<?php
/**
 * Widget Name: Hello world widget
 * Description: An example widget which displays 'Hello world!'.
 * Author: Me
 * Author URI: http://example.com
 * Widget URI: http://example.com/hello-world-widget-docs,
 * Video URI: http://example.com/hello-world-widget-video
 *
 * @package Hascore
 */

class HashCore_Hello_World_Widget extends HashCore_Widget {
	function __construct() {
		// Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		// Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'hello-world-widget',
			// The name of the widget for display purposes.
			__( 'Hello World Widget', 'hashcore' ),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __( 'A hello world widget.', 'hashcore' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
				'help'				=> 'http://example.com/hello-world-widget-docs',
			),
			// The $control_options array, which is passed through to WP_Widget.
			array(),
			// The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'text' => array(
					'type' => 'text',
					'label' => __( 'Hello world! goes here.', 'hashcore' ),
					'default' => 'Hello world!',
				),
			),
			// The $base_folder path string.
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'hello-world-template';
	}

	function get_template_dir( $instance ) {
		return 'hw-templates';
	}
}
hashcore_widget_register( 'hello-world-widget', __FILE__, 'HashCore_Hello_World_Widget' );
