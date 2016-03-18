<?php
/**
 * Description: Menu tree
 *
 * @package Hashcore
 */

add_action( 'admin_menu', 'hashcore_page_menu_tree' );
/**
 * Add menu tree for the admin area
 */
function hashcore_page_menu_tree() {
	// Add a new top-level menu.
	$page_title = ' Hashcore';
	$menu_title = ' Hashcore';
	$capability = 'manage_options';
	$menu_slug = 'hashcore';
	$function = 'hashcore_welcome_page';
	$icon_url = 'dashicons-welcome-view-site';
	$position = 2;

	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	// Add a new sub-level menu Support.
	$parent = 'hashcore';
	$page_title = 'Support';
	$sub_menu_title = 'Support';
	$capability = 'manage_options';
	$menu_slug = 'hashcore-support';
	$function = 'hashcore_support_page';
	$icon_url = '';
	$position = 2;

	add_submenu_page( $parent, $page_title, $sub_menu_title, $capability, $menu_slug, $function, $icon_url, $position );

	// Add a new sub-level menu Install Demo.
	$parent = 'hashcore';
	$page_title = 'Install Demos';
	$sub_menu_title = 'Install Demos';
	$capability = 'manage_options';
	$menu_slug = 'hashcore-demos';
	$function = 'hashcore_demos_page';
	$icon_url = '';
	$position = 3;

	add_submenu_page( $parent, $page_title, $sub_menu_title, $capability, $menu_slug, $function, $icon_url, $position );

	// Add a new sub-level menu Info.
	$parent = 'hashcore';
	$page_title = 'Info';
	$sub_menu_title = 'Info';
	$capability = 'manage_options';
	$menu_slug = 'hashcore-info';
	$function = 'hashcore_info_page';
	$icon_url = '';
	$position = 4;

	add_submenu_page( $parent, $page_title, $sub_menu_title, $capability, $menu_slug, $function, $icon_url, $position );

	// Add a new sub-level menu theme settings.
	$parent = 'hashcore';
	$page_title = 'Theme Settings';
	$sub_menu_title = 'Theme Settings';
	$capability = 'manage_options';
	$menu_slug = 'hashcore-settings';
	$function = 'hashcore_theme_settings_page';
	$icon_url = '';
	$position = 5;

	add_submenu_page( $parent, $page_title, $sub_menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	add_theme_page( $page_title, $sub_menu_title, $capability, $menu_slug, $function );
}

/**
 * Representation page menu
 */
function hashcore_welcome_page() {
	include 'welcome.php';
}

/**
 * Representation page menu Support
 */
function hashcore_support_page() {
	include 'support.php';
}

/**
 * Representation page menu Install Demos
 */
function hashcore_demos_page() {
	include 'demos.php';
}

/**
 * Representation page menu Info
 */
function hashcore_info_page() {
	include 'support.php';
}

/**
 * Representation page menu Theme Settings
 */
function hashcore_theme_settings_page() {
	include 'theme-settings.php';
}
