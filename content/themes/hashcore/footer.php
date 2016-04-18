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
		<div class="site-footer-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'hashcore' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'hashcore' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'hashcore' ), 'hashcore', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
		</div><!-- .site-info -->
	</div> <!-- .container footer-->
</footer><!-- #colophon -->
<?php wp_footer(); ?>


<?php wp_footer(); ?>

</body>
</html>
