<?php
/*
Widget Name: Features
Description: Displays a block of features with icons.
Author:
Author URI: https://
*/

class HashCore_Widget_Features_Widget extends HashCore_Widget {
	function __construct() {
		parent::__construct(
			'sow-features',
			__( 'HashCore Features', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'Displays a list of features.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
				'help'        => 'https:///widgets-bundle/features-widget-documentation/'
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'hashcore-widgets',
					plugin_dir_url(__FILE__) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	function initialize_form(){
		$form['container_shape']['options'] = include dirname( __FILE__ ) . '/inc/containers.php';

		$image_size_configs = $this->get_image_sizes();
		$sizes = array();
		foreach( $image_size_configs as $name => $size_config) {
			$sizes[$name] = ucwords(preg_replace('/[-_]/', ' ', $name)) . ' (' . $size_config['width'] . 'x' . $size_config['height'] . ')';
		}

		return array(
			'features' => array(
				'type' => 'repeater',
				'label' => __('Features', 'hashcore-widgets-bundle'),
				'item_name' => __('Feature', 'hashcore-widgets-bundle'),
				'item_label' => array(
					'selector' => "[id*='features-title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(

					// The container shape

					'container_color' => array(
						'type' => 'color',
						'label' => __('Container color', 'hashcore-widgets-bundle'),
						'default' => '#404040',
					),

					// The Icon

					'icon' => array(
						'type' => 'icon',
						'label' => __('Icon', 'hashcore-widgets-bundle'),
					),

					'icon_color' => array(
						'type' => 'color',
						'label' => __('Icon color', 'hashcore-widgets-bundle'),
						'default' => '#FFFFFF',
					),

					'icon_image' => array(
						'type' => 'media',
						'library' => 'image',
						'label' => __('Icon image', 'hashcore-widgets-bundle'),
						'description' => __('Use your own icon image.', 'hashcore-widgets-bundle'),
					),

					'icon_image_size' => array(
						'type' => 'select',
						'label' => __('Icon image size', 'hashcore-widgets-bundle'),
						'options' => $sizes,
					),

					// The text under the icon

					'title' => array(
						'type' => 'text',
						'label' => __('Title text', 'hashcore-widgets-bundle'),
					),

					'text' => array(
						'type' => 'text',
						'label' => __('Text', 'hashcore-widgets-bundle')
					),

					'more_text' => array(
						'type' => 'text',
						'label' => __('More link text', 'hashcore-widgets-bundle'),
					),

					'more_url' => array(
						'type' => 'link',
						'label' => __('More link URL', 'hashcore-widgets-bundle'),
					),
				),
			),

			'fonts' => array(
				'type' => 'section',
				'label' => __( 'Fonts', 'hashcore-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'title_options' => array(
						'type' => 'section',
						'label' => __( 'Title', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'font' => array(
								'type' => 'font',
								'label' => __( 'Font', 'hashcore-widgets-bundle' ),
								'default' => 'default'
							),
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
							),
							'color' => array(
								'type' => 'color',
								'label' => __( 'Color', 'hashcore-widgets-bundle' ),
							)
						)
					),

					'text_options' => array(
						'type' => 'section',
						'label' => __( 'Text', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'font' => array(
								'type' => 'font',
								'label' => __( 'Font', 'hashcore-widgets-bundle' ),
								'default' => 'default'
							),
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
							),
							'color' => array(
								'type' => 'color',
								'label' => __( 'Color', 'hashcore-widgets-bundle' ),
							)
						)
					),

					'more_text_options' => array(
						'type' => 'section',
						'label' => __( 'More Link', 'hashcore-widgets-bundle' ),
						'hide' => true,
						'fields' => array(
							'font' => array(
								'type' => 'font',
								'label' => __( 'Font', 'hashcore-widgets-bundle' ),
								'default' => 'default'
							),
							'size' => array(
								'type' => 'measurement',
								'label' => __( 'Size', 'hashcore-widgets-bundle' ),
							),
							'color' => array(
								'type' => 'color',
								'label' => __( 'Color', 'hashcore-widgets-bundle' ),
							)
						)
					),
				),
			),

			'container_shape' => array(
				'type' => 'select',
				'label' => __('Container shape', 'hashcore-widgets-bundle'),
				'default' => 'round',
				'options' => array(),
			),

			'container_size' => array(
				'type' => 'measurement',
				'label' => __('Container size', 'hashcore-widgets-bundle'),
				'default' => '84px',
			),

			'icon_size' => array(
				'type' => 'measurement',
				'label' => __('Icon size', 'hashcore-widgets-bundle'),
				'default' => '24px',
			),

			'per_row' => array(
				'type' => 'number',
				'label' => __('Features per row', 'hashcore-widgets-bundle'),
				'default' => 3,
			),

			'responsive' => array(
				'type' => 'checkbox',
				'label' => __('Responsive layout', 'hashcore-widgets-bundle'),
				'default' => true,
			),

			'title_link' => array(
				'type' => 'checkbox',
				'label' => __('Link feature title to more URL', 'hashcore-widgets-bundle'),
				'default' => false,
			),

			'icon_link' => array(
				'type' => 'checkbox',
				'label' => __('Link icon to more URL', 'hashcore-widgets-bundle'),
				'default' => false,
			),

			'new_window' => array(
				'type' => 'checkbox',
				'label' => __('Open more URL in a new window', 'hashcore-widgets-bundle'),
				'default' => false,
			),

		);
	}

	/**
	 * Get size information for all currently-registered image sizes.
	 * From codex example here: https://codex.wordpress.org/Function_Reference/get_intermediate_image_sizes
	 *
	 * @global $_wp_additional_image_sizes
	 * @uses   get_intermediate_image_sizes()
	 * @return array $sizes Data for all currently-registered image sizes.
	 */
	function get_image_sizes() {
		global $_wp_additional_image_sizes;

		$sizes = array();

		foreach ( get_intermediate_image_sizes() as $_size ) {
			if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
				$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
				$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
				$sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
			} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
				$sizes[ $_size ] = array(
					'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
					'height' => $_wp_additional_image_sizes[ $_size ]['height'],
					'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
				);
			}
		}

		return $sizes;
	}

	function get_style_name($instance){
		return 'features';
	}

	function get_less_variables( $instance ) {
		$less_vars = array();

		$fonts = $instance['fonts'];
		$styleable_text_fields = array( 'title', 'text', 'more_text' );

		foreach ( $styleable_text_fields as $field_name ) {

			if ( ! empty( $fonts[$field_name.'_options'] ) ) {
				$styles = $fonts[$field_name.'_options'];
				if ( ! empty( $styles['size'] ) ) {
					$less_vars[$field_name.'_size'] = $styles['size'];
				}
				if ( ! empty( $styles['color'] ) ) {
					$less_vars[$field_name.'_color'] = $styles['color'];
				}
				if ( ! empty( $styles['font'] ) ) {
					$font = hashcore_widget_get_font( $styles['font'] );
					$less_vars[$field_name.'_font'] = $font['family'];
					if ( ! empty( $font['weight'] ) ) {
						$less_vars[$field_name.'_font_weight'] = $font['weight'];
					}
				}
			}
		}

		return $less_vars;
	}

	function get_google_font_fields( $instance ) {

		$fonts = $instance['fonts'];

		return array(
			$fonts['title_options']['font'],
			$fonts['text_options']['font'],
			$fonts['more_text_options']['font'],
		);
	}

	function get_template_name($instance) {
		return 'base';
	}
}

hashcore_widget_register('sow-features', __FILE__, 'HashCore_Widget_Features_Widget');
