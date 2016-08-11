<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WpOpal
 * @subpackage Eventiz
 * @since Eventiz 1.0
 */
$footer_profile =  apply_filters( 'eventiz_fnc_get_footer_profile', 'default' ); 
?>

		</section><!-- #main -->
		<?php do_action( 'eventiz_template_main_after' ); ?>
		

			<?php if( $footer_profile ) : ?>
				<?php do_action( 'eventiz_template_footer_before' ); ?>
				<footer id="pbr-footer" class="site-footer pbr-footer" role="contentinfo">
					<div class="inner">
						<div class="pbr-footer-profile">
							<?php eventiz_fnc_render_post_content( $footer_profile ); ?>
						</div>
					</div>
				</footer><!-- #colophon -->	
				<?php do_action( 'eventiz_template_footer_after' ); ?>
			<?php else: ?>
				<?php do_action( 'eventiz_template_footer_before' ); ?>
				<footer id="pbr-footer" class="site-footer pbr-footer" role="contentinfo">
					<div class="inner">
						<?php get_sidebar( 'footer' ); ?>
					</div>
				</footer><!-- #colophon -->	
				<?php do_action( 'eventiz_template_footer_after' ); ?>
				<div class="pbr-copyright">
					<div class="container">
						<div class="copyright">
							<address>
								<?php 
									$copyright_text =  eventiz_fnc_theme_options('copyright_text', '');
									if(!empty($copyright_text)){
										echo do_shortcode($copyright_text);
									}else{
										$devby = '<a target="_blank" href="http://wpopal.com">WpOpal Team</a>';
										printf( esc_html__( 'Proudly powered by %s. Developed by %s', 'eventiz' ), 'WordPress', $devby ); 
									}
								?>
							</address>

							<?php if(eventiz_fnc_theme_options('image-payment', '')){ ?>
								<div class="payment">
									<img src="<?php echo esc_url( eventiz_fnc_theme_options('image-payment', '') ); ?>" />
								</div>
							<?php } ?>

						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php get_sidebar( 'offcanvas' );  ?>
	</div>
</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>