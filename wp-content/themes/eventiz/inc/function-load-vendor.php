<?php 

/**
 * Check and load to support visual composer
 */
if(  in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && class_exists('WPBakeryVisualComposerAbstract') ){
	eventiz_pbr_includes(  get_template_directory() . '/inc/vendors/visualcomposer/*.php' );
}

/**
 * Check to support woocommerce
 */
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
	add_theme_support( "woocommerce" );
	eventiz_pbr_includes(  get_template_directory() . '/inc/vendors/woocommerce/*.php' );
}

if( in_array( 'opalsingleevent/opalsingleevent.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
   eventiz_pbr_includes(  get_template_directory() . '/inc/vendors/opalsingleevent/*.php' );
}