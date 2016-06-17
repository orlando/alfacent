<?php
$postid = get_the_ID();
$summary = wp_kses_post( $instance['summary']['text'] );
$my_post = array(
  'ID'           => $postid,
  'post_excerpt' => $summary,
);

if ( empty( $post->$post_excerpt ) ) {
	wp_update_post( $my_post );
}
?>

<div class="hashcore-post-project">
	<div class="row">

		<div class="col-xs-12 col-sm-4 col-md-3">
			<div class="margin hashcore-post-project-title"><span><?php the_title(); ?></span></div>
			<div class="margin hashcore-post-project-summary"><?php echo $summary; ?></div>
			<div class="margin hashcore-post-project-"><?php $this->sub_widget( 'HashCore_Widget_Button_Widget', $args, $instance['cta'] ) ?></div>
			<div class="margin hashcore-post-project-"><?php $this->sub_widget( 'HashCore_Widget_List_Item', $args, $instance['list-item'] ) ?></div>
		</div>

		<div class="col-xs-12 col-sm-8 col-md-9">
			<?php $this->sub_widget( 'HashCore_Widget_Editor_Widget', $args, $instance['editor'] ) ?>
		</div>

	</div>
</div>
