<?php
$query = hashcore_widget_post_selector_process_query( $instance['posts'] );
$posts = new WP_Query( $query );
?>

<?php if ( $posts->have_posts() ) : ?>
	<div class="hashcore-post-title">
		<?php echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'] ?>
	</div>

	<div class="hashcore-post-container">
		<div class="hashcore-post-wrapper"
		     data-query="<?php echo esc_attr($instance['posts']) ?>"
		     data-found-posts="<?php echo esc_attr($posts->found_posts) ?>"
		     data-ajax-url="<?php echo sow_esc_url( wp_nonce_url( admin_url('admin-ajax.php'), 'widgets_action', '_widgets_nonce' ) ) ?>"
			>

			<?php include 'post-item.php' ?>

		</div>
	</div>
<?php endif; ?>
