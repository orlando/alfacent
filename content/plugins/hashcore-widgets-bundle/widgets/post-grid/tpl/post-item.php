<?php
$length = $instance['settings']['description_options']['length'];
$title_position = $instance['settings']['title_options']['position'];
$desktop = $instance['settings']['grid_options']['desktop'];
$tablet = $instance['settings']['grid_options']['tablet'];
$mobile = $instance['settings']['grid_options']['mobile'];
$hide = $instance['settings']['grid_options']['hide'];


function the_excerpt_max_charlength( $charlength ) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}

function hashcore_post_thumbnail( $post_id, $size = 'image', $class = '' )
{
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size )[0];
	$thumbnail_2x = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size . '-2x' )[0];
	$thumbnail_3x = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size . '-3x' )[0];

	$image	= '<img src="' . $thumbnail . '"';
	$image .= ( $thumbnail_2x && $thumbnail_3x ?	' srcset="' : '' ); // Open srcset.
	$image .= ( $thumbnail_2x ? $thumbnail_2x . ' 2x' : '' );
	$image .= ( $thumbnail_2x && $thumbnail_3x ? ', ' : '' );
	$image .= ( $thumbnail_3x ? $thumbnail_3x . ' 3x' : '' );
	$image .= ( $thumbnail_2x && $thumbnail_3x ?	'"' : '' ); // Close srcset.
	$image .= ( $class ? ' class="' . esc_attr( $class ) . '"' : '' );
	$image .= ' sizes="auto">';

	return $image;
}

$dir_plugin = dirname( __FILE__ );
$plugin_path = plugin_dir_url( $dir_plugin ) . 'assets/placeholder.png';

?>
<div class="row">
<?php
$i = 0;
while ( $posts->have_posts() ) : $posts->the_post();

	if (true === $hide) {
		++$i;
		if ( $i > $mobile && $i < $tablet ) {
			$class_hide = 'hide_mobile';
		} elseif ( $i > $tablet ) {
			$class_hide = 'hide_tablet';
		}
	}

?>
	<div class="hashcore-grid-item <?php echo $class_hide; ?>">
		<a href="<?php the_permalink(); ?>">
			<div class="hashcore-grid-item-wrapper">

				<?php if ( has_post_thumbnail() ) {
					//the_post_thumbnail( 'medium', array( 'class' => 'hashcore-grid-item-image' ) );
					echo hashcore_post_thumbnail( $post->ID, 'image', 'hashcore-grid-item-image' );
				} else { ?>
					<img class="hashcore-grid-item-image" src="<?php echo $plugin_path; ?>">
				<?php } ?>

				<?php the_post_thumbnail( 'medium', array( 'class' => 'hashcore-grid-item-image' ) ); ?>

				<?php if ( 'hidden' !== $title_position ) : ?>
					<div class="hashcore-grid-item-info">
						<?php if ( 'below' === $title_position ) : ?>
							<div class="hashcore-grid-item-info-title">
								<span> <?php the_title(); ?> </span>
							</div>
						<?php endif; ?>

						<?php if ( has_excerpt() ) : ?>
							<div class="hashcore-grid-item-info-description">
								<span> <?php the_excerpt_max_charlength( $length ); ?> </span>
							</div>

						<?php endif; ?>

						<?php if ( 'above' === $title_position ) : ?>
							<div class="hashcore-grid-item-info-title">
								<span> <?php the_title(); ?> </span>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>
		</a>
	</div>

<?php endwhile;
wp_reset_postdata(); ?>
</div>
