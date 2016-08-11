<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="pbr-contact-information clearfix <?php echo esc_attr($el_class); ?>">
   <div class="widget-inner">
      <?php if($title){ ?>
         <h2 class="widget-title"><?php echo trim($title); ?></h2>
      <?php } ?>   
      <?php if($content){ ?>
         <div class="content"><?php echo wp_kses($content, true) ?></div>
      <?php } ?>   
      <?php if($address){ ?>
         <div class="address item clearfix"><i class="icon fa fa-home"></i><?php echo esc_html($address) ?></span></div>
      <?php } ?>  
      <?php if($phone){ ?>
         <div class="phone item clearfix"><i class="icon fa fa-phone"></i><?php echo esc_html($phone) ?></span></div>
      <?php } ?> 
      <?php if($email){ ?>
         <div class="email item clearfix"><i class="icon fa fa-envelope-o"></i><?php echo esc_html($email) ?></span></div>
      <?php } ?> 
   </div>    
</div>