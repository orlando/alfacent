<?php
$postid = get_the_ID();
$query = hashcore_widget_post_selector_process_query( $instance['posts'] );

if ( ! empty( $postid ) ) {
  $exclude_ids = array( $postid );
  $query['post__not_in'] = $exclude_ids;
}

$posts = new WP_Query( $query );
?>

<?php if ( $posts->have_posts() ) : ?>

	<div class="hashcore-posts-container">
		<div class="hashcore-posts-wrapper">
			<?php include 'post-item.php' ?>
		</div>
	</div>
  
<?php endif; ?>
