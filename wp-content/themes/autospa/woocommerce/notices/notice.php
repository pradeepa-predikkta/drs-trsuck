<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/notice.php.
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
 * @version     1.6.4
 */

if (!defined('ABSPATH')) exit;
if(!$messages) return;
	
$content=null;
foreach ($messages as $message)
{
    if(!is_null($content)) $content.='<br/>';
    $content.=$message;
}
        
$shortcode=
'
    [vc_autospa_theme_notice css_class="theme-margin-bottom-3" icon="checklist" header_text="'.__('Information','autospa').'"]'.$content.'[/vc_autospa_theme_notice]
';

echo do_shortcode($shortcode);