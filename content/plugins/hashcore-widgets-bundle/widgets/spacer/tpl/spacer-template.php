<?php
$widget_title = wp_kses_post( $instance['widget_title'] );
$spacer = wp_kses_post( $instance['spacer'] );
?>

<div class="spacer" style="height: <?php echo $spacer ?>px"></div>
