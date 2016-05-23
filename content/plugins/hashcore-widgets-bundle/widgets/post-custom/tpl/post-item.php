<?php

$posts = new WP_Query( $query );

while ( $posts->have_posts() ) : $posts->the_post();

	$num_comments = get_comments_number();

	if ( 0 === $num_comments ) {
		$comments = __( 'No Comments' );
	} elseif ( $num_comments > 1 ) {
		$comments = $num_comments . __( ' Comments' );
	} else {
		$comments = __( '1 Comment' );
	}

	$categories_list = get_the_category_list( __( ', ', 'hashcore-widgets-bundle' ) );
	?>

	<div class="hashcore-item">
		<span><?php the_date(); ?></span>
		<span>by <?php the_author(); ?></span>
		<h3><?php the_title() ?></h3>
		<span><?php echo __( $categories_list ); ?></span>
		<span><?php echo esc_html( $comments ); ?></span>
		<p> <?php the_excerpt(); ?></p>
		<h4><a href="<?php the_permalink() ?>">Read More</a></h4>
	</div>
<?php endwhile;
wp_reset_postdata(); ?>
