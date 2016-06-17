<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Hashcore
 */

get_header(); ?>
<div class="container site-wrapper">
	<div class="row">
		<div class="col-xs-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--col-xs-12 -->
	</div><!-- .row -->
</div><!-- container-->
<?php
get_footer();
