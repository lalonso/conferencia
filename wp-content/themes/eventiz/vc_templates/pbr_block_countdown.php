<?php
$link_title = 'join us';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$timestamp = strtotime($date_comingsoon);
if( $timestamp < time())
    return;
?>

<div class="widget pbr-block-countdown <?php echo esc_attr($el_class); ?>">
  <div class="content-inner">
  	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title">
           <span><?php echo trim($title); ?></span>
        </h3>
     <?php } ?>
     <div class="coming-soon-time">
        <div class="pts-countdown clearfix" data-countdown="countdown" data-date="<?php echo date('m',$timestamp).'-'.date('d',$timestamp).'-'.date('Y',$timestamp).'-'. date('H',$timestamp) . '-' . date('i',$timestamp) . '-' .  date('s',$timestamp) ; ?>"></div>
     </div>
     <?php if($link_url): ?>
  	   <div class="link">
  	   	<a href="<?php echo esc_url($link_url ); ?>"><?php echo esc_html($link_title); ?></a>
  	   </div>
  	<?php endif; ?>
  </div>  
</div>