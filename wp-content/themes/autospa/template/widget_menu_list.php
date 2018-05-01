<?php
        $id='widget_theme_widget_menu_list_'.Autospa_ThemeHelper::createId();
			
        echo $this->data['html']['start']; 
?>
			<div class="widget_theme_widget_menu_list theme-clear-fix" id="<?php echo esc_attr($id); ?>">
<?php
		$attrbute=array
		(
			'menu'                                                              =>	$this->data['instance']['menu_id'],
            'depth'                                                             =>  1,
			'menu_class'                                                        =>	'theme-clear-fix',
			'container'                                                         =>	'',
			'container_class'                                                   =>	'',
			'echo'                                                              =>	1,
			'items_wrap'                                                        =>	'<ul class="%2$s">%3$s</ul>'
		);
        
        wp_nav_menu($attrbute);
?>
			</div>
<?php
		echo $this->data['html']['stop']; 