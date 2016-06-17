<?php
/**
 * Hashcore new custom type portafolio.
 *
 * @link
 *
 * @package Hashcore
 */

// La función no será utilizada antes del 'init'.
add_action( 'init', 'hashcore_project' );
/* Here's how to create your customized labels */
function hashcore_project() {
	$labels = array(
	'name' => _x( 'Projects', 'post type general name' ),
	'singular_name' => _x( 'Project', 'post type singular name' ),
	'add_new' => _x( 'Add new', 'portfolio' ),
	'add_new_item' => __( 'Add new Project' ),
	'edit_item' => __( 'Edit Project' ),
	'new_item' => __( 'New Project' ),
	'view_item' => __( 'See Project' ),
	'search_items' => __( 'Search Projects' ),
	'not_found' => __( 'Not found, Projects' ),
	'not_found_in_trash' => __( 'Not found, Projects in trash' ),
	'parent_item_colon' => '',
	);

	// Creamos un array para $args.
	$args = array(
	'labels' => $labels,
	'menu_icon' => 'dashicons-portfolio',
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'menu_position' => null,
	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'Project', $args ); /* Registramos y a funcionar */
}
