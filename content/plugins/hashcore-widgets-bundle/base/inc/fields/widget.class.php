<?php

/**
 * Class HashCore_Widget_Field_Widget
 */
class HashCore_Widget_Field_Widget extends HashCore_Widget_Field_Container_Base {
	/**
	 * The class name of the widget to be included.
	 *
	 * @access protected
	 * @var string
	 */
	protected $class;

	public function __construct( $base_name, $element_id, $element_name, $field_options, HashCore_Widget $for_widget, $parent_container = array() ) {
		parent::__construct( $base_name, $element_id, $element_name, $field_options, $for_widget, $parent_container );

		if( isset( $this->class ) ) {
			if( class_exists( $this->class ) ) {
				/* @var $sub_widget HashCore_Widget */
				$sub_widget = new $this->class;
				if( is_a( $sub_widget, 'HashCore_Widget' ) ) {
					$this->fields = $sub_widget->form_options( $this->for_widget );
				}
			}
		}
	}

	protected function render_field( $value, $instance ) {
		// Create the extra form entries
		if ( $this->collapsible ) {
			?><div class="hashcore-widget-section <?php if( $this->state == 'closed' ) echo 'hashcore-widget-section-hide'; ?>"><?php
		}

		if( ! class_exists( $this->class ) ) {
			printf( __( '%s does not exist', 'hashcore-widgets-bundle' ), $this->class );
			if ( $this->collapsible ) {
				echo '</div>';
			}
			return;
		}

		/* @var $sub_widget HashCore_Widget */
		$sub_widget = new $this->class;
		if( ! is_a( $sub_widget, 'HashCore_Widget' ) ) {
			printf( __( '%s is not a HashCore Widget', 'hashcore-widgets-bundle' ), $this->class );
			if ( $this->collapsible ) {
				echo '</div>';
			}
			return;
		}
		$this->create_and_render_sub_fields( $value, array( 'name' => $this->base_name, 'type' => 'widget' ) );
		if ( $this->collapsible ) {
			?></div><?php
		}
	}

}
