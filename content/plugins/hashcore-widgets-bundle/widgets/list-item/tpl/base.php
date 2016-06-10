<?php $lists = $instance['list'];
			$icons = $instance['icon'];
			$icon_download = array();
			$icon_view = array();
			$icon_download[] = 'color: '.$icons['download_color'];
			$icon_view[] = 'color: '.$icons['view_color']; ?>

<div class="hashcore-lists">

	<?php foreach ( $lists as $i => $list ) :
		$items = $list['item']; ?>
		<div class="hashcore-lists-list">

			<?php if ( ! empty( $list['title'] ) ) : ?>
				<h3 class="hashcore-lists-list-title">
					<?php echo wp_kses_post( $list['title'] ); ?>
				</h3>
			<?php endif; ?>

			<?php  if ( ! empty( $items ) ) : ?>
				<ul class="hashcore-lists-items">

				<?php foreach ( $items as $j => $item ) : ?>

					<li class="hashcore-lists-items-item">
						<span class="hashcore-lists-items-item-text"><?php echo wp_kses_post( $item['text'] ); ?></span>

						<?php  if ( ! empty( $item['url'] ) || ! empty( $item['url_ext'] ) ) :
							$url = ! empty( $item['url'] ) ? wp_get_attachment_url( $item['url'] ) : sow_esc_url( $item['url_ext'] ); ?>

							<div class="hashcore-lists-link">
							<?php  if ( ! empty( $icons['download_check'] ) ) : ?>
								<a class="hashcore-lists-link-download" href="<?php echo $url; ?>" download>
									<?php echo hashcore_widget_get_icon($icons['download'], $icon_download); ?>
								</a>
							<?php endif; ?>

							<?php  if ( ! empty( $icons['download_check'] ) && ! empty( $icons['view_check'] ) ) : ?>
								<span> | </span>
							<?php endif; ?>

							<?php  if ( ! empty( $icons['view_check'] ) ) : ?>
								<a class="hashcore-lists-link-view" href="<?php echo $url; ?>">
									<?php echo hashcore_widget_get_icon($icons['view'], $icon_view); ?>
								</a>
							<?php endif; ?>
							</div>

						<?php endif; ?>
					</li>
				<?php endforeach; ?>

				</ul>
			<?php endif; ?>

		</div>
	<?php endforeach; ?>

</div>
