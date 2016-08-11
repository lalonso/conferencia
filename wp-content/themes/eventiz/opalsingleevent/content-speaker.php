<?php
	global $speaker;
	$job = $speaker->getJob();
	$socials = $speaker->getSocials();
?>
<article id="post-<?php the_ID(); ?>" itemscope  <?php post_class(); ?>>
	
	<?php do_action( 'opalsingleevent_before_property_loop_item' ); ?>	
	
	<div class="entry-content">

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="property-box-image">
		        <a href="<?php the_permalink(); ?>" class="speaker-box-image-inner ">
	                <?php the_post_thumbnail( 'thumbnail' ); ?>
		        </a>
			</div>
	    <?php endif; ?>

	    <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	    <?php if ( !empty($job) ): ?>
	    	<p><?php echo trim($job); ?></p>
		<?php endif; ?>

		<?php if ( !empty($socials) ): ?>
			<div class="social-links">
				<?php foreach( $socials as $name => $url): ?>
					<a href="<?php echo esc_url($name); ?>" title="<?php echo esc_attr($name); ?>">
						<i class="fa fa-<?php esc_attr($name); ?>"></i>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
 
	<?php do_action( 'opalsingleevent_after_property_loop_item' ); ?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</article><!-- #post-## -->
