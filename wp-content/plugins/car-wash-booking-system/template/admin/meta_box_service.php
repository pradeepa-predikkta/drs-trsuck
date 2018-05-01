<?php 
		echo $this->data['nonce']; 
?>
		<div class="to">
            <div class="ui-tabs">
                <ul>
                    <li><a href="#meta-box-service-1"><?php esc_html_e('General',PLUGIN_CBS_DOMAIN); ?></a></li>
                    <li><a href="#meta-box-service-2"><?php esc_html_e('Details',PLUGIN_CBS_DOMAIN); ?></a></li>
                </ul>
                <div id="meta-box-service-1">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Base price',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Enter the base price of the service in value.',PLUGIN_CBS_DOMAIN); ?><br/>
                                <?php esc_html_e('This value is used when the price for the location and vehicle type is not set.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" value="<?php echo esc_attr(CBSPrice::formatToDisplay($this->data['meta']['base_price'])); ?>" id="<?php CBSHelper::getFormName('base_price'); ?>" name="<?php CBSHelper::getFormName('base_price'); ?>" maxlength="12"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Base duration',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Enter the base duration of the service in minutes.',PLUGIN_CBS_DOMAIN); ?><br/>
                                <?php esc_html_e('This value is used when the duration for the location and vehicle type is not set.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['base_duration']); ?>" id="<?php CBSHelper::getFormName('base_duration'); ?>" name="<?php CBSHelper::getFormName('base_duration'); ?>" maxlength="9"/>
                            </div>
                        </li>				
                    </ul>
                </div>
                <div id="meta-box-service-2">
<?php
		if((count($this->data['dictionary']['location'])) && (count($this->data['dictionary']['vehicle'])))
		{
?>
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Service details',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Enter the details depending on the location and vehicle type.',PLUGIN_CBS_DOMAIN); ?>
                            </span>
                            <div class="to-overflow-y">
                                <table class="to-table">
                                    <thead>
                                        <tr>
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Location',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Location',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Vehicle Type',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Vehicle type',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>									
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Enable/Disable',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend">
                                                        <?php esc_html_e('Assign service to the vehicle type',PLUGIN_CBS_DOMAIN); ?></br>
                                                    </span>
                                                </div>
                                            </th>
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Price',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Price of the service in value',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Duration',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Duration of the service in minutes',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
			foreach($this->data['dictionary']['location'] as $locationId=>$locationData)
			{
				$title=true;
				foreach($this->data['dictionary']['vehicle'] as $vehicleId=>$vehicleData)
				{
?>
                                        <tr class="<?php echo ($title ? 'to-table-line-separator' : null); ?>">
<?php
					if($title)
					{
?>	
                                            <td rowspan="<?php echo count($this->data['dictionary']['vehicle']); ?>">
                                                <div>
                                                    <a href="<?php echo get_edit_post_link($locationId); ?>"><?php echo esc_html($locationData['post']->post_title); ?></a>
                                                </div>
                                            </td>									
<?php
					}
?>
                                            <td>
                                                <div>
                                                    <a href="<?php echo get_edit_post_link($vehicleId); ?>"><?php echo esc_html($vehicleData['post']->post_title); ?></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-radio-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId.'_1'); ?>" name="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId); ?>" <?php CBSHelper::checkedIf($this->data['detail'][$locationId][$vehicleId]['enable'],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId.'_1'); ?>" title="<?php echo sprintf(esc_attr__('Enable this service for vehicle "%s" in location "%s".'),$vehicleData['post']->post_title,$locationData['post']->post_title); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId.'_0'); ?>" name="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId); ?>" <?php CBSHelper::checkedIf($this->data['detail'][$locationId][$vehicleId]['enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId.'_0'); ?>" title="<?php echo sprintf(esc_attr__('Disable this service for vehicle "%s" in location "%s".'),$vehicleData['post']->post_title,$locationData['post']->post_title); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" value="<?php echo esc_attr(CBSPrice::formatToDisplay($this->data['detail'][$locationId][$vehicleId]['price'])); ?>" id="<?php CBSHelper::getFormName('detail_price_'.$locationId.'_'.$vehicleId); ?>" name="<?php CBSHelper::getFormName('detail_price_'.$locationId.'_'.$vehicleId); ?>" maxlength="12" title="<?php echo sprintf(esc_attr__('Enter service price for vehicle "%s" in location "%s".'),$vehicleData['post']->post_title,$locationData['post']->post_title); ?>"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" value="<?php echo esc_attr($this->data['detail'][$locationId][$vehicleId]['duration']); ?>" id="<?php CBSHelper::getFormName('detail_duration_'.$locationId.'_'.$vehicleId); ?>" name="<?php CBSHelper::getFormName('detail_duration_'.$locationId.'_'.$vehicleId); ?>" maxlength="9" title="<?php echo sprintf(esc_attr__('Enter service duration for vehicle "%s" in location "%s".'),$vehicleData['post']->post_title,$locationData['post']->post_title); ?>"/>
                                                </div>
                                            </td>
                                        </tr>								
							
<?php
					$title=false;
				}
			}
?>
                                    </tbody>
                                </table>
                            </div>		
                        </li>
                    </ul>
<?php
		}
?>
                </div>
            </div>
        </div>
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{	
				$('.to').themeOptionElement({init:true});
			});
		</script>

