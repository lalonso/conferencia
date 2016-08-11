<?php
$display_icon = 'enable';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// $args = array(
// 	'post_type'         => 'opalsgevent_session',
// 	'posts_per_page'    => '-1',
// 	'meta_key' 			=> OPALSINGLEEVENT_SESSION_PREFIX . 'date',
// 	'orderby' 			=> 'meta_value',
// 	'order' 			=> 'asc',
// );



$args = array(
	'post_type'         => 'opalsgevent_session',
	'posts_per_page'    => '-1',
	
	'meta_query' => array(
        array(
            'key' => OPALSINGLEEVENT_SESSION_PREFIX . 'date',
            'value' => '',
            'compare' => 'LIKE'
        ),
        array(
            'key' => OPALSINGLEEVENT_SESSION_PREFIX . 'time_from',
            'value' => '',
            'compare' => 'LIKE'
        )
    )
);

$args['orderby'] = array(
		OPALSINGLEEVENT_SESSION_PREFIX . 'date' => 'DESC',
		OPALSINGLEEVENT_SESSION_PREFIX . 'time_from'   => 'DESC',
	);

		
add_filter('posts_orderby', 'eventiz_orderbyreplace');
$loop = new WP_Query( $args );
remove_filter('posts_orderby','eventiz_orderbyreplace');

$current_session_day = 0;
$current_session_date = '';

?>

<div class="pbr-event-schedule icon-<?php echo esc_attr($display_icon); ?> layout-<?php echo esc_attr($layout_type); ?>">
<?php if ($layout_type == 'tabs'): ?>

	<ul class="nav nav-tabs">
		<?php while($loop->have_posts()): $loop->the_post();
				$session = opalsingleevent_session( get_the_ID() );
				$session_date_o = $session->getDate();
				$session_date = date_i18n(get_option( 'date_format' ), $session_date_o);

				if( $current_session_date != $session_date ):
					$current_session_day++;
					$current_session_date = $session_date;
					?>

					<li<?php echo ($current_session_day == 1 ? ' class="active"' : ''); ?>>
						<a href="#sessiontabid_<?php echo esc_attr($current_session_day); ?>" data-toggle="tab">
							<span><?php echo sprintf(esc_html__('Day %d', 'eventiz'), $current_session_day); ?></span>
							<span><?php echo $current_session_date; ?></span>
						</a>
					</li>

					<?php
				endif;
			endwhile;

			wp_reset_postdata();
		?>
	</ul>

	<div class="tab-content">
		<?php
		$current_session_day = 0;
		$current_session_date = '';
		?>
		<?php while($loop->have_posts()): $loop->the_post();
				$session = opalsingleevent_session( get_the_ID() );
				$session_date_o = $session->getDate();
				$session_date = date_i18n(get_option( 'date_format' ), $session_date_o);

				if( $current_session_date != $session_date ){
					$current_session_day++;
					$current_session_date = $session_date;

					echo ($current_session_day == 1) ? '' : '</div>';

					echo '<div id="sessiontabid_'.$current_session_day.'" class="tab-pane fade ' . (($current_session_day == 1)? 'in active': '') . '">';
				}

				echo '<div class="session-item-content-wrapper"><div class="icon"><img alt="" src="'.( get_template_directory_uri() . '/images/icon-session.png').'"/></div>';
				
				echo Opalsingleevent_Template_Loader::get_template_part( 'content-session' );

				echo '</div>';
			endwhile;
			echo '</div>';
			wp_reset_postdata();
		?>
	</div>
<?php else: ?>
	<?php
	$current_session_day = 0;
	$current_session_date = '';
	?>
	<?php while($loop->have_posts()): $loop->the_post();
		$session = opalsingleevent_session( get_the_ID() );

		$session_date_o = $session->getDate();
		$session_date = date_i18n(get_option( 'date_format' ), $session_date_o);
		if( $current_session_date != $session_date ){
			$current_session_day++;
			$current_session_date = $session_date;
			
			echo ($current_session_day == 1) ? '' : '</div></div>';
			?>
			<div class="row">
				<div class="col-sm-2">
					<div class="datetime">
						<span class="sort"><?php echo sprintf(esc_html__('Day %d', 'eventiz'), $current_session_day); ?></span>
						<span class="day"><?php echo date_i18n( 'd', $session_date_o); ?></span>
						<span class="year"><?php echo date_i18n( 'F Y', $session_date_o); ?></span>
					</div>	
				</div>
				<div class="col-sm-10">
			<?php
			}

			echo '<div class="session-item-content-wrapper">';
				echo Opalsingleevent_Template_Loader::get_template_part( 'content-session' );
			echo '</div>';

		endwhile;

		wp_reset_postdata();
	?>
	<?php endif; ?>
</div>


