<?php
function eventiz_fnc_pbrthemer_is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
 
    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}


/**
 *
 */

function eventiz_fnc_setup_admin_setting(){


	global $pagenow; 
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
		/**
		 *
		 */
		$pts = array( 'brands', 'testimonials', 'portfolio', 'faq', 'footer', 'megamenu');

		$options = array();	

		foreach( $pts as $key ){
			$options['enable_'.$key] = 'on'; 
		}
	
		update_option( 'pbr_themer_posttype', $options );
	}

	if( eventiz_fnc_pbrthemer_is_edit_page() ){ 	

		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
		wp_enqueue_script( 'eventiz-admin-scripts', get_template_directory_uri() . '/js/custom-admin.js', array( 'jquery'  ), '20131022', true );
	}

	wp_enqueue_style( 'custom-admin-css', get_template_directory_uri() . '/css/custom-admin.css', array(), '3.0.3' );	


}

add_action( 'init', 'eventiz_fnc_setup_admin_setting'  );

/**
 * Remove supported posttypes which provided by framework
 */
function eventiz_fnc_pbrthemer_load_posttype_files( $output ){
  $pts = array( 'brands', 'testimonials', 'portfolio', 'faq', 'footer', 'megamenu', 'gallery' );

  foreach( $output as $key=>$file ){
        if( !(in_array($key, $pts)) )
      unset( $output[$key] ); 
    }
  
  return $output; 
}

add_filter( 'pbrthemer_load_posttype_files' , 'eventiz_fnc_pbrthemer_load_posttype_files', 1,  10 );
