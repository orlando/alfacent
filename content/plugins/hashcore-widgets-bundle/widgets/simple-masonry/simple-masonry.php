<?php
/*
Widget Name: Simple Masonry Layout
Description: A masonry layout for images. Images can link to your posts.
Author:
Author URI: https://
*/

class HashCore_Widget_Simple_Masonry_Widget extends HashCore_Widget {
	function __construct() {

		parent::__construct(
			'sow-simple-masonry',
			__('HashCore Simple Masonry', 'hashcore-widgets-bundle'),
			array(
				'description' => __('A simple masonry layout widget.', 'hashcore-widgets-bundle'),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);

	}

	function initialize() {
		$this->register_frontend_scripts(
			array(
				array(
					'dessandro-imagesLoaded',
					hashcore_widget_get_plugin_dir_url( 'sow-simple-masonry' ) . 'js/imagesloaded.pkgd' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' ),
					SOW_BUNDLE_VERSION
				),
				array(
					'dessandro-packery',
					hashcore_widget_get_plugin_dir_url( 'sow-simple-masonry' ) . 'js/packery.pkgd' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' ),
					SOW_BUNDLE_VERSION
				),
				array(
					'sow-simple-masonry',
					hashcore_widget_get_plugin_dir_url( 'sow-simple-masonry' ) . 'js/simple-masonry' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery', 'dessandro-imagesLoaded', 'dessandro-packery' ),
					SOW_BUNDLE_VERSION
				),
			)
		);
	}

	function initialize_form(){
		return array(
			'widget_title' => array(
				'type' => 'text',
				'label' => __('Title', 'hashcore-widgets-bundle'),
			),
			'items' => array(
				'type' => 'repeater',
				'label' => __( 'Images', 'hashcore-widgets-bundle' ),
				'item_label' => array(
					'selector'     => "[id*='title']"
				),
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'label' => __( 'Image', 'hashcore-widgets-bundle')
					),
					'column_span' => array(
						'type' => 'slider',
						'label' => __( 'Column span', 'hashcore-widgets-bundle' ),
						'description' => __( 'Number of columns this item should span. (Limited to number of columns selected in Layout section below.)', 'hashcore-widgets-bundle' ),
						'min' => 1,
						'max' => 10,
						'default' => 1
					),
					'row_span' => array(
						'type' => 'slider',
						'label' => __( 'Row span', 'hashcore-widgets-bundle' ),
						'description' => __( 'Number of rows this item should span. (Limited to number of columns selected in Layout section below.)', 'hashcore-widgets-bundle' ),
						'min' => 1,
						'max' => 10,
						'default' => 1
					),
					'title' => array(
						'type' => 'text',
						'label' => __('Title', 'hashcore-widgets-bundle'),
					),
					'url' => array(
						'type' => 'link',
						'label' => __('Destination URL', 'hashcore-widgets-bundle'),
					),
					'new_window' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __('Open in a new window', 'hashcore-widgets-bundle'),
					),
				)
			),
			'desktop_layout' => array(
				'type' => 'section',
				'label' => __( 'Desktop Layout', 'hashcore-widgets-bundle' ),
				'fields' => array(
					'columns' => array(
						'type' => 'slider',
						'label' => __( 'Number of columns', 'hashcore-widgets-bundle' ),
						'min' => 1,
						'max' => 10,
						'default' => 4
					),
					'row_height' => array(
						'type' => 'number',
						'label' => __( 'Row height', 'hashcore-widgets-bundle' ),
						'description' => __( 'Leave blank to match calculated column width.', 'hashcore-widgets-bundle' ),
						'default' => 0
					),
					'gutter' => array(
						'type' => 'number',
						'label' => __( 'Gutter', 'hashcore-widgets-bundle'),
						'description' => __( 'Space between masonry items.', 'hashcore-widgets-bundle' ),
						'default' => 0
					)
				)
			),
			'tablet_layout' => array(
				'type' => 'section',
				'label' => __( 'Tablet Layout', 'hashcore-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'break_point' => array(
						'type' => 'number',
						'lanel' => __( 'Break point', 'hashcore-widgets-bundle' ),
						'default' => 768
					),
					'columns' => array(
						'type' => 'slider',
						'label' => __( 'Number of columns', 'hashcore-widgets-bundle' ),
						'min' => 1,
						'max' => 10,
						'default' => 2
					),
					'row_height' => array(
						'type' => 'number',
						'label' => __( 'Row height', 'hashcore-widgets-bundle' ),
						'description' => __( 'Leave blank to match calculated column width.', 'hashcore-widgets-bundle' ),
						'default' => 0
					),
					'gutter' => array(
						'type' => 'number',
						'label' => __( 'Gutter', 'hashcore-widgets-bundle'),
						'description' => __( 'Space between masonry items.', 'hashcore-widgets-bundle' ),
						'default' => 0
					)
				)
			),
			'mobile_layout' => array(
				'type' => 'section',
				'label' => __( 'Mobile Layout', 'hashcore-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'break_point' => array(
						'type' => 'number',
						'lanel' => __( 'Break point', 'hashcore-widgets-bundle' ),
						'default' => 480
					),
					'columns' => array(
						'type' => 'slider',
						'label' => __( 'Number of columns', 'hashcore-widgets-bundle' ),
						'min' => 1,
						'max' => 10,
						'default' => 1
					),
					'row_height' => array(
						'type' => 'number',
						'label' => __( 'Row height', 'hashcore-widgets-bundle' ),
						'description' => __( 'Leave blank to match calculated column width.', 'hashcore-widgets-bundle' ),
						'default' => 0
					),
					'gutter' => array(
						'type' => 'number',
						'label' => __( 'Gutter', 'hashcore-widgets-bundle'),
						'description' => __( 'Space between masonry items.', 'hashcore-widgets-bundle' ),
						'default' => 0
					)
				)
			)
		);
	}

	function get_template_name($instance) {
		return 'simple-masonry';
	}

	function get_style_name($instance) {
		return 'simple-masonry';
	}

	public function get_template_variables( $instance, $args ) {
		return array(
			'items' => $instance['items'],
			'layouts' => array(
				'desktop' => hashcore_widgets_underscores_to_camel_case(
					array(
						'num_columns' => $instance['desktop_layout']['columns'],
						'row_height' => empty( $instance['desktop_layout']['row_height'] ) ? 0 : intval( $instance['desktop_layout']['row_height'] ),
						'gutter' => empty( $instance['desktop_layout']['gutter'] ) ? 0 : intval( $instance['desktop_layout']['gutter'] ),
					)
				),
				'tablet' => hashcore_widgets_underscores_to_camel_case(
					array(
						'break_point' => $instance['tablet_layout']['break_point'],
						'num_columns' => $instance['tablet_layout']['columns'],
						'row_height' => empty( $instance['tablet_layout']['row_height'] ) ? 0 : intval( $instance['tablet_layout']['row_height'] ),
						'gutter' => empty( $instance['tablet_layout']['gutter'] ) ? 0 : intval( $instance['tablet_layout']['gutter'] ),
					)
				),
				'mobile' => hashcore_widgets_underscores_to_camel_case(
					array(
						'break_point' => $instance['mobile_layout']['break_point'],
						'num_columns' => $instance['mobile_layout']['columns'],
						'row_height' => empty( $instance['mobile_layout']['row_height'] ) ? 0 : intval( $instance['mobile_layout']['row_height'] ),
						'gutter' => empty( $instance['mobile_layout']['gutter'] ) ? 0 : intval( $instance['mobile_layout']['gutter'] ),
					)
				),
			)
		);
	}
}

hashcore_widget_register('sow-simple-masonry', __FILE__, 'HashCore_Widget_Simple_Masonry_Widget');
