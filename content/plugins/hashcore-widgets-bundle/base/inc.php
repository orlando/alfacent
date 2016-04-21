<?php

include plugin_dir_path(__FILE__).'inc/fields/hashcore-widget-field-class-loader.class.php';
include plugin_dir_path(__FILE__).'hashcore-widget.class.php';

include plugin_dir_path(__FILE__).'inc/widget-manager.class.php';
include plugin_dir_path(__FILE__).'inc/meta-box-manager.php';
include plugin_dir_path(__FILE__).'inc/post-selector.php';
include plugin_dir_path(__FILE__).'inc/fonts.php';
include plugin_dir_path(__FILE__).'inc/string-utils.php';
include plugin_dir_path(__FILE__).'inc/attachments.php';

/**
 * @param $css
 */
function hashcore_widget_add_inline_css($css){
	global $hashcore_widgets_inline_styles;
	if(empty($hashcore_widgets_inline_styles)) $hashcore_widgets_inline_styles = '';

	$hashcore_widgets_inline_styles .= $css;
}

/**
 * Print any inline styles that have been added with hashcore_widget_add_inline_css
 */
function hashcore_widget_print_styles(){
	global $hashcore_widgets_inline_styles;
	if(!empty($hashcore_widgets_inline_styles)) {
		?><style type="text/css"><?php echo($hashcore_widgets_inline_styles) ?></style><?php
	}

	$hashcore_widgets_inline_styles = '';
}
add_action('wp_head', 'hashcore_widget_print_styles');
add_action('wp_footer', 'hashcore_widget_print_styles');

/**
 * The ajax handler for getting a list of available icons.
 */
function hashcore_widget_get_icon_list(){
	if(empty($_GET['family'])) exit();
	if ( empty( $_REQUEST['_widgets_nonce'] ) || !wp_verify_nonce( $_REQUEST['_widgets_nonce'], 'widgets_action' ) ) return;

	$widget_icon_families = apply_filters('hashcore_widgets_icon_families', array() );

	header('content-type: application/json');
	echo json_encode( !empty($widget_icon_families[$_GET['family']]) ? $widget_icon_families[$_GET['family']] : array() );
	exit();
}
add_action('wp_ajax_hashcore_widgets_get_icons', 'hashcore_widget_get_icon_list');

/**
 * @param $icon_value
 * @param bool $icon_styles
 *
 * @return bool|string
 */
function hashcore_widget_get_icon($icon_value, $icon_styles = false) {
	if( empty( $icon_value ) ) return false;
	list( $family, $icon ) = explode('-', $icon_value, 2);
	if( empty( $family ) || empty( $icon ) ) return false;

	static $widget_icon_families;
	static $widget_icons_enqueued = array();

	if( empty($widget_icon_families) ) $widget_icon_families = apply_filters('hashcore_widgets_icon_families', array() );
	if( empty($widget_icon_families[$family]) || empty($widget_icon_families[$family]['icons'][$icon]) ) return false;

	if(empty($widget_icons_enqueued[$family]) && !empty($widget_icon_families[$family]['style_uri'])) {
		if( !wp_style_is( 'hashcore-widget-icon-font-'.$family ) ) {
			wp_enqueue_style('hashcore-widget-icon-font-'.$family, $widget_icon_families[$family]['style_uri'] );
		}
		return '<span class="sow-icon-' . esc_attr($family) . '" data-sow-icon="' . $widget_icon_families[$family]['icons'][$icon] . '" ' . ( !empty($icon_styles) ? 'style="'.implode('; ', $icon_styles).'"' : '' ) . '></span>';
	}
	else {
		return false;
	}

}

/**
 * @param $font_value
 *
 * @return array
 */
function hashcore_widget_get_font($font_value) {

	$web_safe = array(
		'Helvetica Neue' => 'Arial, Helvetica, Geneva, sans-serif',
		'Lucida Grande' => 'Lucida, Verdana, sans-serif',
		'Georgia' => '"Times New Roman", Times, serif',
		'Courier New' => 'Courier, mono',
		'default' => 'default',
	);

	$font = array();
	if ( isset( $web_safe[ $font_value ] ) ) {
		$font['family'] = $web_safe[ $font_value ];
	}
	else if( hashcore_widgets_is_google_webfont( $font_value ) ) {
		$font_parts = explode( ':', $font_value );
		$font['family'] = $font_parts[0];
		$font_url_param = urlencode( $font_parts[0] );
		if ( count( $font_parts ) > 1 ) {
			$font['weight'] = $font_parts[1];
			$font_url_param .= ':' . $font_parts[1];
		}
		$font['css_import'] = '@import url(http' . ( is_ssl() ? 's' : '' ) . '://fonts.googleapis.com/css?family=' . $font_url_param . ');';
	}
	else {
		$font['family'] = $font_value;
		$font = apply_filters( 'hashcore_widget_get_custom_font_family', $font );
	}

	return $font;
}

/**
 * Action for displaying the widget preview.
 */
function hashcore_widget_preview_widget_action(){
	if( !class_exists($_POST['class']) ) exit();
	if ( empty( $_REQUEST['_widgets_nonce'] ) || !wp_verify_nonce( $_REQUEST['_widgets_nonce'], 'widgets_action' ) ) return;
	$widget = new $_POST['class'];
	if(!is_a($widget, 'HashCore_Widget')) exit();

	$instance = json_decode( stripslashes_deep($_POST['data']), true);
	/* @var $widget HashCore_Widget */
	$instance = $widget->update( $instance, $instance );
	$instance['is_preview'] = true;

	// The theme stylesheet will change how the button looks
	wp_enqueue_style( 'theme-css', get_stylesheet_uri(), array(), rand(0,65536) );
	wp_enqueue_style( 'so-widget-preview', plugin_dir_url(__FILE__).'/css/preview.css', array(), rand(0,65536) );

	ob_start();
	$widget->widget(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	), $instance);
	$widget_html = ob_get_clean();

	// Print all the scripts and styles
	?>
	<html>
		<head>
			<title><?php _e('Widget Preview', 'hashcore-widgets-bundle') ?></title>
			<?php
			wp_print_scripts();
			wp_print_styles();
			hashcore_widget_print_styles();
			?>
		</head>
		<body>
			<?php // A lot of themes use entry-content as their main content wrapper ?>
			<div class="entry-content">
				<?php echo $widget_html ?>
			</div>
		</body>
	</html>

	<?php
	exit();
}
add_action('wp_ajax_so_widgets_preview', 'hashcore_widget_preview_widget_action');

/**
 * Action to handle searching
 */
function hashcore_widget_search_posts_action(){
	if ( empty( $_REQUEST['_widgets_nonce'] ) || !wp_verify_nonce( $_REQUEST['_widgets_nonce'], 'widgets_action' ) ) return;

	header('content-type: application/json');

	// Get all public post types, besides attachments
	$post_types = (array) get_post_types( array(
		'public'   => true
	) );
	unset($post_types['attachment']);


	global $wpdb;
	if( !empty($_GET['query']) ) {
		$query = "AND post_title LIKE '%" . esc_sql( $_GET['query'] ) . "%'";
	}
	else {
		$query = '';
	}

	$post_types = "'" . implode("', '", array_map( 'esc_sql', $post_types ) ) . "'";

	$results = $wpdb->get_results( "
		SELECT ID, post_title, post_type
		FROM {$wpdb->posts}
		WHERE
			post_type IN ( {$post_types} ) AND post_status = 'publish' {$query}
		ORDER BY post_modified DESC
		LIMIT 20
	", ARRAY_A );

	echo json_encode( $results );
	wp_die();
}
add_action('wp_ajax_so_widgets_search_posts', 'hashcore_widget_search_posts_action');

/**
 * Compatibility with Page Builder, add the groups and icons.
 *
 * @param $widgets
 *
 * @return mixed
 */
function hashcore_widget_add_bundle_groups($widgets){
	foreach( $widgets as $class => &$widget ) {
		if( preg_match('/HashCore_Widget_(.*)_Widget/i', $class, $matches) ) {
			$widget['icon'] = 'so-widget-icon so-widget-icon-'.strtolower($matches[1]);
			$widget['groups'] = array('hashcore-widgets-bundle');
		}
	}

	return $widgets;
}
add_filter('hashcore_panels_widgets', 'hashcore_widget_add_bundle_groups', 11);

/**
 * Escape a URL
 *
 * @param $url
 *
 * @return string
 */
function sow_esc_url( $url ) {
	if( preg_match('/^post: *([0-9]+)/', $url, $matches) ) {
		// Convert the special post URL into a permalink
		$url = get_the_permalink( intval($matches[1]) );
		if( empty($url) ) return '';
	}

	$protocols = wp_allowed_protocols();
	$protocols[] = 'skype';
	return esc_url( $url, $protocols );
}

/**
 * A special URL escaping function that handles additional protocols
 *
 * @param $url
 *
 * @return string
 */
function sow_esc_url_raw( $url ) {
	if( preg_match('/^post: *([0-9]+)/', $url, $matches) ) {
		// Convert the special post URL into a permalink
		$url = get_the_permalink( intval($matches[1]) );
	}

	$protocols = wp_allowed_protocols();
	$protocols[] = 'skype';
	return esc_url_raw( $url, $protocols );
}

/**
 * Get all the Google Web Fonts.
 *
 * @return mixed|void
 */
function hashcore_widgets_fonts_google_webfonts( ) {
	$fonts = include plugin_dir_path( __FILE__ ) . 'inc/fonts.php';
	$fonts = apply_filters( 'hashcore_widgets_google_webfonts', $fonts );
	return !empty( $fonts ) ? $fonts : array();
}

function hashcore_widgets_is_google_webfont( $font_value ) {
	$google_webfonts = hashcore_widgets_fonts_google_webfonts();

	$font_family = explode( ':', $font_value );
	$font_family = $font_family[0];

	return isset( $google_webfonts[$font_family] );
}

function hashcore_widgets_font_families( ){
	// Add the default fonts
	$font_families = array(
		'Helvetica Neue' => 'Helvetica Neue',
		'Lucida Grande' => 'Lucida Grande',
		'Georgia' => 'Georgia',
		'Courier New' => 'Courier New',
	);

	// Add in all the Google font families
	foreach ( hashcore_widgets_fonts_google_webfonts() as $font => $variants ) {
		foreach ( $variants as $variant ) {
			if ( $variant == 'regular' || $variant == 400 ) {
				$font_families[ $font ] = $font;
			}
			else {
				$font_families[ $font . ':' . $variant ] = $font . ' (' . $variant . ')';
			}
		}
	}

	return apply_filters('hashcore_widgets_font_families', $font_families);
}

function hashcore_widgets_tinymce_admin_print_styles() {
	wp_enqueue_style( 'editor-buttons' );
}
add_action( 'admin_print_styles', 'hashcore_widgets_tinymce_admin_print_styles' );

/**
 * Get list of supported measurements
 *
 * @return array
 */
function hashcore_widgets_get_measurements_list() {
	$measurements = array(
		'px',
		'%',
		'in',
		'cm',
		'mm',
		'em',
		'rem',
		'pt',
		'pc',
		'ex',
		'ch',
		'vw',
		'vh',
		'vmin',
		'vmax',
	);

	// Allow themes and plugins to trim or enhance the list.
	return apply_filters('hashcore_widgets_get_measurements_list', $measurements);
}
