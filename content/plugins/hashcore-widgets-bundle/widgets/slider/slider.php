<?php
/*
Widget Name: Image Slider
Description: A very simple slider widget.
Author:
Author URI: https://
*/

if( !class_exists( 'HashCore_Widget_Base_Slider' ) ) include_once plugin_dir_path(SOW_BUNDLE_BASE_FILE) . '/base/inc/widgets/base-slider.class.php';

class HashCore_Widget_Slider_Widget extends HashCore_Widget_Base_Slider {
	function __construct() {
		parent::__construct(
			'sow-slider',
			__('HashCore Slider', 'hashcore-widgets-bundle'),
			array(
				'description' => __('A responsive slider widget that supports images and video.', 'hashcore-widgets-bundle'),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
				'panels_title' => false,
			),
			array(

			),
			false,
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize_form(){
		return array(
			'frames' => array(
				'type' => 'repeater',
				'label' => __('Slider frames', 'hashcore-widgets-bundle'),
				'item_name' => __('Frame', 'hashcore-widgets-bundle'),
				'item_label' => array(
					'selector' => "[id*='frames-url']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'background_videos' => array(
						'type' => 'repeater',
						'item_name' => __('Video', 'hashcore-widgets-bundle'),
						'label' => __('Background videos', 'hashcore-widgets-bundle'),
						'item_label' => array(
							'selector' => "[id*='frames-background_videos-url']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'fields' => $this->video_form_fields(),
					),

					'background_image' => array(
						'type' => 'media',
						'library' => 'image',
						'label' => __('Background image', 'hashcore-widgets-bundle'),
						'fallback' => true,
					),

					'background_color' => array(
						'type' => 'color',
						'label' => __('Background Color', 'hashcore-widgets-bundle'),
					),

					'background_image_type' => array(
						'type' => 'select',
						'label' => __('Background image type', 'hashcore-widgets-bundle'),
						'options' => array(
							'cover' => __('Cover', 'hashcore-widgets-bundle'),
							'tile' => __('Tile', 'hashcore-widgets-bundle'),
						),
						'default' => 'cover',
					),

					'foreground_image' => array(
						'type' => 'media',
						'library' => 'image',
						'label' => __('Foreground image', 'hashcore-widgets-bundle'),
						'fallback' => true,
					),

					'url' => array(
						'type' => 'link',
						'label' => __('Destination URL', 'hashcore-widgets-bundle'),
					),

					'new_window' => array(
						'type' => 'checkbox',
						'label' => __('Open in new window', 'hashcore-widgets-bundle'),
						'default' => false,
					),
				),
			),
			'controls' => array(
				'type' => 'section',
				'label' => __('Controls', 'hashcore-widgets-bundle'),
				'fields' => $this->control_form_fields()
			)
		);
	}

	function get_frame_background( $i, $frame ){
		$background_image = hashcore_widgets_get_attachment_image_src(
			$frame['background_image'],
			'full',
			!empty( $frame['background_image_fallback'] ) ? $frame['background_image_fallback'] : ''
		);

		return array(
			'color' => !empty( $frame['background_color'] ) ? $frame['background_color'] : false,
			'image' => !empty( $background_image ) ? $background_image[0] : false,
			'opacity' => 1,
			'image-sizing' => $frame['background_image_type'],
			'videos' => $frame['background_videos'],
			'video-sizing' => empty($frame['foreground_image']) ? 'full' : 'background',
			'url' => ! empty( $frame['url'] ) ? $frame['url'] : false,
			'new_window' => ! empty( $frame['new_window'] ) ? $frame['new_window'] : false,
		);
	}

	function render_frame_contents($i, $frame) {

		// Clear out any empty background videos
		if( !empty($frame['background_videos']) && is_array($frame['background_videos']) ){
			for( $i = 0; $i < count($frame['background_videos']); $i++ ){
				if( empty( $frame['background_videos'][$i]['file'] ) && empty($frame['background_videos'][$i]['url']) ) {
					unset($frame['background_videos'][$i]);
				}
			}
		}

		$foreground_src = hashcore_widgets_get_attachment_image_src(
			$frame['foreground_image'],
			'full',
			!empty( $frame['foreground_image_fallback'] ) ? $frame['foreground_image_fallback'] : ''
		);

		if( !empty($foreground_src) ) {
			?>
			<div class="sow-slider-image-container">
				<div class="sow-slider-image-wrapper" style="<?php if(!empty($foreground_src[1])) echo 'max-width: ' . intval($foreground_src[1]) . 'px' ?>">
					<?php
					if(!empty($frame['url'])) echo '<a href="' . sow_esc_url($frame['url']) . '" ' . ( !empty($frame['new_window']) ? 'target="_blank"' : '' ) . '>';
					echo hashcore_widgets_get_attachment_image(
						$frame['foreground_image'],
						'full',
						!empty( $frame['foreground_image_fallback'] ) ? $frame['foreground_image_fallback'] : ''
					);
					if(!empty($frame['url'])) echo '</a>';
					?>
				</div>
			</div>
			<?php
		}
		else if( empty($frame['background_videos']) ) {
			// We need to find another background
			if(!empty($frame['url'])) echo '<a href="' . sow_esc_url($frame['url']) . '" ' . ( !empty($frame['new_window']) ? 'target="_blank"' : '' ) . '>';

			// Lets use the background image
			echo hashcore_widgets_get_attachment_image(
				$frame['background_image'],
				'full',
				!empty( $frame['background_image_fallback'] ) ? $frame['background_image_fallback'] : ''
			);

			if( !empty($frame['url']) ) echo '</a>';
		}

	}

	/**
	 * The less variables to control the design of the slider
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	function get_less_variables($instance) {
		$less = array();

		if( !empty($instance['controls']['nav_color_hex']) ) $less['nav_color_hex'] = $instance['controls']['nav_color_hex'];
		if( !empty($instance['controls']['nav_size']) ) $less['nav_size'] = $instance['controls']['nav_size'];

		return $less;
	}

	/**
	 * Change the instance to the new one we're using for sliders
	 *
	 * @param $instance
	 *
	 * @return mixed|void
	 */
	function modify_instance( $instance ){
		if( empty($instance['controls']) ) {
			if( !empty($instance['speed']) ) $instance['controls']['speed'] = $instance['speed'];
			if( !empty($instance['timeout']) ) $instance['controls']['timeout'] = $instance['timeout'];
			if( !empty($instance['nav_color_hex']) ) $instance['controls']['nav_color_hex'] = $instance['nav_color_hex'];
			if( !empty($instance['nav_style']) ) $instance['controls']['nav_style'] = $instance['nav_style'];
			if( !empty($instance['nav_size']) ) $instance['controls']['nav_size'] = $instance['nav_size'];

			unset($instance['speed']);
			unset($instance['timeout']);
			unset($instance['nav_color_hex']);
			unset($instance['nav_style']);
			unset($instance['nav_size']);
		}

		return $instance;
	}
}

hashcore_widget_register('sow-slider', __FILE__, 'HashCore_Widget_Slider_Widget');
