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
	'post_type' => 'opalsgevent_speaker',
	'posts_per_page' => $number,
	'post_status' => 'publish',
);
$query = new WP_Query($args);
?>
<div class="pbr-speaker <?php echo esc_attr($el_class); ?> <?php echo esc_attr($style) ?>">
	<?php if($query->have_posts()){ ?>
		<?php if($title!=''){ ?>
			<h3 class="widget-title">
				<span><?php echo trim($title); ?></span>
			</h3>
		<?php } ?>
 
		<div class="widget-content text-center">
				<div>
				<?php $_count=0; while($query->have_posts()):$query->the_post();  $_count++;
					$job = get_post_meta(get_the_ID(), 'opalsingleevent_speaker_job', true);
					$email = get_post_meta(get_the_ID(), 'opalsingleevent_speaker_email', true);
					$class_speaker = new OpalSingleEvent_Speaker(get_the_ID());
					$socials = $class_speaker->getSocials();
					$type = $class_speaker->getType();
				?>
				<?php if($_count%$columns == 1){ echo '<div class="row space-30">';} ?>
					<div class="col-sm-<?php echo floor(12/$columns); ?> col-xs-12">
						<div class="item">
							<div class="image">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
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
								<span class="type"><?php echo esc_html($type); ?></span>
								<span class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
								<span class="job"><?php echo esc_html($job); ?> </span>
							</div>
						</div>
					</div>
				<?php if($_count%$columns == 0 || $_count==$query->found_posts){ echo '</div>';} ?>	
				<?php endwhile; ?>
			</div>
		</div>
	<?php } ?>
</div>
<?php wp_reset_postdata(); ?>