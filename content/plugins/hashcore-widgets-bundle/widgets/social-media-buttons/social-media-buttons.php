<?php

/*
Widget Name: Social Media Buttons
Description: Customizable buttons which link to all your social media profiles.
Author:
Author URI: https://
*/


class HashCore_Widget_SocialMediaButtons_Widget extends HashCore_Widget {

	private $networks;

	function __construct() {

		$this->networks = include plugin_dir_path( __FILE__ ) . 'data/networks.php';

		$network_names = array();
		foreach ( $this->networks as $key => $value ) {
			$network_names[ $key ] = $value['label'];
		}

		parent::__construct(
			'sow-social-media-buttons',
			__( 'HashCore Social Media Buttons', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'A social media buttons widget.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			array(
				'networks' => array(
					'type'       => 'repeater',
					'label'      => __( 'Networks', 'hashcore-widgets-bundle' ),
					'item_name'  => __( 'Network', 'hashcore-widgets-bundle' ),
					'item_label' => array(
						'selector'     => "[id*='networks-name'] :selected",
						'update_event' => 'change',
						'value_method' => 'text'
					),
					'fields'     => array(
						'name'         => array(
							'type'    => 'select',
							'label'   => '',
							'prompt'  => __( 'Select network', 'hashcore-widgets-bundle' ),
							'options' => $network_names
						),
						'url'          => array(
							'type'  => 'text',
							'label' => __( 'URL', 'hashcore-widgets-bundle' )
						),
						'icon_color'   => array(
							'type'  => 'color',
							'label' => __( 'Icon color', 'hashcore-widgets-bundle' )
						),
						'button_color' => array(
							'type'  => 'color',
							'label' => __( 'Background color', 'hashcore-widgets-bundle' )
						)
					)
				),
				'design'   => array(
					'type'   => 'section',
					'label'  => __( 'Design and layout', 'hashcore-widgets-bundle' ),
					'hide'   => true,
					'fields' => array(
						'new_window' => array(
							'type'    => 'checkbox',
							'label'   => __( 'Open in a new window', 'hashcore-widgets-bundle' ),
							'default' => true
						),
						'theme'      => array(
							'type'    => 'select',
							'label'   => __( 'Button theme', 'hashcore-widgets-bundle' ),
							'default' => 'atom',
							'options' => array(
								'atom' => __( 'Atom', 'hashcore-widgets-bundle' ),
								'flat' => __( 'Flat', 'hashcore-widgets-bundle' ),
								'wire' => __( 'Wire', 'hashcore-widgets-bundle' ),
							),
						),
						'hover'      => array(
							'type'    => 'checkbox',
							'label'   => __( 'Use hover effects', 'hashcore-widgets-bundle' ),
							'default' => true
						),
						'icon_size'  => array(
							'type'    => 'select',
							'label'   => __( 'Icon size', 'hashcore-widgets-bundle' ),
							'options' => array(
								'1'    => __( 'Normal', 'hashcore-widgets-bundle' ),
								'1.33' => __( 'Medium', 'hashcore-widgets-bundle' ),
								'1.66' => __( 'Large', 'hashcore-widgets-bundle' ),
								'2'    => __( 'Extra large', 'hashcore-widgets-bundle' )
							)
						),
						'rounding'   => array(
							'type'    => 'select',
							'label'   => __( 'Rounding', 'hashcore-widgets-bundle' ),
							'default' => '0.25',
							'options' => array(
								'0'    => __( 'None', 'hashcore-widgets-bundle' ),
								'0.25' => __( 'Slightly rounded', 'hashcore-widgets-bundle' ),
								'0.5'  => __( 'Very rounded', 'hashcore-widgets-bundle' ),
								'1.5'  => __( 'Completely rounded', 'hashcore-widgets-bundle' ),
							),
						),
						'padding'    => array(
							'type'    => 'select',
							'label'   => __( 'Padding', 'hashcore-widgets-bundle' ),
							'default' => '1',
							'options' => array(
								'0.3' => __( 'Tiny', 'hashcore-widgets-bundle' ),
								'0.5' => __( 'Low', 'hashcore-widgets-bundle' ),
								'1'   => __( 'Medium', 'hashcore-widgets-bundle' ),
								'1.4' => __( 'High', 'hashcore-widgets-bundle' ),
								'1.8' => __( 'Very high', 'hashcore-widgets-bundle' ),
							),
						),
						'align'      => array(
							'type'    => 'select',
							'label'   => __( 'Align', 'hashcore-widgets-bundle' ),
							'default' => 'left',
							'options' => array(
								'left'    => __( 'Left', 'hashcore-widgets-bundle' ),
								'right'   => __( 'Right', 'hashcore-widgets-bundle' ),
								'center'  => __( 'Center', 'hashcore-widgets-bundle' ),
								'justify' => __( 'Justify', 'hashcore-widgets-bundle' ),
							),
						),
						'margin'     => array(
							'type'    => 'select',
							'label'   => __( 'Margin', 'hashcore-widgets-bundle' ),
							'default' => '0.1',
							'options' => array(
								'0.1' => __( 'Low', 'hashcore-widgets-bundle' ),
								'0.2' => __( 'Medium', 'hashcore-widgets-bundle' ),
								'0.3' => __( 'High', 'hashcore-widgets-bundle' ),
								'0.4' => __( 'Very high', 'hashcore-widgets-bundle' ),
								'0.6' => __( 'Wide', 'hashcore-widgets-bundle' ),
							),
						),
					)
				),
			)
		);
	}

	function modify_form( $form ) {
		return apply_filters( 'sow_social_media_buttons_form_options', $form );
	}

	function modify_instance( $instance ) {
		if ( ! empty( $instance['networks'] ) ) {
			foreach ( $instance['networks'] as $name => $network ) {
				$instance['networks'][$name]['icon_name'] = 'fontawesome-' . $network['name'];
			}
		}
		return $instance;
	}

	function get_javascript_variables() {
		return array( 'networks' => $this->networks );
	}

	function enqueue_admin_scripts() {
		wp_enqueue_script( 'sow-social-media-buttons', plugin_dir_url(__FILE__) . 'js/social-media-buttons-admin.js', array( 'jquery' ), SOW_BUNDLE_VERSION );
	}

	function get_template_name( $instance ) {
		return 'social-media-buttons';
	}

	function get_style_name( $instance ) {
		if ( empty( $instance['design']['theme'] ) ) {
			return 'atom';
		}

		return $instance['design']['theme'];
	}

	function get_less_variables( $instance ) {
		if( empty( $instance ) ) return;

		$design = $instance['design'];
		$m      = $design['margin'];
		$top = $right = $bottom = $left = $m . 'em';
		switch ( $design['align'] ) {
			case 'left':
				$left = '0';
				break;
			case 'right':
				$right = '0';
				break;
			case 'center':
				$left = $right = ( $m * 2.5 ) . 'em';
				break;
		}
		$margin = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;

		return array(
			'icon_size' => $design['icon_size'] . 'em',
			'rounding'  => $design['rounding'] . 'em',
			'padding'   => $design['padding'] . 'em',
			'align'     => $design['align'],
			'margin'    => $margin
		);
	}

	function less_generate_calls_to( $instance, $args ) {
		$networks = $this->get_instance_networks( $instance );
		$calls    = array();
		foreach ( $networks as $network ) {
			$calls[] = $args[0] . '(' . $network['name'] . ', ' . $network['icon_color'] . ', ' . $network['button_color'] . ');';
		}

		return implode( "\n", $calls );
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'networks' => $this->get_instance_networks( $instance )
		);
	}

	private function get_instance_networks( $instance ) {
		if ( isset( $instance['networks'] ) && ! empty( $instance['networks'] ) ) {
			$networks = $instance['networks'];
		} else {
			$networks = array();
		}
		return apply_filters( 'sow_social_media_buttons_networks', $networks, $instance );
	}

	/**
	 * This is used to generate the hash of the instance.
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	protected function get_style_hash_variables( $instance ){
		$networks = $this->get_instance_networks($instance);

		foreach($networks as $i => $network) {
			// URL is not important for the styling
			unset($networks[$i]['url']);
		}

		return array(
			'less' => $this->get_less_variables($instance),
			'networks' => $networks
		);
	}
}

hashcore_widget_register( 'sow-social-media-buttons', __FILE__, 'HashCore_Widget_SocialMediaButtons_Widget' );
