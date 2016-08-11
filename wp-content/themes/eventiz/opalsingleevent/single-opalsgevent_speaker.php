<?php
/**
 * The Template for displaying all single posts
 *
 * @package WpOpal
 * @subpackage Eventiz
 * @since Eventiz 1.0
 */

$eventiz_page_layouts = null;//;apply_filters( 'eventiz_fnc_get_single_sidebar_configs', null );

get_header( apply_filters( 'eventiz_fnc_get_header_layout', null ) );

do_action( 'eventiz_template_main_before' ); ?>
<section id="main-container" class="<?php echo apply_filters( 'eventiz_template_main_content_class', 'container' ); ?> inner">
	<div class="row">
		<?php if( isset($eventiz_page_layouts['sidebars']) && !empty($eventiz_page_layouts['sidebars']) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
		<div id="main-content" class="main-content col-xs-12 <?php echo esc_attr($eventiz_page_layouts['main']['class']); ?>">

			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
		                    <?php echo Opalsingleevent_Template_Loader::get_template_part( 'content-single-speaker' ); ?>
						<?php endwhile; ?>

						<?php the_posts_pagination( array(
							'prev_text'          => esc_html__( 'Previous page', 'eventiz' ),
							'next_text'          => esc_html__( 'Next page', 'eventiz' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'eventiz' ) . ' </span>',
						) ); ?>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>

				</div><!-- #content -->
			</div><!-- #primary -->
		</div>	
 
	</div>	
</section>
<div class="pbr-other-speaker">
	<div class="container">
		<?php 
			$args = array(
				'post_type'         => 'opalsgevent_speaker',
				'posts_per_page'    => 8,
				'post_status' => 'publish',
			); 
			$loop = new WP_Query($args);
		?>
		<div class="widget pbr-speaker  style-default">
			<div class="heading clearfix separator_align_left heading-v1">
			   <div class="heading-inner"> <h2><?php esc_html_e('other speakers', 'eventiz') ?></h2></div>    
			</div>
			
			<div id="carousel-other-speakers" class="text-left owl-carousel-play" data-ride="owlcarousel">
					<div class="owl-carousel " data-slide="4" data-pagination="false" data-navigation="true" data-desktop="[1199,2]" data-desktopsmall="[980,1]" data-tablet="[768,1]">
					<?php $_count=0; while($loop->have_posts()): $loop->the_post(); 
						$job = get_post_meta(get_the_ID(), 'opalsingleevent_speaker_job', true);
						$class_speaker = new OpalSingleEvent_Speaker(get_the_ID());
						$socials = $class_speaker->getSocials();
					?>
						<div class="item">
							<div class="image text-center">
								<?php the_post_thumbnail('full'); ?>
								<div class="action">
									<div class="action-inner clearfix">
										<div class="social">
											<?php if(isset($socials['twitter']) && $socials['twitter']){ ?>
												<a href="<?php echo esc_url($socials['twitter']) ?>"><i class="fa fa-twitter"></i></a>
											<?php } ?>
											<?php if(isset($socials['facebook']) && $socials['facebook']){ ?>
												<a href="<?php echo esc_url($socials['facebook']) ?>"><i class="fa fa-facebook"></i></a>
											<?php } ?>
											<?php if(isset($socials['google']) && $socials['google']){ ?>
												<a href="<?php echo esc_url($socials['google']) ?>"><i class="fa fa-google"></i></a>
											<?php } ?>
											<?php if(isset($socials['linkedin']) && $socials['linkedin']){ ?>
												<a href="<?php echo esc_url($socials['linkedin']) ?>"><i class="fa fa-linkedin"></i></a>
											<?php } ?>
											<?php if(isset($socials['instagram']) && $socials['instagram']){ ?>
												<a href="<?php echo esc_url($socials['instagram']) ?>"><i class="fa fa-instagram"></i></a>
											<?php } ?>
											<?php if(isset($socials['pinterest']) && $socials['pinterest']){ ?>
												<a href="<?php echo esc_url($socials['pinterest']) ?>"><i class="fa fa-pinterest"></i></a>
											<?php } ?>
										</div>
										<div class="view-profile"><a href="<?php the_permalink(); ?>"><?php esc_html_e('View Profile', 'eventiz') ?>&nbsp; <i class="fa fa-arrow-right"></i></a></div>
									</div>	
							</div>
							</div>
							<div class="meta">
								<span class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
								<span class="job"><?php echo esc_html($job); ?> </span>
							</div>
						</div>
						<?php $_count++; ?>
					<?php endwhile; ?>
				</div>
			</div>

		</div>
		<?php wp_reset_postdata(); ?>
	</div>	
</div>
<?php
get_footer();
