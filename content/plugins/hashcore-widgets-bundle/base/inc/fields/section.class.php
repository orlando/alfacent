<?php

/**
 * Class HashCore_Widget_Field_Section
 */
class HashCore_Widget_Field_Section extends HashCore_Widget_Field_Container_Base {

	protected function render_field( $value, $instance ) {
		?>
		<div class="hashcore-widget-section <?php if( $this->state == 'closed' ) echo 'hashcore-widget-section-hide'; ?>"><?php
		if ( !isset( $this->fields ) || empty($this->fields ) ) {
			echo '</div>';
			return;
		}
		$this->create_and_render_sub_fields( $value, array( 'name' => $this->base_name, 'type' => 'section' ) );
		?>
			<input type="hidden"
			       name="<?php echo esc_attr( $this->element_name . '[so_field_container_state]' ) ?>" id="<?php echo esc_attr( $this->element_id . '-so_field_container_state' ) ?>"
			       class="hashcore-widget-input hashcore-widget-field-container-state" value="<?php echo esc_attr( $this->state ) ?>"/>
		</div><?php
	}

}
