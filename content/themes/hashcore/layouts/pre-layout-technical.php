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
function hashcore_technical_prebuilt( $layouts ) {
	$layouts['technical'] = array(
		// We'll add a title field
		'name' => __( 'Default technical', 'hashcore' ),		// Required.
		'description' => __( 'Default Technical', 'hashcore' ), // Optional.
		'widgets' => array(
			0 => array(
				'headline' => array(
					'text' => 'Información Técnica',
					'size' => '2.5',
					'font' => 'default',
					'weight' => '400',
					'color' => '#1c1a7e',
					'align' => 'center',
					'so_field_container_state' => 'open',
					'align_mobile' => false,
				),
				'sub_headline' => array(
					'text' => '',
					'size' => '1',
					'font' => 'default',
					'weight' => '400',
					'color' => false,
					'so_field_container_state' => 'open',
				),
				'divider' => array(
					'style' => 'none',
					'weight' => 'thin',
					'color' => '#EEEEEE',
					'side_margin' => '60px',
					'side_margin_unit' => 'px',
					'top_margin' => '20px',
					'top_margin_unit' => 'px',
					'so_field_container_state' => 'open',
				),
				'_sow_form_id' => '5755c0af73ff8',
				'panels_info' => array(
					'class' => 'HashCore_Widget_Headline_Widget',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 0,
					'widget_id' => '1cf60286-50a5-4b35-ab31-2e874940aa34',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			1 => array(
				'description' => 'Información Tecnica',
				'list' => array(
					0 => array(
						'title' => 'Artículos Técnicos',
						'item' => array(
							0 => array(
								'text' => 'CT 002 - Protección de Redes por el sistema de selectividad logica																																			',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							1 => array(
								'text' => 'CT 062 - Puesta a tierra del neutro en MT',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							2 => array(
								'text' => 'CT 078 - SF6 El Gas Dielectrico',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							3 => array(
								'text' => 'CT 141 - Las Perturbaciones Electricas en BT',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							4 => array(
								'text' => 'CT 152 - Los Armonicos en las Redes y su Tratamiento',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							5 => array(
								'text' => 'CT 155 - Las Redes de Distribucion Publica de MT en el mundo',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							6 => array(
								'text' => 'CT 158  - Calculo De Corrientes De Cortocircuito',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							7 => array(
								'text' => 'CT 168 - El Rayo Y Las Instalaciones Electricas En AT',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							8 => array(
								'text' => 'CT 169 - El Diseño De Redes Industriales En At',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							9 => array(
								'text' => 'CT 172 - Los Esquemas De Conexion A Tierra En Bt',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							10 => array(
								'text' => 'CT 174 - Proteccion De Redes De At Industriales Y Terciarias',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							11 => array(
								'text' => 'CT 177 - Perturbaciones En Los Sistemas Electronicos Los Ect',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							12 => array(
								'text' => 'CT 178 - Conexion It Neutro Aislado',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							13 => array(
								'text' => 'CT 179 - Sobretensiones Y Limitadores En Bt',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							14 => array(
								'text' => 'Esquemas Conexiones Neutro a Tierra',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							15 => array(
								'text' => 'Los Dispositivos Diferenciales de Corriente',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
						),
					),
					1 => array(
						'title' => 'Normas Eléctricas Españolas',
						'item' => array(
							0 => array(
								'text' => 'Instalaciones interiores o Receptoras. Prescripciones generales',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							1 => array(
								'text' => 'UNE-EN 62305-3 - Proteccion contra el rayo',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
						),
					),
					2 => array(
						'title' => 'Normas Eléctricas Peruanas',
						'item' => array(
							0 => array(
								'text' => 'Código Nacional de Electricidad - Suministro 2001',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							1 => array(
								'text' => 'Código Nacional de Electricidad - Utilización 2006',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
							2 => array(
								'text' => 'Instalaciones Eléctricas en Edificios',
								'url' => 0,
								'url_ext' => 'file.pdf',
							),
						),
					),
				),
				'fonts' => array(
					'title_options' => array(
						'font' => 'default',
						'size' => '1.5em',
						'size_unit' => 'em',
						'color' => '#1c1a7e',
						'weight' => '400',
						'align' => 'left',
						'so_field_container_state' => 'open',
					),
					'text_options' => array(
						'font' => 'default',
						'size' => '0.7em',
						'size_unit' => 'em',
						'color' => '#444444',
						'weight' => '300',
						'so_field_container_state' => 'open',
					),
					'so_field_container_state' => 'open',
				),
				'icon' => array(
					'list_color' => '#444444',
					'download' => 'fontawesome-arrow-down',
					'download_color' => '#1c1a7e',
					'download_check' => true,
					'view' => 'fontawesome-eye',
					'view_color' => '#1c1a7e',
					'view_check' => true,
					'so_field_container_state' => 'open',
					'list' => false,
				),
				'container' => array(
					'width' => 70,
					'mobile' => true,
					'so_field_container_state' => 'open',
				),
				'_sow_form_id' => '5751a1f97b466',
				'panels_info' => array(
					'class' => 'HashCore_Widget_List_Item',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 1,
					'widget_id' => 'acd3f209-c5e0-46c8-ad93-4043459f1303',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			2 => array(
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
					'grid' => 1,
					'cell' => 0,
					'id' => 2,
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
					'row_css' => 'padding-top: 2.5em;
	padding-bottom: 2.5em;
	',
					'bottom_margin' => '0px',
					'row_stretch' => 'full',
					'background' => '#f9f9f9',
					'background_image_attachment' => false,
					'background_display' => 'tile',
				),
			),
			1 => array(
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
			1 => array(
				'grid' => 1,
				'weight' => 1,
			),
		),

	);
	return $layouts;
}
add_filter( 'siteorigin_panels_prebuilt_layouts','hashcore_technical_prebuilt' );
