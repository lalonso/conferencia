<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WpOpal Team <opalwordpress@gmail.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/questions/
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
	'post_type' => 'brands',
	'posts_per_page'=>$number
);
$loop = new WP_Query($args);

if ( $loop->have_posts() ) :
	$_count = 1;
?>
<div class="widget-brand-grid">
	<div class="widget-info">
		<?php if ( !empty($title) ){ ?>
		<h3 class="widget-title visual-title">
	      <span><span><?php echo trim( $title ); ?></span></span>
		</h3>
		<?php } ?>
		<?php if( !empty( $descript)): ?>
			<div class="pbr-description">
				<?php echo trim($descript); ?>
			</div>
		<?php endif; ?>
	</div>
	<section class="widget-brand-logo <?php echo (($el_class)!='')?' '.esc_attr($el_class):''; ?>">
		<div class="widget-brand-content">
			<?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
				<?php if($i%$columns_count == 1) echo '<div class="row">'; ?>
					<?php
						$link = (get_post_meta(get_the_ID(),'brands_brank_link',true))? get_post_meta(get_the_ID(),'brands_brank_link',true): '#';
					?>
					
					<div class="item-brand text-center col-lg-<?php echo floor(12/$columns_count) ?> col-md-<?php echo floor(12/$columns_count)?> col-sm-12 col-xs-12">
						<a href="<?php echo esc_url($link); ?>" target="_blank">
							<?php the_post_thumbnail( 'brand-logo' ); ?>
						</a>
					</div>

				<?php if($i%$columns_count == 0 || $i==$loop->post_count) echo '</div>'; ?>

				<?php $_count++; ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
</div>
<?php endif; ?>
