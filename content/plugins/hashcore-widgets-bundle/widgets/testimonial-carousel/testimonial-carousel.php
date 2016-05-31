<?php
/*
Widget Name: Testimonials Carousel
Description: Display some testimonials with carousel.
Author:
Author URI: https://
*/

class HashCore_Widgets_Testimonials_Carousel extends HashCore_Widget {

	function __construct() {
		parent::__construct(
			'hashcore-testimonials-carousel',
			__( 'HashCore Testimonials Carousel', 'hashcore-widgets-bundle' ),
			array(
				'description' => __( 'Share your product/service testimonials in a variety of different ways.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			false,
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize() {
		$this->register_frontend_scripts(
			array(
				array(
					'touch-swipe',
					plugin_dir_url( SOW_BUNDLE_BASE_FILE ) . 'js/owl.carousel' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' ),
				),
				array(
					'sow-carousel-basic',
					plugin_dir_url( __FILE__ ) . 'js/t-carousel' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery', 'touch-swipe' ),
					SOW_BUNDLE_VERSION,
					true,
				),
			)
		);
		$this->register_frontend_styles(
			array(
				array(
					'hashcore-testimonials-carousel',
					plugin_dir_url( __FILE__ ) . 'css/style.css',
				),
			)
		);
	}

	function initialize_form(){
		return array(
			'title' => array(
				'type' => 'text',
				'label' => __( 'Title', 'hashcore-widgets-bundle' ),
			),
			'testimonials' => array(
				'type' => 'repeater',
				'label' => __( 'Testimonials', 'hashcore-widgets-bundle' ),
				'item_name'  => __( 'Testimonial', 'hashcore-widgets-bundle' ),
				'item_label' => array(
					'selector'     => "[id*='testimonials-name']",
					'update_event' => 'change',
					'value_method' => 'val',
				),
				'fields' => array(
					'name' => array(
						'type' => 'text',
						'label' => __( 'Name', 'hashcore-widgets-bundle' ),
						'description' => __( 'The author of the testimonial', 'hashcore-widgets-bundle' ),
					),

					'link_name' => array(
						'type' => 'checkbox',
						'label' => __( 'Link name', 'hashcore-widgets-bundle' ),
					),

					'location' => array(
						'type' => 'text',
						'label' => __( 'Location', 'hashcore-widgets-bundle' ),
						'description' => __( 'Their location or company name', 'hashcore-widgets-bundle' ),
					),

					'image' => array(
						'type' => 'media',
						'label' => __( 'Image', 'hashcore-widgets-bundle' ),
					),

					'link_image' => array(
						'type' => 'checkbox',
						'label' => __( 'Link image', 'hashcore-widgets-bundle' ),
					),

					'text' => array(
						'type' => 'tinymce',
						'label' => __( 'Text', 'hashcore-widgets-bundle' ),
						'description' => __( 'What your customer had to say', 'hashcore-widgets-bundle' ),
					),

					'url' => array(
						'type' => 'text',
						'label' => __( 'URL', 'hashcore-widgets-bundle' ),
					),

					'new_window' => array(
						'type' => 'checkbox',
						'label' => __( 'Open In New Window', 'hashcore-widgets-bundle' ),
					),
				),
			),

			'settings' => array(
				'type'	=> 'section',
				'label' => __( 'Settings', 'hashcore-widgets-bundle' ),
				'hide'  => true,
				'fields' => array(

					'per_line_desktop' => array(
						'type' => 'slider',
						'label' => __( 'Testimonials per row desktop', 'hashcore-widgets-bundle' ),
						'min' => 1,
						'max' => 5,
						'integer' => true,
						'default' => 1,
					),

					'per_line_tablet' => array(
						'type' => 'slider',
						'label' => __( 'Testimonials per row desktop', 'hashcore-widgets-bundle' ),
						'min' => 1,
						'max' => 5,
						'integer' => true,
						'default' => 1,
					),

					'per_line_mobile' => array(
						'type' => 'slider',
						'label' => __( 'Testimonials per row desktop', 'hashcore-widgets-bundle' ),
						'min' => 1,
						'max' => 5,
						'integer' => true,
						'default' => 1,
					),
				),
			),

			'design' => array(
				'type' => 'section',
				'label' => __( 'Design', 'hashcore-widgets-bundle' ),
				'hide'  => true,
				'fields' => array(

					'image' => array(
						'type' => 'section',
						'label' => __( 'Image', 'hashcore-widgets-bundle' ),
						'default' => 'square',
						'fields' => array(
							'image_shape' => array(
								'type' => 'select',
								'label' => __( 'Testimonial image shape', 'hashcore-widgets-bundle' ),
								'options' => array(
									'square' => __( 'Square', 'hashcore-widgets-bundle' ),
									'round' => __( 'Round', 'hashcore-widgets-bundle' ),
								),
							),

							'image_size' => array(
								'type' => 'slider',
								'label' => __( 'Image size', 'hashcore-widgets-bundle' ),
								'integer' => true,
								'default' => 50,
								'max' => 150,
								'min' => 20,
							),
						),
					),

					'colors' => array(
						'type' => 'section',
						'label' => __( 'Colors', 'hashcore-widgets-bundle' ),
						'fields' => array(
							'testimonial_background' => array(
								'type' => 'color',
								'label' => __( 'Widget Background', 'hashcore-widgets-bundle' ),
							),
							'text_background' => array(
								'type' => 'color',
								'label' => __( 'Text Background', 'hashcore-widgets-bundle' ),
							),
							'text_color' => array(
								'type' => 'color',
								'label' => __( 'Text Color', 'hashcore-widgets-bundle' ),
								'default' => '#444444',
							),
							'text_color_author' => array(
								'type' => 'color',
								'label' => __( 'Text Author Color', 'hashcore-widgets-bundle' ),
								'default' => '#444444',
							),
						),
					),

					'font' => array(
						'type' => 'section',
						'label' => __( 'Fonts size', 'hashcore-widgets-bundle' ),
						'fields' => array(
							'size_text' => array(
								'type' => 'select',
								'label' => __( 'Font size text', 'hashcore-widgets-bundle' ),
								'default' => '1',
								'options' => array(
									'1' => __( 'Normal', 'hashcore-widgets-bundle' ),
									'1.15' => __( 'Medium', 'hashcore-widgets-bundle' ),
									'1.3' => __( 'Large', 'hashcore-widgets-bundle' ),
									'1.45' => __( 'Extra large', 'hashcore-widgets-bundle' ),
								),
							),

							'weight_text' => array(
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

							'size_author' => array(
								'type' => 'select',
								'label' => __( 'Font size Author', 'hashcore-widgets-bundle' ),
								'default' => '.6',
								'options' => array(
									'.6' => __( 'Normal', 'hashcore-widgets-bundle' ),
									'.8' => __( 'Medium', 'hashcore-widgets-bundle' ),
									'1' => __( 'Large', 'hashcore-widgets-bundle' ),
									'1.3' => __( 'Extra large', 'hashcore-widgets-bundle' ),
								),
							),

							'weight_author' => array(
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
						),
					),

					'padding' => array(
						'type' => 'slider',
						'label' => __( 'Padding of text', 'hashcore-widgets-bundle' ),
						'integer' => false,
						'default' => 2,
						'max' => 10,
						'min' => 0,
					),

					'border_radius' => array(
						'type' => 'slider',
						'label' => __( 'Padding of image', 'hashcore-widgets-bundle' ),
						'integer' => true,
						'default' => 4,
						'max' => 100,
						'min' => 0,
					),

					'user_position' => array(
						'type' => 'select',
						'label' => __( 'User position', 'hashcore-widgets-bundle' ),
						'default' => 'center',
						'options' => array(
							'left' => __( 'Left', 'hashcore-widgets-bundle' ),
							'right' => __( 'Right', 'hashcore-widgets-bundle' ),
							'center' => __( 'Center', 'hashcore-widgets-bundle' ),
						),
					),

					'layout' => array(
						'type' => 'select',
						'label' => __( 'Testimonial layout', 'hashcore-widgets-bundle' ),
						'default' => 'text_above',
						'options' => array(
							'text_above' => __( 'Text above user', 'hashcore-widgets-bundle' ),
							'text_below' => __( 'Text below user', 'hashcore-widgets-bundle' ),
						),
					),
				),
			),
		);
	}

	function caret_svg(){
		static $done = false;
		if ( $done ) return;

		?>
		<svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs>
				<symbol id="icon-caret-down" viewBox="0 0 585 1024">
					<title>caret-down</title>
					<path class="path1" d="M585.143 402.286q0 14.857-10.857 25.714l-256 256q-10.857 10.857-25.714 10.857t-25.714-10.857l-256-256q-10.857-10.857-10.857-25.714t10.857-25.714 25.714-10.857h512q14.857 0 25.714 10.857t10.857 25.714z"></path>
				</symbol>
				<symbol id="icon-caret-up" viewBox="0 0 585 1024">
					<title>caret-up</title>
					<path class="path1" d="M585.143 694.857q0 14.857-10.857 25.714t-25.714 10.857h-512q-14.857 0-25.714-10.857t-10.857-25.714 10.857-25.714l256-256q10.857-10.857 25.714-10.857t25.714 10.857l256 256q10.857 10.857 10.857 25.714z"></path>
				</symbol>
				<symbol id="icon-caret-left" viewBox="0 0 366 1024">
					<title>caret-left</title>
					<path class="path1" d="M365.714 256v512q0 14.857-10.857 25.714t-25.714 10.857-25.714-10.857l-256-256q-10.857-10.857-10.857-25.714t10.857-25.714l256-256q10.857-10.857 25.714-10.857t25.714 10.857 10.857 25.714z"></path>
				</symbol>
				<symbol id="icon-caret-right" viewBox="0 0 366 1024">
					<title>caret-right</title>
					<path class="path1" d="M329.143 512q0 14.857-10.857 25.714l-256 256q-10.857 10.857-25.714 10.857t-25.714-10.857-10.857-25.714v-512q0-14.857 10.857-25.714t25.714-10.857 25.714 10.857l256 256q10.857 10.857 10.857 25.714z"></path>
				</symbol>
			</defs>
		</svg>
		<?php
		$done = true;
	}

	function get_less_variables( $instance ){
		return array(
			'image_size' => intval($instance['design']['image']['image_size']) . 'px',
			'testimonial_size' => round(100/$instance['settings']['per_line_desktop'], 4) . '%',
			'testimonial_padding' => intval($instance['design']['padding']) . 'em',
			'testimonial_background' => ! empty( $instance['design']['colors']['testimonial_background'] ) ? $instance['design']['colors']['testimonial_background'] : 'transparent',

			// The text block.
			'text_border_radius' => intval($instance['design']['border_radius']) . 'px',
			'text_background' => ! empty( $instance['design']['colors']['text_background'] ) ? $instance['design']['colors']['text_background'] : 'transparent',
			'text_color' => $instance['design']['colors']['text_color'],
			'user_position' => $instance['design']['user_position'],
			'text_color_author' => $instance['design']['colors']['text_color_author'],
			'size_author' => $instance['design']['font']['size_author'] . 'em',
			'size_text' => $instance['design']['font']['size_text'] . 'em',
			'weight_text' => $instance['design']['font']['weight_text'],
			'weight_author' => $instance['design']['font']['weight_author'],

			// All the responsive sizes.
			'tablet_testimonial_size' => round(100/$instance['settings']['per_line_tablet'], 4) . '%',
			'mobile_testimonial_size' => round(100/$instance['settings']['per_line_mobile'], 4) . '%',
		);
	}

	function get_template_variables( $instance, $args ){
		return array(
			'testimonials' => !empty($instance['testimonials']) ? $instance['testimonials'] : array(),
			'settings' => $instance['settings'],
			'design' => $instance['design'],
		);
	}

	function testimonial_user_image( $image_id, $design ){
		if ( ! empty( $image_id ) ) {
			if( $design['image']['image_shape'] == 'square') {
				return wp_get_attachment_image( $image_id, array( $design['image']['image_size'], $design['image']['image_size'] ), false, array(
					'class' => 'sow-image-shape-' . $design['image']['image_shape'],
				) );
			}
			else {
				$src = wp_get_attachment_image_src( $image_id, array( $design['image']['image_size'], $design['image']['image_size'] ) );
				return '<div class="sow-round-image-frame" style="background-image: url(' . esc_url( $src[0] ) . '); width:' . intval($design['image']['image_size']) . 'px; height:' . intval($design['image']['image_size']) . 'px"></div>';
			}
		}
	}

	function testimonial_wrapper_class($design){
		$classes = array();
		$classes[] = 'sow-user-' . sanitize_html_class( $design['user_position'] );
		$classes[] = 'sow-layout-' . sanitize_html_class( $design['layout'] );
		return str_replace( '_', '-', implode( ' ', $classes ) );
	}
}

hashcore_widget_register( 'hashcore-testimonials-carousel', __FILE__, 'HashCore_Widgets_Testimonials_Carousel' );
