

<?php
	global $session, $post; 
	$session = opalsingleevent_session( get_the_ID() );
?> 
<article id="post-<?php the_ID(); ?>" itemscope <?php post_class(); ?>>
	
	<div class="summary entry-summary">
		<div class="row">
			<div class="col-sm-9">
				<div class="content-single">
					<div class="thumbnail">
						<?php if ( has_post_thumbnail() ): ?>
							<?php the_post_thumbnail( 'full' ); ?>
						<?php endif; ?>
					</div>
					<div class="content-inner">

						<span class="session-time"><?php echo $session->getTimeFrom();?> <?php esc_html_e(' - ', 'eventiz');?> <?php echo $session->getTimeTo(); ?></span>
						
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						<?php
							the_content( sprintf(
								esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'eventiz' ),
								the_title( '<span class="screen-reader-text">', '</span>', false )
							) );

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'eventiz' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
						?>
					</div>
				</div>
			</div>		

			<div class="col-sm-3">
				<div class="wpo-sidebar">
					<div class="widget info-session">
						<h3 class="widget-title"><?php esc_html_e('Quick Info', 'eventiz'); ?></h3>
						<ul>
							<li>
								<i class="fa fa-calendar"></i>
								<span><?php echo date_i18n( get_option( 'date_format' ), $session->getDate() );?></span>
							</li>
							<li>
								<i class="fa fa-clock-o"></i>
								<span><?php echo $session->getTimeFrom();?> <?php esc_html_e(' - ', 'eventiz');?> <?php echo $session->getTimeTo(); ?></span>
							</li>
							<li>
								<i class="fa fa-map-marker"></i>
								<span><?php echo $session->getRoom();?></span>
							</li>
						</ul>
					</div>

					<div class="widget list-speakers">
						<h3 class="widget-title"><?php esc_html_e('Speakers', 'eventiz'); ?></h3>
						<?php
							$speaker_ids = $session->getSpeakers();
							if ($speaker_ids):
								$loop = Opalsingleevent_Query::get_speakers( $speaker_ids[0] );
								if ( $loop->have_posts() ):
									?>
									<div>
										<?php while ( $loop->have_posts() ): $loop->the_post(); ?>
											<?php echo Opalsingleevent_Template_Loader::get_template_part( 'content-speaker-list' ); ?>
										<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
									</div>
								<?php
								endif;
							endif;
						?>
					</div>
				</div>	

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
