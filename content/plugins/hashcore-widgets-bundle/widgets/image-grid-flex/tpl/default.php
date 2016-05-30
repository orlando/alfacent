<?php if( !empty($instance['images']) ) : ?>
	<div class="hashcore-image-grid-wrapper">
		<?php
		foreach( $instance['images'] as $image ) {
			echo '<div class="hashcore-image-grid-image">';
			if ( ! empty( $image['url'] ) ) echo '<a href="' . sow_esc_url( $image['url'] ) . '">';
			echo wp_get_attachment_image( $image['image'], $instance['display']['attachment_size'], false, array(
				'title' => $image['title']
			) );
			if ( ! empty( $image['url'] ) ) echo '</a>';
			echo '</div>';
		}
		?>
	</div>
<?php endif; ?>
