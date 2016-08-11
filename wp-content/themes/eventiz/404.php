<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WpOpal
 * @subpackage Eventiz
 * @since Eventiz 1.0
 */

$eventiz_page_layouts = apply_filters( 'eventiz_fnc_get_page_sidebar_configs', null );
get_header( apply_filters( 'eventiz_fnc_get_header_layout', null ) );
?>
<?php do_action( 'eventiz_template_main_before' ); ?>
<section id="main-container" class="<?php echo apply_filters('eventiz_template_main_container_class','container');?> inner">
	<div class="row">
		<div id="main-content" class="main-content col-lg-12 page-error404">
			<div id="primary" class="content-area">
				 <div id="content" class="site-content" role="main">
				 	<div class="text-center"><img src="<?php echo (get_template_directory_uri() . '/images/404.png'); ?>" alt="404"/></div>
					<header class="page-header">
						<h3 class="page-title text-center"><?php esc_html_e( 'Page not found', 'eventiz' ); ?></h3>
					</header>

					<div class="page-content text-center">
						<p><?php esc_html_e( 'We\'re sorry, but we can\'t find the page you were looking for. It\'s probably some thing we\'ve done wrong but now we know about it and we\'ll try to fix it. In the meantime, try one of these options:', 'eventiz' ); ?></p>
					</div><!-- .page-content -->

					<div class="page-action text-center">
						<a class="btn btn-lg btn-primary" href="javascript: history.go(-1)"><i class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp;<?php esc_html_e('go to previous page', 'eventiz'); ?></a>
						<a class="btn btn-lg btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('go to homepage', 'eventiz'); ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>
					</div>

				</div><!-- #content -->
			</div><!-- #primary -->
			<?php get_sidebar( 'content' ); ?>
		</div><!-- #main-content -->

		 
		<?php get_sidebar(); ?>
	 
	</div>	
</section>
<?php

get_footer();

 