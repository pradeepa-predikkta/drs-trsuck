<?php 
		echo $this->data['nonce']; 
?>
		<div class="to">
            <div class="ui-tabs">
                <ul>
                    <li><a href="#meta-box-package-1"><?php esc_html_e('Services',PLUGIN_CBS_DOMAIN); ?></a></li>
                    <li><a href="#meta-box-package-2"><?php esc_html_e('Details',PLUGIN_CBS_DOMAIN); ?></a></li>
                </ul>
                <div id="meta-box-package-1">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Services',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Add at least one service to the package (included services).',PLUGIN_CBS_DOMAIN); ?><br/>
                                <?php esc_html_e('Packages without included services are unusable and will not be displayed.',PLUGIN_CBS_DOMAIN); ?><br/>
                                <?php esc_html_e('Related services are not included in the package but will be available for selection after selecting the package.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
<?php
		if(count($this->data['dictionary']['service']))
		{
?>
                            <div class="to-overflow-y">
                                <table class="to-table">
                                    <thead>
                                        <tr>
                                            <th width="30%">
                                                <div>
                                                    <?php esc_html_e('Service',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Service',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th width="30%">
                                                <div>
                                                    <?php esc_html_e('Service Status',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Assign service to the package',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th width="40%">
                                                <div>
                                                    <?php esc_html_e('Details',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Click on the link to get more details about the service',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
			foreach($this->data['dictionary']['service'] as $serviceId=>$serviceData)
			{
?>
                                        <tr>
                                            <td>
                                                <div>
                                                    <a href="<?php echo get_edit_post_link($serviceId); ?>"><?php echo esc_html($serviceData['post']->post_title); ?></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-checkbox-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('service_type_'.$serviceId.'_1'); ?>" name="<?php CBSHelper::getFormName('service_type_'.$serviceId); ?>" <?php CBSHelper::checkedIf($this->data['service'][$serviceId],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('service_type_'.$serviceId.'_1'); ?>"><?php esc_html_e('Included',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('service_type_'.$serviceId.'_0'); ?>" name="<?php CBSHelper::getFormName('service_type_'.$serviceId); ?>" <?php CBSHelper::checkedIf($this->data['service'][$serviceId],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('service_type_'.$serviceId.'_0'); ?>"><?php esc_html_e('Not Included',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="2" id="<?php CBSHelper::getFormName('service_type_'.$serviceId.'_2'); ?>" name="<?php CBSHelper::getFormName('service_type_'.$serviceId); ?>" <?php CBSHelper::checkedIf($this->data['service'][$serviceId],2); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('service_type_'.$serviceId.'_2'); ?>"><?php esc_html_e('Related',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <a href="#" class="to-value-<?php echo esc_attr($serviceId); ?>">
                                                        <span><?php esc_html_e('Get more details',PLUGIN_CBS_DOMAIN); ?></span>
                                                        <span class="to-hidden"><?php esc_html_e('Hide details',PLUGIN_CBS_DOMAIN); ?></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>								
<?php
			}
?>
                                    </tbody>
                                </table>
                            </div>	
<?php
		}
?>
                        </li>
                    </ul>
                </div>
                <div id="meta-box-package-2">
<?php
		if((count($this->data['dictionary']['location'])) && (count($this->data['dictionary']['vehicle'])))
		{
?>
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Prices',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Enter the package price depending on the location and vehicle type.',PLUGIN_CBS_DOMAIN); ?><br/>
                                <?php esc_html_e('Leave the price field blank or enter "0" to display the price calculated (which is the sum of the prices of individual services included in the package).',PLUGIN_CBS_DOMAIN); ?><br/>
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
                                            <th style="width:15%">
                                                <div>
                                                    <?php esc_html_e('Enable/Disable',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend">
                                                        <?php esc_html_e('Assign package to vehicle',PLUGIN_CBS_DOMAIN); ?></br>
                                                    </span>
                                                </div>
                                            </th>
                                            <th style="width:15%">
                                                <div>
                                                    <?php esc_html_e('Duration',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend">
                                                        <?php esc_html_e('Total duration in minutes',PLUGIN_CBS_DOMAIN); ?></br>
                                                    </span>
                                                </div>
                                            </th>
                                            <th style="width:15%">
                                                <div>
                                                    <?php esc_html_e('Price Calculated',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend">
                                                        <?php esc_html_e('The sum of the prices',PLUGIN_CBS_DOMAIN); ?></br>
                                                    </span>
                                                </div>
                                            </th>
                                            <th style="width:15%">
                                                <div>
                                                    <?php esc_html_e('Price',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('New price of the package',PLUGIN_CBS_DOMAIN); ?></span>
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
                                                        <label for="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId.'_1'); ?>" title="<?php echo sprintf(esc_attr__('Enable this package for vehicle "%s" in location "%s".'),$vehicleData['post']->post_title,$locationData['post']->post_title); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId.'_0'); ?>" name="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId); ?>" <?php CBSHelper::checkedIf($this->data['detail'][$locationId][$vehicleId]['enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('detail_enable_'.$locationId.'_'.$vehicleId.'_0'); ?>" title="<?php echo sprintf(esc_attr__('Enable this package for vehicle "%s" in location "%s".'),$vehicleData['post']->post_title,$locationData['post']->post_title); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
<?php 
					$duration=isset($this->data['cost'][$locationId][$vehicleId]['duration']) ? $this->data['cost'][$locationId][$vehicleId]['duration'] : 0.00;
					echo $duration; 
?>

                                                </div>
                                            </td>
                                            <td>
                                                <div>
<?php 
					$price=isset($this->data['cost'][$locationId][$vehicleId]['priceCalc']) ? $this->data['cost'][$locationId][$vehicleId]['priceCalc'] : 0.00;
					echo CBSPrice::formatToDisplay($price); 
?>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" value="<?php echo CBSPrice::formatToDisplay($this->data['detail'][$locationId][$vehicleId]['price']); ?>" id="<?php CBSHelper::getFormName('detail_price_'.$locationId.'_'.$vehicleId); ?>" name="<?php CBSHelper::getFormName('detail_price_'.$locationId.'_'.$vehicleId); ?>" maxlength="12" title="<?php echo sprintf(esc_attr__('Enter package price for vehicle "%s" in location "%s".'),$vehicleData['post']->post_title,$locationData['post']->post_title); ?>"/>
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

                $('.to .to-table a').bind('click',function(e)
                {
                    e.preventDefault();

                    var $this=$(this);

                    if($this.next('div').length===1)
                        $this.next('div').remove();

                    if($this.children('span:eq(0)').hasClass('to-hidden'))
                    {
                        $this.children('span:eq(1)').addClass('to-hidden');
                        $this.children('span:eq(0)').removeClass('to-hidden');

                        return;
                    }

                    var plugin=$().CBSPluginAdmin();

                    var data=
                    {
                        action		:	'<?php echo PLUGIN_CBS_CONTEXT.'_create_service_info'; ?>',
                        serviceId	:	plugin.getValueFromClass(this,'to-value-')
                    };

                    plugin.post(data,function(response)
                    {
                        var object=$(response.html);
                        object.removeClass('to-margin-top-0');
                        $this.parent().remove('.to').append(object);

                        $this.children('span:eq(0)').addClass('to-hidden');
                        $this.children('span:eq(1)').removeClass('to-hidden');
                    });
                });
            });
        </script>