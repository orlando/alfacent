<?php

/**
 *
 * This class is used when a field class can't be found to display an error message to the user.
 *
 * Class HashCore_Widget_Field_Error
 */
class HashCore_Widget_Field_Error extends HashCore_Widget_Field_Base {

	/**
	 * An error message to display.
	 *
	 * @access protected
	 * @var string
	 */
	protected $message;

	protected function render_field( $value, $instance ) {
		printf( __($this->message, 'hashcore-widgets-bundle') );
	}

	protected function sanitize_field_input( $value, $instance ) {
		return $value;
	}
}
