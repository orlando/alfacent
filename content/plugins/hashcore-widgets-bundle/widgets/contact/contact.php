<?php
/*
Widget Name: Contact Form
Description: A light weight contact form builder.
Author:
Author URI: https://
*/

class HashCore_Widgets_ContactForm_Widget extends HashCore_Widget {

	function __construct(){

		parent::__construct(
			'sow-contact-form',
			__('HashCore Contact Form', 'hashcore-widgets-bundle'),
			array(
				'description' => __( 'Create a simple contact form for your users to get hold of you.', 'hashcore-widgets-bundle' ),
				'panels_groups' => array( 'hashcore-tab' ), // Include in widgets groups.
				'panels_icon' => 'dashicons dashicons-welcome-view-site',
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'hashcore-widgets-bundle'),
					'default' => __('Contact Us', 'hashcore-widgets-bundle'),
				),

				'display_title' => array(
					'type' => 'checkbox',
					'label' => __('Display title', 'hashcore-widgets-bundle'),
				),

				'settings' => array(
					'type' => 'section',
					'label' => __('Settings', 'hashcore-widgets-bundle'),
					'hide' => true,
					'fields' => array(
						'to' => array(
							'type' => 'text',
							'label' => __('To email address', 'hashcore-widgets-bundle'),
							'description' => __('Where contact emails will be delivered to.', 'hashcore-widgets-bundle'),
							'sanitize' => 'multiple_emails',
						),
						'default_subject' => array(
							'type' => 'text',
							'label' => __('Default subject', 'hashcore-widgets-bundle'),
							'description' => __("Subject to use when there isn't one available.", 'hashcore-widgets-bundle'),
						),
						'subject_prefix' => array(
							'type' => 'text',
							'label' => __('Subject prefix', 'hashcore-widgets-bundle'),
							'description' => __('Prefix added to all incoming email subjects.', 'hashcore-widgets-bundle'),
						),
						'success_message' => array(
							'type' => 'tinymce',
							'label' => __('Success message', 'hashcore-widgets-bundle'),
							'description' => __('Message to display after message successfully sent.', 'hashcore-widgets-bundle'),
							'default' => __("Thanks for contacting us. We'll get back to you shortly.", 'hashcore-widgets-bundle')
						),
						'submit_text' => array(
							'type' => 'text',
							'label' => __('Submit button text', 'hashcore-widgets-bundle'),
							'default' => __("Contact Us", 'hashcore-widgets-bundle')
						)
					)
				),

				'fields' => array(

					'type' => 'repeater',
					'label' => __('Fields', 'hashcore-widgets-bundle'),
					'item_name' => __('Field', 'hashcore-widgets-bundle'),
					'item_label' => array(
						'selector'     => "[id*='label']",
					),
					'fields' => array(

						'type' => array(
							'type' => 'select',
							'label' => __( 'Field Type', 'hashcore-widgets-bundle' ),
							'options' => array(
								'name' => __( 'Name', 'hashcore-widgets-bundle' ),
								'email' => __( 'Email', 'hashcore-widgets-bundle' ),
								'subject' => __( 'Subject', 'hashcore-widgets-bundle' ),
								'text' => __( 'Text', 'hashcore-widgets-bundle' ),
								'textarea' => __( 'Text Area', 'hashcore-widgets-bundle' ),
								'select' => __( 'Dropdown Select', 'hashcore-widgets-bundle' ),
								'checkboxes' => __( 'Checkboxes', 'hashcore-widgets-bundle' ),
							),
							'state_emitter' => array(
								'callback' => 'select',
								'args' => array( 'field_type_{$repeater}' ),
							)
						),

						'label' => array(
							'type' => 'text',
							'label' => __('Label', 'hashcore-widgets-bundle'),
						),

						'required' => array(
							'type' => 'section',
							'label' => __('Required Field', 'hashcore-widgets-bundle'),
							'fields' => array(
								'required' => array(
									'type' => 'checkbox',
									'label' => __('Required field', 'hashcore-widgets-bundle'),
									'description' => __('Is this field required?', 'hashcore-widgets-bundle'),
								),
								'missing_message' => array(
									'type' => 'text',
									'label' => __('Missing message', 'hashcore-widgets-bundle'),
									'description' => __('Error message to display if this field is missing.', 'hashcore-widgets-bundle'),
								)
							)
						),

						// This are for select and checkboxes
						'options' => array(
							'type' => 'repeater',
							'label' => __( 'Options', 'hashcore-widgets-bundle' ),
							'item_name' => __( 'Option', 'hashcore-widgets-bundle' ),
							'item_label' => array( 'selector' => "[id*='value']" ),
							'fields' => array(
								'value' => array(
									'type' => 'text',
									'label' => __( 'Value', 'hashcore-widgets-bundle' ),
								),
							),

							// These are only required for a few states
							'state_handler' => array(
								'field_type_{$repeater}[select,checkboxes]' => array('show'),
								'_else[field_type_{$repeater}]' => array( 'hide' ),
							),
						),
					),
				),

				'spam' => array(
					'type' => 'section',
					'label' => __( 'Spam Protection', 'hashcore-widgets-bundle' ),
					'hide' => true,
					'fields' => array(

						'recaptcha' => array(
							'type' => 'section',
							'label' => __('Recaptcha', 'hashcore-widgets-bundle'),
							'fields' => array(
								'use_captcha' => array(
									'type' => 'checkbox',
									'label' => __( 'Use Captcha', 'hashcore-widgets-bundle' ),
									'default' => false,
								),
								'site_key' => array(
									'type' => 'text',
									'label' => __( 'ReCaptcha Site Key', 'hashcore-widgets-bundle' ),
								),
								'secret_key' => array(
									'type' => 'text',
									'label' => __( 'ReCaptcha Secret Key', 'hashcore-widgets-bundle' ),
								),
								'theme' => array(
									'type' => 'select',
									'label' => __( 'Theme', 'hashcore-widgets-bundle' ),
									'default' => 'light',
									'options' => array(
										'light' => __( 'Light', 'hashcore-widgets-bundle' ),
										'dark' => __( 'Dark', 'hashcore-widgets-bundle' ),
									),
								),
								'type' => array(
									'type' => 'select',
									'label' => __( 'Challenge type', 'hashcore-widgets-bundle' ),
									'default' => 'image',
									'options' => array(
										'image' => __( 'Image', 'hashcore-widgets-bundle' ),
										'audio' => __( 'Audio', 'hashcore-widgets-bundle' ),
									),
								),
								'size' => array(
									'type' => 'select',
									'label' => __( 'Size', 'hashcore-widgets-bundle' ),
									'default' => 'normal',
									'options' => array(
										'normal' => __( 'Normal', 'hashcore-widgets-bundle' ),
										'compact' => __( 'Compact', 'hashcore-widgets-bundle' ),
									),
								),
							)
						),

						'akismet' => array(
							'type' => 'section',
							'label' => __('Akismet', 'hashcore-widgets-bundle'),
							'fields' => array(
								'use_akismet'=> array(
									'type' => 'checkbox',
									'label' => __( 'Use Akismet filtering', 'hashcore-widgets-bundle' ),
									'default' => true,
								),
								'spam_action'=> array(
									'type' => 'select',
									'label' => __( 'Spam action', 'hashcore-widgets-bundle' ),
									'options' => array(
										'error' => __('Show error message', 'hashcore-widgets-bundle'),
										'tag' => __('Tag as spam in subject', 'hashcore-widgets-bundle'),
									),
									'description' => __('How to handle submissions that are identified as spam.', 'hashcore-widgets-bundle'),
									'default' => 'error',
								),
							)
						),
					)
				),

				'design' => array(
					'type' => 'section',
					'label' => __('Design', 'hashcore-widgets-bundle'),
					'hide' => true,
					'fields' => array(

						'container' => array(
							'type' => 'section',
							'label' => __('Container', 'hashcore-widgets-bundle'),
							'fields' => array(
								'background' => array(
									'type' => 'color',
									'label' => __('Background color', 'hashcore-widgets-bundle'),
									'default' => '#f2f2f2',
								),
								'padding' => array(
									'type' => 'measurement',
									'label' => __('Padding', 'hashcore-widgets-bundle'),
									'default' => '10px',
								),
								'border_color' => array(
									'type' => 'color',
									'label' => __('Border color', 'hashcore-widgets-bundle'),
									'default' => '#c0c0c0',
								),
								'border_width' => array(
									'type' => 'measurement',
									'label' => __('Border width', 'hashcore-widgets-bundle'),
									'default' => '1px',
								),
								'border_style' => array(
									'type' => 'select',
									'label' => __('Border style', 'hashcore-widgets-bundle'),
									'default' => 'solid',
									'options' => array(
										'none' => __( 'None', 'hashcore-widgets-bundle' ),
										'hidden' => __( 'Hidden', 'hashcore-widgets-bundle' ),
										'dotted' => __( 'Dotted', 'hashcore-widgets-bundle' ),
										'dashed' => __( 'Dashed', 'hashcore-widgets-bundle' ),
										'solid' => __( 'Solid', 'hashcore-widgets-bundle' ),
										'double' => __( 'Double', 'hashcore-widgets-bundle' ),
										'groove' => __( 'Groove', 'hashcore-widgets-bundle' ),
										'ridge' => __( 'Ridge', 'hashcore-widgets-bundle' ),
										'inset' => __( 'Inset', 'hashcore-widgets-bundle' ),
										'outset' => __( 'Outset', 'hashcore-widgets-bundle' ),
									)
								),
							)
						),

						'labels' => array(
							'type' => 'section',
							'label' => __( 'Field labels', 'hashcore-widgets-bundle' ),
							'fields' => array(
								'font' => array(
									'type' => 'font',
									'label' => __( 'Font', 'hashcore-widgets-bundle' ),
									'default' => 'default',
								),
								'size' => array(
									'type' => 'measurement',
									'label' => __( 'Font size', 'hashcore-widgets-bundle' ),
									'default' => 'default',
								),
								'color' => array(
									'type' => 'color',
									'label' => __( 'Color', 'hashcore-widgets-bundle' ),
									'default' => 'default',
								),
								'position' => array(
									'type' => 'select',
									'label' => __( 'Position', 'hashcore-widgets-bundle' ),
									'default' => 'above',
									'options' => array(
										'above' => __( 'Above', 'hashcore-widgets-bundle' ),
										'below' => __( 'Below', 'hashcore-widgets-bundle' ),
										'left' => __( 'Left', 'hashcore-widgets-bundle' ),
										'right' => __( 'Right', 'hashcore-widgets-bundle' ),
										'inside' => __( 'Inside', 'hashcore-widgets-bundle' ),
									),
								),
								'width' => array(
									'type' => 'measurement',
									'label' => __( 'Width', 'hashcore-widgets-bundle' ),
									'default' => '',
								),
								'align' => array(
									'type' => 'select',
									'label' => __( 'Align', 'hashcore-widgets-bundle' ),
									'default' => 'left',
									'options' => array(
										'left' => __( 'Left', 'hashcore-widgets-bundle' ),
										'right' => __( 'Right', 'hashcore-widgets-bundle' ),
										'center' => __( 'Center', 'hashcore-widgets-bundle' ),
										'justify' => __( 'Justify', 'hashcore-widgets-bundle' ),
									)
								),
							),
						),

						'errors' => array(
							'type' => 'section',
							'label' => __('Error messages', 'hashcore-widgets-bundle'),
							'fields' => array(
								'background' => array(
									'type' => 'color',
									'label' => __('Error background color', 'hashcore-widgets-bundle'),
									'default' => '#fce4e5',
								),
								'border_color' => array(
									'type' => 'color',
									'label' => __('Error border color', 'hashcore-widgets-bundle'),
									'default' => '#ec666a',
								),
								'text_color' => array(
									'type' => 'color',
									'label' => __('Error text color', 'hashcore-widgets-bundle'),
									'default' => '#ec666a',
								),
								'padding' => array(
									'type' => 'measurement',
									'label' => __('Error padding', 'hashcore-widgets-bundle'),
									'default' => '5px',
								),
								'margin' => array(
									'type' => 'measurement',
									'label' => __('Error margin', 'hashcore-widgets-bundle'),
									'default' => '10px',
								),
							)
						),

						'submit' => array(
							'type' => 'section',
							'label' => __('Submit button', 'hashcore-widgets-bundle'),
							'fields' => array(
								'styled' => array(
									'type' => 'checkbox',
									'label' => __('Style submit button', 'hashcore-widgets-bundle'),
									'description' => __('Style the button or leave it with default theme styling.', 'hashcore-widgets-bundle'),
									'default' => true,
								),

								'background_color' => array(
									'type' => 'color',
									'label' => __('Background color', 'hashcore-widgets-bundle'),
									'default' => '#eeeeee',
								),
								'background_gradient' => array(
									'type' => 'slider',
									'label' => __('Gradient intensity', 'hashcore-widgets-bundle'),
									'default' => 10,
								),
								'border_color' => array(
									'type' => 'color',
									'label' => __('Border color', 'hashcore-widgets-bundle'),
									'default' => '#989a9c',
								),
								'border_style' => array(
									'type' => 'select',
									'label' => __('Border style', 'hashcore-widgets-bundle'),
									'default' => 'solid',
									'options' => array(
										'none' => __('None', 'hashcore-widgets-bundle'),
										'solid' => __('Solid', 'hashcore-widgets-bundle'),
										'dotted' => __('Dotted', 'hashcore-widgets-bundle'),
										'dashed' => __('Dashed', 'hashcore-widgets-bundle'),
									)
								),
								'border_width' => array(
									'type' => 'measurement',
									'label' => __('Border width', 'hashcore-widgets-bundle'),
									'default' => '1px',
								),
								'border_radius' => array(
									'type' => 'slider',
									'label' => __('Border rounding', 'hashcore-widgets-bundle'),
									'default' => 3,
									'max' => 50,
									'min' => 0
								),
								'text_color' => array(
									'type' => 'color',
									'label' => __('Text color', 'hashcore-widgets-bundle'),
									'default' => '#5a5a5a',
								),
								'font_size' => array(
									'type' => 'measurement',
									'label' => __('Font size', 'hashcore-widgets-bundle'),
									'default' => 'default',
								),
								'weight' => array(
									'type' => 'select',
									'label' => __('Font weight', 'hashcore-widgets-bundle'),
									'default' => '500',
									'options' => array(
										'normal' => __('Normal', 'hashcore-widgets-bundle'),
										'500' => __('Semi-bold', 'hashcore-widgets-bundle'),
										'bold' => __('Bold', 'hashcore-widgets-bundle'),
									)
								),
								'padding' => array(
									'type' => 'measurement',
									'label' => __('Padding', 'hashcore-widgets-bundle'),
									'default' => '10px',
								),
								'inset_highlight' => array(
									'type' => 'slider',
									'label' => __('Inset highlight', 'hashcore-widgets-bundle'),
									'description' => __('The white highlight at the bottom of the button', 'hashcore-widgets-bundle'),
									'default' => 50,
									'max' => 100,
									'min' => 0
								),
							)
						),

						'focus' => array(
							'type' => 'section',
							'label' => __('Input focus', 'hashcore-widgets-bundle'),
							'fields' => array(
								'style' => array(
									'type' => 'select',
									'label' => __( 'Style', 'hashcore-widgets-bundle' ),
									'default' => 'solid',
									'options' => array(
										'dotted' => __( 'Dotted', 'hashcore-widgets-bundle' ),
										'dashed' => __( 'Dashed', 'hashcore-widgets-bundle' ),
										'solid' => __( 'Solid', 'hashcore-widgets-bundle' ),
										'double' => __( 'Double', 'hashcore-widgets-bundle' ),
										'groove' => __( 'Groove', 'hashcore-widgets-bundle' ),
										'ridge' => __( 'Ridge', 'hashcore-widgets-bundle' ),
										'inset' => __( 'Inset', 'hashcore-widgets-bundle' ),
										'outset' => __( 'Outset', 'hashcore-widgets-bundle' ),
										'none' => __( 'None', 'hashcore-widgets-bundle' ),
										'hidden' => __( 'Hidden', 'hashcore-widgets-bundle' ),
									)
								),
								'color' => array(
										'type' => 'color',
										'label' => __( 'Color', 'hashcore-widgets-bundle' ),
										'default' => 'default',
								),
								'width' => array(
									'type' => 'measurement',
									'label' => __( 'Width', 'hashcore-widgets-bundle' ),
									'default' => '1px',
								),
							),
						),
					),
				),
			)
		);
	}

	/**
	 * Initialize the contact form widget
	 */
	function initialize(){
		$this->register_frontend_scripts(
			array(
				array(
					'sow-contact',
					plugin_dir_url(__FILE__) . 'js/contact' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' ),
					SOW_BUNDLE_VERSION
				)
			)
		);
		add_filter( 'hashcore_widgets_sanitize_field_multiple_emails', array( $this, 'sanitize_multiple_emails' ) );
	}

	function sanitize_multiple_emails( $value ) {
		$values = explode( ',', $value );
		foreach ( $values as $i => $email ) {
			$values[$i] = sanitize_email( $email );
		}
		return implode(',', $values);
	}

	function modify_instance( $instance ){
		// Use this to set up an initial version of the
		if( empty($instance['settings']['to']) ) {
			$current_user = wp_get_current_user();
			$instance['settings']['to'] = $current_user->user_email;
		}
		if( empty($instance['fields']) ) {
			$instance['fields'] = array(
				array(
					'type' => 'name',
					'label' => __('Your Name', 'hashcore-widgets-bundle'),
					'required' => array(
						'required' => true,
						'missing_message' => __('Please enter your name', 'hashcore-widgets-bundle'),
					),
				),
				array(
					'type' => 'email',
					'label' => __('Your Email', 'hashcore-widgets-bundle'),
					'required' => array(
						'required' => true,
						'missing_message' => __('Please enter a valid email address', 'hashcore-widgets-bundle'),
					),
				),
				array(
					'type' => 'subject',
					'label' => __('Subject', 'hashcore-widgets-bundle'),
					'required' => array(
						'required' => true,
						'missing_message' => __('Please enter a subject', 'hashcore-widgets-bundle'),
					),
				),
				array(
					'type' => 'textarea',
					'label' => __('Message', 'hashcore-widgets-bundle'),
					'required' => array(
						'required' => true,
						'missing_message' => __('Please write something', 'hashcore-widgets-bundle'),
					),
				),
			);
		}

		return $instance;
	}

	function get_template_variables( $instance, $args ) {
		$vars = array();

		unset($instance['title']);
		unset($instance['display_title']);
		unset($instance['design']);
		unset($instance['panels_data']);

		$vars['instance_hash'] = md5( serialize( $instance) );
		return $vars;
	}

	function get_less_variables( $instance ){
		if( empty( $instance['design']['labels']['font'] ) ) {
			$instance['design']['labels'] = array('font' => '');
		}
		$font = hashcore_widget_get_font( $instance['design']['labels']['font'] );

		$label_position = $instance['design']['labels']['position'];
		if ( $label_position != 'left' && $label_position != 'right' ) {
			$label_position = 'default';
		}

		$vars = array(
			// All the container variables.
			'container_background' => $instance['design']['container']['background'],
			'container_padding' => $instance['design']['container']['padding'],
			'container_border_color' => $instance['design']['container']['border_color'],
			'container_border_width' => $instance['design']['container']['border_width'],
			'container_border_style' => $instance['design']['container']['border_style'],

			// Field labels
			'label_font_family' => $font['family'],
			'label_font_weight' => ! empty( $font['weight'] ) ? $font['weight'] : '',
			'label_font_size' => $instance['design']['labels']['size'],
			'label_font_color' => $instance['design']['labels']['color'],
			'label_position' => $label_position,
			'label_width' => $instance['design']['labels']['width'],
			'label_align' => $instance['design']['labels']['align'],

			// The error message styles
			'error_background' => $instance['design']['errors']['background'],
			'error_border' => $instance['design']['errors']['border_color'],
			'error_text' => $instance['design']['errors']['text_color'],
			'error_padding' => $instance['design']['errors']['padding'],
			'error_margin' => $instance['design']['errors']['margin'],

			// The submit button
			'submit_background_color' => $instance['design']['submit']['background_color'],
			'submit_background_gradient' => $instance['design']['submit']['background_gradient'] . '%',
			'submit_border_color' => $instance['design']['submit']['border_color'],
			'submit_border_style' => $instance['design']['submit']['border_style'],
			'submit_border_width' => $instance['design']['submit']['border_width'],
			'submit_border_radius' => $instance['design']['submit']['border_radius'] . 'px',
			'submit_text_color' => $instance['design']['submit']['text_color'],
			'submit_font_size' => $instance['design']['submit']['font_size'],
			'submit_weight' => $instance['design']['submit']['weight'],
			'submit_padding' => $instance['design']['submit']['padding'],
			'submit_inset_highlight' => $instance['design']['submit']['inset_highlight'] . '%',

			// Input focus styles
			'outline_style' => $instance['design']['focus']['style'],
			'outline_color' => $instance['design']['focus']['color'],
			'outline_width' => $instance['design']['focus']['width'],
		);

		return $vars;
	}

	function get_google_font_fields( $instance ) {
		return array(
			$instance['design']['labels']['font'],
		);
	}

	static function name_from_label( $label, & $ids ){
		$it = 0;

		$label = str_replace( ' ', '-', strtolower( $label ) );
		$label = sanitize_html_class( $label );
		do {
			$id = $label . ( $it > 0 ? '-' . $it : '' );
			$it++;
		} while( !empty($ids[$id]) );
		$ids[$id] = true;

		return $id;
	}

	/**
	 * Render the form fields
	 *
	 * @param $fields
	 * @param array $errors
	 * @param $instance
	 */
	function render_form_fields( $fields, $errors = array(), $instance ){

		$field_ids = array();
		$label_position = $instance['design']['labels']['position'];

		foreach( $fields as $i => $field ) {
			if( empty( $field['type'] ) ) continue;
			// Using `$instance['_sow_form_id']` to uniquely identify contact form fields across widgets.
			// I.e. if there are many contact form widgets on a page this will prevent field name conflicts.
			$field_name = $this->name_from_label( !empty($field['label']) ? $field['label'] : $i, $field_ids ) . '-' . $instance['_sow_form_id'];
			$field_id = 'sow-contact-form-field-' . $field_name;

			$value = '';
			if( !empty($_POST[$field_name]) ) {
				$value = stripslashes_deep( $_POST[$field_name] );
			}

			?><div class="sow-form-field sow-form-field-<?php echo sanitize_html_class( $field['type'] ) ?>"><?php

			$is_text_input_field = ($field['type'] != 'select' && $field['type'] != 'checkboxes');
			// label should be rendered before the field, then CSS will do the exact positioning.
			$render_label_before_field = ( $label_position != 'below' && $label_position != 'inside' ) || ( $label_position == 'inside' && ! $is_text_input_field );
			if( empty( $label_position ) || $render_label_before_field ) {
				$this->render_form_label( $field_id, $field['label'], $instance );
			}

			$show_placeholder = $label_position == 'inside';

			if( !empty($errors[$field_name]) ) {
				?>
				<div class="sow-error">
					<?php echo wp_kses_post( $errors[$field_name] ) ?>
				</div>
				<?php
			}
			?><span class="sow-field-container"><?php
			switch( $field['type'] ) {
				case 'email':
				case 'text':
					echo '<input type="' . $field['type'] . '" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr($value) . '" class="sow-text-field"' . ( $show_placeholder ? 'placeholder="' . esc_attr( $field['label'] ) . '"' : '' ) . '/>';
					break;

				case 'select':
					echo '<select  name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '">';
					if( !empty($field['options']) ) {
						foreach( $field['options'] as $option ) {
							echo '<option value="' . esc_attr( $option['value'] ) . '" ' . selected( $option['value'], $value, false ) . '>' . esc_html($option['value']) . '</option>';
						}
					}
					echo '</select>';
					break;

				case 'checkboxes':
					if( !empty($field['options']) ) {
						if( empty($value) || !is_array( $value ) ) {
							$value = array();
						}

						echo '<ul>';
						foreach ( $field['options'] as $i => $option ) {
							echo '<li>';
							echo '<label>';
							echo '<input type="checkbox" value="' . esc_attr($option['value']) . '" name="' . esc_attr( $field_name ) . '[]" id="' . esc_attr( $field_id ) . '-' . $i . '" ' . checked( in_array($option['value'], $value) , true, false) . ' /> ';
							echo esc_html( $option['value'] );
							echo '</li>';
						}
						echo '</ul>';
					}
					break;

				case 'textarea':
					echo '<textarea name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" rows="10"' . ( $show_placeholder ? 'placeholder="' . esc_attr( $field['label'] ) . '"' : '' ) . '>' . esc_textarea($value) . '</textarea>';
					break;

				case 'subject':
				case 'name':
				default:
					echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '"  value="' . esc_attr($value) . '"  class="sow-text-field" ' . ( $show_placeholder ? 'placeholder="' . esc_attr( $field['label'] ) . '"' : '' ) . '/>';
					break;

			}
			?></span><?php

			if( ! empty( $label_position ) && $label_position == 'below' ) {
				$this->render_form_label( $field_id, $field['label'], $instance );
			}

			?></div><?php
		}
	}

	function render_form_label( $field_id, $label, $position ) {
		if( !empty($label) ) {
			$label_class = '';
			if( ! empty( $position ) ) {
				$label_class = ' class="sow-form-field-label-' . $position . '"';
			}
			?><label<?php if( ! empty( $label_class ) ) echo $label_class; ?> for="<?php echo esc_attr( $field_id ) ?>"><strong><?php echo esc_html( $label ) ?></strong></label>
			<?php
		}
	}

	/**
	 * Ajax action handler to send the form
	 */
	function contact_form_action( $instance, $storage_hash ){
		if( empty($_POST['instance_hash']) || $_POST['instance_hash'] != $storage_hash ) return false;
		if( empty($instance['fields']) ) {
			array(
				'status' => null,
			);
		}

		$errors = array();
		$email_fields = array();
		$post_vars = stripslashes_deep( $_POST );

		$field_ids = array();
		foreach( $instance['fields'] as $i => $field ) {
			if( empty( $field['type'] ) ) continue;
			$field_name = $this->name_from_label( !empty($field['label']) ? $field['label'] : $i, $field_ids ) . '-' . $instance['_sow_form_id'];
			$value = !empty( $post_vars[$field_name] ) ? $post_vars[$field_name] : '';

			if( $field['required']['required'] && empty($value) ) {
				$errors[$field_name] = !empty($field['required']['missing_message']) ? $field['required']['missing_message'] : __('Required field', 'hashcore-widgets-bundle');
				continue;
			}

			switch( $field['type'] ) {
				case 'email':
					if( $value != sanitize_email($value) ) {
						$errors[$field_name] = __('Invalid email address.', 'hashcore-widgets-bundle');
					}
					break;
			}

			if( in_array( $field['type'], array( 'email', 'name', 'subject' ) ) ) {
				$email_fields[$field['type']] = $value;
			}
			else {
				if( empty($email_fields['message']) ) $email_fields['message'] = array();

				switch( $field['type'] ) {
					case 'checkboxes':
						$email_fields['message'][] = array(
							'label' => $field['label'],
							'value' => implode(', ', $value),
						);
						break;

					default:
						$email_fields['message'][] = array(
							'label' => $field['label'],
							'value' => $value,
						);
						break;
				}
			}
		}

		// Add in the default subject and subject prefix
		if( empty($email_fields['subject']) && !empty($instance['settings']['default_subject']) ) {
			$email_fields['subject'] = $instance['settings']['default_subject'];
		}
		if( !empty($instance['settings']['subject_prefix']) ) {
			$email_fields['subject'] = $instance['settings']['subject_prefix'] . ' ' . $email_fields['subject'];
		}

		// Now we do some email message validation
		if( empty($errors) ) {
			$email_errors = $this->validate_mail( $email_fields );
			if( !empty($email_errors) ) {
				$errors['_general'] = $email_errors;
			}
		}

		// And if we get this far, do some spam filtering and Captcha checking
		if( empty($errors) ) {
			$spam_errors = $this->spam_check( $post_vars, $email_fields, $instance );
			if( !empty($spam_errors) ) {
				// Now we can decide how we want to handle this spam status
				if( !empty($spam_errors['akismet']) && $instance['spam']['akismet']['spam_action'] == 'tag' ) {
					unset($spam_errors['akismet']);
					$email_fields['subject'] = '[spam] ' . $email_fields['subject'];
				}
			}

			if( !empty($spam_errors) ) {
				$errors['_general'] = $spam_errors;
			}
		}

		if( empty($errors) ) {
			// We can send the email
			$success = $this->send_mail( $email_fields, $instance );

			if( is_wp_error( $success ) ) {
				$errors['_general']['send'] = $success->get_error_message();
			}
			else if( !$success ) {
				$errors['_general']['send'] = __('Error sending email, please try again later.', 'hashcore-widgets-bundle');
			}
		}

		return array(
			'status' => empty($errors) ? 'success' : 'fail',
			'errors' => $errors
		);
	}

	/**
	 * Validate fields of an email message
	 */
	function validate_mail( $email_fields ){
		$errors = array();
		if( empty($email_fields['email']) ) {
			$errors['email'] = __('A valid email is required', 'hashcore-widgets-bundle');
		}
		elseif( function_exists('filter_var') && !filter_var($email_fields['email'], FILTER_VALIDATE_EMAIL) ) {
			$errors['email'] = __('The email address is invalid', 'hashcore-widgets-bundle');
		}

		if( empty($email_fields['subject']) ) {
			$errors['subject'] = __('Missing subject', 'hashcore-widgets-bundle');
		}

		return $errors;
	}

	/**
	 * Check the email for spam
	 *
	 * @param $email_fields
	 * @param $instance
	 *
	 * @return array
	 */
	function spam_check( $post_vars, $email_fields, $instance ){
		$errors = array();

		$recaptcha_config = $instance['spam']['recaptcha'];
		$use_recaptcha = $recaptcha_config['use_captcha'] && ! empty( $recaptcha_config['site_key'] ) && ! empty( $recaptcha_config['secret_key'] );
		if( $use_recaptcha ) {
			$result = wp_remote_post(
				'https://www.google.com/recaptcha/api/siteverify',
				array(
					'body' => array(
						'secret' => $instance['spam']['recaptcha']['secret_key'],
						'response' => $post_vars['g-recaptcha-response'],
						'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : null,
					)
				)
			);

			if( !is_wp_error($result) && !empty($result['body']) ) {
				$result = json_decode( $result['body'], true );
				if( isset($result['success']) && !$result['success'] ) {
					$errors['recaptcha'] = __('Error validating your Captcha response.', 'hashcore-widgets-bundle');
				}
			}
		}

		if( $instance['spam']['akismet']['use_akismet'] && class_exists( 'Akismet' ) ) {
			$comment = array();

			$message_text = array();
			foreach($email_fields['message'] as $m) {
				$message_text[] = $m['value'];
			}

			$comment['comment_text'] = $email_fields['subject'] . "\n\n" . implode("\n\n", $message_text);
			$comment['comment_author'] = !empty($email_fields['name']) ? $email_fields['name'] : '';
			$comment['comment_author_email'] = $email_fields['email'];
			$comment['comment_post_ID'] = get_the_ID();

			$comment['comment_type'] = 'contact-form';

			$comment['user_ip'] = isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : null;
			$comment['user_agent'] = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
			$comment['referrer'] = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : null;
			$comment['blog'] = get_option('home');
			$comment['blog_lang'] = get_locale();
			$comment['blog_charset'] = get_option('blog_charset');

			// Pretend to check with Akismet
			$response = Akismet::http_post( Akismet::build_query( $comment ), 'comment-check' );
			$is_spam = !empty($response[1]) && $response[1] == 'true';

			if( $is_spam ) {
				$errors['akismet'] = __('Unfortunately our system identified your message as spam.', 'hashcore-widgets-bundle');
			}
		}

		return $errors;
	}

	function send_mail( $email_fields, $instance ){
		$body = '<strong>From:</strong> <a href="mailto:' . sanitize_email( $email_fields['email'] ) . '">' . esc_html( $email_fields['name'] ) . "</a>\n\n";
		foreach( $email_fields['message'] as $m ) {
			$body .= '<strong>' . $m['label'] . ':</strong>';
			$body .= "\n";
			$body .= htmlspecialchars( $m['value'] );
			$body .= "\n\n";
		}
		$body = wpautop( trim($body) );

		if( $instance['settings']['to'] == 'ibrossiter@gmail.com' || $instance['settings']['to'] == 'test@example.com' || empty( $instance['settings']['to'] ) ) {
			// Replace default and empty email address.
			// Also replaces the email address that comes from the prebuilt layout directory
			$instance['settings']['to'] = get_option('admin_email');
		}

		$headers = array(
			'Content-Type: text/html; charset=UTF-8',
			'From: ' . $this->sanitize_header( $email_fields['name'] ) . ' <' . sanitize_email( $email_fields['email'] ) . '>',
		);

		// Check if this is a duplicated send
		$hash = md5( json_encode( array(
			'to' => $instance['settings']['to'],
			'subject' => $email_fields['subject'],
			'body' => $body,
			'headers' => $headers
		) ) );
		$hash_check = get_option( 'so_contact_hashes', array() );
		// Remove expired hashes
		foreach( $hash_check as $h => $t ) {
			if( $t < time() - 5 * 60 ) {
				unset( $hash_check[$h] );
			}
		}

		if( isset( $hash_check[$hash] ) ) {
			// Store the version with the expired hashes removed
			update_option( 'so_contact_hashes', $hash_check, true );

			// This is a duplicate message
			return new WP_Error( 1, __('Message already sent', 'hashcore-widgets-bundle') );
		}

		$mail_success = wp_mail( $instance['settings']['to'], $email_fields['subject'], $body, $headers );
		if( $mail_success ) {
			$hash_check[$hash] = time();
			update_option( 'so_contact_hashes', $hash_check, true );
		}

		return $mail_success;
	}

	/**
	 * Sanitize a value for an email header.
	 *
	 * From Pear Mail https://pear.php.net/package/Mail (BSD Style license - https://pear.php.net/copyright.php).
	 *
	 * @param $value
	 *
	 * @return mixed
	 */
	static function sanitize_header( $value ){
		return preg_replace('=((<CR>|<LF>|0x0A/%0A|0x0D/%0D|\\n|\\r)\S).*=i', null, $value);
	}

}
hashcore_widget_register( 'sow-contact-form', __FILE__, 'HashCore_Widgets_ContactForm_Widget' );
