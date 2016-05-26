<?php
$query = hashcore_widget_post_selector_process_query( $instance['posts'] );
$posts = new WP_Query( $query );
?>

<?php if ( $posts->have_posts() ) : ?>

	<div class="hashcore-post-container">

		<h3 class="hashcore-post-title">
			<?php echo esc_html( $instance['title'] )?>
		</h3>
		
		<div class="hashcore-post-wrapper">

			<?php include 'post-item.php' ?>

		</div>
	</div>
<?php endif; ?>
