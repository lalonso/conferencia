<?php
$style = 'light-style';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if($link_title=="") $link_title = 'join us';
?>

<div class="pbr-cta clearfix <?php echo esc_attr($el_class); ?> <?php echo esc_attr($style) ?>">
   <div class="heading-inner"> 
      <?php if($top_title){ ?>
         <div class="topheading"><?php echo esc_html($top_title); ?></div>
      <?php } ?>
      <h2><?php echo trim($title); ?></h2>
      <?php if( $sub_title ){ ?>
         <div class="subheading"> <?php echo trim($sub_title); ?></div>
      <?php } ?>
      <?php if( trim($link_url) ){ ?>
         <div class="link"> <a href="<?php echo esc_url_raw($link_url); ?>" class="btn-theme"><?php echo esc_html($link_title); ?></a></div>
      <?php } ?>
   </div>    
</div>