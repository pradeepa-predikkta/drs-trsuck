<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

$heading=esc_html(apply_filters('woocommerce_product_description_heading',__('Product Description','woocommerce')));
?>

<?php if($heading): ?>

<?php echo do_shortcode('[vc_autospa_theme_header_subheader header="'.$heading.'" header_importance="4" align="alignleft"]'); ?>

<?php endif; ?>

<?php the_content(); ?>
