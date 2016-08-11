<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<?php
	global $product;
	
?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="product-block" data-product-id="<?php echo esc_attr($product->id); ?>">
    <div class="left col-xs-5 no-padding">
        <div class="loop-item-title">
            <h3 class="name"><?php the_title(); ?></h3>
            <?php woocommerce_template_single_price(); ?>
        </div>
        <div class="button-groups add-button clearfix">
            <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
        </div>
    </div>

    <div class="right col-xs-7 no-padding">
        <div class="features">
            <?php
                $features = get_post_meta( get_the_ID(), 'opalsingleevent_woo_features_group', false );
              // print "<pre>";print_r($features);die();
            ?>

            <?php if(isset($features[0]) && is_array($features[0])){
                foreach ($features[0] as $key => $f) { 
                    $icon = get_template_directory_uri() . '/images/icon-uncheck.png';
                    if(isset($f['opalsingleevent_woo_usethis']) && $f['opalsingleevent_woo_usethis']){
                        $icon = get_template_directory_uri() . '/images/icon-check.png';
                    }
                 ?>
                <div class="feature"><img src="<?php echo esc_attr($icon); ?>" alt=""/><span><?php echo esc_html($f['opalsingleevent_woo_label'] ); ?></span></div>
            <?php 
                } 
            } ?>

        </div>   
        <div class="info-text"><?php echo esc_html__('* your tickets will come to your mails', 'eventiz'); ?></div> 
    </div>

</div>





	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
