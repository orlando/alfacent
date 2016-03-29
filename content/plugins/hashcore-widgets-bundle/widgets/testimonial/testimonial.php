<?php
/*
Widget Name: Testimonials
Description: Display some testimonials.
Author:
Author URI: https://
*/

class HashCore_Widgets_Testimonials_Widget extends HashCore_Widget {

	function __construct() {
		parent::__construct(
			'sow-testimonials',
			__('HashCore Testimonials', 'hashcore-widgets-bundle'),
			array(
				'description' => __('Share your product/service testimonials in a variety of different ways.', 'hashcore-widgets-bundle'),
				'help' => 'https:///widgets-bundle/testimonial-widget-documentation/'
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'hashcore-widgets-bundle'),
				),
				'testimonials' => array(
					'type' => 'repeater',
					'label' => __( 'Testimonials', 'hashcore-widgets-bundle' ),
					'item_name'  => __( 'Testimonial', 'hashcore-widgets-bundle' ),
					'item_label' => array(
						'selector'     => "[id*='testimonials-name']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'name' => array(
							'type' => 'text',
							'label' => __('Name', 'hashcore-widgets-bundle'),
							'description' => __('The author of the testimonial', 'hashcore-widgets-bundle'),
						),

						'link_name' => array(
							'type' => 'checkbox',
							'label' => __('Link name', 'hashcore-widgets-bundle'),
						),

						'location' => array(
							'type' => 'text',
							'label' => __('Location', 'hashcore-widgets-bundle'),
							'description' => __('Their location or company name', 'hashcore-widgets-bundle'),
						),

						'image' => array(
							'type' => 'media',
							'label' => __('Image', 'hashcore-widgets-bundle'),
						),

						'link_image' => array(
							'type' => 'checkbox',
							'label' => __('Link image', 'hashcore-widgets-bundle'),
						),

						'text' => array(
							'type' => 'tinymce',
							'label' => __('Text', 'hashcore-widgets-bundle'),
							'description' => __('What your customer had to say', 'hashcore-widgets-bundle'),
						),

						'url' => array(
							'type' => 'text',
							'label' => __('URL', 'hashcore-widgets-bundle'),
						),

						'new_window' => array(
							'type' => 'checkbox',
							'label' => __('Open In New Window', 'hashcore-widgets-bundle'),
						),
					)
				),

				'settings' => array(
					'type' => 'section',
					'label' => __('Settings', 'hashcore-widgets-bundle'),
					'fields' => array(

						'per_line' => array(
							'type' => 'slider',
							'label' => __( 'Testimonials per row', 'hashcore-widgets-bundle' ),
							'min' => 1,
							'max' => 5,
							'integer' => true,
							'default' => 3
						),

						'responsive' => array(
							'type' => 'section',
							'label' => __('Responsive', 'hashcore-widgets-bundle'),
							'hide' => true,
							'fields' => array(
								'tablet' => array(
									'type' => 'section',
									'label' => __('Tablet', 'hashcore-widgets-bundle'),
									'fields' => array(
										'per_line' => array(
											'type' => 'slider',
											'label' => __( 'Testimonials per row', 'hashcore-widgets-bundle' ),
											'min' => 1,
											'max' => 5,
											'integer' => true,
											'default' => 2
										),
										'width' => array(
											'type' => 'text',
											'label' => __('Resolution', 'hashcore-widgets-bundle'),
											'description' => __('The resolution to treat as a tablet resolution.', 'hashcore-widgets-bundle'),
											'default' => 800,
											'sanitize' => 'intval',
										)
									)
								),
								'mobile' => array(
									'type' => 'section',
									'label' => __('Mobile Phone', 'hashcore-widgets-bundle'),
									'fields' => array(
										'per_line' => array(
											'type' => 'slider',
											'label' => __( 'Testimonials per row', 'hashcore-widgets-bundle' ),
											'min' => 1,
											'max' => 5,
											'integer' => true,
											'default' => 1
										),
										'width' => array(
											'type' => 'text',
											'label' => __('Resolution', 'hashcore-widgets-bundle'),
											'description' => __('The resolution to treat as a tablet resolution.', 'hashcore-widgets-bundle'),
											'default' => 480,
											'sanitize' => 'intval',
										)
									)
								)

							)
						),
					)
				),

				'design' => array(
					'type' => 'section',
					'label' => __('Design', 'hashcore-widgets-bundle'),
					'fields' => array(

						'image' => array(
						    'type' => 'section',
						    'label' => __('Image', 'hashcore-widgets-bundle'),
						    'fields' => array(
							    'image_shape' => array(
								    'type' => 'select',
								    'label' => __('Testimonial image shape', 'hashcore-widgets-bundle'),
								    'options' => array(
									    'square' => __('Square', 'hashcore-widgets-bundle'),
									    'round' => __('Round', 'hashcore-widgets-bundle'),
								    ),
								    'default' => 'square',
							    ),

							    'image_size' => array(
								    'type' => 'slider',
								    'label' => __('Image size', 'hashcore-widgets-bundle'),
								    'integer' => true,
								    'default' => 50,
								    'max' => 150,
								    'min' => 20,
							    ),
						    ),
						),

						'colors' => array(
							'type' => 'section',
							'label' => __('Colors', 'hashcore-widgets-bundle'),
							'fields' => array(
								'testimonial_background' => array(
									'type' => 'color',
									'label' => __('Widget Background', 'hashcore-widgets-bundle'),
								),
								'text_background' => array(
									'type' => 'color',
									'label' => __('Text Background', 'hashcore-widgets-bundle'),
									'default' => '#f0f0f0',
								),
								'text_color' => array(
									'type' => 'color',
									'label' => __('Text Color', 'hashcore-widgets-bundle'),
									'default' => '#444444',
								),
							),
						),

						'padding' => array(
						    'type' => 'slider',
						    'label' => __('Padding', 'hashcore-widgets-bundle'),
						    'integer' => true,
						    'default' => 10,
							'max' => 100,
							'min' => 0,
						),

						'border_radius' => array(
							'type' => 'slider',
							'label' => __('Padding', 'hashcore-widgets-bundle'),
							'integer' => true,
							'default' => 4,
							'max' => 100,
							'min' => 0,
						),

						'user_position' => array(
							'type' => 'select',
							'label' => __('User position', 'hashcore-widgets-bundle'),
							'options' => array(
								'left' => __('Left', 'hashcore-widgets-bundle'),
								'right' => __('Right', 'hashcore-widgets-bundle'),
								'middle' => __('Middle', 'hashcore-widgets-bundle'),
							),
							'default' => 'left',
						),

						'layout' => array(
							'type' => 'select',
							'label' => __('Testimonial layout', 'hashcore-widgets-bundle'),
							'options' => array(
								'side' => __('Side by side', 'hashcore-widgets-bundle'),
								'text_above' => __('Text above user', 'hashcore-widgets-bundle'),
								'text_below' => __('Text below user', 'hashcore-widgets-bundle'),
							),
							'default' => 'side',
						),
					),
				),
			)
		);
	}

	function initialize(){
		$this->register_frontend_styles( array(
			array(
				'sow-testimonial',
				plugin_dir_url(__FILE__) . 'css/style.css'
			)
		) );
	}

	function caret_svg(){
		static $done = false;
		if( $done ) return;

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
		return array (
			'image_size' => intval($instance['design']['image']['image_size']) . 'px',
			'testimonial_size' => round(100/$instance['settings']['per_line'], 4) . '%',
			'testimonial_padding' => intval($instance['design']['padding']) . 'px',
			'testimonial_background' => $instance['design']['colors']['testimonial_background'],

			// The text block
			'text_border_radius' => intval($instance['design']['border_radius']) . 'px',
			'text_background' => $instance['design']['colors']['text_background'],
			'text_color' => $instance['design']['colors']['text_color'],

			// All the responsive sizes
			'tablet_testimonial_size' => round(100/$instance['settings']['responsive']['tablet']['per_line'], 4) . '%',
			'tablet_width' => intval($instance['settings']['responsive']['tablet']['width']) . 'px',
			'mobile_testimonial_size' => round(100/$instance['settings']['responsive']['mobile']['per_line'], 4) . '%',
			'mobile_width' => intval($instance['settings']['responsive']['mobile']['width']) . 'px',
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

	function testimonial_pointer( $design ){

	}

	function testimonial_wrapper_class($design){
		$classes = array();
		$classes[] = 'sow-user-' . sanitize_html_class( $design['user_position'] );
		$classes[] = 'sow-layout-' . sanitize_html_class( $design['layout'] );
		return str_replace( '_', '-', implode( ' ', $classes ) );
	}

}

hashcore_widget_register( 'sow-testimonials', __FILE__, 'HashCore_Widgets_Testimonials_Widget' );
