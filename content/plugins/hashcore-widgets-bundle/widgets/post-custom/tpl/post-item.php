<?php

$posts = new WP_Query( $query );

while ( $posts->have_posts() ) : $posts->the_post();

	$totalcomments = get_comments_number();

	if ( empty( $totalcomments ) ) {
		$comments = __( 'No Comments' );
	} elseif ( $totalcomments > 1 ) {
		$comments = $totalcomments . __( ' Comments' );
	} else {
		$comments = __( '1 Comment' );
	}

	$categories_list = get_the_category_list( __( ', ', 'hashcore-widgets-bundle' ) );
	$date = get_the_date();
	$author = get_the_author();
	?>

	<div class="hashcore-item">
		<p>
			<span class="hashcore-item-date"><?php echo esc_html( $date ); ?></span>
			<i class="fa fa-circle hashcore-item-circle" aria-hidden="true"></i>
			<span class="hashcore-item-author">By <?php echo esc_html( $author ); ?></span>
		</p>
		<h3 class="hashcore-item-title"><?php the_title() ?></h3>
		<p>
			<span class="hashcore-item-category"><i class="fa fa-tags" aria-hidden="true"></i><?php echo '  ' . __( $categories_list ); ?></span>
			<span class="hashcore-item-comment"><i class="fa fa-comment" aria-hidden="true"></i><?php echo '  ' . esc_html( $comments ); ?></span>
		</p>
		<div class="hashcore-item-content"> <?php the_excerpt(); ?></div>
		<h4 class="hashcore-item-read"><a href="<?php the_permalink() ?>">Read More</a></h4>
	</div>
<?php endwhile;
wp_reset_postdata(); ?>
