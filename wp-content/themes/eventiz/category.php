<?php
/**
 * The template for displaying Category pages
 *
 * @link http://wpopal.com/themes/eventiz
 *
 * @package WpOpal
 * @subpackage Eventiz
 * @since Eventiz 1.0
 */

$eventiz_page_layouts = apply_filters( 'eventiz_fnc_get_category_sidebar_configs', null );  

get_header( apply_filters( 'eventiz_fnc_get_header_layout', null ) ); ?>
<?php do_action( 'eventiz_template_main_before' ); ?>
<section id="main-container" class="<?php echo apply_filters('eventiz_template_main_container_class','container');?> inner <?php echo eventiz_fnc_theme_options('blog-archive-layout') ; ?>">
	<div class="row">

		<?php if( isset($eventiz_page_layouts['sidebars']) && !empty($eventiz_page_layouts['sidebars']) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
		
		<div id="main-content" class="main-content col-sm-12 <?php echo esc_attr($eventiz_page_layouts['main']['class']); ?>">
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">

					<?php if ( have_posts() ) : ?>

					<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'vc_templates/post/_single-v2');

							endwhile;
							// Previous/next page navigation.
							eventiz_fnc_paging_nav();

						else :
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );

						endif;
					?>

				</div><!-- #content -->
			</div><!-- #primary -->
			<?php get_sidebar( 'content' ); ?>
		</div><!-- #main-content -->

 
 
	</div>	
</section>
<?php
get_footer();