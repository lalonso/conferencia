<?php global $session; 
	$session = opalsingleevent_session( get_the_ID() );
	$type = $session->getType();
	$desc = eventiz_fnc_excerpt(50, '...');
	$title = get_the_title();
	$link = get_the_permalink();
	$room = get_post_meta(get_the_ID(), 'opalsingleevent_session_room', true );
?>
<?php if ($type == 'break'): ?>
	<article id="post-<?php the_ID(); ?>" itemscope <?php post_class(); ?>>
		<div class="entry-content">
			<span><?php echo date('j F, Y', $session->getDate());?></span>
			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		</div>
	</article>
<?php else: ?>
	<article id="post-<?php the_ID(); ?>" itemscope  <?php post_class(); ?>>
		
		<div class="entry-content clearfix">
			<div class="left">
				<div class="time"><i class="fa fa-clock-o"></i><span><?php echo esc_html($session->getTimeFrom() );?> - <?php echo esc_html($session->getTimeTo() );?></span></div>
				<?php if($room){ ?>
					<div class="stitle space-5"><i class="fa fa-map-marker"></i><?php echo esc_html( $room ); ?></div>
				<?php } ?>
				<!-- speakers -->
				<?php
					$speaker_ids = $session->getSpeakers();
					if ($speaker_ids):
						$loop = Opalsingleevent_Query::get_speakers( $speaker_ids[0] );
						if ( $loop->have_posts() ):
							?>
						<div class="stitle"><i class="fa fa-microphone"></i><?php esc_html_e('speakers', 'eventiz') ?></div>
							<ul class="speakers clearfix">
								<?php $i=0; while ( $loop->have_posts() ): $loop->the_post(); $i++; if($i > 2) {break;} ?>
									<li>
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="property-box-image">
										        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="speaker-box-image-inner">
									                <?php the_post_thumbnail( 'thumbnail' ); ?>
										        </a>
											</div>
									    <?php endif; ?>
									    <div class="gdlr-speaker-thumbnail-title hidden"><?php the_title(); ?></div>
									</li>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							</ul>
						<?php
						endif;
					endif;
				?>
			</div>
			<div class="right">	
				<h3 class="entry-title"><a href="<?php echo esc_url_raw($link ) ?>"><?php echo esc_html($title) ?></a></h3>
				<?php
					print wp_kses( $desc, true );
				?>
			</div>
		</div>
		<meta itemprop="url" content="<?php the_permalink(); ?>" />
	</article>
<?php endif; ?>
