<?php
/* 
Plugin Name: Theme Fonts
Plugin URI: http://quanticalabs.com
Description: Theme Fonts allows manage fonts and related styles in themes from QuanticaLabs.
Author: QuanticaLabs
Version: 1.8
Author URI: http://quanticalabs.com
*/

require_once(plugin_dir_path(__FILE__).'include.php');

load_plugin_textdomain(PLUGIN_THEME_FONT_DOMAIN,false,dirname(plugin_basename(__FILE__)).'/languages/');

/******************************************************************************/

$ThemeFont=new TFThemeFont();
$GoogleFont=new TFGoogleFont();

$ThemeFont->prepareLibrary();

register_activation_hook(__FILE__,array($ThemeFont,'pluginActivation'));

if(is_admin())
{
	add_action('admin_init',array($ThemeFont,'adminInit'));
	add_action('admin_menu',array($ThemeFont,'adminMenuInit'));
	
	add_action('wp_ajax_'.PLUGIN_THEME_FONT_CONTEXT.'_save',array($ThemeFont,'adminSavePanel'));
	
	add_action('admin_notices',array($ThemeFont,'adminNotice'));
	
	add_action('wp_ajax_autocomplete_google_font',array($GoogleFont,'getFontByName'));
	
	$GoogleFont->scheduleDownload();
}
else 	 
{	
	add_action('wp_enqueue_scripts',array($ThemeFont,'publicInit'));
}

/******************************************************************************/
/******************************************************************************/