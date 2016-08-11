<?php
	global $speaker; 
	$speaker = opalsingleevent_speaker( get_the_ID() );
	$job = $speaker->getJob();
?>
<article id="post-<?php the_ID(); ?>" itemscope <?php post_class('clearfix'); ?>>
	
	<div class="entry-content">
		<div class="left">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="property-box-image">
			        <a href="<?php the_permalink(); ?>" class="speaker-box-image-inner ">
		                <?php the_post_thumbnail( 'full' ); ?>
			        </a>
				</div>
		    <?php endif; ?>
	    </div>
	    <div class="right">
		    <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>

		    <?php if ( !empty($job) ): ?>
		    	<p><?php echo trim($job); ?></p>
			<?php endif; ?>
		</div>
	</div>
 
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</article>
