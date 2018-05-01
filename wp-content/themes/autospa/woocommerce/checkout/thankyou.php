<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="woocommerce-order">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>
    
<?php
        $content=__('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.','woocommerce');
        
        $content.='<br/><br/><a href="'.esc_url($order->get_checkout_payment_url()).'" class="button pay">'.__('Pay','woocommerce').'</a>';
        
        if(is_user_logged_in())
            $content.='&nbsp;<a href="'.esc_url(wc_get_page_permalink('myaccount')).'" class="button pay">'.__('My account','woocommerce').'</a>';

        $shortcode=
        '
            [vc_autospa_theme_notice icon="alarm" css_class="theme-margin-bottom-3" icon_background_color="#EA5F38" header_text="'.__('Error','autospa').'" close_button_enable="0"]'.$content.'[/vc_autospa_theme_notice]
        ';

        echo do_shortcode($shortcode);
?>
    
		<?php else : ?>
            
<?php
        $shortcode=
        '
            [vc_autospa_theme_notice css_class="theme-margin-bottom-3" icon="check-2" icon_background_color="#47AE77" header_text="'.__('Success','autospa').'"]'.apply_filters( 'woocommerce_thankyou_order_received_text',__( 'Thank you. Your order has been received.','woocommerce' ),$order ).'[/vc_autospa_theme_notice]
        ';

        echo do_shortcode($shortcode);
?>

            <table class="woocommerce-table woocommerce-table--customer-details shop_table customer_details">

                <tbody>
                    
                    <tr>
                        <th><?php _e( 'Order number:', 'woocommerce' ); ?></th>
                        <td><?php echo $order->get_order_number(); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e( 'Date:', 'woocommerce' ); ?></th>
                        <td><?php echo wc_format_datetime( $order->get_date_created() ); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e( 'Total:', 'woocommerce' ); ?></th>
                        <td><?php echo $order->get_formatted_order_total(); ?></td>
                    </tr>
                    
                    <?php if ( $order->get_payment_method_title() ) : ?>
                    <tr>
                        <th><?php _e( 'Payment method:', 'woocommerce' ); ?></th>
                        <td><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></td>
                    </tr>
                    <?php endif; ?>

                </tbody>

            </table>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>

</div>