<?php
/**
 * Create group of widgets Hashcore and add new widgets
 *
 * @package Hashcore
 */

/**
 * Function to create group of widgets in page builder
 *
 * @param array $tabs with name of widget tabs.
 */
function hashcore_add_widget_tabs( $tabs ) {
	$tabs[] = array(
		'title' => __( 'Hashcore Widgets', 'hashcore' ),
		'filter' => array(
			'groups' => array( 'hashcore-tab' ),
		),
	);

	return $tabs;
}
add_filter( 'siteorigin_panels_widget_dialog_tabs', 'hashcore_add_widget_tabs', 20 );

/**
 * Function to include all widgets
 *
 * @param array $folders to widgets path.
 * @return array with widgets path.
 */
function add_my_awesome_widgets_collection( $folders ) {
	$folders[] = get_template_directory() . '/widgets/';
	return $folders;
}
add_filter( 'hashcore_widgets_widget_folders', 'add_my_awesome_widgets_collection' );
