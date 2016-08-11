<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <opalwordpress@gmail.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/questions/
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$_id = eventiz_fnc_makeid();
$_count = 0;
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => $number,
	'post_status' => 'publish',
);

$query = new WP_Query($args);
?>

<div class="widget-nostyle wpo-testimonial <?php echo esc_attr($skin).' '.esc_attr($el_class); ?>">
	<?php if($query->have_posts()){ ?>
		<?php if($title!=''){ ?>
			<h3 class="widget-title visual-title <?php echo esc_attr($size).' '.esc_attr($alignment); ?>">
				<span><?php echo trim($title); ?></span>
			</h3>
		<?php } ?>
 
			<!-- Skin 1 -->
			<div id="carousel-<?php echo esc_attr($_id); ?>" class="widget-content text-center owl-carousel-play" data-ride="owlcarousel">
					<div class="owl-carousel " data-slide="<?php echo esc_attr($columns); ?>" data-pagination="<?php echo esc_attr($pagination); ?>" data-navigation="true" data-desktop="[1199,2]" data-desktopsmall="[980,1]" data-tablet="[768,1]">
					<?php  $_count=0; while($query->have_posts()):$query->the_post(); ?>
						<!-- Wrapper for slides -->
						<div class="item">
							<?php  
								if($skin == 'slide light-style'){ $skin = 'slide';}
								if($skin == 'left light-style'){ $skin = 'left';}
								get_template_part( 'vc_templates/testimonials/testimonials', $skin ); 
							?>
						</div>
						<?php $_count++; ?>
					<?php endwhile; ?>
				</div>
				<?php if( ($columns < $_count) && $arrow=='true') { ?>
				<div class="carousel-controls carousel-controls-v3 carousel-hidden">
					<a class="left carousel-control carousel-md" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
							<span class="fa fa-arrow-left"></span>
					</a>
					<a class="right carousel-control carousel-md" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
							<span class="fa fa-arrow-right"></span>
					</a>
				</div>
				<?php } ?>
			</div>
	<?php } ?>
</div>
<?php wp_reset_postdata(); ?>