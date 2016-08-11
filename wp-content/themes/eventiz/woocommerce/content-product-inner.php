<?php 
global $product;
$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($product->id ), 'blog-thumbnails' );
$featured = trim(get_post_meta($post->ID, '_featured', true));
?>


<div class="product-block <?php if($featured == "yes") echo 'product-featured' ?>" data-product-id="<?php echo esc_attr($product->id); ?>">
    <?php if($featured == "yes"){ ?>
        <div class="featured-icon"><img src="<?php echo (get_template_directory_uri() . '/images/icon-hot.png'); ?>" alt=""/></div>
    <?php } ?>
    <div class="left col-xs-5 no-padding">
        <div class="loop-item-title">
            <h3 class="name"><?php the_title(); ?></h3>
            <?php
                /**
                * woocommerce_after_shop_loop_item_title hook
                *
                * @hooked woocommerce_template_loop_rating - 5
                * @hooked woocommerce_template_loop_price - 10
                */
                do_action( 'woocommerce_after_shop_loop_item_title');
            ?>
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
