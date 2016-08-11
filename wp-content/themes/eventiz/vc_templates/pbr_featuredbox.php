<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

    $img = wp_get_attachment_image_src($photo,'full');
    $color = $color?'style="color:'. $color .';"' : "";
    $title_color = $title_color?'style="color:'. $title_color .';"' : "";
    $class = array();
    if($text_style) {
        $class[] = $text_style;
    }
    $class[] = 'icon-'.$position;
    $class[] = $el_class;
?>

<div class="pbr-feature-box <?php print implode($class, ' ') ?>">
    <?php if(isset($img[0]) && $img[0]){?>
    <div class="fbox-image">
        <img src="<?php echo esc_url_raw($img[0]);?>" alt="<?php echo esc_attr($title); ?>" />
    </div>
    <?php } ?>
    <?php if($icon){ ?>
    <div class="fbox-icon">
        <i class="icons <?php echo esc_attr($icon); ?>" <?php echo trim( $color); ?>></i>
    </div>
    <?php } ?>
      <div class="fbox-content">  
         <div class="fbox-body">                            
            <h4 <?php echo trim( $title_color); ?>><?php echo trim($title); ?></h4> 
            <?php if( $subtitle ) { ?>
            <small><?php echo esc_html($subtitle); ?></small>  
            <?php } ?>                       
         </div>
         <?php if(trim($information)!=''){ ?>
           <div class="description"><?php echo trim( $information );?></div>  
         <?php } ?>
      </div>      
</div>

