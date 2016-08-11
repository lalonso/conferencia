<?php
$icon_font = $style_class = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$image_url = '';
$icon_url = '';
if($photo){
   $image_url = wp_get_attachment_image_src($photo, 'full');
}
if($icon){
   $icon_url = wp_get_attachment_image_src($icon, 'full');
}
 $style = array();
if(isset($image_url[0]) && $image_url[0]){
   $style[] = 'background: url(\''.$image_url[0].'\') no-repeat center center;background-size:  cover;';
}    
?>
<div class="pbr-box-hover clearfix <?php echo esc_attr($style_class); ?> <?php echo esc_attr($el_class); ?>">
   <div class="box-inner" <?php if(count($style)>0) print 'style="'.implode($style, ' ').'"' ?>>
      <div class="front">
         <?php if( isset($icon_url[0]) && $icon_url[0] ){ ?>
            <div class="icon">
               <img src="<?php print $icon_url[0]; ?>" />
            </div>   
         <?php } ?>
         <?php if($icon_font){ ?>
            <div class="icon">
               <i class="<?php echo esc_attr($icon_font) ?>"></i>
            </div>
         <?php } ?>
         <?php if($title){ ?>
            <h2><?php echo trim($title); ?></h2>
         <?php } ?>   
      </div>  
      <div class="back">
         <?php if($content){ ?>
            <div class="content"><?php print $content ?></div>
         <?php } ?>
      </div>

   </div>   
</div>