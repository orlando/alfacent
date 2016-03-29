<?php
/*
Widget Name: Price Table
Description: A powerful yet simple price table widget for your sidebars or Page Builder pages.
Author:
Author URI: https://
*/

class HashCore_Widget_PriceTable_Widget extends HashCore_Widget {
	function __construct() {
		parent::__construct(
			'sow-price-table',
			__('HashCore Price Table', 'hashcore-widgets-bundle'),
			array(
				'description' => __('A simple Price Table.', 'hashcore-widgets-bundle'),
				'help' => 'https:///widgets-bundle/price-table-widget/'
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'hashcore-widgets-bundle'),
				),

				'columns' => array(
					'type' => 'repeater',
					'label' => __('Columns', 'hashcore-widgets-bundle'),
					'item_name' => __('Column', 'hashcore-widgets-bundle'),
					'item_label' => array(
						'selector' => "[id*='columns-title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'featured' => array(
							'type' => 'checkbox',
							'label' => __('Featured', 'hashcore-widgets-bundle'),
						),
						'title' => array(
							'type' => 'text',
							'label' => __('Title', 'hashcore-widgets-bundle'),
						),
						'subtitle' => array(
							'type' => 'text',
							'label' => __('Subtitle', 'hashcore-widgets-bundle'),
						),

						'image' => array(
							'type' => 'media',
							'label' => __('Image', 'hashcore-widgets-bundle'),
						),

						'image_title' => array(
							'type' => 'text',
							'label' => __('Image title', 'hashcore-widgets-bundle'),
						),

						'image_alt' => array(
							'type' => 'text',
							'label' => __('Image alt text', 'hashcore-widgets-bundle'),
						),

						'price' => array(
							'type' => 'text',
							'label' => __('Price', 'hashcore-widgets-bundle'),
						),
						'per' => array(
							'type' => 'text',
							'label' => __('Per', 'hashcore-widgets-bundle'),
						),
						'button' => array(
							'type' => 'text',
							'label' => __('Button text', 'hashcore-widgets-bundle'),
						),
						'url' => array(
							'type' => 'link',
							'label' => __('Button URL', 'hashcore-widgets-bundle'),
						),
						'features' => array(
							'type' => 'repeater',
							'label' => __('Features', 'hashcore-widgets-bundle'),
							'item_name' => __('Feature', 'hashcore-widgets-bundle'),
							'item_label' => array(
								'selector' => "[id*='columns-features-text']",
								'update_event' => 'change',
								'value_method' => 'val'
							),
							'fields' => array(
								'text' => array(
									'type' => 'text',
									'label' => __('Text', 'hashcore-widgets-bundle'),
								),
								'hover' => array(
									'type' => 'text',
									'label' => __('Hover text', 'hashcore-widgets-bundle'),
								),
								'icon_new' => array(
									'type' => 'icon',
									'label' => __('Icon', 'hashcore-widgets-bundle'),
								),
								'icon_color' => array(
									'type' => 'color',
									'label' => __('Icon color', 'hashcore-widgets-bundle'),
								),
							),
						),
					),
				),

				'theme' => array(
					'type' => 'select',
					'label' => __('Price table theme', 'hashcore-widgets-bundle'),
					'options' => array(
						'atom' => __('Atom', 'hashcore-widgets-bundle'),
					),
				),

				'header_color' => array(
					'type' => 'color',
					'label' => __('Header color', 'hashcore-widgets-bundle'),
				),

				'featured_header_color' => array(
					'type' => 'color',
					'label' => __('Featured header color', 'hashcore-widgets-bundle'),
				),

				'button_color' => array(
					'type' => 'color',
					'label' => __('Button color', 'hashcore-widgets-bundle'),
				),

				'featured_button_color' => array(
					'type' => 'color',
					'label' => __('Featured button color', 'hashcore-widgets-bundle'),
				),

				'button_new_window' => array(
					'type' => 'checkbox',
					'label' => __('Open Button URL in a new window', 'hashcore-widgets-bundle'),
				),
			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function initialize() {
		$this->register_frontend_scripts(
			array(
				array(
					'hashcore-pricetable',
					plugin_dir_url(__FILE__) . 'js/pricetable' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' )
				)
			)
		);
	}

	function get_column_classes($column, $i, $columns) {
		$classes = array();
		if($i == 0) $classes[] = 'ow-pt-first';
		if($i == count($columns) -1 ) $classes[] = 'ow-pt-last';
		if(!empty($column['featured'])) $classes[] = 'ow-pt-featured';

		if($i % 2 == 0) $classes[] = 'ow-pt-even';
		else $classes[] = 'ow-pt-odd';

		return implode(' ', $classes);
	}

	function column_image($column){
		$src = wp_get_attachment_image_src($column['image'], 'full');
		$img_attrs = array();
		if ( !empty( $column['image_title'] ) ) $img_attrs['title'] = $column['image_title'];
		if ( !empty( $column['image_alt'] ) ) $img_attrs['alt'] = $column['image_alt'];
		$attr_string = '';
		foreach ( $img_attrs as $attr => $val ) {
			$attr_string .= ' ' . $attr . '="' . esc_attr( $val ) . '"';
		}
		?><img src="<?php echo $src[0] ?>"<?php echo $attr_string ?>/> <?php
	}

	function get_template_name($instance) {
		return $this->get_style_name($instance);
	}

	function get_style_name($instance) {
		if(empty($instance['theme'])) return 'atom';
		return $instance['theme'];
	}

	/**
	 * Get the LESS variables for the price table widget.
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	function get_less_variables($instance){
		$instance = wp_parse_args($instance, array(
			'header_color' => '',
			'featured_header_color' => '',
			'button_color' => '',
			'featured_button_color' => '',
		));

		$colors = array(
			'header_color' => $instance['header_color'],
			'featured_header_color' => $instance['featured_header_color'],
			'button_color' => $instance['button_color'],
			'featured_button_color' => $instance['featured_button_color'],
		);

		if( !class_exists('HashCore_Widgets_Color_Object') ) require plugin_dir_path( SOW_BUNDLE_BASE_FILE ).'base/inc/color.php';

		if( !empty( $instance['button_color'] ) ) {
			$color = new HashCore_Widgets_Color_Object( $instance['button_color'] );
			$color->lum += ($color->lum > 0.75 ? -0.5 : 0.8);
			$colors['button_text_color'] = $color->hex;
		}

		if( !empty( $instance['featured_button_color'] ) ) {
			$color = new HashCore_Widgets_Color_Object( $instance['featured_button_color'] );
			$color->lum += ($color->lum > 0.75 ? -0.5 : 0.8);
			$colors['featured_button_text_color'] = $color->hex;
		}

		return $colors;
	}

	/**
	 * Modify the instance to use the new icon.
	 */
	function modify_instance($instance){
		if( empty( $instance['columns'] ) || !is_array($instance['columns']) ) return $instance;

		foreach( $instance['columns'] as &$column) {
			if( empty($column['features']) || !is_array($column['features']) ) continue;

			foreach($column['features'] as &$feature) {

				if( empty($feature['icon_new']) && !empty($feature['icon']) ) {
					$feature['icon_new'] = 'fontawesome-'.$feature['icon'];
				}

			}
		}

		return $instance;
	}
}

hashcore_widget_register('sow-price-table', __FILE__, 'HashCore_Widget_PriceTable_Widget');
