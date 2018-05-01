<?php
		global $post,$autospaParentPost;

		$Validation=new Autospa_ThemeValidation();
		$WidgetArea=new Autospa_ThemeWidgetArea();
        
		$widgetAreaData=$WidgetArea->getWidgetAreaByPost($autospaParentPost->post,'widget_area_sidebar',true);
		if($widgetAreaData['location']==1)
		{
?>	
                            </div>
<?php
		}
		elseif($widgetAreaData['location']==2)
		{
?>
                            </div>
                            <div class="theme-column-right"><?php $WidgetArea->create($widgetAreaData); ?></div>	
<?php
		}
?>
                        </div>
				
                    </div>
<?php
        $widgetAreaData=array();

		$widgetAreaData[0]=$WidgetArea->getWidgetAreaByPost($autospaParentPost->post,'footer_widget_area_1');
		$widgetAreaData[1]=$WidgetArea->getWidgetAreaByPost($autospaParentPost->post,'footer_widget_area_2');
		$widgetAreaData[2]=$WidgetArea->getWidgetAreaByPost($autospaParentPost->post,'footer_widget_area_3');

		if(($widgetAreaData[0]['id']!='0') || ($widgetAreaData[1]['id']!='0') || ($widgetAreaData[2]['id']!='0'))
		{
?>
					<div class="theme-page-footer">
<?php
			if($widgetAreaData[0]['id']!='0') 
			{
?>	
						<div class="theme-page-footer-top">
							<?php $WidgetArea->create($widgetAreaData[0]); ?>
						</div>
<?php
			}
			
			if($widgetAreaData[1]['id']!='0')
			{
?>
						<div class="theme-page-footer-middle">
							<div class="theme-main">
								<?php $WidgetArea->create($widgetAreaData[1]); ?>
							</div>
						</div>	
<?php
			}
			
			if($widgetAreaData[2]['id']!='0')
			{
?>
						<div class="theme-page-footer-bottom">
							<div class="theme-main">
								<?php $WidgetArea->create($widgetAreaData[2]); ?>
							</div>
						</div>
<?php
			}
?>
					</div>
<?php
		}
?>
				</div>
                
				<div id="theme-search-form">
					<div></div>
					<form action="<?php echo esc_url(get_home_url()); ?>">
						<div>
							<input type="search" name="s"/>
							<span class="theme-icon-meta-search"></span>
							<input type="submit" name="submit" value=""/>
						</div>
					</form>
				</div>
<?php	
		if($Validation->isNotEmpty(Autospa_ThemeOption::getOption('custom_js_code')))
		{
?>
				<script type="text/javascript">
					<?php echo Autospa_ThemeOption::getOption('custom_js_code'); ?>
				</script>
<?php
		}

		if(Autospa_ThemeOption::getOption('go_to_page_top_enable')==1)
		{
?>
				<a href="<?php echo esc_url('#'.Autospa_ThemeOption::getOption('go_to_page_top_hash')); ?>" id="theme-go-to-top" class="theme-icon-meta-arrow-large-tb"></a>
<?php
		}

		wp_footer();
?>
			</body>
			
		</html>