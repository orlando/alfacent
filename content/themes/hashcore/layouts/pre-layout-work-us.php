<?php
/**
 * The template for Page Builder Prebuilt Layouts.
 * Contains the all data to create a front page.
 *
 * @package Hashcore
 */

/**
 * The template creator.
 *
 * @param array $layouts all data topage builder.
 */
function hashcore_work_us_prebuilt( $layouts ) {
	$layouts['work-us'] = array(
		// We'll add a title field
		'name' => __( 'Default Work-us', 'hashcore' ),		// Required.
		'description' => __( 'Default Work-us', 'hashcore' ), // Optional.
		'widgets' => array(
			0 => array(
				'title' => 'En busca de la mejor solucion para tu proyecto?',
				'sub_title' => '',
				'design' => array(
					'background_color' => false,
					'border_color' => false,
					'title_color' => '#ffffff',
					'sub_title_color' => false,
					'font_size' => '1.5',
					'padding_top' => '2.5',
					'padding_side' => '0',
					'button_align' => 'right',
					'so_field_container_state' => 'open',
				),
				'button' => array(
					'text' => 'Trabaja con nosotros',
					'url' => '#',
					'new_window' => true,
					'button_icon' => array(
						'icon_selected' => '',
						'icon_color' => '#1e73be',
						'icon' => 0,
						'so_field_container_state' => 'closed',
					),
					'design' => array(
						'theme' => 'flat',
						'button_color' => '#f8d940',
						'text_color' => '#1c1a7e',
						'hover' => true,
						'font_size' => '1.3',
						'rounding' => '0.25',
						'padding' => '0.5',
						'so_field_container_state' => 'open',
					),
					'attributes' => array(
						'id' => '',
						'title' => '',
						'onclick' => '',
						'so_field_container_state' => 'closed',
					),
				),
				'_sow_form_id' => '57471720b7a79',
				'panels_info' => array(
					'class' => 'HashCore_Widget_Cta_Widget',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 0,
					'widget_id' => '35bfb3ec-96db-4f13-a6df-1286c0acb453',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
		),
		'grids' => array(
			0 => array(
				'cells' => 1,
				'style' => array(
					'bottom_margin' => '0px',
					'row_stretch' => 'full',
					'background_image_attachment' => 224,
					'background_display' => 'cover',
				),
			),
		),
		'grid_cells' => array(
			0 => array(
				'grid' => 0,
				'weight' => 1,
			),
		),

	);
	return $layouts;
}
add_filter( 'siteorigin_panels_prebuilt_layouts','hashcore_work_us_prebuilt' );
