
		<div <?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item-section-content cbs-clear-fix'); ?>>

			<div<?php CBSHelper::displayCSSClassAttribute('cbs-calendar-header'); ?>>
				<a href="#" <?php CBSHelper::displayCSSClassAttribute('cbs-calendar-header-arrow-left cbs-meta-icon cbs-meta-icon-arrow-horizontal'); ?>></a>
				<span <?php CBSHelper::displayCSSClassAttribute('cbs-calendar-header-caption'); ?>><?php echo $this->data['header']; ?></span>
				<a href="#" <?php CBSHelper::displayCSSClassAttribute('cbs-calendar-header-arrow-right cbs-meta-icon cbs-meta-icon-arrow-horizontal'); ?>></a>
			</div>
			
			<div<?php CBSHelper::displayCSSClassAttribute('cbs-calendar-table-wrapper'); ?>>
			
				<table <?php CBSHelper::displayCSSClassAttribute('cbs-calendar'); ?> cellpadding="0" cellspacing="0" border="0">
					
					<tr <?php CBSHelper::displayCSSClassAttribute('cbs-calendar-subheader'); ?>>
<?php
		foreach($this->data['date'] as $dateIndex=>$dateData)
		{
			$class=array('cbs-calendar-subheader-day-number');
			
			if($dateData['isToday'])
				array_push($class,'cbs-state-selected');
			elseif(!is_array($dateData['time']))
				array_push($class,'cbs-state-disable');
?>
						<th<?php CBSHelper::displayCSSClassAttribute('cbs-date-id-'.$dateData['date']['day']['number'].$dateData['date']['month']['number'].$dateData['date']['year']['number']); ?> data-date-full="<?php esc_attr_e($dateData['date']['full']); ?>">
							<div<?php CBSHelper::displayCSSClassAttribute('cbs-clear-fix'); ?>>
								<span<?php CBSHelper::displayCSSClassAttribute($class); ?>><?php echo $dateData['date']['day']['number']; ?></span>
								<span<?php CBSHelper::displayCSSClassAttribute('cbs-calendar-subheader-day-name'); ?>><?php echo $dateData['date']['day']['name']; ?></span>
							</div>
						</th>
<?php
		}
?>
					</tr>
					<tr <?php CBSHelper::displayCSSClassAttribute('cbs-calendar-data'); ?>>
<?php
		foreach($this->data['date'] as $dateIndex=>$dateData)
		{
?>
						<td>
							<div>
<?php
			if(is_array($dateData['time']))
			{
?>
								<ul<?php CBSHelper::displayCSSClassAttribute('cbs-list-reset','cbs-state-to-hidden','cbs-date-list'); ?>>
<?php
				$i=0;
				foreach($dateData['time'] as $timeIndex=>$timeData)
				{
					$class=array('cbs-date-id-'.$timeData['id']);
					
					if(((++$i)>$this->data['hourVisibleNumber']) && ($this->data['hourVisibleNumber']!=0)) array_push($class,'cbs-state-to-hidden');
?>
									<li<?php CBSHelper::displayCSSClassAttribute($class); ?>><a href="#"><?php echo esc_html(trim($timeData['hour']['number'].':'.$timeData['minute']['number'].' '.$timeData['postfix'])); ?></a></li>
<?php
				}
				
				if(($i>$this->data['hourVisibleNumber']) && ($this->data['hourVisibleNumber']!=0))
				{
?>
									<li>
										<a href="#"<?php CBSHelper::displayCSSClassAttribute('cbs-calendar-data-button-more'); ?>>
											<span><?php esc_html_e('More...',PLUGIN_CBS_DOMAIN) ?></span>
											<span class="cbs-state-hidden"><?php esc_html_e('Less...',PLUGIN_CBS_DOMAIN) ?></span>
										</a>
									</li>
<?php
				}
?>
								</ul>
<?php
			}
			else esc_html_e('Not available.',PLUGIN_CBS_DOMAIN);

?>
							</div>
						</td>
<?php
		}		
?>
					</tr>
				
				</table>
				
				<input type="hidden" name="cbs-calendar-column-count" value="0"/>
				
			</div>

		</div>