<?php

function eventiz_fnc_import_remote_demos() { 
   return array(
      'eventiz' => array( 'name' => 'eventiz',  'source'=> 'http://wpsampledemo.com/eventiz/eventiz.zip' ),
   );
}

add_filter( 'pbrthemer_import_remote_demos', 'eventiz_fnc_import_remote_demos' );



function eventiz_fnc_import_theme() {
   return 'eventiz';
}
add_filter( 'pbrthemer_import_theme', 'eventiz_fnc_import_theme' );

function eventiz_fnc_import_demos() {
   $folderes = glob( get_template_directory().'/inc/import/*', GLOB_ONLYDIR ); 

   $output = array(); 

   foreach( $folderes as $folder ){
      $output[basename( $folder )] = basename( $folder );
   }
   
   return $output;
}
add_filter( 'pbrthemer_import_demos', 'eventiz_fnc_import_demos' );

function eventiz_fnc_import_types() {
   return array(
         'all' => 'All',
         'content' => 'Content',
         'widgets' => 'Widgets',
         'page_options' => 'Theme + Page Options',
         'menus' => 'Menus',
         'rev_slider' => 'Revolution Slider',
         'vc_templates' => 'VC Templates'
      );
}
add_filter( 'pbrthemer_import_types', 'eventiz_fnc_import_types' );
