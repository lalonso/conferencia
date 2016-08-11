<?php  global $woocommerce; ?>
<div class="pbr-topcart">
    <div id="cart" class="dropdown">
        <div class="topcart-inner <?php if($woocommerce->cart->cart_contents_count){ echo 'open'; } ?>">
            <a class="dropdown-toggle mini-cart" href="<?php echo esc_url_raw($woocommerce->cart->get_cart_url() ) ?>" title="<?php esc_html_e('View your shopping cart', 'eventiz'); ?>">
                <span class="text-skin cart-icon">
                    <i class="icon-cart2"></i>
                    <span class="title-checkout"><?php esc_html_e( 'Checkout', 'eventiz'); ?></span>
                </span>
                <span class="title-cart"><?php esc_html_e('My Cart ','eventiz'); ?></span>
                <?php echo sprintf(_n(' <span class="mini-cart-items"> %d  </span> ', ' <span class="mini-cart-items"> %d <em>item</em> </span> ', $woocommerce->cart->cart_contents_count, 'eventiz'), $woocommerce->cart->cart_contents_count);?><span class="mini-cart-total"> <?php echo trim( $woocommerce->cart->get_cart_total() ); ?> </span>
            </a>            
        </div>
    </div>    
</div>   
