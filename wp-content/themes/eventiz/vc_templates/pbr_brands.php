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
$args = array(
	'post_type' => 'brands',
	'posts_per_page'=>-1
);
$loop = new WP_Query($args);

if ( $loop->have_posts() ) :
	$_count = 1;
?>
<div class="widget-info">
	<?php if ( !empty($title) ){ ?>
	<h3 class="widget-title visual-title">
      <span><span><?php echo trim( $title ); ?></span></span>
	</h3>
	<?php } ?>
	<?php if( !empty( $descript)): ?>
		<div class="wpo-description">
			<?php echo trim($descript); ?>
		</div>
	<?php endif; ?>
</div>
	<section class="widget-brand-logo <?php echo ((esc_attr($el_class)!='')?' '.esc_attr($el_class):''); ?>">

		<div class="widget-brand-content">
			<div class="widget-brands-inner owl-carousel-play" id="productcarouse-<?php echo esc_attr($_id); ?>" data-ride="carousel">
				<?php   if( $loop->post_count > $columns_count ) { ?>
				<div class="carousel-controls carousel-controls-v3 carousel-hidden">
					<a href="#productcarouse-<?php echo esc_attr($_id); ?>" data-slide="prev" class="left carousel-control carousel-md">
						<i class="fa fa-arrow-left"></i>
					</a>
					<a href="#productcarouse-<?php echo esc_attr($_id); ?>" data-slide="next" class="right carousel-control carousel-md">
						<i class="fa fa-arrow-right"></i>
					</a>
				</div>
				<?php } ?>
				<div class="owl-carousel" data-slide="<?php echo esc_attr($columns_count); ?>"  data-singleItem="true" data-navigation="true" data-pagination="false">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php   echo '<div class="item">'; ?>
						<?php
							$link = (get_post_meta(get_the_ID(),'brands_brank_link',true))? get_post_meta(get_the_ID(),'brands_brank_link',true): '#';
						?>
						<!-- Product Item -->
						<div class="item-brand text-center">
							<a href="<?php echo esc_url($link); ?>" target="_blank" title="<?php the_title(); ?>">
								<?php the_post_thumbnail( 'brand-logo' ); ?>
							</a>
						</div>
						<!-- End Product Item -->

					<?php  echo '</div>'; ?>
					<?php $_count++; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>

	</section>
<?php endif; ?>
