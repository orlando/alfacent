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
				'headline' => array(
					'text' => '¿Tu empresa necesita ',
					'size' => '3',
					'font' => 'default',
					'weight' => '600',
					'color' => '#ffffff',
					'align' => 'left',
					'align_mobile' => true,
					'so_field_container_state' => 'open',
				),
				'sub_headline' => array(
					'text' => 'Instalaciones Eléctricas?',
					'size' => '3',
					'font' => 'default',
					'weight' => '600',
					'color' => '#f8d940',
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
				'_sow_form_id' => '574757c0c5dbc',
				'panels_info' => array(
					'class' => 'HashCore_Widget_Headline_Widget',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 0,
					'widget_id' => '6ba2e04f-8e62-4399-8572-e656ebf53398',
					'style' => array(
						'widget_css' => 'padding-left: 2em;
	padding-right: 2em;',
						'background_display' => 'tile',
					),
				),
			),
			1 => array(
				'text' => 'Tenemos la Respuesta',
				'url' => '#',
				'button_icon' => array(
					'icon_selected' => '',
					'icon_color' => false,
					'icon' => 0,
					'so_field_container_state' => 'open',
				),
				'design' => array(
					'align' => 'left-justify',
					'theme' => 'flat',
					'button_color' => '#1c1a7e',
					'text_color' => '#ffffff',
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
				'_sow_form_id' => '5747594cabff5',
				'new_window' => false,
				'panels_info' => array(
					'class' => 'HashCore_Widget_Button_Widget',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 1,
					'widget_id' => '4deb07be-dea9-4991-9fa9-8265041cfac1',
					'style' => array(
						'widget_css' => 'padding-left: 2em;
	padding-right: 2em;',
						'background_display' => 'tile',
					),
				),
			),
			2 => array(
				'widget_title' => 'Nosotros',
				'font_size' => '2.5',
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
					'height_tab_content' => 26,
					'tab_content_padding_bottom' => '1',
					'title_color' => '#1c1a7e',
					'active_tab_color' => '#ffffff',
					'inactive_tab_color' => '#1c1a7e',
					'active_tab_rounding' => '0.25',
					'bg_color' => '#ffffff',
					'tab_content_color' => false,
					'so_field_container_state' => 'open',
				),
				'_sow_form_id' => '57192e3887f33',
				'panels_info' => array(
					'class' => 'HashCore_Widget_Tabs',
					'raw' => false,
					'grid' => 1,
					'cell' => 0,
					'id' => 2,
					'widget_id' => 'ae8df818-cbe7-4017-bb06-e940932293a8',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			3 => array(
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
					'grid' => 2,
					'cell' => 0,
					'id' => 3,
					'widget_id' => 'e129e3fb-226a-4ae9-8f94-0e2b80170293',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			4 => array(
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
					'raw' => false,
					'grid' => 2,
					'cell' => 0,
					'id' => 4,
					'widget_id' => '9a0633dd-f944-4249-a539-6fb889608f35',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			5 => array(
				'image' => array(
					'image' => 12,
					'image_fallback' => '',
					'size' => 'large',
					'align' => 'right',
					'title' => 'Servicios',
					'description' => 'En alfacent trabajamos distintas areas electricas de manera efectiva procurando prestarte nuestro mejor servicio',
					'hover_description' => true,
					'hover_move' => 120,
					'title_position' => 'below',
					'title_size' => '2.5em',
					'description_size' => '1em',
					'title_color' => '#ffffff',
					'background_color' => '#1c1a7e',
					'opacity' => 80,
					'alt' => 'ww',
					'url' => 'post: 2',
					'bound' => true,
					'so_field_container_state' => 'open',
					'new_window' => false,
					'full_width' => false,
				),
				'_sow_form_id' => '573b271d0a40d',
				'panels_info' => array(
					'class' => 'HashCore_Image_Button_Widget',
					'raw' => false,
					'grid' => 3,
					'cell' => 0,
					'id' => 5,
					'widget_id' => 'cb062168-2baf-43ed-8029-f016a56fe202',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			6 => array(
				'image' => array(
					'image' => 11,
					'image_fallback' => '',
					'size' => 'large',
					'align' => 'left',
					'title' => 'Proyecto',
					'description' => 'Conoce nuestros	proyectos en las distintas areas de servicios en los que somos especialistas.',
					'hover_description' => true,
					'hover_move' => 90,
					'title_position' => 'below',
					'title_size' => '2.5em',
					'description_size' => '1em',
					'title_color' => '#ffffff',
					'background_color' => '#1c1a7e',
					'opacity' => 80,
					'alt' => '',
					'url' => '',
					'bound' => true,
					'so_field_container_state' => 'open',
					'new_window' => false,
					'full_width' => false,
				),
				'_sow_form_id' => '573b272127c60',
				'panels_info' => array(
					'class' => 'HashCore_Image_Button_Widget',
					'raw' => false,
					'grid' => 3,
					'cell' => 1,
					'id' => 6,
					'widget_id' => '7ce7e4c6-217f-43c3-9690-58989ea9cb08',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			7 => array(
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
					'grid' => 4,
					'cell' => 0,
					'id' => 7,
					'widget_id' => '35bfb3ec-96db-4f13-a6df-1286c0acb453',
					'style' => array(
						'background_display' => 'tile',
					),
				),
			),
			8 => array(
				'title' => '',
				'testimonials' => array(
					0 => array(
						'name' => 'ING. MANUEL ORTIZ, PRESIDENTE DE DANA DE VENEZUELA C.A.',
						'location' => '',
						'image' => 0,
						'text' => '<p class="p1" style="text-align: center;"><span class="s1">Conozco a ALFA CENTAURO ELECTRIC C.A. desde hace 23 años, cuando comenzaba sus operaciones acá en Venezuela, en aquel entonces realizaban trabajos para corregir el bajo factor de potencia y ahorrar energía. Desde entonces han realizado una variedad de trabajos en las diferentes plantas del grupo Dana. Destacan las instalaciones eléctricas de nuestro DATA CENTER y la protección integral contra los rayos de nuestra planta EJES Y CARDANES donde instalaron 06 PARARRAYOS  de APLICACIONES TECNOLOGICAS. Los recomiendo totalmente.</span></p>',
						'text_selected_editor' => 'tinymce',
						'url' => '',
						'link_name' => false,
						'link_image' => false,
						'new_window' => false,
					),
					1 => array(
						'name' => 'JAVIER GAONA, Latin Manager de APLICACIONES TECNOLOGICAS S.A.	De España.',
						'location' => '',
						'image' => 0,
						'text' => '<p class="p1" style="text-align: center;"><span class="s1">Alfa Centauro Electric C.A. es nuestro representante en Venezuela desde el año 2014. Pese al entorno económico difícil, Alfa Centauro,  viene realizando un trabajo importante dando a conocer e instalando nuestros productos, principalmente los Pararrayos con dispositivo de Cebado DAT CONTROLER PLUS y los supresores de Picos ATSHOCK y ATSUB. Conocí a su Presidente el Ing. Tadeo del Águila Aliaga, en el curso de entrenamiento llevado a cabo en junio del 2014, en la Planta de Aplicaciones en Valencia -  España y me impresiono su alto nivel técnico y conocimiento de nuestros productos.</span></p>',
						'text_selected_editor' => 'tinymce',
						'url' => '',
						'link_name' => false,
						'link_image' => false,
						'new_window' => false,
					),
					2 => array(
						'name' => 'ING. JORGE PINILLA, Gerente de Ingeniería de Cerámica Carabobo SACA',
						'location' => '',
						'image' => 0,
						'text' => '<p class="p1" style="text-align: center;"><span class="s1">Alfa Centauro Electric C.A. desde hace muchos años, es proveedor de nuestra empresa. Realizan trabajos eléctricos de alto nivel técnico. Diversas acometidas eléctricas para las diferentes Líneas de Producción de cerámicas. Mantenimiento de nuestras subestaciones eléctricas, modificaciones en nuestro Data Center, Instalaciones de Grupos Electrógenos, Iluminaciones nuevas y mantenimiento de las existentes. Es una  empresa de un alto nivel técnico y lo recomiendo plenamente.</span></p>',
						'text_selected_editor' => 'tinymce',
						'url' => '',
						'link_name' => false,
						'link_image' => false,
						'new_window' => false,
					),
				),
				'settings' => array(
					'per_line_desktop' => 1,
					'per_line_tablet' => 1,
					'per_line_mobile' => 1,
					'so_field_container_state' => 'open',
				),
				'design' => array(
					'image' => array(
						'image_shape' => 'square',
						'image_size' => 65,
						'so_field_container_state' => 'open',
					),
					'colors' => array(
						'testimonial_background' => false,
						'text_background' => false,
						'text_color' => '#1c1a7e',
						'text_color_author' => '#1c1a7e',
						'so_field_container_state' => 'open',
					),
					'font' => array(
						'size_text' => '1em',
						'size_author' => '1em',
						'so_field_container_state' => 'open',
					),
					'padding' => 2,
					'border_radius' => 7,
					'user_position' => 'center',
					'layout' => 'text_above',
					'so_field_container_state' => 'open',
				),
				'_sow_form_id' => '573e037a4c580',
				'panels_info' => array(
					'class' => 'HashCore_Widgets_Testimonials_Carousel',
					'raw' => false,
					'grid' => 5,
					'cell' => 0,
					'id' => 8,
					'widget_id' => '19922979-b23c-4cf9-abdd-bab40ea04ec4',
					'style' => array(
						'padding' => '0px',
						'background_display' => 'tile',
					),
				),
			),
			9 => array(
				'title' => 'Blog',
				'posts' => 'post_type=post&date_query={"after":"","before":""}&orderby=date&order=DESC&posts_per_page=1&sticky=&additional=',
				'font_size' => '2.5',
				'text_size' => '1.15',
				'rounding' => '.25',
				'padding' => '1',
				'title_color' => '#1c1a7e',
				'text_color' => '#ffffff',
				'hover_color' => '#f8d940',
				'decoration_color' => '#1e73be',
				'text_weight' => '300',
				'post_background' => '#1c1a7e',
				'opacity' => 100,
				'_sow_form_id' => '5743525eea23f',
				'panels_info' => array(
					'class' => 'HashCore_Widget_Post_Custom',
					'raw' => false,
					'grid' => 6,
					'cell' => 0,
					'id' => 9,
					'widget_id' => '6502b4cf-7834-4d34-94e0-e8125bc70e61',
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
					'row_css' => 'padding-top: 7em;
	padding-bottom: 9em;',
					'bottom_margin' => '0px',
					'row_stretch' => 'full',
					'background_image_attachment' => 219,
					'background_display' => 'cover',
				),
			),
			1 => array(
				'cells' => 1,
				'style' => array(
					'row_css' => 'padding-top: 2.5em;
	padding-bottom: 2.5em;
	',
					'bottom_margin' => '0px',
					'background_image_attachment' => false,
					'background_display' => 'tile',
				),
			),
			2 => array(
				'cells' => 1,
				'style' => array(
					'bottom_margin' => '0px',
					'padding' => '0px',
					'row_stretch' => 'full',
					'background' => '#1c1a7e',
					'background_display' => 'tile',
				),
			),
			3 => array(
				'cells' => 2,
				'style' => array(
					'row_css' => 'padding-top: 2.5em;
	padding-bottom: 2.5em;',
					'bottom_margin' => '0px',
					'background_display' => 'tile',
				),
			),
			4 => array(
				'cells' => 1,
				'style' => array(
					'bottom_margin' => '0px',
					'row_stretch' => 'full',
					'background_image_attachment' => 224,
					'background_display' => 'cover',
				),
			),
			5 => array(
				'cells' => 1,
				'style' => array(
					'class' => 'nopadding',
					'row_css' => 'padding-right: 0
	padding-left: 0',
					'bottom_margin' => '0px',
					'padding' => '0px',
					'row_stretch' => 'full',
					'background' => '#f8d940',
					'background_display' => 'tile',
				),
			),
			6 => array(
				'cells' => 1,
				'style' => array(
					'bottom_margin' => '0px',
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
			2 => array(
				'grid' => 2,
				'weight' => 1,
			),
			3 => array(
				'grid' => 3,
				'weight' => 0.5,
			),
			4 => array(
				'grid' => 3,
				'weight' => 0.5,
			),
			5 => array(
				'grid' => 4,
				'weight' => 1,
			),
			6 => array(
				'grid' => 5,
				'weight' => 1,
			),
			7 => array(
				'grid' => 6,
				'weight' => 1,
			),
		),
	);
	return $layouts;
}
add_filter( 'siteorigin_panels_prebuilt_layouts','hashcore_front_page_prebuilt' );
