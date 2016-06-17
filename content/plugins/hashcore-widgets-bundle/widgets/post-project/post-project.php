<?php
/*
Widget Name: Post Project
Description: Post type projects
Author:
Author URI: https://
*/

class HashCore_Widget_Post_Project extends HashCore_Widget {

	function __construct() {

		parent::__construct(
			'hashcore-post-project',
			__('HashCore Post Project', 'hashcore-widgets-bundle'),
			array(
				'description' => __('A layout for projects', 'hashcore-widgets-bundle'),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			false ,
			plugin_dir_path(__FILE__)
		);
	}

	/**
	 * Initialize the CTA widget
	 */
	function initialize(){
		// This widget requires the button widget
		if( !class_exists('HashCore_Widget_Editor_Widget') ) {
			HashCore_Widgets_Bundle::single()->include_widget( 'editor' );
		}
		if( !class_exists('HashCore_Widget_Button_Widget') ) {
			HashCore_Widgets_Bundle::single()->include_widget( 'cta' );
		}
		if( !class_exists('HashCore_Widget_List_Item') ) {
			HashCore_Widgets_Bundle::single()->include_widget( 'list-item' );
		}

		$this->register_frontend_scripts(
			array(
				array(
					'hashcore-post-project-main',
					plugin_dir_url(__FILE__) . 'js/post-project' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' ),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	function initialize_form(){
		return array(

			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'hashcore-widgets-bundle'),
				'description' => 'Only for referent, title used is the Title Post'
			),
			'summary' => array(
				'type' => 'section',
				'label' => __('Summary of project', 'hashcore-widgets-bundle'),
				'fields' => array(
					'text' => array(
		        'type' => 'textarea',
		        'label' => __( 'Summary of project', 'widget-form-fields-text-domain' ),
		        'rows' => 7
		    	),
				),
			),

			'cta' => array(
				'type' => 'widget',
				'class' => 'HashCore_Widget_Button_Widget',
				'label' => __('Call to action', 'hashcore-widgets-bundle'),
				'hide' => true
			),
			'list-item' => array(
				'type' => 'widget',
				'class' => 'HashCore_Widget_List_Item',
				'label' => __('Project details', 'hashcore-widgets-bundle'),
				'hide' => true
			),

			'design' => array(
				'type' => 'section',
				'label' => __('Design', 'hashcore-widgets-bundle'),
				'fields' => array(
					'title_options' => array(
						'type' => 'section',
						'label' => __( 'Title options', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'font' => array(
								'type' => 'font',
								'label' => __( 'Font', 'hashcore-widgets-bundle' ),
								'default' => 'default',
							),
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '1.5em',
							),
							'color' => array(
								'type' => 'color',
								'label' => __( 'Color', 'hashcore-widgets-bundle' ),
								'default' => '#444444',
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
							'align' => array(
								'type' => 'select',
								'label' => __( 'Align', 'hashcore-widgets-bundle' ),
								'default' => 'center',
								'options' => array(
									'left' => __( 'Left', 'hashcore-widgets-bundle' ),
									'left-center' => __( 'Left and center in mobile', 'hashcore-widgets-bundle' ),
									'right' => __( 'Right', 'hashcore-widgets-bundle' ),
									'right-center' => __( 'right and center in mobile', 'hashcore-widgets-bundle' ),
									'center' => __( 'Center', 'hashcore-widgets-bundle' ),
								),
							),
						),
					), // Title option.

					'summary_options' => array(
						'type' => 'section',
						'label' => __( 'Summary Options', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'font' => array(
								'type' => 'font',
								'label' => __( 'Font', 'hashcore-widgets-bundle' ),
								'default' => 'default',
							),
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
								'default' => '1em',
							),
							'color' => array(
								'type' => 'color',
								'label' => __( 'Color', 'hashcore-widgets-bundle' ),
								'default' => '#444444',
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
							'align' => array(
								'type' => 'select',
								'label' => __( 'Align', 'hashcore-widgets-bundle' ),
								'default' => 'center',
								'options' => array(
									'left' => __( 'Left', 'hashcore-widgets-bundle' ),
									'left-center' => __( 'Left and center in mobile', 'hashcore-widgets-bundle' ),
									'right' => __( 'Right', 'hashcore-widgets-bundle' ),
									'right-center' => __( 'right and center in mobile', 'hashcore-widgets-bundle' ),
									'center' => __( 'Center', 'hashcore-widgets-bundle' ),
								),
							),
						),
					), // Summary option.

				)
			),

			'editor' => array(
				'type' => 'widget',
				'class' => 'HashCore_Widget_Editor_Widget',
				'label' => __('Post content', 'hashcore-widgets-bundle'),
				'hide' => true,
			),

		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return 'basic';
	}

	function get_less_variables($instance) {


		$less_vars = array();

		$design = $instance['design'];
		$styleable_fields = array( 'title', 'summary' );
		$styleable_fields_option = array( 'font', 'size', 'color', 'weight', 'align' );

		foreach ( $styleable_fields as $field_name ) {
			$styles = $design[$field_name.'_options'];

			foreach ( $styleable_fields_option as $option_name ) {
				$less_vars[$field_name.'_'.$option_name] = $styles[$option_name];
			}

			if ( ! empty( $styles['font'] ) ) {
				$font = hashcore_widget_get_font( $styles['font'] );
				$less_vars[$field_name.'_font'] = $font['family'];
			}
		}

		return $less_vars;
	}
}

hashcore_widget_register('hashcore-post-project', __FILE__, 'HashCore_Widget_Post_Project');
