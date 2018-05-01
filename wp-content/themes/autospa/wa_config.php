<?php

/******************************************************************************/
/******************************************************************************/

require_once(get_template_directory().'/class/Theme.Layout.class.php');

$Layout=new Autospa_ThemeLayout();

WAData::set('register_sidebar_argument_class','');
WAData::set('register_sidebar_argument_widget_start','<div id="%1$s" class="%2$s theme-clear-fix theme-widget">');
WAData::set('register_sidebar_argument_widget_stop','</div>');
WAData::set('register_sidebar_argument_title_start','<h6 class="theme-widget-header">');
WAData::set('register_sidebar_argument_title_stop','</h6>');

WAData::set('layout',$Layout->getLayout());

/******************************************************************************/
/******************************************************************************/