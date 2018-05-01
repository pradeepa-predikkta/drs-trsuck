<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeMenu
{
	/**************************************************************************/

	function __construct()
	{
		
	}
	
	/**************************************************************************/
	
	function getMenuDictionary($useNone=true,$useGlobal=true,$useLeftUnchaged=false)
	{
		$menu=get_terms('nav_menu');
		
		$data=array();
		
		if($useNone) $data[0]=array(__('- None -','autospa'));
		if($useGlobal) $data[-1]=array(__('- Use global settings -','autospa'));
		if($useLeftUnchaged) $data[-10]=array(__('[Left unchaged]','autospa'));

		foreach($menu as $singlePost)
			$data[$singlePost->term_id]=array($singlePost->name);
		
		return($data);
	}

	/**************************************************************************/
	
	function create()
	{
		global $autospaParentPost;
		
		$menuId=0;
		$locationId='header_top_menu';
		
		$menu=wp_get_nav_menus();
		$menuLocation=get_nav_menu_locations();

		if(isset($menuLocation[$locationId])) 
		{
			foreach($menu as $m)
			{
				if($m->term_id==$menuLocation[$locationId])
					$menuId=$m->term_id;
			}
		}
        
        $prefix=Autospa_ThemeOption::getOptionPrefix($autospaParentPost->post);
		
		if($menuId==0)
        {
            $menuId=Autospa_ThemeOption::getGlobalOption($autospaParentPost->post,'header_top_menu_id',$prefix);
			if($menuId==0) return;
        }
        
		$menuAttribute=array
		(
			'menu'				=>	$menuId,
			'walker'			=>	new Autospa_ThemeMenuWalker(),
			'menu_class'		=>	'theme-clear-fix sf-menu',
			'container'			=>	'',
			'container_class'	=>	'',
			'echo'				=>	0,
			'items_wrap'		=>	'<ul class="%2$s">%3$s</ul>'
		);

		$menuResponsiveAttribute=array
		(
			'menu'				=>	$menuId,
			'walker'			=>	new Autospa_ThemeMenuWalker(),
			'menu_class'		=>	'theme-clear-fix',
			'container'			=>	'',
			'container_class'	=>	'',
			'echo'				=>	0,
			'items_wrap'		=>	'<ul class="%2$s">%3$s</ul>'
		);

		return(array(wp_nav_menu($menuAttribute),wp_nav_menu($menuResponsiveAttribute)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/