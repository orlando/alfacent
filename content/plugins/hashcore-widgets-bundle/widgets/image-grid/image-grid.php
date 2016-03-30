<?php
/*
Widget Name: Image Grid
Description: Display a grid of images. Also useful for displaying client logos.
Author:
Author URI: https://
*/

class HashCore_Widgets_ImageGrid_Widget extends HashCore_Widget {

	function __construct(){

		parent::__construct(
			'sow-image-grid',
			__('HashCore Image Grid', 'hashcore-widgets-bundle'),
			array(
				'description' => __('Display a grid of images.', 'hashcore-widgets-bundle'),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			array(

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
							'options' => array(),
							'default' => 'full',
						),

						'max_height' => array(
							'label' => __('Maximum image height', 'hashcore-widgets-bundle'),
							'type' => 'number',
						),

						'max_width' => array(
							'label' => __('Maximum image width', 'hashcore-widgets-bundle'),
							'type' => 'number',
						),

						'spacing' => array(
							'label' => __('Spacing', 'hashcore-widgets-bundle'),
							'description' => __('Amount of spacing between images.', 'hashcore-widgets-bundle'),
							'type' => 'number',
							'default' => 10,
						),
					)
				)

			)
		);
	}

	/**
	 * Initialize the image grid, mainly to add scripts and styles.
	 */
	function initialize(){
		$this->register_frontend_styles( array(
			array(
				'sow-image-grid',
				plugin_dir_url(__FILE__) . 'css/image-grid.css',
			)
		) );

		$this->register_frontend_scripts( array(
			array(
				'sow-image-grid',
				plugin_dir_url(__FILE__) . 'js/image-grid' . SOW_BUNDLE_JS_SUFFIX . '.js',
				array( 'jquery' )
			)
		) );
	}

	/**
	 * Modify the form widget
	 *
	 * @param $form
	 *
	 * @return mixed
	 */
	function modify_form( $form ){
		$intermediate = get_intermediate_image_sizes();
		$sizes = array();
		foreach( $intermediate as $name ) {
			$sizes[$name] = ucwords(preg_replace('/[-_]/', ' ', $name));
		}
		$sizes = array_merge( array( 'full' => __('Full', 'hashcore-widgets-bundle') ), $sizes );
		$form['display']['fields']['attachment_size']['options'] = $sizes;
		return $form;
	}

	/**
	 * Get the less variables for the image grid
	 *
	 * @param $instance
	 *
	 * @return mixed
	 */
	function get_less_variables( $instance ) {
		$less = array();
		if( !empty( $instance['display']['spacing'] ) ) {
			$less['spacing'] = intval($instance['display']['spacing']) . 'px';
		}

		return $less;
	}
}

hashcore_widget_register( 'sow-image-grid', __FILE__, 'HashCore_Widgets_ImageGrid_Widget' );
