<?php
/*
Widget Name: Post Custom
Description: Gives you a widget to display your posts with custom format.
Author: Hashlabs
Author URI: https://
*/

/**
 * Add the carousel image sizes
 */
// function sow_carousel_register_image_sizes(){
// 	add_image_size('sow-carousel-default', 272, 182, true);
// }
// add_action('init', 'sow_carousel_register_image_sizes');
//
// function sow_carousel_get_next_posts_page() {
// 	if ( empty( $_REQUEST['_widgets_nonce'] ) || !wp_verify_nonce( $_REQUEST['_widgets_nonce'], 'widgets_action' ) ) return;
// 	$query = wp_parse_args(
// 		hashcore_widget_post_selector_process_query($_GET['query']),
// 		array(
// 			'post_status' => 'publish',
// 			'posts_per_page' => 10,
// 			'paged' => empty( $_GET['paged'] ) ? 1 : $_GET['paged']
// 		)
// 	);
//
// 	$posts = new WP_Query($query);
// 	ob_start();
// 	include 'tpl/carousel-post-loop.php';
// 	$result = array( 'html' => ob_get_clean() );
// 	header('content-type: application/json');
// 	echo json_encode( $result );
//
// 	exit();
// }
// add_action( 'wp_ajax_sow_carousel_load', 'sow_carousel_get_next_posts_page' );
// add_action( 'wp_ajax_nopriv_sow_carousel_load', 'sow_carousel_get_next_posts_page' );

class HashCore_Widget_Post_Custom extends HashCore_Widget {
	function __construct() {
		parent::__construct(
			'hashcore-post-custom',
			__('HashCore Post Custom show', 'hashcore-widgets-bundle'),
			array(
				'description' => __('Display your posts as custom.', 'hashcore-widgets-bundle'),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(

			),
			false ,
			plugin_dir_path(__FILE__).'../'
		);
	}

	// function initialize() {
	// 	$this->register_frontend_scripts(
	// 		array(
	// 			array(
	// 				'touch-swipe',
	// 				plugin_dir_url( SOW_BUNDLE_BASE_FILE ) . 'js/jquery.touchSwipe' . SOW_BUNDLE_JS_SUFFIX . '.js',
	// 				array( 'jquery' ),
	// 				'1.6.6'
	// 			),
	// 			array(
	// 				'sow-carousel-basic',
	// 				plugin_dir_url(__FILE__) . 'js/carousel' . SOW_BUNDLE_JS_SUFFIX . '.js',
	// 				array( 'jquery', 'touch-swipe' ),
	// 				SOW_BUNDLE_VERSION,
	// 				true
	// 			)
	// 		)
	// 	);
	// 	$this->register_frontend_styles(
	// 		array(
	// 			array(
	// 				'sow-carousel-basic',
	// 				plugin_dir_url(__FILE__) . 'css/style.css',
	// 				array(),
	// 				SOW_BUNDLE_VERSION
	// 			)
	// 		)
	// 	);
	// }

	function initialize_form(){
		return array(
			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'hashcore-widgets-bundle'),
			),

			'posts' => array(
				'type' => 'posts',
				'label' => __('Posts query', 'hashcore-widgets-bundle'),
			),
		);
	}

	function get_template_name($instance){
		return 'base';
	}

	function get_style_name($instance){
		return false;
	}
}

hashcore_widget_register('hashcore-post-custom', __FILE__, 'HashCore_Widget_Post_Custom');
