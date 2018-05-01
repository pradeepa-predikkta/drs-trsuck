<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeWidgetPostMostComment extends Autospa_ThemeWidget 
{
	
	/**************************************************************************/
	
    function __construct() 
	{
		parent::__construct('autospa_widget_post_most_comment',sprintf(__('(%s theme) Most Commented','autospa'),AUTOSPA_THEME_NAME),array('description'=>__('Displays most commented posts.','autospa')),array());
    }
	
	/**************************************************************************/
	
    function widget($argument,$instance) 
	{
		$argument['_data']['file']='widget_post_most_comment.php';
		parent::widget($argument,$instance);
    }
	
	/**************************************************************************/
	
    function update($new_instance,$old_instance) 
	{
		$instance=array();
		$instance['title']=$new_instance['title'];
		$instance['post_count']=(int)$new_instance['post_count'];
		return($instance);
    }
	
	/**************************************************************************/
	
	function form($instance) 
	{	
		$instance['_data']['file']='widget_post_most_comment.php';
		$instance['_data']['field']=array('title','post_count');
		parent::form($instance);
	}
	
	/**************************************************************************/
	
	function register($class=null)
	{
		parent::register(is_null($class) ? get_class() : $class);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/