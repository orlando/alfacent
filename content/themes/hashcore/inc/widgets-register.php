<?php
/**
 * Include Hashcore widgets to siteorigin-widgets
 *
 * @package Hashcore
 */

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
add_filter( 'siteorigin_widgets_widget_folders', 'add_my_awesome_widgets_collection' );
