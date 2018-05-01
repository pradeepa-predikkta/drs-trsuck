<?php

/******************************************************************************/
/******************************************************************************/

require_once(get_template_directory().'/include.php');

$Theme=new Autospa_Theme();

if(is_admin()) require_once(get_template_directory().'/admin/functions.php');
else require_once(get_template_directory().'/public/functions.php');

add_action('after_setup_theme',array($Theme,'setupTheme'));
add_action('switch_theme',array($Theme,'switchTheme'));

/******************************************************************************/
/******************************************************************************/