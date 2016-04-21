<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hashcore
 */

?>

<footer class="site-footer" role="contentinfo">
	<div class="container">
		
		<div class="row">
			<div class="col-xs-12">
				<div class="site-footer-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if ( get_theme_mod( 'hashcore_alt_logo' ) ) : ?>
							<img src="<?php echo get_theme_mod( 'hashcore_alt_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<?php elseif ( hashcore_the_custom_logo() ) :
							hashcore_the_custom_logo();
						else :
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;?>
					</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-offset-2 col-xs-8 hidden-xs">
				<div class="site-footer-menu-wrapper">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'site-footer-menu' ) ); ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-offset-2 col-xs-8">
				<?php dynamic_sidebar( 'footer-social' ); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 text-center">
				<span class="site-footer-copy"><?php echo date('Y');?><i class="fa fa-copyright" aria-hidden="true"></i>  Alfacent By Hash Labs </span>
			</div>
		</div>

	</div> <!-- .container footer-->
</footer>
<?php wp_footer(); ?>

</body>
</html>
