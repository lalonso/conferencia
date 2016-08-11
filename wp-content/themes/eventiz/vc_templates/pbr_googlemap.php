<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$_id = eventiz_fnc_makeid();

$args = array(
	'post_type' => 'opalsgevent_hotel',
	'posts_per_page' => -1,
  'posts_per_page' => 6
);
$loop = new WP_Query($args);
 $image_url = '';
if($main_photo){
   $image_url = wp_get_attachment_image_src($main_photo, 'full');
}
?>
<div class="pbr-googlemap">
  <div id="map_canvas_<?php echo esc_attr( $_id ); ?>" class="map_canvas" style="width:100%;height:<?php echo esc_attr( $height ); ?>px;"></div>
  
    <div class="description">
        <div class="row">
          <?php if ( isset($content) && !empty($content) ): ?>
            <div class="col-md-4 hidden-xs hidden-sm">
              <div class="description-content maker-item" data-id="maker_main_0">
                <div class="icon text-center space-10"><img src="<?php echo(get_template_directory_uri() . '/images/icon-adress-white.png') ?>" alt="" /></div>
                <?php echo trim($content); ?>
              </div>  
            </div>
          <?php endif; ?>

          <div class="col-md-8 hidden-xs hidden-sm makers">
            
            <div class="heading clearfix separator_align_left heading-v2 ">
              <div class="heading-inner">
                <h2><?php esc_html_e('Nearby Accomodation', 'eventiz') ?></h2>
              </div>
            </div> 

              <?php $i=0; if ($loop->have_posts()):  ?>
                  <?php while ( $loop->have_posts() ): $loop->the_post();$i++; ?>
                    <?php $location = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'location', true );
                          $distance = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'distance', true );
                          $room_rate = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'room_rate', true );
                          $website = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'website', true );
                    ?>
                    <div class="hidden maker-item" data-id="maker_main_0">
                        <div class="marker-content">
                          <div class="marker">
                            <?php if ( isset($image_url[0]) && $image_url[0] ) : ?>
                              <div class="image">
                                <img src="<?php echo esc_url_raw( $image_url[0] ); ?>" alt=""/>
                              </div>
                            <?php endif; ?>
                            <div class="info">
                              <?php if($main_title){ ?>
                                <h3><?php echo esc_html($main_title);?></h3>
                              <?php } ?>  

                              <?php echo esc_html( $main_content ); ?>
                              </div>
                          </div>
                        </div>
                    </div>
                    <?php if($i%3==1){ echo '<div class="row">'; } ?>
                      <div class="col-md-4 maker-item" data-id="maker_<?php echo get_the_ID(); ?>">
                        <div class="maker-item-inner">
                          <div class="left">
                           <i class="icon fa fa-map-marker"></i>
                          </div>
                          <div class="right">
                            <h3 class="maker-item" data-id="maker_<?php echo get_the_ID(); ?>"><?php the_title(); ?></h3>
                            <?php if($distance){ ?>
                                 <div class="distance"><span class="label"><?php esc_html_e('Distance to venue:', 'eventiz') ?></span>&nbsp;&nbsp;<span><?php echo trim($distance); ?></span></div>
                            <?php } ?>
                            <?php if($room_rate){ ?>
                                 <div class="rate"><span class="label"><?php esc_html_e('Room Rate:', 'eventiz') ?></span>&nbsp;&nbsp;<span><?php echo esc_html($room_rate) ?></span></div>
                            <?php } ?>

                            <!-- marker content -->
                            <div class="marker-content hidden">
                              <div class="marker">
                                <?php if ( has_post_thumbnail() ) : ?>
                                  <div class="image">
                                    <?php the_post_thumbnail( "full" ); ?>
                                  </div>
                                <?php endif; ?>
                                <div class="info">
                                  <h3><?php the_title(); ?></h3>
                                  <?php the_excerpt(); ?>
                                  <?php if ( $website ) : ?>
                                      <a href="<?php echo esc_url( $website ); ?>" title="" class="link-visit"><?php esc_html_e("Visit Website", 'eventiz'); ?></a>
                                  <?php endif; ?>
                                  </div>
                              </div>
                            </div>

                            </div>
                          </div>
                      </div>
                      <?php if($i%3==0 || $i==$loop->found_posts){ echo '</div>'; } ?>
                  <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
              <?php endif; ?>

          </div>
        </div>  
    </div>

  
  <?php $style_map = '[{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}]'; ?>
  <script type="text/javascript">
  jQuery(document).ready(function($){
  	$('#map_canvas_<?php echo esc_js( $_id ); ?>').gmap3({
            map:{
              options:{
              	"draggable": true
        				,"mapTypeControl": true
        				,"mapTypeId": google.maps.MapTypeId.ROADMAP
        				,"scrollwheel": false //Alow scroll zoom in, zoom out
        				,"panControl": true
        				,"rotateControl": false
        				,"scaleControl": true
        				,"streetViewControl": true
        				,"zoomControl": true
        				,"center":[<?php echo esc_js( $lat_lng ); ?>]
              	,"zoom": <?php echo trim($zoom); ?>
                ,'styles': <?php echo ( $style_map ); ?>
              }
            },
            marker:{
              values:[
                	{
                    latLng:[<?php echo esc_js( $lat_lng ); ?>],
                     data: '<?php echo trim($title); ?>',
                     id: 'maker_main_0', 
                    options:{icon: "<?php echo (get_template_directory_uri() . '/images/'); ?>marker-main.png"}
                  }
                	
                  <?php if ($loop->have_posts()): ?>
  	              	<?php while ( $loop->have_posts() ): $loop->the_post(); ?>
  	              		<?php
                        $location = get_post_meta( get_the_ID(), OPALSINGLEEVENT_HOTEL_PREFIX.'location', true );
                      ?>
  		              	<?php if (isset($location['latitude']) || isset($location['longitude'])): ?>
  		              		,{
  		              			latLng:[<?php echo esc_js( $location['latitude'] ); ?>, <?php echo esc_js( $location['longitude'] ); ?>],
  		              			data: '',
                          id: 'maker_<?php echo get_the_ID(); ?>',
                          options:{icon: "<?php echo (get_template_directory_uri() . '/images/marker-black.png'); ?>"}
  		              		}
  		              	<?php endif; ?>
                		<?php endwhile; ?>
                		<?php wp_reset_postdata(); ?>
            		<?php endif; ?>
              ],
              options:{
                draggable: false
              },
              events:{
                click: function(marker, event, context){
                  var id = context.id;
                  var content = $('div[data-id='+id+'] .marker-content').html();
                    var map = $(this).gmap3("get"),
                      infowindow = $(this).gmap3({get:{name:"infowindow"}});
                    if (infowindow){
                      infowindow.open(map, marker);
                      infowindow.setContent(content);
                    } else {
                      $(this).gmap3({
                        infowindow:{
                          anchor:marker, 
                          options:{content: content}
                        }
                      });
                    }
                }
              }
            }
      });
      
      $(".maker-item").click(function(){
        $('.maker-item .maker-item-inner').removeClass('active');
        $(this).find('.maker-item-inner').first().addClass('active');
        var map = $('#map_canvas_<?php echo esc_js( $_id ); ?>').gmap3("get");
        var id = $(this).data('id');
        var marker = $('#map_canvas_<?php echo esc_js( $_id ); ?>').gmap3({ get: { id: id } });
        google.maps.event.trigger(marker, 'click');
        map.setCenter(marker.getPosition());
        //map.setZoom(15);
      });

  });
  </script>
</div>  