<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$_id = eventiz_fnc_makeid();

$args = array(
	'post_type' => 'opalsgevent_hotel',
	'posts_per_page' => $limit
);
$loop = new WP_Query($args);
?>

<section class="widget  <?php echo (($el_class!='')?' '.$el_class:''); ?>">
	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title">
           <span><?php echo trim($title); ?></span>
        </h3>
 	<?php } ?>

 	<div class="widget-content bg-none">
     	<?php if ( $loop->have_posts() ): ?>
     		<?php $i = 0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
     			<?php if($i%$columns == 1){ echo '<div class="row space-30">'; } ?>
            <div class="col-md-<?php echo (floor(12/$columns)) ?> col-sm-<?php echo (($columns%2==0)?(2*floor(12/$columns)):(floor(12/$columns))); ?>  col-xs-12">
       				<div class="pbr-accommodation clearfix">
                    <?php
     	     				$website = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'website', true );
     	     				$distance = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'distance', true );
     	     				$room_rate = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'room_rate', true );
     	     				$star = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'star', true );
     	     				$location = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'location', true );
          				?>
          				<?php if ( has_post_thumbnail() ) : ?>
                       <figure class="image">
                       	<?php if ( $website ) : ?>
                           	<a href="<?php echo esc_url( $website ); ?>" title="" class="entry-image">
                       	<?php endif; ?>
                               	<?php the_post_thumbnail( 'full' ); ?>
                       	<?php if ( $website ) : ?>
                              </a>
                          <?php endif; ?>
                       </figure>
                    <?php endif; ?>
                         
          				<h2 class="title"><?php the_title(); ?></h2>
                    <?php if($distance){ ?>
                       <div class="distance"><span class="label"><?php esc_html_e('Distance to venue:', 'eventiz') ?></span>&nbsp;&nbsp;<span><?php echo trim($distance); ?></span></div>
          				<?php } ?>
          				<?php if($room_rate){ ?>
                       <div class="rate"><span class="label"><?php esc_html_e('Room Rate:', 'eventiz') ?></span>&nbsp;&nbsp;<span><?php echo esc_html($room_rate) ?></span></div>
                    <?php } ?>  
          			
          				<div class="action">
                    <?php if ( $website ) : ?>
                  		<?php printf( '<a href="%s">%s</a>', $website, esc_html__('Visit Website', 'eventiz') ); ?>
                    <?php endif; ?>

                    <?php if ( isset($location['latitude']) && isset($location['longitude']) ) : ?>
                  		<?php printf( '<a href="#viewmap" class="viewmap" data-latitude="%s" data-longitude="%s">%s</a>', $location['latitude'], $location['longitude'], esc_html__('View Map', 'eventiz') ); ?>
                    <?php endif; ?>
                  </div>  
       			    </div>
              </div>   
            <?php if($i%$columns == 0 || $i==$loop->found_posts){ echo '</div>'; } ?>
     		<?php endwhile; ?>
     	<?php endif; ?>
     	<?php wp_reset_postdata(); ?>
	</div>
   <div class="modal-google-map modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body google-map-popup" style="width:100%;height:300px;"></div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal"><?php esc_html_e('Close', 'eventiz');?></button>
               </div>
         </div>
      </div>
   </div>
</section>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".viewmap").click(function(){
			var latitude = $(this).data('latitude');
			var longitude = $(this).data('longitude');
			$('.modal-google-map .google-map-popup').gmap3({
	          	map:{
		            options:{
	      				"center":[latitude, longitude],
		            	"zoom": 15
		            }
	          	},
	          	marker:{
		            values:[
		              	{latLng:[latitude, longitude]}
		            ]
	          	}
		    });

		    $('.modal-google-map').modal();
		    
		    return false;
		});
	});
</script>