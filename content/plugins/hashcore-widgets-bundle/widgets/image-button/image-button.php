<?php
/*
Widget Name: Image with Button
Description: A very simple image widget.
Author: hashlabs
Author URI: https://
*/

class HashCore_Image_Button_Widget extends HashCore_Widget {
	function __construct() {
		parent::__construct(
			'hashcore-image-button',
			__( 'HashCore Image with Button', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'A simple image widget with overlapping button.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			array(
				'image' => array(
					'type' => 'section',
					'label'  => __( 'Image', 'hashcore-widgets-bundle' ),
					'hide'   => false,
					'fields' => array(
						'image' => array(
							'type' => 'media',
							'label' => __( 'Image file', 'hashcore-widgets-bundle' ),
							'library' => 'image',
							'fallback' => true,
						),

						'size' => array(
							'type' => 'select',
							'label' => __( 'Image size', 'hashcore-widgets-bundle' ),
							'options' => array(
								'full' => __( 'Full', 'hashcore-widgets-bundle' ),
								'large' => __( 'Large', 'hashcore-widgets-bundle' ),
								'medium' => __( 'Medium', 'hashcore-widgets-bundle' ),
								'thumb' => __( 'Thumbnail', 'hashcore-widgets-bundle' ),
							),
						),

						'align' => array(
							'type' => 'select',
							'label' => __( 'Image alignment', 'hashcore-widgets-bundle' ),
							'default' => 'default',
							'options' => array(
								'default' => __( 'Default', 'hashcore-widgets-bundle' ),
								'left' => __( 'Left', 'hashcore-widgets-bundle' ),
								'right' => __( 'Right', 'hashcore-widgets-bundle' ),
								'center' => __( 'Center', 'hashcore-widgets-bundle' ),
							),
						),

						'title' => array(
							'type' => 'text',
							'label' => __( 'Title text button', 'hashcore-widgets-bundle' ),
						),

						'description' => array(
							'type' => 'text',
							'label' => __( 'Description of title', 'hashcore-widgets-bundle' ),
						),

						'hover_description' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Show description only in hover', 'hashcore-widgets-bundle' ),
						),

						'title_position' => array(
							'type' => 'select',
							'label' => __( 'Title position button', 'hashcore-widgets-bundle' ),
							'default' => 'hidden',
							'options' => array(
								'hidden' => __( 'Hidden', 'hashcore-widgets-bundle' ),
								'above' => __( 'Above', 'hashcore-widgets-bundle' ),
								'below' => __( 'Below', 'hashcore-widgets-bundle' ),
							),
						),

						'title_size' => array(
							'type' => 'select',
							'label' => __( 'Title font size', 'hashcore-widgets-bundle' ),
							'default' => '1.5em',
							'options' => array(
								'1.5em' => __( 'Normal', 'hashcore-widgets-bundle' ),
								'2em' => __( 'Medium', 'hashcore-widgets-bundle' ),
								'2.5em' => __( 'Large', 'hashcore-widgets-bundle' ),
								'3em' => __( 'Extra large', 'hashcore-widgets-bundle' ),
							),
						),

						'description_size' => array(
							'type' => 'select',
							'label' => __( 'Description font size', 'hashcore-widgets-bundle' ),
							'default' => '1em',
							'options' => array(
								'1em' => __( 'Normal', 'hashcore-widgets-bundle' ),
								'1.3em' => __( 'Medium', 'hashcore-widgets-bundle' ),
								'1.6em' => __( 'Large', 'hashcore-widgets-bundle' ),
								'2em' => __( 'Extra large', 'hashcore-widgets-bundle' ),
							),
						),

						'title_color' => array(
							'type' => 'color',
							'label' => __( 'Title text color', 'hashcore-widgets-bundle' ),
						),

						'background_color' => array(
							'type' => 'color',
							'label' => __( 'Title background color', 'hashcore-widgets-bundle' ),
						),

						'opacity' => array(
							'label' => __( 'Background image opacity', 'hashcore-widgets-bundle' ),
							'type' => 'slider',
							'min' => 0,
							'max' => 100,
							'default' => 80,
						),

						'alt' => array(
							'type' => 'text',
							'label' => __( 'Alt text', 'hashcore-widgets-bundle' ),
						),

						'url' => array(
							'type' => 'link',
							'label' => __( 'Destination URL', 'hashcore-widgets-bundle' ),
						),

						'new_window' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Open in new window', 'hashcore-widgets-bundle' ),
						),

						'bound' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => __( 'Bound', 'hashcore-widgets-bundle' ),
							'description' => __( "Make sure the image doesn't extend beyond its container.", 'hashcore-widgets-bundle' ),
						),

						'full_width' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Full Width', 'hashcore-widgets-bundle' ),
							'description' => __( 'Resize image to fit its container.', 'hashcore-widgets-bundle' ),
						),
					),
				),
			),
			plugin_dir_path( __FILE__ ).'../'
		);
	}

	function get_style_hash( $instance ) {
		return substr( md5( serialize( $this->get_less_variables( $instance ) ) ), 0, 12 );
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	public function get_template_variables( $instance, $args ) {
		return array(
			'title' => $instance['image']['title'],
			'title_position' => $instance['image']['title_position'],
			'description' => $instance['image']['description'],
			'image' => $instance['image']['image'],
			'size' => $instance['image']['size'],
			'image_fallback' => ! empty( $instance['image']['image_fallback'] ) ? $instance['image']['image_fallback'] : false,
			'alt' => $instance['image']['alt'],
			'url' => $instance['image']['url'],
			'new_window' => $instance['image']['new_window'],
		);
	}

	function get_style_name( $instance) {
		return 'image-button';
	}

	function get_less_variables( $instance) {
		return array(
			'image_alignment' => $instance['image']['align'],
			'image_display' => $instance['image']['align'] === 'default' ? 'block' : 'inline-block',
			'image_max_width' => ! empty( $instance['image']['bound'] ) ? '100%' : '',
			'image_height' => ! empty( $instance['image']['bound'] ) ? 'auto' : '',
			'image_width' => ! empty( $instance['image']['full_width'] ) ? '100%' : '',
			'title_position' => $instance['image']['title_position'],
			'title_color' => ! empty( $instance['image']['title_color'] ) ? $instance['image']['title_color'] : '#ffffff',
			'title_size' => $instance['image']['title_size'],
			'description_size' => $instance['image']['description_size'],
			'background_color' => ! empty( $instance['image']['background_color'] ) ? $instance['image']['background_color'] : 'transparent',
			'opacity' => $instance['image']['opacity'],
			'hover_description' => $instance['image']['hover_description'],

		);
	}
}

hashcore_widget_register( 'hashcore-image-button', __FILE__, 'HashCore_Image_Button_Widget' );
