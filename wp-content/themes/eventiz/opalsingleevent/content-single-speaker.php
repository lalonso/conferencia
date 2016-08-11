<?php global $speaker, $post; 
	$speaker = opalsingleevent_speaker( get_the_ID() );
	$job = $speaker->getJob();
	$skills = $speaker->getSkills();
	$socials = $speaker->getSocials();
	//echo "<pre>".print_r($socials, 1); die;
?> 
<article id="post-<?php the_ID(); ?>" itemscope <?php post_class(); ?>>
	
	<div class="summary entry-summary">
		<div class="row">
			<div class="col-sm-6">
				<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail( 'full' ); ?>
				<?php endif; ?>
			</div>
			<div class="col-sm-6">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php if ( !empty($job) ): ?>
			    	<p class="job"><?php echo trim($job); ?></p>
				<?php endif; ?>

				<?php
					the_content( sprintf(
						esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'eventiz' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );
				?>

				<?php if ( !empty($skills) ): ?>
					<div class="skills">
						<?php foreach ($skills as $skill): $value = $skill['opalsingleevent_speaker_skill_volume']; ?>
							<div class="vc_progress_bar">
	 							<div class="vc_single_bar custom">
	 								<small class="vc_label"> <span class="vc_label_units"><?php echo trim($value); ?>%</span><?php  echo trim($skill['opalsingleevent_speaker_skill_label']); ?></small>
	 								<span data-value="90" data-percentage-value="<?php echo trim($value); ?>" class="vc_bar" style="width: <?php echo trim($value); ?>%;"></span>
	 							</div>	
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( !empty($socials) ): ?>
					<div class="social-links hidden">
						<?php foreach( $socials as $name => $url): ?>
							<a href="<?php echo esc_url($name); ?>" title="<?php echo esc_attr($name); ?>">
								<i class="fa fa-<?php esc_attr($name); ?>"></i>
								<?php echo trim($name); ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
			
	</div><!-- .summary -->

	<?php
		/**
		 * opalsingleevent_after_single_property_summary hook
		 *
		 * @hooked opalsingleevent_output_product_data_tabs - 10
		 * @hooked opalsingleevent_upsell_display - 15
		 * @hooked opalsingleevent_output_related_products - 20
		 */
		do_action( 'opalsingleevent_after_single_agent_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</article><!-- #post-## -->