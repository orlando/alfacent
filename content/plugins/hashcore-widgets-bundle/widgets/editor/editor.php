<?php

/*
Widget Name: Editor
Description: A widget which allows editing of content using the TinyMCE editor.
Author:
Author URI: https://
*/

class HashCore_Widget_Editor_Widget extends HashCore_Widget {

	function __construct() {

		parent::__construct(
			'sow-editor',
			__('HashCore Editor', 'hashcore-widgets-bundle'),
			array(
				'description' => __('A rich-text, text editor.', 'hashcore-widgets-bundle'),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
				'help' => 'https:///widgets-bundle/editor-widget/'
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'hashcore-widgets-bundle'),
				),
				'text' => array(
					'type' => 'tinymce',
					'rows' => 20
				),
				'autop' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => __('Automatically add paragraphs', 'hashcore-widgets-bundle'),
				),
			),
			plugin_dir_path(__FILE__)
		);
	}

	function unwpautop($string) {
		$string = str_replace("<p>", "", $string);
		$string = str_replace(array("<br />", "<br>", "<br/>"), "\n", $string);
		$string = str_replace("</p>", "\n\n", $string);

		return $string;
	}

	public function get_template_variables( $instance, $args ) {
		$instance = wp_parse_args(
			$instance,
			array(  'text' => '' )
		);

		$instance['text'] = $this->unwpautop( $instance['text'] );
		$instance['text'] = apply_filters( 'widget_text', $instance['text'] );

		// Run some known stuff
		if( !empty($GLOBALS['wp_embed']) ) {
			$instance['text'] = $GLOBALS['wp_embed']->autoembed( $instance['text'] );
		}
		if (function_exists('wp_make_content_images_responsive')) {
			$instance['text'] = wp_make_content_images_responsive( $instance['text'] );
		}
		if( $instance['autop'] ) {
			$instance['text'] = wpautop( $instance['text'] );
		}
		$instance['text'] = do_shortcode( shortcode_unautop( $instance['text'] ) );

		return array(
			'text' => $instance['text'],
		);
	}


	function get_template_name($instance) {
		return 'editor';
	}

	function get_style_name($instance) {
		// We're not using a style
		return false;
	}
}

hashcore_widget_register( 'sow-editor', __FILE__, 'HashCore_Widget_Editor_Widget' );