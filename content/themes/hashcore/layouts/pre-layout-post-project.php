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
function hashcore_project_post_prebuilt( $layouts ) {
	$layouts['project-post'] = array(
		// We'll add a title field
		'name' => __( 'Default for project post', 'hashcore' ),		// Required.
		'description' => __( 'Default for project post', 'hashcore' ), // Optional.
		'widgets' => array(
				0 => array(
					'title' => '',
					'summary' => array(
						'text' => 'Alfa Centauro Electric C.A., gano la licitación efectuada por la Cía. c.a. Dana de Venezuela, para la instalación de 06 Pararrayos con la tecnología PDC, pararrayos con dispositivo de cebado. En su Planta Ejes y Cardanes de la ciudad de Valencia, Venezuela.',
						'so_field_container_state' => 'closed',
					),
					'cta' => array(
						'text' => 'Trabaja con nosotros',
						'url' => '',
						'button_icon' => array(
							'icon_selected' => '',
							'icon_color' => false,
							'icon' => 0,
							'so_field_container_state' => 'closed',
						),
						'design' => array(
							'align' => 'left-justify',
							'theme' => 'flat',
							'button_color' => '#f8d940',
							'text_color' => '#1c1a7e',
							'hover' => true,
							'font_size' => '1',
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
						'new_window' => false,
					),
					'list-item' => array(
						'description' => 'Detalles del Proyecto',
						'list' => array(
							0 => array(
								'title' => 'Detalles del Proyecto',
								'item' => array(
									0 => array(
										'text' => '- Iniciado: September 28, 2014',
										'url' => 0,
										'url_ext' => '',
									),
									1 => array(
										'text' => '- Finalizado: May 11, 2015',
										'url' => 0,
										'url_ext' => '',
									),
									2 => array(
										'text' => '- Locacion: United States of America',
										'url' => 0,
										'url_ext' => '',
									),
									3 => array(
										'text' => '- Categoria: Building, Architecture',
										'url' => 0,
										'url_ext' => '',
									),
									4 => array(
										'text' => '- Website: www.ThreeTowers.com',
										'url' => 0,
										'url_ext' => '',
									),
								),
							),
						),
						'fonts' => array(
							'title_options' => array(
								'font' => 'default',
								'size' => '1em',
								'size_unit' => 'em',
								'color' => '#6d6d6d',
								'weight' => '400',
								'align' => 'left',
								'so_field_container_state' => 'closed',
							),
							'text_options' => array(
								'font' => 'default',
								'size' => '12px',
								'size_unit' => 'px',
								'color' => '#6d6d6d',
								'weight' => '400',
								'so_field_container_state' => 'closed',
							),
							'so_field_container_state' => 'closed',
						),
						'icon' => array(
							'list_color' => '#444444',
							'download' => 'fontawesome-arrow-down',
							'download_color' => '#444444',
							'view' => 'fontawesome-eye',
							'view_color' => '#444444',
							'so_field_container_state' => 'closed',
							'list' => false,
							'download_check' => false,
							'view_check' => false,
						),
						'container' => array(
							'width' => 100,
							'mobile' => true,
							'so_field_container_state' => 'closed',
						),
					),
					'design' => array(
						'title_options' => array(
							'font' => 'default',
							'size' => '2em',
							'size_unit' => 'em',
							'color' => '#1c1a7e',
							'weight' => '400',
							'align' => 'left-center',
							'so_field_container_state' => 'open',
						),
						'summary_options' => array(
							'font' => 'default',
							'size' => '12px',
							'size_unit' => 'px',
							'color' => '#6d6d6d',
							'weight' => '400',
							'align' => 'left',
							'so_field_container_state' => 'closed',
						),
						'so_field_container_state' => 'closed',
					),
					'editor' => array(
						'title' => '',
						'text' => '<p class="p1"><span class="s1"><img class="aligncenter wp-image-188 size-full" src="http://alfacent.dev/content/uploads/2016/05/afb67885-400c-3470-8248-9e110a116073.jpg" width="557" height="445" /></span></p><h5 class="p1"><span class="s1" style="color: #6d6d6d;">En esta licitación participamos con los pararrayos Flash Captor de la Cía. Española Aplicaciones Tecnologicas s.a, líder en Europa y en el mundo en la protección contra la acción destructiva de los rayos. </span></h5><p class="p1"><span class="s1" style="color: #6d6d6d;">A continuación parte de una carta enviada por ellos: ¨Permítame recordarle que somos fabricantes líderes de sistemas de protección contra el rayo, con más de 50 distribuidores en todo el mundo, y actuamos en más de 70 países. Somos el único fabricante que ofrece solución total contra los rayos: Protección Externa (PDC y Convencional), Interna (Sobre tensiones Transitorias y Permanentes), Tierras, Soldadura Exotérmica y Detectores de Tormentas.</span></p><p class="p1"><span class="s1" style="color: #6d6d6d;">ONE PARTNER, ALL SOLUTIONS FOR LIGHTNING PROTECTION</span></p><p class="p1"><span class="s1" style="color: #6d6d6d;">Le adjunto un catálogo resumen de 8 páginas de todas nuestras familias, y del link que sigue, se puede descargar el catálogo completo (un catálogo de 320 páginas). También tiene la posibilidad de descargárselo de la web en el apartado “Profesionales”</span></p><p class="p1"><span class="s1" style="color: #6d6d6d;">http://www.at3w.com/catalogo/at3w_catalogo_espanol.zip</span></p><p class="p1"><img class="aligncenter wp-image-187 size-full" src="http://alfacent.dev/content/uploads/2016/05/2324ad29-d113-34bc-9dd6-8919b2ab2e48.jpg" width="1325" height="883" /></p><p class="p1"><span class="s1" style="color: #6d6d6d;">Los 06 pararrayos fueron colocados: tres en torres de Iluminación de 15 metros, uno en un tanque de agua elevado de 30 mts y dos en la parte más alta de la estructura del galpón de planta, de tal manera que se logra una protección total de la planta de Ejes y cardanes.</span></p><p class="p1"><span class="s1" style="color: #6d6d6d;">Se utilizaron barras químicas, usando tubería de cobre de 1,20 mts de largo, como electrodos de tierra, tres por cada toma de tierra en una configuración triangular de 3 mts de lado. Los aisladores para el cable de cobre desnudo 2/0 awg, se atornillaron a las torres y se utilizaron flejes para fijar en una de las patas del tanque elevado. Los clavos de impacto no dieron resultado satisfactorio. Se instalaron 6 contadores electromecánicos de rayo AT-001G, de Aplicaciones Tecnológicas, para registrar las veces en que el pararrayo ha actuado, para las labores de mantenimiento posterior..</span></p>',
						'text_selected_editor' => 'tinymce',
						'autop' => true,
						'fonts' => array(
							'font' => 'default',
							'h1_options' => array(
								'size' => '2em',
								'size_unit' => 'em',
								'weight' => '400',
								'so_field_container_state' => 'closed',
							),
							'h2_options' => array(
								'size' => '1.8em',
								'size_unit' => 'em',
								'weight' => '400',
								'so_field_container_state' => 'closed',
							),
							'h3_options' => array(
								'size' => '1.6em',
								'size_unit' => 'em',
								'weight' => '400',
								'so_field_container_state' => 'closed',
							),
							'h4_options' => array(
								'size' => '1.4em',
								'size_unit' => 'em',
								'weight' => '400',
								'so_field_container_state' => 'closed',
							),
							'h5_options' => array(
								'size' => '1.2em',
								'size_unit' => 'em',
								'weight' => '400',
								'so_field_container_state' => 'open',
							),
							'h6_options' => array(
								'size' => '1.1em',
								'size_unit' => 'em',
								'weight' => '400',
								'so_field_container_state' => 'closed',
							),
							'p_options' => array(
								'size' => '1em',
								'size_unit' => 'em',
								'weight' => '300',
								'so_field_container_state' => 'open',
							),
							'so_field_container_state' => 'open',
						),
					),
					'_sow_form_id' => '57603e4738d4a',
					'panels_info' => array(
						'class' => 'HashCore_Widget_Post_Project',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 0,
						'widget_id' => 'd4d2536c-40cb-412f-9c47-0377dddf7746',
						'style' => array(
							'background_display' => 'tile',
						),
					),
				),
				1 => array(
					'headline' => array(
						'text' => '',
						'size' => '1.5',
						'font' => 'default',
						'weight' => '400',
						'color' => false,
						'align' => 'left',
						'so_field_container_state' => 'open',
						'align_mobile' => false,
					),
					'sub_headline' => array(
						'text' => 'Otros Proyectos',
						'size' => '1.5',
						'font' => 'default',
						'weight' => '400',
						'color' => '#1c1a7e',
						'so_field_container_state' => 'open',
					),
					'divider' => array(
						'style' => 'solid',
						'weight' => 'thin',
						'color' => '#1c1a7e',
						'side_margin' => '0px',
						'side_margin_unit' => 'px',
						'top_margin' => '1em',
						'top_margin_unit' => 'em',
						'so_field_container_state' => 'open',
					),
					'_sow_form_id' => '5761a75a10d7b',
					'panels_info' => array(
						'class' => 'HashCore_Widget_Headline_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 1,
						'widget_id' => '9dd9e556-6727-42ab-a72e-35998b589780',
						'style' => array(
							'background_display' => 'tile',
						),
					),
				),
				2 => array(
					'title' => '',
					'posts' => 'post_type=project&date_query={"after":"","before":""}&orderby=rand&order=DESC&posts_per_page=6&sticky=&additional=',
					'settings' => array(
						'title_options' => array(
							'font' => 'default',
							'size' => '13px',
							'size_unit' => 'px',
							'color' => '#ffffff',
							'weight' => '400',
							'align' => 'center',
							'position' => 'below',
							'so_field_container_state' => 'closed',
						),
						'description_options' => array(
							'length' => 60,
							'font' => 'default',
							'size' => '12px',
							'size_unit' => 'px',
							'color' => '#ffffff',
							'weight' => '400',
							'align' => 'center',
							'so_field_container_state' => 'open',
							'hover' => false,
						),
						'container_options' => array(
							'rounding' => '0',
							'gutter' => '.5',
							'background' => '#1C1A7E',
							'opacity' => 70,
							'so_field_container_state' => 'closed',
						),
						'grid_options' => array(
							'desktop' => 6,
							'tablet' => 4,
							'mobile' => 2,
							'hide' => true,
							'so_field_container_state' => 'open',
						),
						'so_field_container_state' => 'open',
					),
					'_sow_form_id' => '5760720d1101c',
					'panels_info' => array(
						'class' => 'HashCore_Widget_Post_Grid',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 2,
						'widget_id' => 'abe96048-38d6-49d7-ada1-34b6d334c5b6',
						'style' => array(
							'widget_css' => 'padding-top: 2em;
		padding-bottom: 2em;',
							'background_display' => 'tile',
						),
					),
				),
				3 => array(
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
						'id' => 3,
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
						'row_css' => 'padding-top: 2.5em;',
						'bottom_margin' => '0px',
						'row_stretch' => 'full',
						'background' => '#f9f9f9',
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
add_filter( 'siteorigin_panels_prebuilt_layouts','hashcore_project_post_prebuilt' );
