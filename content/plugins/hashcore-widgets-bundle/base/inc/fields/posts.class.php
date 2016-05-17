<?php

/**
 * Class HashCore_Widget_Field_Posts
 */
class HashCore_Widget_Field_Posts extends HashCore_Widget_Field_Base {

	protected function render_field( $value, $instance ) {
		hashcore_widget_post_selector_admin_form_field( is_array( $value ) ? '' : $value, $this->element_name );
	}

	protected function sanitize_field_input( $value, $instance ) {
		// Posts selector functions handle sanitization.
		return $value;
	}

}
