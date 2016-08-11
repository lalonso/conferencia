<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WpOpal
 * @subpackage Eventiz
 * @since Eventiz 1.0
 */
$eventiz_page_layouts = apply_filters( 'eventiz_fnc_sidebars_others_configs', null );
 
if( isset($eventiz_page_layouts['sidebars']) ): $sidebars = $eventiz_page_layouts['sidebars']; 
?> 
	<?php if ( $sidebars['left']['active'] ) : ?>
	<div class="<?php echo esc_attr($sidebars['left']['class']) ;?> pull-left">
	  <aside class="wpo-sidebar sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	   	<?php dynamic_sidebar( $sidebars['left']['sidebar'] ); ?>
	  </aside>
	</div>
	<?php endif; ?>
 	
 	<?php if ( $sidebars['right']['active'] ) : ?>
	<div class="<?php echo esc_attr($sidebars['right']['class']) ;?> pull-right">
	  <aside class="wpo-sidebar sidebar sidebar-right" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	   	<?php dynamic_sidebar( $sidebars['right']['sidebar'] ); ?>
	  </aside>
	</div>
	<?php endif; ?>
<?php endif; ?> 

