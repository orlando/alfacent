<?php

/*
Widget Name: Headline
Description: A headline to headline all headlines.
Author:
Author URI: https://
*/

class HashCore_Widget_Headline_Widget extends HashCore_Widget {

	function __construct() {

		parent::__construct(
			'sow-headline',
			__( 'HashCore Headline', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'A headline widget.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			false,
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize_form(){
		return array(
			'headline' => array(
				'type' => 'section',
				'label'  => __( 'Headline', 'hashcore-widgets-bundle' ),
				'hide'   => false,
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => __( 'Text', 'hashcore-widgets-bundle' ),
					),
					'headline_size' => array(
						'type' => 'select',
						'label' => __( 'Font size', 'hashcore-widgets-bundle' ),
						'default' => '1.5',
						'options' => array(
							'.5' => __( 'Tiny', 'hashcore-widgets-bundle' ),
							'1' => __( 'Small', 'hashcore-widgets-bundle' ),
							'1.5' => __( 'Normal', 'hashcore-widgets-bundle' ),
							'2' => __( 'Medium', 'hashcore-widgets-bundle' ),
							'2.5' => __( 'Large', 'hashcore-widgets-bundle' ),
							'3' => __( 'Extra large', 'hashcore-widgets-bundle' ),
						),
					),
					'font' => array(
						'type' => 'font',
						'label' => __( 'Font', 'hashcore-widgets-bundle' ),
						'default' => 'default',
					),
					'headline_weight' => array(
						'type' => 'select',
						'label' => __( 'Font Style', 'hashcore-widgets-bundle' ),
						'default' => '400',
						'options' => array(
							'300' => __( 'lighter', 'hashcore-widgets-bundle' ),
							'400' => __( 'Normal', 'hashcore-widgets-bundle' ),
							'600' => __( 'Bold', 'hashcore-widgets-bundle' ),
							'700' => __( 'Bolder', 'hashcore-widgets-bundle' ),
						),
					),
					'color' => array(
						'type' => 'color',
						'label' => __( 'Color', 'hashcore-widgets-bundle' ),
					),
					'align' => array(
						'type' => 'select',
						'label' => __( 'Align', 'hashcore-widgets-bundle' ),
						'default' => 'center',
						'options' => array(
							'center' => __( 'Center', 'hashcore-widgets-bundle' ),
							'left' => __( 'Left', 'hashcore-widgets-bundle' ),
							'right' => __( 'Right', 'hashcore-widgets-bundle' ),
							'justify' => __( 'Justify', 'hashcore-widgets-bundle' ),
						),
					),
				),
			),
			'sub_headline' => array(
				'type' => 'section',
				'label'  => __( 'Sub headline', 'hashcore-widgets-bundle' ),
				'hide'   => true,
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => __( 'Text', 'hashcore-widgets-bundle' ),
					),
					'sub_headline_size' => array(
						'type' => 'select',
						'label' => __( 'Font size', 'hashcore-widgets-bundle' ),
						'default' => '1',
						'options' => array(
							'.5' => __( 'Tiny', 'hashcore-widgets-bundle' ),
							'1' => __( 'Small', 'hashcore-widgets-bundle' ),
							'1.5' => __( 'Normal', 'hashcore-widgets-bundle' ),
							'2' => __( 'Medium', 'hashcore-widgets-bundle' ),
							'2.5' => __( 'Large', 'hashcore-widgets-bundle' ),
							'3' => __( 'Extra large', 'hashcore-widgets-bundle' ),
						),
					),
					'font' => array(
						'type' => 'font',
						'label' => __( 'Font', 'hashcore-widgets-bundle' ),
						'default' => 'default',
					),
					'sub_headline_weight' => array(
						'type' => 'select',
						'label' => __( 'Font style', 'hashcore-widgets-bundle' ),
						'default' => '400',
						'options' => array(
							'300' => __( 'lighter', 'hashcore-widgets-bundle' ),
							'400' => __( 'Normal', 'hashcore-widgets-bundle' ),
							'600' => __( 'Bold', 'hashcore-widgets-bundle' ),
							'700' => __( 'Bolder', 'hashcore-widgets-bundle' ),
						),
					),
					'color' => array(
						'type' => 'color',
						'label' => __( 'Color', 'hashcore-widgets-bundle' ),
					),
					'align' => array(
						'type' => 'select',
						'label' => __( 'Align', 'hashcore-widgets-bundle' ),
						'default' => 'center',
						'options' => array(
							'center' => __( 'Center', 'hashcore-widgets-bundle' ),
							'left' => __( 'Left', 'hashcore-widgets-bundle' ),
							'right' => __( 'Right', 'hashcore-widgets-bundle' ),
							'justify' => __( 'Justify', 'hashcore-widgets-bundle' ),
						),
					),
				),
			),
			'divider' => array(
				'type' => 'section',
				'label' => __( 'Divider', 'hashcore-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'style' => array(
						'type' => 'select',
						'label' => __( 'Style', 'hashcore-widgets-bundle' ),
						'default' => 'solid',
						'options' => array(
							'none' => __( 'None', 'hashcore-widgets-bundle' ),
							'solid' => __( 'Solid', 'hashcore-widgets-bundle' ),
							'dotted' => __( 'Dotted', 'hashcore-widgets-bundle' ),
							'dashed' => __( 'Dashed', 'hashcore-widgets-bundle' ),
							'double' => __( 'Double', 'hashcore-widgets-bundle' ),
							'groove' => __( 'Groove', 'hashcore-widgets-bundle' ),
							'ridge' => __( 'Ridge', 'hashcore-widgets-bundle' ),
							'inset' => __( 'Inset', 'hashcore-widgets-bundle' ),
							'outset' => __( 'Outset', 'hashcore-widgets-bundle' ),
						),
					),
					'weight' => array(
						'type' => 'select',
						'label' => __( 'Weight', 'hashcore-widgets-bundle' ),
						'default' => 'thin',
						'options' => array(
							'thin' => __( 'Thin', 'hashcore-widgets-bundle' ),
							'medium' => __( 'Medium', 'hashcore-widgets-bundle' ),
							'thick' => __( 'Thick', 'hashcore-widgets-bundle' ),
						),
					),
					'color' => array(
						'type' => 'color',
						'label' => __( 'Color', 'hashcore-widgets-bundle' ),
						'default' => '#EEEEEE',
					),
					'side_margin' => array(
						'type' => 'measurement',
						'label' => __( 'Side Margin', 'hashcore-widgets-bundle' ),
						'default' => '60px',
					),
					'top_margin' => array(
						'type' => 'measurement',
						'label' => __( 'Top/Bottom Margin', 'hashcore-widgets-bundle' ),
						'default' => '20px',
					),
				),
			),
		);
	}

	function get_style_name( $instance ) {
		return 'sow-headline';
	}

	function get_less_variables( $instance ) {
		$less_vars = array();

		if ( ! empty( $instance['headline'] ) ) {
			$headline_styles = $instance['headline'];
			if ( ! empty( $headline_styles['tag'] ) ) {
				$less_vars['headline_tag'] = $headline_styles['tag'];
			}
			if ( ! empty( $headline_styles['align'] ) ) {
				$less_vars['headline_align'] = $headline_styles['align'];
			}
			if ( ! empty( $headline_styles['color'] ) ) {
				$less_vars['headline_color'] = $headline_styles['color'];
			}
			if ( ! empty( $headline_styles['font'] ) ) {
				$font = hashcore_widget_get_font( $headline_styles['font'] );
				$less_vars['headline_font'] = $font['family'];
			}
			$less_vars['headline_weight'] = $headline_styles['headline_weight'];
			$less_vars['headline_size'] = $headline_styles['headline_size'] . 'em';
		}

		if ( ! empty( $instance['sub_headline'] ) ) {
			$sub_headline_styles = $instance['sub_headline'];
			if ( ! empty( $sub_headline_styles['align'] ) ) {
				$less_vars['sub_headline_align'] = $sub_headline_styles['align'];
			}
			if ( ! empty( $sub_headline_styles['tag'] ) ) {
				$less_vars['sub_headline_tag'] = $sub_headline_styles['tag'];
			}
			if ( ! empty( $sub_headline_styles['color'] ) ) {
				$less_vars['sub_headline_color'] = $sub_headline_styles['color'];
			}
			if ( ! empty( $sub_headline_styles['font'] ) ) {
				$font = hashcore_widget_get_font( $sub_headline_styles['font'] );
				$less_vars['sub_headline_font'] = $font['family'];
			}
			$less_vars['sub_headline_weight'] = $sub_headline_styles['sub_headline_weight'];
			$less_vars['sub_headline_size'] = $sub_headline_styles['sub_headline_size'] . 'em';
		}

		if ( ! empty( $instance['divider'] ) ) {
			$divider_styles = $instance['divider'];

			if ( ! empty( $divider_styles['style'] ) ) {
				$less_vars['divider_style'] = $divider_styles['style'];
			}

			if ( ! empty( $divider_styles['weight'] ) ) {
				$less_vars['divider_weight'] = $divider_styles['weight'];
			}

			if ( ! empty( $divider_styles['color'] ) ) {
				$less_vars['divider_color'] = $divider_styles['color'];
			}

			if ( ! empty( $divider_styles['top_margin'] ) ) {
				$less_vars['divider_top_margin'] = $divider_styles['top_margin'];
			}

			if ( ! empty( $divider_styles['side_margin'] ) ) {
				$less_vars['divider_side_margin'] = $divider_styles['side_margin'];
			}
		}

		return $less_vars;
	}

	function get_google_font_fields( $instance ) {

		return array(
			$instance['headline']['font'],
			$instance['sub_headline']['font'],
		);
	}

	/**
	 * Get the template for the headline widget
	 *
	 * @param $instance
	 *
	 * @return mixed|string
	 */
	function get_template_name( $instance ) {
		return 'headline';
	}

	/**
	 * Get the template variables for the headline
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return array
	 */
	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();

		return array(
			'headline' => $instance['headline']['text'],
			'sub_headline' => $instance['sub_headline']['text'],
			'has_divider' => ! empty( $instance['divider'] ) && $instance['divider']['style'] != 'none'
		);
	}
}

hashcore_widget_register( 'sow-headline', __FILE__, 'HashCore_Widget_Headline_Widget' );
