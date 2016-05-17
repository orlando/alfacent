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
							'label' => __( 'Title text', 'hashcore-widgets-bundle' ),
						),

						'title_position' => array(
							'type' => 'select',
							'label' => __( 'Title position', 'hashcore-widgets-bundle' ),
							'default' => 'hidden',
							'options' => array(
								'hidden' => __( 'Hidden', 'hashcore-widgets-bundle' ),
								'above' => __( 'Above', 'hashcore-widgets-bundle' ),
								'below' => __( 'Below', 'hashcore-widgets-bundle' ),
							),
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
				'button' => array(
					'type' => 'section',
					'label'  => __( 'Button', 'hashcore-widgets-bundle' ),
					'hide'   => true,
					'fields' => array(
						'text' => array(
							'type' => 'text',
							'label' => __('Text', 'hashcore-widgets-bundle')
						),
					),
				),
			),
			plugin_dir_path( __FILE__ ).'../'
		);
	}

	function modify_form( $form ) {
		global $_wp_additional_image_sizes;
		if ( ! empty( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $i => $s ) {
				$form['size']['options'][$i] = $i;
			}
		}

		return $form;
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
		);
	}
}

hashcore_widget_register( 'hashcore-image-button', __FILE__, 'HashCore_Image_Button_Widget' );
