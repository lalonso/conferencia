<?php

function eventiz_woocommerce_enqueue_scripts() {
	wp_enqueue_script( 'eventiz-woocommerce', get_template_directory_uri() . '/js/woocommerce.js', array( 'jquery', 'suggest' ), '20131022', true );
}
add_action( 'wp_enqueue_scripts', 'eventiz_woocommerce_enqueue_scripts' );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

/**
 */
add_filter('add_to_cart_fragments',				'eventiz_fnc_woocommerce_header_add_to_cart_fragment' );

function eventiz_fnc_woocommerce_header_add_to_cart_fragment( $fragments ){
	global $woocommerce;

	$fragments['#cart .mini-cart-items'] =  sprintf(_n(' <span class="mini-cart-items"> %d  </span> ', ' <span class="mini-cart-items"> %d <em>item</em> </span> ', $woocommerce->cart->cart_contents_count, 'eventiz'), $woocommerce->cart->cart_contents_count);
 	$fragments['#cart .mini-cart-total'] = trim( $woocommerce->cart->get_cart_total() );
    
    return $fragments;
}

/**
 * Mini Basket
 */

if(!function_exists('eventiz_fnc_woocommerce_minibasket')){
    function eventiz_fnc_woocommerce_minibasket( $style='' ){ 
        $template =  apply_filters( 'eventiz_fnc_woocommerce_minibasket_template', eventiz_fnc_get_header_layout( '' )  );  
        return get_template_part( 'woocommerce/cart/mini-cart-button', $template ); 
    }
}

add_action( 'eventiz_template_header_after', 'eventiz_fnc_woocommerce_minibasket', 30, 0 );

/******************************************************
 * 												   	  *
 * Hook functions applying in archive, category page  *
 *												      *
 ******************************************************/
function eventiz_template_woocommerce_main_container_class( $class ){ 
	if( is_product() ){
		$class .= ' '.  eventiz_fnc_theme_options('woocommerce-single-layout') ;
	}else if( is_product_category() || is_archive()  ){ 
		$class .= ' '.  eventiz_fnc_theme_options('woocommerce-archive-layout') ;
	}
	return $class;
}

add_filter( 'eventiz_template_woocommerce_main_container_class', 'eventiz_template_woocommerce_main_container_class' );
function eventiz_fnc_get_woocommerce_sidebar_configs( $configs='' ){

	global $post; 
	$right = null; $left = null; 

	if( is_product() ){
		
		$left  =  eventiz_fnc_theme_options( 'woocommerce-single-left-sidebar' ); 
		$right =  eventiz_fnc_theme_options( 'woocommerce-single-right-sidebar' );  

	}else if( is_product_category() || is_archive() ){
		$left  =  eventiz_fnc_theme_options( 'woocommerce-archive-left-sidebar' ); 
		$right =  eventiz_fnc_theme_options( 'woocommerce-archive-right-sidebar' ); 
	}

 
	return eventiz_fnc_get_layout_configs( $left, $right );
}

add_filter( 'eventiz_fnc_get_woocommerce_sidebar_configs', 'eventiz_fnc_get_woocommerce_sidebar_configs', 1, 1 );


function eventiz_woocommerce_breadcrumb_defaults( $args ){
	$args['wrap_before'] = '<div id="pbr-breadscrumb" class="pbr-breadscrumb"><div class="container"><div class="breadcrumb-inner"><div class="title-page">'.esc_html('Product', 'eventiz').'</div><ol class="pbr-woocommerce-breadcrumb breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>';
	$args['wrap_after'] = '</ol></div></div></div>';

	return $args;
}

add_filter( 'woocommerce_breadcrumb_defaults', 'eventiz_woocommerce_breadcrumb_defaults' );

add_action( 'eventiz_woo_template_main_before', 'woocommerce_breadcrumb', 30, 0 );
/**
 * Remove show page results which display on top left of listing products block.
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 10 );


function eventiz_fnc_woocommerce_after_shop_loop_start(){
	echo '<div class="products-bottom-wrap clearfix">';
}

add_action( 'woocommerce_after_shop_loop', 'eventiz_fnc_woocommerce_after_shop_loop_start', 1 );

function eventiz_fnc_woocommerce_after_shop_loop_after(){
	echo '</div>';
}

add_action( 'woocommerce_after_shop_loop', 'eventiz_fnc_woocommerce_after_shop_loop_after', 10000 );


/**
 * Wrapping all elements are wrapped inside Div Container which rendered in woocommerce_before_shop_loop hook
 */
function eventiz_fnc_woocommerce_before_shop_loop_start(){
	echo '<div class="products-top-wrap clearfix">';
}

function eventiz_fnc_woocommerce_before_shop_loop_end(){
	echo '</div>';
}


add_action( 'woocommerce_before_shop_loop', 'eventiz_fnc_woocommerce_before_shop_loop_start' , 0 );
add_action( 'woocommerce_before_shop_loop', 'eventiz_fnc_woocommerce_before_shop_loop_end' , 1000 );


function eventiz_fnc_woocommerce_display_modes(){
	global $wp;
	$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
	$woo_display = 'grid';
	if ( isset($_COOKIE['eventiz_woo_display']) && $_COOKIE['eventiz_woo_display'] == 'list' ) {
		$woo_display = $_COOKIE['eventiz_woo_display'];
	}
	echo '<form action="'.  $current_url  .'" class="display-mode" method="get">';
 
		echo '<button title="'.esc_html__('Grid','eventiz').'" class="btn '.($woo_display == 'grid' ? 'active' : '').'" value="grid" name="display" type="submit"><i class="fa fa-th"></i></button>';	
		echo '<button title="'.esc_html__( 'List', 'eventiz' ).'" class="btn '.($woo_display == 'list' ? 'active' : '').'" value="list" name="display" type="submit"><i class="fa fa-th-list"></i></button>';	
	echo '</form>'; 
}

add_action( 'woocommerce_before_shop_loop', 'eventiz_fnc_woocommerce_display_modes' , 1 );


/**
 * Processing hook layout content
 */
function eventiz_fnc_layout_main_class( $class ){
	$sidebar = eventiz_fnc_theme_options( 'woo-sidebar-show', 1 ) ;
	if( is_single() ){
		$sidebar = eventiz_fnc_theme_options('woo-single-sidebar-show'); ;
	}
	else {
		$sidebar = eventiz_fnc_theme_options('woo-sidebar-show'); 
	}

	if( $sidebar ){
		return $class;
	}

	return 'col-lg-12 col-md-12 col-xs-12';
}
add_filter( 'eventiz_woo_layout_main_class', 'eventiz_fnc_layout_main_class', 4 );


/**
 *
 */
function eventiz_fnc_woocommerce_archive_image(){ 
	if ( is_tax( array( 'product_cat', 'product_tag' ) ) && get_query_var( 'paged' ) == 0 ) { 
		$thumb =  get_woocommerce_term_meta( get_queried_object()->term_id, 'thumbnail_id', true ) ;

		if( $thumb ){
			$img = wp_get_attachment_image_src( $thumb, 'full' ); 
		
			echo '<p class="category-banner"><img src="'.esc_url_raw( $img[0] ).'""></p>'; 
		}
	}
}
add_action( 'woocommerce_archive_description', 'eventiz_fnc_woocommerce_archive_image', 9 );

/**
 * Add action to init parameter before processing
 */

function eventiz_fnc_before_woocommerce_init(){
	if( isset($_GET['display']) && ($_GET['display']=='list' || $_GET['display']=='grid') ){  
		setcookie( 'eventiz_woo_display', trim($_GET['display']) , time()+3600*24*100,'/' );
		$_COOKIE['eventiz_woo_display'] = trim($_GET['display']);
	}
}

add_action( 'init', 'eventiz_fnc_before_woocommerce_init' );
/***************************************************
 * 												   *
 * Hook functions applying in single product page  *
 *												   *
 ***************************************************/


/** 
 * Remove review to products tabs. and display this as block below the tab.
 */
function eventiz_fnc_woocommerce_product_tabs( $tabs ){

	if( isset($tabs['reviews']) ){
		unset( $tabs['reviews'] ); 
	}
	return $tabs;
}
add_filter( 'woocommerce_product_tabs','eventiz_fnc_woocommerce_product_tabs', 99 );
 
 /**
  * Rehook product review products in woocommerce_after_single_product_summary
  */
function eventiz_fnc_product_reviews(){
	return comments_template();
}
add_action('woocommerce_after_single_product_summary','eventiz_fnc_product_reviews', 10 );
 


function eventiz_woocommerce_show_product_thumbnails( $layout ){ 
	$layout = $layout.'-h';
	return $layout;
}

add_filter( 'pbrthemer_woocommerce_show_product_thumbnails', 'eventiz_woocommerce_show_product_thumbnails'  );


function eventiz_woocommerce_show_product_images( $layout ){ 
	$layout = $layout.'-h';
	return $layout;
}

add_filter( 'pbrthemer_woocommerce_show_product_images', 'eventiz_woocommerce_show_product_images'  );

/**
 * Show/Hide related, upsells products
 */
function eventiz_woocommerce_related_upsells_products($located, $template_name) {
	$options      = get_option('pbr_theme_options');
	$content_none = get_template_directory() . '/woocommerce/content-none.php';

	if ( 'single-product/related.php' == $template_name ) {
		if ( isset( $options['wc_show_related'] ) && 
			( 1 == $options['wc_show_related'] ) ) {
			$located = $content_none;
		}
	} elseif ( 'single-product/up-sells.php' == $template_name ) {
		if ( isset( $options['wc_show_upsells'] ) && 
			( 1 == $options['wc_show_upsells'] ) ) {
			$located = $content_none;
		}
	}

	return apply_filters( 'eventiz_woocommerce_related_upsells_products', $located, $template_name );
}

add_filter( 'wc_get_template', 'eventiz_woocommerce_related_upsells_products', 10, 2 );

/**
 * Number of products per page
 */
function eventiz_woocommerce_shop_per_page($number) {
	$value = eventiz_fnc_theme_options('woo-number-page', get_option('posts_per_page'));
	if ( is_numeric( $value ) && $value ) {
		$number = absint( $value );
	}
	return $number;
}

add_filter( 'loop_shop_per_page', 'eventiz_woocommerce_shop_per_page' );

/**
 * Number of products per row
 */
function eventiz_woocommerce_shop_columns($number) {
	$value = eventiz_fnc_theme_options('wc_itemsrow', 3);
	if ( in_array( $value, array(2, 3, 4, 6) ) ) {
		$number = $value;
	}
	return $number;
}

add_filter( 'loop_shop_columns', 'eventiz_woocommerce_shop_columns' );

/**
* Custom currency
*/
add_filter('woocommerce_currency_symbol', 'eventiz_woocommerce_currency_symbol', 10, 2);
 
function eventiz_woocommerce_currency_symbol( $currency_symbol, $currency ) {
   $currency_symbol = '<span class="currency">'.$currency_symbol.'</span>';
   return $currency_symbol;
}     

function eventiz_fnc_woocommerce_before_shop_loop_item_title(){

    global $product;

    if( $product->regular_price ){
        $percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
        echo '<span class="product-sale-label">-' . trim( $percentage ) . '%</span>';
    }
                                            
}