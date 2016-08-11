<?php

function eventiz_orderbyreplace($orderby) {
	global $wpdb;
    return " {$wpdb->postmeta}.meta_value ASC, mt1.meta_value ASC";
}
function eventiz_opalsingleevent_fnc_add_params(){
  if ( function_exists('vc_add_param') ) {
   vc_add_param( 'pbr_singleevent_schedule', array(
       "type" => "dropdown",
       "heading" => esc_html__("Display Icon", 'eventiz'),
       "param_name" => "display_icon",
       "value" => array(
           esc_html__('Enable', 'eventiz') => 'enable',
           esc_html__('Disable', 'eventiz') => 'disable'
       )
   ));
 }
}   

add_action( 'after_setup_theme', 'eventiz_opalsingleevent_fnc_add_params', 99 );
