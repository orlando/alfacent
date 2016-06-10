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
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function initialize_form(){
		return array(
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

			'fonts' => array(
				'type' => 'section',
				'label' => __( 'Fonts setting', 'hashcore-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'font' => array(
						'type' => 'font',
						'label' => __( 'Font', 'hashcore-widgets-bundle' ),
						'default' => 'default',
					),
					'h1_options' => array(
						'type' => 'section',
						'label' => __( 'H1', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '2em',
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
						),
					),

					'h2_options' => array(
						'type' => 'section',
						'label' => __( 'H2', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '1.8em',
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
						),
					),

					'h3_options' => array(
						'type' => 'section',
						'label' => __( 'H3', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '1.6em',
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
						),
					),

					'h4_options' => array(
						'type' => 'section',
						'label' => __( 'H4', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '1.4em',
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
						),
					),

					'h5_options' => array(
						'type' => 'section',
						'label' => __( 'H5', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '1.2em',
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
						),
					),

					'h6_options' => array(
						'type' => 'section',
						'label' => __( 'h6', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '1em',
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
						),
					),

					'p_options' => array(
						'type' => 'section',
						'label' => __( 'Paragraphs', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '.9em',
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
						),
					),
				),
			),
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

		return 'editor';
	}

	function get_less_variables( $instance ) {
		$less_vars = array();

		$fonts = $instance['fonts'];
		$styleable_text_fields = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p' );

		if ( ! empty( $fonts['font'] ) ) {
			$font = hashcore_widget_get_font( $fonts['font'] );
			$less_vars['font'] = $font['family'];
		}

		foreach ( $styleable_text_fields as $field_name ) {

			if ( ! empty( $fonts[$field_name.'_options'] ) ) {
				$styles = $fonts[$field_name.'_options'];
				$less_vars[$field_name.'_size'] = $styles['size'];
				$less_vars[$field_name.'_font_weight'] = $styles['weight'];
			}
		}

		return $less_vars;
	}
}

hashcore_widget_register( 'sow-editor', __FILE__, 'HashCore_Widget_Editor_Widget' );
