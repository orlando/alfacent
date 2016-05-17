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
function hashcore_front_page_prebuilt( $layouts ) {
	$layouts['front-page'] = array(
		// We'll add a title field
		'name' => __( 'Default front-page', 'hashcore' ),		// Required.
		'description' => __( 'Default front-page', 'hashcore' ), // Optional.
		'widgets' => array(
			0 => array(
				'widget_title' => 'Nosotros',
				'widget_tag' => 'h1',
				'repeater' => array(
					0 => array(
						'tab_title' => 'Nosotros',
						'tab_content' => '<p style="text-align: center;">ALFA CENTAURO ELECTRIC C.A. nace el 23 de abril de 1991 en la ciudad de Maturín, Edo. Monagas. El 07 de Octubre de 1997, es trasladada a la ciudad de Valencia, Edo. Carabobo por su actual Presidente el Ingeniero Tadeo del Aguila Aliaga, Ingeniero Electricista egresado de la Universidad Nacional de Ingeniería (UNI) de Lima - Perú, con especialidad en Sistemas de Potencia.</p><p style="text-align: center;">Aprovechando los incentivos de retorno a nuestro país decretados por el Gobierno Nacional del Perú y dada el importante crecimiento económico experimentado en estos últimos 10 años, es que hemos decidido constituir ALFA CENTAURO ELECTRIC SAC, en la Ciudad de Chiclayo - Perú, iniciando operaciones en el mes de Setiembre del 2013, con los trabajos eléctricos de iluminación del Complejo Deportivo Chicago (Chan-Chan) en la ciudad de Trujillo.<br /> Nuestra principal actividad son las Instalaciones Eléctricas en ALTA Y BAJA TENSION prestando nuestros servicios, a las Empresas Industriales y Comerciales. Gracias a la calidad, rapidez, honradez y precios equitativos, nos hemos consolidado en este mercado de alta competencia.</p>',
						'tab_content_selected_editor' => 'tmce',
					),
					1 => array(
						'tab_title' => 'Valores',
						'tab_content' => '<p class="p1" style="text-align: center;"><span class="s1" style="color: #1c1a7e;">MISION</span></p><p class="p2" style="text-align: center;"><span class="s1">Realizar instalaciones eléctricas en alta y baja tensión, cumpliendo las normas nacionales e internacionales: ANSI, IEC, IEEE, NEMA, UNE etc., utilizando materiales de alta calidad. Preparando y entrenando a su personal en un ambiente seguro, generando ganancias suficientes para garantizar el crecimiento sostenido de la organización</span></p><p class="p3" style="text-align: center;"><span class="s1" style="color: #1c1a7e;">VISION</span></p><p class="p2" style="text-align: center;"><span class="s1">Ser una empresa líder, en el campo de las instalaciones eléctricas industriales y comerciales, que maneje tecnología de punta y que utilice materiales y equipos de primera calidad, para satisfacer y superar la expectativa de nuestros clientes.</span></p>',
						'tab_content_selected_editor' => 'tmce',
					),
					2 => array(
						'tab_title' => 'Junta Directiva',
						'tab_content' => '<p style="text-align: center;"><span style="color: #1c1a7e;">Alfa Centauro Electric C.A.</span><br /> Presidente: Ing. Tadeo Del Aguila Aliaga <br />Administradora: Lcda.Odilia Febres Pinto <br />Gte. de Operaciones: Ing. Alis Maldonado Ortiz</p><p style="text-align: center;"><span style="color: #1c1a7e;">Alfa Centauro Electric S.A.C</span><br /> Gte General: Ing. Tadeo Del Aguila Aliaga <br />Director: Dr. Angel Del Aguila Aliaga</p>',
						'tab_content_selected_editor' => 'tmce',
					),
				),
				'tabs_selection' => 'horizontal',
				'tabs_styling' => array(
					'align' => 'center',
					'tab_content_height' => '400px',
					'tab_content_padding_bottom' => '30px',
					'title_color' => '#1c1a7e',
					'active_tab_color' => '#ffffff',
					'inactive_tab_color' => '#1c1a7e',
					'active_tab_rounding' => '0.25em',
					'bg_color' => '#ffffff',
					'tab_content_color' => false,
					'so_field_container_state' => 'open',
				),
				'_sow_form_id' => '57192e3887f33',
				'panels_info' => array(
					'class' => 'HashCore_Widget_Tabs',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 0,
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			1 => array(
				'headline' => array(
					'text' => 'Nuestros Aliados',
					'tag' => 'h1',
					'font' => 'default',
					'color' => '#f8d940',
					'align' => 'center',
					'so_field_container_state' => 'open',
				),
				'sub_headline' => array(
					'text' => '',
					'tag' => 'h3',
					'font' => 'default',
					'color' => false,
					'align' => 'center',
					'so_field_container_state' => 'closed',
				),
				'divider' => array(
					'style' => 'none',
					'weight' => 'thin',
					'color' => '#EEEEEE',
					'side_margin' => '0px',
					'side_margin_unit' => 'px',
					'top_margin' => '0px',
					'top_margin_unit' => 'px',
					'so_field_container_state' => 'open',
				),
				'_sow_form_id' => '571a83996c06f',
				'panels_info' => array(
					'class' => 'HashCore_Widget_Headline_Widget',
					'raw' => false,
					'grid' => 1,
					'cell' => 0,
					'id' => 1,
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			2 => array(
				'images' => array(
					0 => array(
						'image' => 10,
						'title' => '',
						'url' => '',
					),
					1 => array(
						'image' => 71,
						'title' => '',
						'url' => '',
					),
					2 => array(
						'image' => 6,
						'title' => '',
						'url' => '',
					),
					3 => array(
						'image' => 9,
						'title' => '',
						'url' => '',
					),
				),
				'display' => array(
					'attachment_size' => 'medium',
					'max_height' => 80,
					'max_width' => 280,
					'spacing_item' => 'space-around',
					'spacing_x' => 10,
					'spacing_y' => 20,
					'so_field_container_state' => 'open',
				),
				'_sow_form_id' => '571a8340f0019',
				'panels_info' => array(
					'class' => 'HashCore_Widgets_ImageGrid_Widget',
					'grid' => 1,
					'cell' => 0,
					'id' => 2,
					'style' => array(
						'background_image_attachment' => false,
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
					'background_display' => 'tile',
				),
			),
			1 => array(
				'cells' => 1,
				'style' => array(
					'bottom_margin' => '0px',
					'padding' => '0px',
					'row_stretch' => 'full',
					'background' => '#1c1a7e',
					'background_display' => 'tile',
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
add_filter( 'siteorigin_panels_prebuilt_layouts','hashcore_front_page_prebuilt' );
