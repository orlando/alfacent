<div id="sow-headline-container" class="sow-headline">

	<?php if ( !empty( $headline ) ) : ?>
		<h1 class="headline"><?php echo $headline ?></h1>
	<?php endif; ?>

	<?php if ( $has_divider ) : ?>
		<div class="decoration">
			<div class="decoration-inside"></div>
		</div>
	<?php endif; ?>

	<?php if ( !empty( $sub_headline ) ) : ?>
		<h2 class="sub-headline"><?php echo $sub_headline ?></h2>
	<?php endif; ?>

</div>
