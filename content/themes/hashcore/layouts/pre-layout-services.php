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
function hashcore_services_prebuilt( $layouts ) {
	$layouts['services'] = array(
		// We'll add a title field
		'name' => __( 'Default services', 'hashcore' ),		// Required.
		'description' => __( 'Default Services', 'hashcore' ), // Optional.
		'widgets' => array(
			0 => array(
				'headline' => array(
					'text' => 'Servicios',
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
					'so_field_container_state' => 'closed',
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
				'_sow_form_id' => '5751e662a1e2e',
				'panels_info' => array(
					'class' => 'HashCore_Widget_Headline_Widget',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 0,
					'widget_id' => '67ea4f64-955d-4992-89a2-1afc3d9dbc81',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			1 => array(
				'description' => 'Servicios ',
				'list' => array(
					0 => array(
						'title' => 'Instalaciones Electricas en	Alta y Baja Tension',
						'item' => array(
							0 => array(
								'text' => 'Diseño y montaje de tableros de Potencia y Control. ',
								'url' => 0,
								'url_ext' => '',
							),
							1 => array(
								'text' => 'Acometidas eléctricas en tuberías conduit y en bandejas porta cables.',
								'url' => 0,
								'url_ext' => '',
							),
							2 => array(
								'text' => 'Líneas aéreas y subterráneas de distribución eléctrica.',
								'url' => 0,
								'url_ext' => '',
							),
						),
					),
					1 => array(
						'title' => 'Corrección del bajo Factor de Potencia',
						'item' => array(
							0 => array(
								'text' => 'Estudio, diseño e instalación de banco de condensadores necesario	para la corrección optima del factor de potencia. ',
								'url' => 0,
								'url_ext' => '',
							),
							1 => array(
								'text' => 'Estudio diseño e instalación de filtros de armónicos, en plantas	industriales que cuentan con equipos generadores de armónicos	tales como: hornos de inducción, rectificadores trifásicos,	convertidores para electrólisis y baños etc. (En estos casos la	instalación de filtros es imprescindible para el buen	funcionamiento de los condensadores).',
								'url' => 0,
								'url_ext' => '',
							),
						),
					),
					2 => array(
						'title' => 'Iluminación',
						'item' => array(
							0 => array(
								'text' => 'Instalaciones eléctricas en los complejos deportivos, utilizando los equipos de la reconocida marca Italiana FAEL LUCE, www.faelluce.com .',
								'url' => 0,
								'url_ext' => '',
							),
							1 => array(
								'text' => 'Repotenciación de alumbrados existentes, utilizando tecnología de punta, logrando el ahorro de energía.',
								'url' => 0,
								'url_ext' => '',
							),
						),
					),
					3 => array(
						'title' => 'Pararrayos y puesta a Tierra',
						'item' => array(
							0 => array(
								'text' => 'Puesta a tierra utilizando soldadura Exotérmica APLIWELD de Aplicaciones Tecnológicas S.A.',
								'url' => 0,
								'url_ext' => '',
							),
							1 => array(
								'text' => 'Instalación de pararrayos PDC: DAT Controler Plus y Flash Captor de Aplicaciones Tecnológicas S.A. que cuentan con Certificados de Garantía de laboratorios Europeos y Americanos que certifican su funcionamiento, inclusive en las peores condiciones: descargas eléctricas en plena lluvia.',
								'url' => 0,
								'url_ext' => '',
							),
						),
					),
					4 => array(
						'title' => 'Auditoria Energetica',
						'item' => array(
							0 => array(
								'text' => 'Registro de todos los parámetros eléctricos utilizando instrumentos digitales de Amprobe DM-III, con sus pinzas amperimétricas tipo flex. ',
								'url' => 0,
								'url_ext' => '',
							),
							1 => array(
								'text' => 'Análisis de los resultados obtenidos y presentación de informe con recomendaciones técnicas. ',
								'url' => 0,
								'url_ext' => '',
							),
							2 => array(
								'text' => 'Medición de resistencia a tierra utilizando el equipo de Amprobe GP-2 Geo Test.',
								'url' => 0,
								'url_ext' => '',
							),
							3 => array(
								'text' => 'Termografías de los equipos eléctricos en las subestaciones eléctricas, utilizando equipos de FLIR www.flir.com, para utilizarlos en el mantenimiento predictivo y correctivo.',
								'url' => 0,
								'url_ext' => '',
							),
						),
					),
					5 => array(
						'title' => 'Plantas de Emergencia y Transferencias Automaticas',
						'item' => array(
							0 => array(
								'text' => 'Instalación de plantas de emergencia a diésel o gas. Con sus transferencias manual o automática.',
								'url' => 0,
								'url_ext' => '',
							),
							1 => array(
								'text' => 'Cuando la planta va a realizar un respaldo parcial de las instalaciones se realiza el estudio e implementación de un tablero de cargas preferenciales que será alimentado por la planta de emergencia.',
								'url' => 0,
								'url_ext' => '',
							),
						),
					),
				),
				'fonts' => array(
					'title_options' => array(
						'font' => 'default',
						'size' => '1.1em',
						'size_unit' => 'em',
						'color' => '#1c1a7e',
						'weight' => '400',
						'align' => 'center',
						'so_field_container_state' => 'open',
					),
					'text_options' => array(
						'font' => 'default',
						'size' => '0.8em',
						'size_unit' => 'em',
						'color' => '#444444',
						'weight' => '300',
						'so_field_container_state' => 'open',
					),
					'so_field_container_state' => 'open',
				),
				'icon' => array(
					'list' => true,
					'list_color' => '#f8d940',
					'download' => 'fontawesome-arrow-down',
					'download_color' => '#444444',
					'view' => 'fontawesome-eye',
					'view_color' => '#444444',
					'so_field_container_state' => 'closed',
					'download_check' => false,
					'view_check' => false,
				),
				'container' => array(
					'width' => 100,
					'so_field_container_state' => 'closed',
					'mobile' => false,
				),
				'_sow_form_id' => '57503d571b980',
				'panels_info' => array(
					'class' => 'HashCore_Widget_List_Item',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 1,
					'widget_id' => '9d18ced9-baea-44f9-9638-009a34e6ffc5',
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
	padding-bottom: 2.5em;',
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
add_filter( 'siteorigin_panels_prebuilt_layouts','hashcore_services_prebuilt' );
