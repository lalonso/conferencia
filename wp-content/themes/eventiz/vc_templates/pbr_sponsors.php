<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$image_url = null;
if($image){
   $image_url = wp_get_attachment_image_src($image, 'full');
}
?>
<div class="pbr-sponsors clearfix <?php echo esc_attr($el_class); ?>">
   <div class="widget-inner"> 
      
      <?php if(isset($image_url[0]) && $image_url[0]){ ?>
         <div class="image text-center">
            <img src="<?php echo esc_url_raw($image_url[0]) ?>" />
         </div>
      <?php } ?>   

      <h2 class="title text-center"><?php echo trim($title); ?></h2>

      <?php if($content){ ?>
         <div class="content text-center"><?php echo esc_html($content); ?></div>
      <?php } ?>   

      <?php if($link){ ?>
         <div class="link text-center"><a href="<?php echo esc_url($link) ?>"><?php esc_html_e( 'visit website', 'eventiz' ); ?></a></div>
      <?php } ?>

   </div>    
</div>