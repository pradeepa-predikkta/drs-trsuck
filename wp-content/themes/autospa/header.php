<?php ob_start(); ?>
<!DOCTYPE html>
<?php
		global $post,$autospaParentPost,$autospaSidebar;

		$Theme=new Autospa_Theme();
		
		$Post=new Autospa_ThemePost();
		$Header=new Autospa_ThemeHeader();
        $Validation=new Autospa_ThemeValidation();
		
		if(($autospaParentPost=$Post->getPost())===false) 
		{
			$autospaParentPost=new stdClass();
			$autospaParentPost->post=$post;
		}
?>
		<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

			<head>
				<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
				<meta name="format-detection" content="telephone=no"/>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
				<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php				
		wp_site_icon();
		wp_head(); 
?>
			</head>

			<body <?php body_class(); ?>>
				
				<div class="theme-page">
				
					<?php echo $Header->create($autospaParentPost->post); ?>

					<div class="theme-page-content">
<?php
		$WidgetArea=new Autospa_ThemeWidgetArea();
						
		$widgetAreaData=$WidgetArea->getWidgetAreaByPost($autospaParentPost->post,'widget_area_sidebar',true);
		$class=$WidgetArea->getWidgetAreaCSSClass($widgetAreaData);		
        
        $style=array();
        $prefix=Autospa_ThemeOption::getOptionPrefix($autospaParentPost->post);
        
        if($prefix=='page')
        {
            $meta=Autospa_ThemeOption::getPostMeta($autospaParentPost->post);
            
            if((isset($meta[$prefix.'_content_margin_top'])) && isset($meta[$prefix.'_content_margin_bottom']))
            {
                $marginTop=$meta[$prefix.'_content_margin_top'];
                $marginBottom=$meta[$prefix.'_content_margin_bottom'];

                if($Validation->isNotEmpty($marginTop))
                    $style['margin-top']=$marginTop.'px';
                if($Validation->isNotEmpty($marginBottom))
                    $style['margin-bottom']=$marginBottom.'px';
            }
        }
?>
                        <div class="theme-main theme-clear-fix <?php echo esc_attr($class); ?>" <?php echo Autospa_ThemeHelper::createStyleAttribute($style); ?>>	
<?php
        $autospaSidebar=false;
        
        if(in_array($widgetAreaData['location'],array(1,2)))
            $autospaSidebar=true;

		if($widgetAreaData['location']==1)
		{
?>
                            <div class="theme-column-left"><?php $WidgetArea->create($widgetAreaData); ?></div>
                            <div class="theme-column-right">
<?php
		}
		elseif($widgetAreaData['location']==2)
		{
?>
                            <div class="theme-column-left">
<?php
		}                                                                                                        