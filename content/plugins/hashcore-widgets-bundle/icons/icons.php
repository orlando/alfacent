<?php

define( 'HASHCORE_WIDGETS_ICONS', true );

function hashcore_widgets_icon_families_filter( $families ){
	$bundled = array(
		'elegantline' => __( 'Elegant Themes Line Icons', 'hashcore-widgets-bundle' ),
		'fontawesome' => __( 'Font Awesome', 'hashcore-widgets-bundle' ),
		'genericons' => __( 'Genericons', 'hashcore-widgets-bundle' ),
		'icomoon' => __( 'Icomoon Free', 'hashcore-widgets-bundle' ),
		'typicons' => __( 'Typicons', 'hashcore-widgets-bundle' ),
		'ionicons' => __( 'Ionicons', 'hashcore-widgets-bundle' ),
	);

	foreach ( $bundled as $font => $name) {
		include_once plugin_dir_path(__FILE__) . $font . '/filter.php';
		$families[$font] = array(
			'name' => $name,
			'style_uri' => plugin_dir_url(__FILE__) . $font . '/style.css',
			'icons' => apply_filters('hashcore_widgets_icons_' . $font, array() ),
		);
	}

	return $families;
}
add_filter( 'hashcore_widgets_icon_families', 'hashcore_widgets_icon_families_filter' );
