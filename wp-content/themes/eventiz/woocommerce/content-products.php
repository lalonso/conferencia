<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;
	
	// Store loop count we're currently on
	if ( empty( $woocommerce_loop['loop'] ) ) {
		$woocommerce_loop['loop'] = 0;
	}

	// Store column count for displaying the grid
	if ( empty( $woocommerce_loop['columns'] ) ) {
		$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
	}

	// Ensure visibility
	if ( ! $product || ! $product->is_visible() ) {
		return;
	}

 

	 
	// Extra post classes
	$classes = array();
 
	$columns = 12/$woocommerce_loop['columns'];
	$classes[] = 'col-lg-'.$columns.' col-md-'.$columns.' col-sm-'.$columns.'';
	?>
	<div <?php post_class( $classes ); ?>>
		 	<?php wc_get_template_part( 'content', 'product-inner' ); ?>
	</div>
