<?php
/**
 * Widget Name: Tabs
 * Description: This widget Display Tabs.
 * Author:
 * Author URI:
 *
 * @package Hashcore
 */

class HashCore_Widget_Tabs extends Hashcore_Widget {
	function __construct() {

		parent::__construct(
			'hashcore-tabs',
			__( 'Tabs', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'Tabs Component.', 'hashcore-widgets-bundle' ),
					'panels_icon' => 'dashicons dashicons-welcome-widgets-menus',
					'panels_groups' => array( 'addonso' ),
			),
			array(),
			array(
				'widget_title' => array(
					'type' => 'text',
					'label' => __( 'Widget Title', 'hashcore-widgets-bundle' ),
					'default' => '',
				),

				'repeater' => array(
					'type' => 'repeater',
					'label' => __( 'Tabs' , 'hashcore-widgets-bundle' ),
					'item_name'	=> __( 'Tab', 'hashcore-widgets-bundle' ),
					'item_label' => array(
							'selector'		 => "[id*='repeater-tab_title']",
							'update_event' => 'change',
							'value_method' => 'val',
					),

					'fields' => array(

						'tab_title' => array(
							'type' => 'text',
							'label' => __( 'Tab Title', 'hashcore-widgets-bundle' ),
							'default' => '',
						),
						'tab_content' => array(
							'type' => 'tinymce',
							'label' => __( 'Tab Content', 'hashcore-widgets-bundle' ),
							'default' => '',
							'rows' => 10,
							'default_editor' => 'html',
							'button_filters' => array(
								'mce_buttons' => array( $this, 'filter_mce_buttons' ),
								'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
								'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
								'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
								'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
							),
						),
					),
				),

				'tabs_selection' => array(
					'type' => 'radio',
					'label' => __( 'Choose Tabs Style', 'hashcore-widgets-bundle' ),
					'default' => 'horizontal',
					'options' => array(
						'horizontal' => __( 'Horizontal Tabs', 'hashcore-widgets-bundle' ),
						'vertical' => __( 'Vertical Tabs', 'hashcore-widgets-bundle' ),
					),
				),

				'tabs_styling' => array(
					'type' => 'section',
					'label' => __( 'Widget styling' , 'hashcore-widgets-bundle' ),
					'hide' => true,
					'fields' => array(

						'align'		 	=> array(
							'type'			=> 'select',
							'label'	 	=> __( 'Align', 'hashcore-widgets-bundle' ),
							'default' 	=> 'center',
							'options' 	=> array(
								'left'		=> __( 'Left', 'hashcore-widgets-bundle' ),
								'right'	 => __( 'Right', 'hashcore-widgets-bundle' ),
								'center'	=> __( 'Center', 'hashcore-widgets-bundle' ),
							),
						),

						'tab_content_height' => array(
							'type'		=> 'select',
							'label'	 => __( 'Height of tab', 'hashcore-widgets-bundle' ),
							'default' => '400px',
							'options' => array(
								'200px'	=> __( '200 Px', 'hashcore-widgets-bundle' ),
								'300px'	=> __( '300 Px', 'hashcore-widgets-bundle' ),
								'400px'	=> __( '400 Px', 'hashcore-widgets-bundle' ),
								'500px'	=> __( '500 Px', 'hashcore-widgets-bundle' ),
								'600px'	=> __( '600 Px', 'hashcore-widgets-bundle' ),
							),
						),

						'tab_content_padding_bottom' => array(
							'type'		=> 'select',
							'label'	 => __( 'Padding Bottom of Content', 'hashcore-widgets-bundle' ),
							'default' => '30px',
							'options' => array(
								'0'			=> __( 'None', 'hashcore-widgets-bundle' ),
								'10px'	=> __( 'Low', 'hashcore-widgets-bundle' ),
								'20px'	=> __( 'Medium', 'hashcore-widgets-bundle' ),
								'30px'	=> __( 'High', 'hashcore-widgets-bundle' ),
								'40px'	=> __( 'Very high', 'hashcore-widgets-bundle' ),
							),
						),

						'title_color' 	=> array(
							'type' 		=> 'color',
							'label' 	=> __( 'Title Color', 'hashcore-widgets-bundle' ),
							'default' => '',
						),

						'active_tab_color' => array(
							'type' 		=> 'color',
							'label' 	=> __( 'Active Tab Font Color', 'hashcore-widgets-bundle' ),
							'default' => '',
						),

						'inactive_tab_color' => array(
							'type' 		=> 'color',
							'label' 	=> __( 'Inactive Tab Font Color', 'hashcore-widgets-bundle' ),
							'default' => '',
						),

						'active_tab_rounding'	 => array(
							'type'		=> 'select',
							'label'	 => __( 'Rounding', 'hashcore-widgets-bundle' ),
							'default' => '0.25em',
							'options' => array(
								'0'			=> __( 'None', 'hashcore-widgets-bundle' ),
								'0.25em' => __( 'Slightly rounded', 'hashcore-widgets-bundle' ),
								'0.5em'	=> __( 'Very rounded', 'hashcore-widgets-bundle' ),
								'1.5em'	=> __( 'Completely rounded', 'hashcore-widgets-bundle' ),
							),
						),

						'bg_color' 	=> array(
							'type' 		=> 'color',
							'label' 	=> __( 'Background Color', 'hashcore-widgets-bundle' ),
							'default' => '',
						),

						'tab_content_color' => array(
							'type' 		=> 'color',
							'label' 	=> __( 'Tab Content Color', 'hashcore-widgets-bundle' ),
							'default' => '',
						),
					),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize() {
		$this->register_frontend_scripts(
			array(
				array( 'hashcore-tabs', plugin_dir_url( __FILE__ ) . 'js/js-tabs.js', array( 'jquery' ), '1.0' ),
			)
		);
	}

	function get_template_name( $instance ) {
		return 'tabs-template';
	}

	function get_style_name( $instance ) {
		return 'tabs-style';
	}

	function get_less_variables( $instance ) {
		return array(
			'align' => $instance['tabs_styling']['align'],
			'tab_content_height' => $instance['tabs_styling']['tab_content_height'],
			'tab_content_padding_bottom' => $instance['tabs_styling']['tab_content_padding_bottom'],
			'title_color' => $instance['tabs_styling']['title_color'],
			'active_tab_color' => $instance['tabs_styling']['active_tab_color'],
			'inactive_tab_color' => $instance['tabs_styling']['inactive_tab_color'],
			'active_tab_rounding' => $instance['tabs_styling']['active_tab_rounding'],
			'bg_color' => $instance['tabs_styling']['bg_color'],
			'tab_content_color' => $instance['tabs_styling']['tab_content_color'],
		);
	}
}

hashcore_widget_register( 'hashcore-tabs', __FILE__, 'HashCore_Widget_Tabs' );
