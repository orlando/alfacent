<div class="sow-cta-base">

	<div class="sow-cta-wrapper">

		<div class="sow-cta-text">
			<?php if ( ! empty( $instance['title'] ) ) {?>
				<h4 class="sow-cta-text-title"><?php echo wp_kses_post( $instance['title'] ) ?></h4>
			<?php } ?>
			<?php if ( ! empty( $instance['sub_title'] ) ) {?>
				<h5 class="sow-cta-text-sub-title"><?php echo wp_kses_post( $instance['sub_title'] ) ?></h5>
			<?php } ?>
		</div>

		<?php $this->sub_widget('HashCore_Widget_Button_Widget', $args, $instance['button']) ?>

	</div>

</div>
