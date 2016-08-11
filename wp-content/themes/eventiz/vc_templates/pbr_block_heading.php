<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<div class="heading clearfix  <?php echo esc_attr($color_style); ?> heading-<?php echo esc_attr($heading_style); ?> <?php echo esc_attr($el_class); ?>">
   <div class="heading-inner"> 
      <h2><?php echo trim($title); ?></h2>
      <?php if( $subheading ){ ?>
         <small class="subheading"> <?php echo trim($subheading); ?></small>
      <?php } ?>
      <?php if( trim($content) ){ ?>
      <div class="des"> <?php echo trim($content); ?></div>
      <?php } ?>
   </div>    
</div>