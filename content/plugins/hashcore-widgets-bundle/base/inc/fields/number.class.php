<?php

/**
 * Class HashCore_Widget_Field_Number
 */
class HashCore_Widget_Field_Number extends HashCore_Widget_Field_Text_Input_Base {

	protected function get_input_classes() {
		$input_classes = parent::get_input_classes();
		$input_classes[] = 'hashcore-widget-input-number';
		return $input_classes;
	}

	protected function sanitize_field_input( $value, $instance ) {
		return ( $value === '' ) ? false : (float) $value;
	}
}
