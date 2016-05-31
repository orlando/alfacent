<?php
/*
Widget Name: Image Grid FlexBox
Description: Display a grid of images use FlexBox. Also useful for displaying client logos.
Author:
Author URI: https://
*/

class HashCore_Widgets_ImageGridFlex extends HashCore_Widget {

	function __construct(){

		parent::__construct(
			'hashcore-image-grid-flex',
			__('HashCore Image Grid FlexBox', 'hashcore-widgets-bundle'),
			array(
				'description' => __('Display a grid of images use flexbox.', 'hashcore-widgets-bundle'),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			false,
			plugin_dir_path( __FILE__ )
		);
	}

	function get_style_hash( $instance ) {
		return substr( md5( serialize( $this->get_less_variables( $instance ) ) ), 0, 12 );
	}

	function initialize_form(){
		$intermediate = get_intermediate_image_sizes();
		$sizes = array();
		foreach( $intermediate as $name ) {
			$sizes[$name] = ucwords(preg_replace('/[-_]/', ' ', $name));
		}
		$sizes = array_merge( array( 'full' => __('Full', 'hashcore-widgets-bundle') ), $sizes );

		return array(

			'images' => array(
				'type' => 'repeater',
				'label' => __('Images', 'hashcore-widgets-bundle'),
				'item_name'  => __( 'Image', 'hashcore-widgets-bundle' ),
				'item_label' => array(
					'selector'     => "[name*='title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'label' => __('Image', 'hashcore-widgets-bundle')
					),
					'title' => array(
						'type' => 'text',
						'label' => __('Image title', 'hashcore-widgets-bundle')
					),
					'url' => array(
						'type' => 'link',
						'label' => __('URL', 'hashcore-widgets-bundle')
					),
				)
			),

			'display' => array(
				'type' => 'section',
				'label' => __('Display', 'hashcore-widgets-bundle'),
				'fields' => array(
					'attachment_size' => array(
						'label' => __('Image size', 'hashcore-widgets-bundle'),
						'type' => 'select',
						'options' => $sizes,
						'default' => 'full',
					),

					'spacing_item' => array(
						'type' => 'select',
						'label' => __( 'Align', 'hashcore-widgets-bundle' ),
						'default' => 'space-around',
						'options' => array(
							'flex-start' => __( 'Begin of container', 'hashcore-widgets-bundle' ),
							'flex-end' => __( 'End of container', 'hashcore-widgets-bundle' ),
							'center' => __( 'Center', 'hashcore-widgets-bundle' ),
							'space-between' => __( 'Space Between', 'hashcore-widgets-bundle' ),
							'space-around' => __( 'Space Around', 'hashcore-widgets-bundle' ),
						),
					),

					'column' => array(
						'label' => __( 'Column in mobile view', 'hashcore-widgets-bundle' ),
						'description' => __( 'If you want to display the grid column when mobile view?', 'hashcore-widgets-bundle' ),
						'type' => 'checkbox',
						'default' => true,
					),

					'column_mobile' => array(
						'label' => __( 'Max resolution to show in column', 'hashcore-widgets-bundle' ),
						'description' => __( 'Maximum value of the mobile view .', 'hashcore-widgets-bundle' ),
						'type' => 'number',
						'default' => 767,
					),

					'spacing_x' => array(
						'label' => __( 'Spacing', 'hashcore-widgets-bundle' ),
						'description' => __( 'Amount of spacing horizontally between images .', 'hashcore-widgets-bundle' ),
						'type' => 'number',
						'default' => 10,
					),

					'spacing_y' => array(
						'label' => __( 'Spacing', 'hashcore-widgets-bundle' ),
						'description' => __( 'Amount of spacing vertically between images.', 'hashcore-widgets-bundle' ),
						'type' => 'number',
						'default' => 10,
					),
				)
			)
		);
	}

	/**
	 * Get the less variables for the image grid
	 *
	 * @param $instance
	 *
	 * @return mixed
	 */
	function get_less_variables( $instance ) {
		return array(
			'spacing_x' => $instance['display']['spacing_x'] . 'px',
			'spacing_y' => $instance['display']['spacing_y'] . 'px',
			'spacing_item' => $instance['display']['spacing_item'],
			'column' => ! empty( $instance['display']['column'] ) ? '1' : '0',
			'column_mobile' => $instance['display']['column_mobile'] . 'px',
		);
	}
}

hashcore_widget_register( 'hashcore-image-grid-flex', __FILE__, 'HashCore_Widgets_ImageGridFlex' );
