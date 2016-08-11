<?php 
/**
 * Remove javascript and css files not use
 */


/**
 * Hoo to top bar layout
 */
function eventiz_fnc_topbar_layout(){
	$layout = eventiz_fnc_get_header_layout();
	get_template_part( 'page-templates/parts/topbar', $layout );
	get_template_part( 'page-templates/parts/topbar', 'mobile' );
}

add_action( 'eventiz_template_header_before', 'eventiz_fnc_topbar_layout' );

/**
 * Hook to select header layout for archive layout
 */
function eventiz_fnc_get_header_layout( $layout='' ){
	global $post; 

	$layout = $post && get_post_meta( $post->ID, 'eventiz_header_layout', 1 ) ? get_post_meta( $post->ID, 'eventiz_header_layout', 1 ) : eventiz_fnc_theme_options( 'headerlayout' );
	 
 	if( $layout ){
 		return trim( $layout );
 	}elseif ( $layout = eventiz_fnc_theme_options('header_skin','') ){
 		return trim( $layout );
 	}

	return $layout;
} 

add_filter( 'eventiz_fnc_get_header_layout', 'eventiz_fnc_get_header_layout' );

/**
 * Hook to select header layout for archive layout
 */
function eventiz_fnc_get_footer_profile( $profile='default' ){

	global $post; 

	$profile =  $post? get_post_meta( $post->ID, 'eventiz_footer_profile', 1 ):null ;

 	if( $profile ){
 		return trim( $profile );
 	}elseif ( $profile = eventiz_fnc_theme_options('footer-style', $profile ) ){  
 		return trim( $profile );
 	}
 	
	return $profile;
} 

add_filter( 'eventiz_fnc_get_footer_profile', 'eventiz_fnc_get_footer_profile' );


/**
 * Render Custom Css Renderig by Visual composer
 */
if ( !function_exists( 'eventiz_fnc_print_style_footer' ) ) {
	function eventiz_fnc_print_style_footer(){
		$footer =  eventiz_fnc_get_footer_profile( 'default' );
		if($footer!='default'){
			$shortcodes_custom_css = get_post_meta( $footer, '_wpb_shortcodes_custom_css', true );
			if ( ! empty( $shortcodes_custom_css ) ) {
				echo '<style>
					'.$shortcodes_custom_css.'
					</style>';
			}
		}
	}
	add_action('wp_head','eventiz_fnc_print_style_footer', 18);
}


/**
 * Hook to show breadscrumbs
 */
function eventiz_fnc_render_breadcrumbs(){

	global $post;

	if( is_object($post) ){
		$disable = get_post_meta( $post->ID, 'eventiz_disable_breadscrumb', 1 );  
		if(  $disable || is_front_page() ){
			return true; 
		}
		$bgimage = get_post_meta( $post->ID, 'eventiz_image_breadscrumb', 1 );  
		$color 	 = get_post_meta( $post->ID, 'eventiz_color_breadscrumb', 1 );  
		$bgcolor = get_post_meta( $post->ID, 'eventiz_bgcolor_breadscrumb', 1 );  
		$style = array();
		if( $bgcolor  ){
			$style[] = 'background-color:'.$bgcolor;
		}
		if( $bgimage  ){ 
			$style[] = 'background-image:url(\''.wp_get_attachment_url($bgimage).'\')';
		}

		if( $color  ){ 
			$style[] = 'color:'.$color;
		}

		$estyle = !empty($style)? 'style="'.implode(";", $style).'"':"";
	}else {
		$estyle = ''; 
	}
	
	echo '<section id="pbr-breadscrumb" class="pbr-breadscrumb" '.$estyle.'><div class="container"><div class="breadcrumb-inner">';
			eventiz_fnc_breadcrumbs();
	echo '</div></div></section>';

}
add_action( 'eventiz_template_main_before', 'eventiz_fnc_render_breadcrumbs' ); 

 
/**
 * Main Container
 */

function eventiz_template_main_container_class( $class ){
	global $post; 
	global $eventiz_wpopconfig;

	$layoutcls = get_post_meta( $post->ID, 'eventiz_enable_fullwidth_layout', 1 );
	
	if( $layoutcls ) {
		$eventiz_wpopconfig['layout'] = 'fullwidth';
		return 'container-fluid-full';
	}
	return $class;
}
add_filter( 'eventiz_template_main_container_class', 'eventiz_template_main_container_class', 1 , 1  );
add_filter( 'eventiz_template_main_content_class', 'eventiz_template_main_container_class', 1 , 1  );



function eventiz_template_footer_before(){
	//return get_sidebar( 'newsletter' );
}

add_action( 'eventiz_template_footer_before', 'eventiz_template_footer_before' );


/**
 * Get Configuration for Page Layout
 *
 */
function eventiz_fnc_get_page_sidebar_configs( $configs='' ){

	global $post; 
	if(!$post){ 
		$left = $right = '';
	}else{
		$left  =  get_post_meta( $post->ID, 'eventiz_leftsidebar', true );
		$right =  get_post_meta( $post->ID, 'eventiz_rightsidebar', true );
	}	
	return eventiz_fnc_get_layout_configs( $left, $right );
}

add_filter( 'eventiz_fnc_get_page_sidebar_configs', 'eventiz_fnc_get_page_sidebar_configs', 1, 1 );


function eventiz_fnc_get_single_sidebar_configs( $configs='' ){

	global $post; 

	$left  =  get_post_meta( $post->ID, 'eventiz_leftsidebar', 1 );
	$right =  get_post_meta( $post->ID, 'eventiz_rightsidebar', 1 );

	if ( empty( $left ) ) {
		$left  =  eventiz_fnc_theme_options( 'blog-single-left-sidebar' ); 
	}

	if ( empty( $right ) ) {
		$right =  eventiz_fnc_theme_options( 'blog-single-right-sidebar' ); 
	}
	return eventiz_fnc_get_layout_configs( $left, $right );
}

add_filter( 'eventiz_fnc_get_single_sidebar_configs', 'eventiz_fnc_get_single_sidebar_configs', 1, 1 );

function eventiz_fnc_get_archive_sidebar_configs( $configs='' ){

	global $post; 


	$left  =  eventiz_fnc_theme_options( 'blog-archive-left-sidebar' ); 
	$right =  eventiz_fnc_theme_options( 'blog-archive-right-sidebar' ); 
  
	return eventiz_fnc_get_layout_configs( $left, $right );
}

add_filter( 'eventiz_fnc_get_archive_sidebar_configs', 'eventiz_fnc_get_archive_sidebar_configs', 1, 1 );
add_filter( 'eventiz_fnc_get_category_sidebar_configs', 'eventiz_fnc_get_archive_sidebar_configs', 1, 1 );


function eventiz_fnc_sidebars_others_configs(){
	global $eventiz_page_layouts;
	return $eventiz_page_layouts; 
}

add_filter("eventiz_fnc_sidebars_others_configs", "eventiz_fnc_sidebars_others_configs");

/**
 *
 */
function eventiz_fnc_get_layout_configs( $left, $right ){

	$configs = array();
	$configs['main'] = array( 'class' => 'col-lg-9 col-md-9 col-sm-12 col-xs-12' );

	$configs['sidebars'] = array( 
		'left'  => array( 'sidebar' => $left, 'active' => is_active_sidebar( $left ), 'class' => 'col-lg-3 col-md-3 col-sm-12 col-xs-12'  ),
		'right' => array( 'sidebar' => $right, 'active' => is_active_sidebar( $right ), 'class' => 'col-lg-3 col-md-3 col-sm-12 col-xs-12' ) 
	); 

	if( $left && $right ){
		$configs['main'] = array( 'class' => 'col-lg-6 col-md-6' );
	} elseif( empty($left) && empty($right) ){
		$configs['main'] = array( 'class' => 'col-lg-12 col-md-12' );
	}
	return $configs; 
}
