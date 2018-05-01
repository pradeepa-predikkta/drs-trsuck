<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

if (wc_get_page_id('shop')>0)
{
    $shortcode=
	'
        [vc_autospa_theme_notice icon="shopping-cart" icon_background_color="#EA5F38" header_text="'.__('Cart','autospa').'" subheader_text="'.__('Your cart is currently empty.','woocommerce').'&nbsp;<a href=\''.apply_filters('woocommerce_return_to_shop_redirect',get_permalink(wc_get_page_id('shop'))).'\'>'.__('Return to shop','portada').'</a>"]
	';
        
	echo do_shortcode($shortcode);
}