<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hashcore
 */

get_header(); ?>
<div class="container site-wrapper">
	<div class="row">
		<div class="col-xs-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php the_content(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--col-xs-12 -->
	</div><!-- .row -->
</div><!-- container-->
<?php
get_footer();
