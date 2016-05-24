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
		<span class="hashcore-item-date"><?php the_date(); ?></span>
		<span class="hashcore-item-author">By <?php the_author(); ?></span>
		<h3 class="hashcore-item-title"><?php the_title() ?></h3>
		<span class="hashcore-item-category"><i class="fa fa-tags" aria-hidden="true"></i><?php echo ' ' . __( $categories_list ); ?></span>
		<span class="hashcore-item-comment"><i class="fa fa-comment" aria-hidden="true"></i><?php echo ' ' . esc_html( $comments ); ?></span>
		<div class="hashcore-item-content"> <?php the_excerpt(); ?></div>
		<h4 class="hashcore-item-read"><a href="<?php the_permalink() ?>">Read More</a></h4>
	</div>
<?php endwhile;
wp_reset_postdata(); ?>
