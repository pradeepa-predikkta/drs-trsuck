<?php 
		global $post;
		echo $this->data['nonce']; 
        
		$Date=new CBSDate();
		$Validation=new CBSValidation();
?>	
		<div class="to">
            <div class="ui-tabs">
                <ul>
                    <li><a href="#meta-box-location-1"><?php esc_html_e('General',PLUGIN_CBS_DOMAIN); ?></a></li>
                    <li><a href="#meta-box-location-2"><?php esc_html_e('Date & time',PLUGIN_CBS_DOMAIN); ?></a></li>
                    <li><a href="#meta-box-location-3"><?php esc_html_e('E-mail account',PLUGIN_CBS_DOMAIN); ?></a></li>
                    <li><a href="#meta-box-location-4"><?php esc_html_e('Address',PLUGIN_CBS_DOMAIN); ?></a></li>
                    <li><a href="#meta-box-location-5"><?php esc_html_e('Payments',PLUGIN_CBS_DOMAIN); ?></a></li>
                    <li><a href="#meta-box-location-6"><?php esc_html_e('Colors',PLUGIN_CBS_DOMAIN); ?></a></li>
                </ul>
                <div id="meta-box-location-1">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Shortcode',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('In order to create a new booking system for this location simply copy the shortcode snippet from below and then paste it into the WordPress page or post.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div class="to-field-disabled"><?php echo '['.PLUGIN_CBS_CONTEXT.'_location location_id="'.$post->ID.'"]'; ?></div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Displaying content',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Specify how services are displayed.',PLUGIN_CBS_DOMAIN); ?><br/>
                                <?php esc_html_e('Services, will display all services and will not display packages.',PLUGIN_CBS_DOMAIN); ?><br/>
                                <?php esc_html_e('Packages, will display packages and related services only.',PLUGIN_CBS_DOMAIN); ?><br/>
                                <?php esc_html_e('Packages and Services will display both packages and all services.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div class="to-radio-button">
<?php
		foreach($this->data['dictionary']['contentType'] as $contentTypeIndex=>$contentTypeData)
		{
?>
                                <input type="radio" value="<?php echo esc_attr($contentTypeIndex); ?>" id="<?php CBSHelper::getFormName('content_type_'.$contentTypeIndex); ?>" name="<?php CBSHelper::getFormName('content_type'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['content_type'],$contentTypeIndex); ?>/>
                                <label for="<?php CBSHelper::getFormName('content_type_'.$contentTypeIndex); ?>"><?php echo esc_html($contentTypeData[0]); ?></label>							
<?php		
		}
?>
                            </div>				
                        </li>
                        <li>
                            <h5><?php esc_html_e('Currency',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Select currency.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <select name="<?php CBSHelper::getFormName('currency'); ?>" id="<?php CBSHelper::getFormName('currency'); ?>">
<?php
		foreach($this->data['dictionary']['currency'] as $currencyIndex=>$currencyData)
		{
?>
                                    <option value="<?php echo esc_attr($currencyIndex); ?>" <?php CBSHelper::selectedIf($currencyIndex,$this->data['meta']['currency']); ?>><?php echo esc_html($currencyData['name']).' ('.$currencyData['symbol'].')'; ?></option>
<?php		
		}
?>
                                </select>	
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Number of slots',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('The number of slots (carwash posts) in which services can be provided.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" maxlength="3" name="<?php CBSHelper::getFormName('slot_number'); ?>" id="<?php CBSHelper::getFormName('slot_number'); ?>" value="<?php echo esc_attr($this->data['meta']['slot_number']); ?>"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Number of services to display',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Specify how many services will be shown when the page first loads with "Show More" button at the bottom of the list. Enter "0" to display all services by default.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" maxlength="3" name="<?php CBSHelper::getFormName('service_visible_number'); ?>" id="<?php CBSHelper::getFormName('service_visible_number'); ?>" value="<?php echo esc_attr($this->data['meta']['service_visible_number']); ?>"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Number of time slots to display',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Specify how many time slots will be shown in calendar when the page first loads with "Show More" button at the bottom of the list. Enter "0" to display all time slots by default.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" maxlength="3" name="<?php CBSHelper::getFormName('hour_visible_number'); ?>" id="<?php CBSHelper::getFormName('hour_visible_number'); ?>" value="<?php echo esc_attr($this->data['meta']['hour_visible_number']); ?>"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Reset form',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Reset (clear) form values after successful submission.',PLUGIN_CBS_DOMAIN); ?>
                            </span>
                            <div class="to-radio-button">
                                <input type="radio" value="1" id="<?php CBSHelper::getFormName('reset_form_enable_1'); ?>" name="<?php CBSHelper::getFormName('reset_form_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['reset_form_enable'],1); ?>/>
                                <label for="<?php CBSHelper::getFormName('reset_form_enable_1'); ?>"><?php esc_html_e('Yes',PLUGIN_CBS_DOMAIN); ?></label>							
                                <input type="radio" value="0" id="<?php CBSHelper::getFormName('reset_form_enable_0'); ?>" name="<?php CBSHelper::getFormName('reset_form_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['reset_form_enable'],0); ?>/>
                                <label for="<?php CBSHelper::getFormName('reset_form_enable_0'); ?>"><?php esc_html_e('No',PLUGIN_CBS_DOMAIN); ?></label>							
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Summary text',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Summary text (displayed above "Submit" button).',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <textarea cols="1" rows="0" name="<?php CBSHelper::getFormName('text_1'); ?>" id="<?php CBSHelper::getFormName('text_1'); ?>" ><?php echo nl2br(esc_html($this->data['meta']['text_1'])); ?></textarea>
                            </div>
                        </li>				
                        <li>
                            <h5><?php esc_html_e('Client address',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Collect client address details. Visibility of specific fields can be controlled in "Form Fields" section located below.',PLUGIN_CBS_DOMAIN); ?>
                            </span>
                            <div class="to-radio-button">
                                <input type="radio" value="1" id="<?php CBSHelper::getFormName('client_address_enable_1'); ?>" name="<?php CBSHelper::getFormName('client_address_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_enable'],1); ?>/>
                                <label for="<?php CBSHelper::getFormName('client_address_enable_1'); ?>"><?php esc_html_e('Yes',PLUGIN_CBS_DOMAIN); ?></label>							
                                <input type="radio" value="0" id="<?php CBSHelper::getFormName('client_address_enable_0'); ?>" name="<?php CBSHelper::getFormName('client_address_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_enable'],0); ?>/>
                                <label for="<?php CBSHelper::getFormName('client_address_enable_0'); ?>"><?php esc_html_e('No',PLUGIN_CBS_DOMAIN); ?></label>							
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Enable user logging',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Whether users can register and login.',PLUGIN_CBS_DOMAIN); ?>
                            </span>
                            <div class="to-radio-button">
                                <input type="radio" value="1" id="<?php CBSHelper::getFormName('enable_logging_1'); ?>" name="<?php CBSHelper::getFormName('enable_logging'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['enable_logging'],1); ?>/>
                                <label for="<?php CBSHelper::getFormName('enable_logging_1'); ?>"><?php esc_html_e('Yes',PLUGIN_CBS_DOMAIN); ?></label>							
                                <input type="radio" value="0" id="<?php CBSHelper::getFormName('enable_logging_0'); ?>" name="<?php CBSHelper::getFormName('enable_logging'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['enable_logging'],0); ?>/>
                                <label for="<?php CBSHelper::getFormName('enable_logging_0'); ?>"><?php esc_html_e('No',PLUGIN_CBS_DOMAIN); ?></label>							
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Enable coupons',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Whether location supports coupon codes.',PLUGIN_CBS_DOMAIN); ?>
                            </span>
                            <div class="to-radio-button">
                                <input type="radio" value="1" id="<?php CBSHelper::getFormName('enable_coupons_1'); ?>" name="<?php CBSHelper::getFormName('enable_coupons'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['enable_coupons'],1); ?>/>
                                <label for="<?php CBSHelper::getFormName('enable_coupons_1'); ?>"><?php esc_html_e('Yes',PLUGIN_CBS_DOMAIN); ?></label>							
                                <input type="radio" value="0" id="<?php CBSHelper::getFormName('enable_coupons_0'); ?>" name="<?php CBSHelper::getFormName('enable_coupons'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['enable_coupons'],0); ?>/>
                                <label for="<?php CBSHelper::getFormName('enable_coupons_0'); ?>"><?php esc_html_e('No',PLUGIN_CBS_DOMAIN); ?></label>							
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Form Fields',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Specify which form fields should be visible.',PLUGIN_CBS_DOMAIN); ?><br/>						
                            </span>
                            <div class="to-overflow-y">
                                <table class="to-table">
                                    <thead>
                                        <tr>
                                            <th width="50%">
                                                <div>
                                                    <?php esc_html_e('Form Field',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Form field',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th width="50%">
                                                <div>
                                                    <?php esc_html_e('Field Status',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Whether field is visible or not',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php esc_html_e('Company name',PLUGIN_CBS_DOMAIN); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-checkbox-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('client_company_name_enable_1'); ?>" name="<?php CBSHelper::getFormName('client_company_name_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_company_name_enable'],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_company_name_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('client_company_name_enable_0'); ?>" name="<?php CBSHelper::getFormName('client_company_name_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_company_name_enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_company_name_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>	
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php esc_html_e('Street',PLUGIN_CBS_DOMAIN); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-checkbox-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('client_address_street_enable_1'); ?>" name="<?php CBSHelper::getFormName('client_address_street_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_street_enable'],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_street_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('client_address_street_enable_0'); ?>" name="<?php CBSHelper::getFormName('client_address_street_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_street_enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_street_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php esc_html_e('ZIP Code',PLUGIN_CBS_DOMAIN); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-checkbox-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('client_address_post_code_enable_1'); ?>" name="<?php CBSHelper::getFormName('client_address_post_code_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_post_code_enable'],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_post_code_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('client_address_post_code_enable_0'); ?>" name="<?php CBSHelper::getFormName('client_address_post_code_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_post_code_enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_post_code_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php esc_html_e('City',PLUGIN_CBS_DOMAIN); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-checkbox-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('client_address_city_enable_1'); ?>" name="<?php CBSHelper::getFormName('client_address_city_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_city_enable'],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_city_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('client_address_city_enable_0'); ?>" name="<?php CBSHelper::getFormName('client_address_city_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_city_enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_city_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php esc_html_e('State',PLUGIN_CBS_DOMAIN); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-checkbox-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('client_address_state_enable_1'); ?>" name="<?php CBSHelper::getFormName('client_address_state_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_state_enable'],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_state_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('client_address_state_enable_0'); ?>" name="<?php CBSHelper::getFormName('client_address_state_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_state_enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_state_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php esc_html_e('Country',PLUGIN_CBS_DOMAIN); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-checkbox-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('client_address_country_enable_1'); ?>" name="<?php CBSHelper::getFormName('client_address_country_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_country_enable'],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_country_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('client_address_country_enable_0'); ?>" name="<?php CBSHelper::getFormName('client_address_country_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_address_country_enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_address_country_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php esc_html_e('Message',PLUGIN_CBS_DOMAIN); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-checkbox-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('client_message_enable_1'); ?>" name="<?php CBSHelper::getFormName('client_message_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_message_enable'],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_message_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('client_message_enable_0'); ?>" name="<?php CBSHelper::getFormName('client_message_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['client_message_enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('client_message_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php esc_html_e('Gratuity',PLUGIN_CBS_DOMAIN); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="to-clear-fix">
                                                    <div class="to-checkbox-button">
                                                        <input type="radio" value="1" id="<?php CBSHelper::getFormName('gratuity_enable_1'); ?>" name="<?php CBSHelper::getFormName('gratuity_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['gratuity_enable'],1); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('gratuity_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                        <input type="radio" value="0" id="<?php CBSHelper::getFormName('gratuity_enable_0'); ?>" name="<?php CBSHelper::getFormName('gratuity_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['gratuity_enable'],0); ?>/>
                                                        <label for="<?php CBSHelper::getFormName('gratuity_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>	
                        </li>
                    </ul>
                </div>
                <div id="meta-box-location-2">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Business hours',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Specify working days / hours (in HH:MM time format).',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <table class="to-table">
                                    <tr>
                                        <th style="width:20%">
                                            <div>
                                                <?php esc_html_e('Weekday',PLUGIN_CBS_DOMAIN); ?>
                                                <span class="to-legend">
                                                    <?php esc_html_e('Day of the week',PLUGIN_CBS_DOMAIN); ?>
                                                </span>
                                            </div>
                                        </th>
                                        <th style="width:25%">
                                            <div>
                                                <?php esc_html_e('Start Time',PLUGIN_CBS_DOMAIN); ?>
                                                <span class="to-legend">
                                                    <?php esc_html_e('Start time in HH:MM time format',PLUGIN_CBS_DOMAIN); ?>
                                                </span>
                                            </div>
                                        </th>
                                        <th style="width:25%">
                                            <div>
                                                <?php esc_html_e('End Time',PLUGIN_CBS_DOMAIN); ?>
                                                <span class="to-legend">
                                                    <?php esc_html_e('End time in HH:MM time format',PLUGIN_CBS_DOMAIN); ?>
                                                </span>
                                            </div>
                                        </th>
                                        <th style="width:30%">
                                            <div>
                                                <?php esc_html_e('Breaks',PLUGIN_CBS_DOMAIN); ?>
                                                <span class="to-legend">
                                                    <?php esc_html_e('Span hours (in format HH:MM-HH:MM) separated by semicolon. E.g: 09:00-11:00;14:00-15:00',PLUGIN_CBS_DOMAIN); ?>
                                                </span>
                                            </div>
                                        </th>
                                    </tr>
<?php
        for($i=1;$i<8;$i++)
        {
            $breakHour=null;
            if(isset($this->data['meta']['break_hour'][$i]))
            {
                foreach($this->data['meta']['break_hour'][$i] as $index=>$value)
                {
                    if($Validation->isNotEmpty($breakHour)) $breakHour.=';';
                    $breakHour.=$value['start'].'-'.$value['stop'];
                }
            }
?>
                                    <tr>
                                        <td>
                                            <div><?php echo $Date->getDayName($i); ?></div>
                                        </td>
                                        <td>
                                            <div>
                                                <input type="text" class="to-timepicker" maxlength="5" name="<?php CBSHelper::getFormName('business_hour_'.$i.'_start'); ?>" id="<?php CBSHelper::getFormName('business_hour_'.$i.'_start'); ?>" value="<?php echo esc_attr($this->data['meta']['business_hour'][$i]['start']); ?>" title="<?php esc_attr_e('Enter start time in format HH:MM.',PLUGIN_CBS_DOMAIN); ?>"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div>								
                                                <input type="text" class="to-timepicker" maxlength="5" name="<?php CBSHelper::getFormName('business_hour_'.$i.'_stop'); ?>" id="<?php CBSHelper::getFormName('business_hour_'.$i.'_stop'); ?>" value="<?php echo esc_attr($this->data['meta']['business_hour'][$i]['stop']); ?>" title="<?php esc_attr_e('Enter end time in format HH:MM.',PLUGIN_CBS_DOMAIN); ?>"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div>	
                                                <input type="text" name="<?php CBSHelper::getFormName('break_hour_'.$i); ?>" id="<?php CBSHelper::getFormName('break_hour_'.$i); ?>" value="<?php echo esc_attr($breakHour); ?>" title="<?php esc_attr_e('Enter end time in format HH:MM.',PLUGIN_CBS_DOMAIN); ?>"/>
                                            </div>
                                        </td>
                                    </tr>
<?php
        }
?>
                                </table>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Exclude dates',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Specify dates not available for booking. Past (or invalid date ranges) will be removed when saving.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>	
                                <table class="to-table" id="to-table-date-exclude">
                                    <tr>
                                        <th style="width:40%">
                                            <div>
                                                <?php esc_html_e('Start Date',PLUGIN_CBS_DOMAIN); ?>
                                                <span class="to-legend">
                                                    <?php esc_html_e('Start date in DD-MM-YYYY format',PLUGIN_CBS_DOMAIN); ?>
                                                </span>
                                            </div>
                                        </th>
                                        <th style="width:40%">
                                            <div>
                                                <?php esc_html_e('End Date',PLUGIN_CBS_DOMAIN); ?>
                                                <span class="to-legend">
                                                    <?php esc_html_e('End date in DD-MM-YYYY format',PLUGIN_CBS_DOMAIN); ?>
                                                </span>
                                            </div>
                                        </th>
                                        <th style="width:20%">
                                            <div>
                                                <?php esc_html_e('Remove',PLUGIN_CBS_DOMAIN); ?>
                                                <span class="to-legend">
                                                    <?php esc_html_e('Remove this entry',PLUGIN_CBS_DOMAIN); ?>
                                                </span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr class="to-hidden">
                                        <td>
                                            <div>
                                                <input type="text" maxlength="10" class="to-datepicker" name="<?php CBSHelper::getFormName('date_exclude_start[]'); ?>" title="<?php esc_attr_e('Enter start date in format DD-MM-YYYY.',PLUGIN_CBS_DOMAIN); ?>"/>
                                            </div>									
                                        </td>
                                        <td>
                                            <div>
                                                <input type="text" maxlength="10" class="to-datepicker" name="<?php CBSHelper::getFormName('date_exclude_stop[]'); ?>" title="<?php esc_attr_e('Enter start date in format DD-MM-YYYY.',PLUGIN_CBS_DOMAIN); ?>"/>
                                            </div>									
                                        </td>	
                                        <td>
                                            <div>
                                                <a href="#" class="to-table-button-remove"><?php esc_html_e('Remove',PLUGIN_CBS_DOMAIN); ?></a>
                                            </div>
                                        </td>
                                    </tr>
<?php
        if(count($this->data['meta']['date_exclude']))
        {
            foreach($this->data['meta']['date_exclude'] as $dateExcludeIndex=>$dateExcludeValue)
            {
?>
                                    <tr>
                                        <td>
                                            <div>
                                                <input type="text" maxlength="10" class="to-datepicker" value="<?php echo esc_attr($Date->reverse($dateExcludeValue['start'])); ?>" name="<?php CBSHelper::getFormName('date_exclude_start[]'); ?>" title="<?php esc_attr_e('Enter start date in format DD-MM-YYYY.',PLUGIN_CBS_DOMAIN); ?>"/>
                                            </div>									
                                        </td>
                                        <td>
                                            <div>
                                                <input type="text" maxlength="10" class="to-datepicker" value="<?php echo esc_attr($Date->reverse($dateExcludeValue['stop'])); ?>" name="<?php CBSHelper::getFormName('date_exclude_stop[]'); ?>" title="<?php esc_attr_e('Enter start date in format DD-MM-YYYY.',PLUGIN_CBS_DOMAIN); ?>"/>
                                            </div>									
                                        </td>	
                                        <td>
                                            <div>
                                                <a href="#" class="to-table-button-remove"><?php esc_html_e('Remove',PLUGIN_CBS_DOMAIN); ?></a>
                                            </div>
                                        </td>
                                    </tr>							
<?php
            }
        }
?>
                                </table>
                                <div> 
                                    <a href="#" class="to-table-button-add"><?php esc_html_e('Add',PLUGIN_CBS_DOMAIN); ?></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Time format',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Select the time format to be displayed in calendar.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div class="to-radio-button">
<?php
        foreach($Date->timeFormat as $timeFormatIndex=>$timeFormatData)
        {
?>
                                <input type="radio" value="<?php echo esc_attr($timeFormatIndex); ?>" id="<?php CBSHelper::getFormName('booking_time_format_'.$timeFormatIndex); ?>" name="<?php CBSHelper::getFormName('booking_time_format'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['booking_time_format'],$timeFormatIndex); ?>/>
                                <label for="<?php CBSHelper::getFormName('booking_time_format_'.$timeFormatIndex); ?>"><?php echo esc_html($timeFormatData[0]); ?></label>							
<?php
        }
?>
                            </div>
                        </li>	
                        <li>
                            <h5><?php esc_html_e('Date format',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php echo sprintf(esc_html('Select the date format to be displayed in summary. More info you can find here %s.',PLUGIN_CBS_DOMAIN),'<a href="https://codex.wordpress.org/Formatting_Date_and_Time">Formatting Date and Time</a>'); ?></span>
                            <div>
                                <input type="text" maxlength="255" name="<?php CBSHelper::getFormName('booking_date_format'); ?>" id="<?php CBSHelper::getFormName('booking_date_format'); ?>" value="<?php echo esc_attr($this->data['meta']['booking_date_format']); ?>"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Booking slot size',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Value in minutes, e.g. 30 min slots will show open slots at 8:00, 8:30, 9:00 etc.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" maxlength="3" name="<?php CBSHelper::getFormName('booking_time_interval'); ?>" id="<?php CBSHelper::getFormName('booking_time_interval'); ?>" value="<?php echo esc_attr($this->data['meta']['booking_time_interval']); ?>"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Advance booking period',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Allow booking up to this number of days in advance.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" maxlength="3" name="<?php CBSHelper::getFormName('booking_day_count'); ?>" id="<?php CBSHelper::getFormName('booking_day_count'); ?>" value="<?php echo esc_attr($this->data['meta']['booking_day_count']); ?>"/>
                            </div>
                        </li>				
                    </ul>                    
                </div>
                <div id="meta-box-location-3">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Sender',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Sender account.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Name:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('sender_name'); ?>" id="<?php CBSHelper::getFormName('sender_name'); ?>" value="<?php echo esc_attr($this->data['meta']['sender_name']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('E-mail address:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('sender_email'); ?>" id="<?php CBSHelper::getFormName('sender_email'); ?>" value="<?php echo esc_attr($this->data['meta']['sender_email']); ?>"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('SMTP Auth',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('SMTP authentication settings.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Status:',PLUGIN_CBS_DOMAIN); ?></span>
                                <div class="to-radio-button">
                                    <input type="radio" value="1" id="<?php CBSHelper::getFormName('sender_smtp_enable_1'); ?>" name="<?php CBSHelper::getFormName('sender_smtp_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['sender_smtp_enable'],1); ?>/>
                                    <label for="<?php CBSHelper::getFormName('sender_smtp_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>
                                    <input type="radio" value="0" id="<?php CBSHelper::getFormName('sender_smtp_enable_0'); ?>" name="<?php CBSHelper::getFormName('sender_smtp_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['sender_smtp_enable'],0); ?>/>
                                    <label for="<?php CBSHelper::getFormName('sender_smtp_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>							
                                </div>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Username:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('sender_smtp_username'); ?>" id="<?php CBSHelper::getFormName('sender_smtp_username'); ?>" value="<?php echo esc_attr($this->data['meta']['sender_smtp_username']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Password:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="password" name="<?php CBSHelper::getFormName('sender_smtp_password'); ?>" id="<?php CBSHelper::getFormName('sender_smtp_password'); ?>" value="<?php echo esc_attr($this->data['meta']['sender_smtp_password']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Host:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('sender_smtp_host'); ?>" id="<?php CBSHelper::getFormName('sender_smtp_host'); ?>" value="<?php echo esc_attr($this->data['meta']['sender_smtp_host']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Port:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('sender_smtp_port'); ?>" id="<?php CBSHelper::getFormName('sender_smtp_port'); ?>" value="<?php echo esc_attr($this->data['meta']['sender_smtp_port']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Connection type:',PLUGIN_CBS_DOMAIN); ?></span>
                                <div class="to-radio-button">
<?php
        foreach($this->data['dictionary']['secureConnectionType'] as $secureConnectionTypeIndex=>$secureConnectionTypeData)
        {
?>
                                    <input type="radio" value="<?php echo esc_attr($secureConnectionTypeIndex); ?>" id="<?php CBSHelper::getFormName('sender_smtp_secure_connection_type_'.$secureConnectionTypeIndex); ?>" name="<?php CBSHelper::getFormName('sender_smtp_secure_connection_type'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['sender_smtp_secure_connection_type'],$secureConnectionTypeIndex); ?>/>
                                    <label for="<?php CBSHelper::getFormName('sender_smtp_secure_connection_type_'.$secureConnectionTypeIndex); ?>"><?php echo esc_html($secureConnectionTypeData[0]); ?></label>							
<?php		
        }
?>                                    
                                </div>
                            </div>
                            <div>
                                <span class="to-legend-field">
                                    <?php esc_html_e('Debugging (you can check result of debugging in Chrome/Firebug console - after submit form).',PLUGIN_CBS_DOMAIN); ?>
                                </span>
                                <div class="to-radio-button">
                                    <input type="radio" value="1" id="<?php CBSHelper::getFormName('smtp_debug_enable_1'); ?>" name="<?php CBSHelper::getFormName('smtp_debug_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['smtp_debug_enable'],1); ?>/>
                                    <label for="<?php CBSHelper::getFormName('smtp_debug_enable_1'); ?>"><?php esc_html_e('Enabled',PLUGIN_CBS_DOMAIN); ?></label>							
                                    <input type="radio" value="0" id="<?php CBSHelper::getFormName('smtp_debug_enable_0'); ?>" name="<?php CBSHelper::getFormName('smtp_debug_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['smtp_debug_enable'],0); ?>/>
                                    <label for="<?php CBSHelper::getFormName('smtp_debug_enable_0'); ?>"><?php esc_html_e('Disabled',PLUGIN_CBS_DOMAIN); ?></label>							
                                </div>                                
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Recipient e-mail addresses',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Recipient e-mail addresses separated by semicolon.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('recipient_email'); ?>" id="<?php CBSHelper::getFormName('recipient_email'); ?>" value="<?php echo esc_attr($this->data['meta']['recipient_email']); ?>"/>
                            </div>
                        </li>
                    </ul>                    
                </div>
                <div id="meta-box-location-4">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Location address',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Location address.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Name:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('address_name'); ?>" id="<?php CBSHelper::getFormName('address_name'); ?>" value="<?php echo esc_attr($this->data['meta']['address_name']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Street:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('address_street'); ?>" id="<?php CBSHelper::getFormName('address_street'); ?>" value="<?php echo esc_attr($this->data['meta']['address_street']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Postcode:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('address_postcode'); ?>" id="<?php CBSHelper::getFormName('address_postcode'); ?>" value="<?php echo esc_attr($this->data['meta']['address_postcode']); ?>"/>
                            </div>                            
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('City:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('address_city'); ?>" id="<?php CBSHelper::getFormName('address_city'); ?>" value="<?php echo esc_attr($this->data['meta']['address_city']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('State:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('address_state'); ?>" id="<?php CBSHelper::getFormName('address_state'); ?>" value="<?php echo esc_attr($this->data['meta']['address_state']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Country:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('address_country'); ?>" id="<?php CBSHelper::getFormName('address_country'); ?>" value="<?php echo esc_attr($this->data['meta']['address_country']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Phone number:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('address_phone_number'); ?>" id="<?php CBSHelper::getFormName('address_phone_number'); ?>" value="<?php echo esc_attr($this->data['meta']['address_phone_number']); ?>"/>
                            </div> 
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Fax number:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('address_fax_number'); ?>" id="<?php CBSHelper::getFormName('address_fax_number'); ?>" value="<?php echo esc_attr($this->data['meta']['address_fax_number']); ?>"/>
                            </div>   
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('E-mail address:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('address_email_address'); ?>" id="<?php CBSHelper::getFormName('address_email_address'); ?>" value="<?php echo esc_attr($this->data['meta']['address_email_address']); ?>"/>
                            </div>                               
                        </li>
                        <li>
                            <h5><?php esc_html_e('Coordinates',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Coordinates (in order: latitude, longitude) of location.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Latitude:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('coordinate_latitude'); ?>" id="<?php CBSHelper::getFormName('coordinate_latitude'); ?>" value="<?php echo esc_attr($this->data['meta']['coordinate_latitude']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Longitude:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('coordinate_longitude'); ?>" id="<?php CBSHelper::getFormName('coordinate_longitude'); ?>" value="<?php echo esc_attr($this->data['meta']['coordinate_longitude']); ?>"/>
                            </div>
                        </li>
                    </ul>                    
                </div>
                <div id="meta-box-location-5">
					<ul class="to-form-field-list">
						<li>
							<h5><?php esc_html_e('PayPal',PLUGIN_CBS_DOMAIN); ?></h5>
							<span class="to-legend"><?php esc_html_e('PayPal settings.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Status:',PLUGIN_CBS_DOMAIN); ?></span>
                                <div class="to-radio-button">
                                    <input type="radio" value="1" id="<?php CBSHelper::getFormName('payment_paypal_enable_1'); ?>" name="<?php CBSHelper::getFormName('payment_paypal_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['payment_paypal_enable'],1); ?>/>
                                    <label for="<?php CBSHelper::getFormName('payment_paypal_enable_1'); ?>"><?php esc_html_e('Enable',PLUGIN_CBS_DOMAIN); ?></label>							
                                    <input type="radio" value="0" id="<?php CBSHelper::getFormName('payment_paypal_enable_0'); ?>" name="<?php CBSHelper::getFormName('payment_paypal_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['payment_paypal_enable'],0); ?>/>
                                    <label for="<?php CBSHelper::getFormName('payment_paypal_enable_0'); ?>"><?php esc_html_e('Disable',PLUGIN_CBS_DOMAIN); ?></label>							
                                </div>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Business e-mail address:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('payment_paypal_email_address'); ?>" id="<?php CBSHelper::getFormName('payment_paypal_email_address'); ?>" value="<?php echo esc_attr($this->data['meta']['payment_paypal_email_address']); ?>"/>
                            </div>
						</li>
						<li>
							<h5><?php esc_html_e('Stripe',PLUGIN_CBS_DOMAIN); ?></h5>
							<span class="to-legend"><?php esc_html_e('Stripe settings.',PLUGIN_CBS_DOMAIN); ?></span>
							<div>	
                                <span class="to-legend-field"><?php esc_html_e('Status:',PLUGIN_CBS_DOMAIN); ?></span>
                                <div class="to-radio-button">
                                    <input type="radio" value="1" id="<?php CBSHelper::getFormName('payment_stripe_enable_1'); ?>" name="<?php CBSHelper::getFormName('payment_stripe_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['payment_stripe_enable'],1); ?>/>
                                    <label for="<?php CBSHelper::getFormName('payment_stripe_enable_1'); ?>"><?php esc_html_e('Enable',PLUGIN_CBS_DOMAIN); ?></label>							
                                    <input type="radio" value="0" id="<?php CBSHelper::getFormName('payment_stripe_enable_0'); ?>" name="<?php CBSHelper::getFormName('payment_stripe_enable'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['payment_stripe_enable'],0); ?>/>
                                    <label for="<?php CBSHelper::getFormName('payment_stripe_enable_0'); ?>"><?php esc_html_e('Disable',PLUGIN_CBS_DOMAIN); ?></label>							
                                </div>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Secret key:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" name="<?php CBSHelper::getFormName('payment_stripe_secret_key'); ?>" id="<?php CBSHelper::getFormName('payment_stripe_secret_key'); ?>" value="<?php echo esc_attr($this->data['meta']['payment_stripe_secret_key']); ?>"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Publishable key:',PLUGIN_CBS_DOMAIN); ?></span>
                              	<input type="text" name="<?php CBSHelper::getFormName('payment_stripe_publishable_key'); ?>" id="<?php CBSHelper::getFormName('payment_stripe_publishable_key'); ?>" value="<?php echo esc_attr($this->data['meta']['payment_stripe_publishable_key']); ?>"/>
                            </div>
						</li>
					</ul>                    
                </div>
                <div id="meta-box-location-6">
                    <ul class="to-form-field-list">
<?php
		$text=array
		(
			__('Main color scheme'),
			__('Secondary color scheme',PLUGIN_CBS_DOMAIN),
			__('Heading text',PLUGIN_CBS_DOMAIN),
			__('Body text',PLUGIN_CBS_DOMAIN),
			__('Subtle body text',PLUGIN_CBS_DOMAIN),
			__('Border',PLUGIN_CBS_DOMAIN),
			__('Inactive step background',PLUGIN_CBS_DOMAIN),
			__('Inactive step text',PLUGIN_CBS_DOMAIN),
			__('Inactive body text',PLUGIN_CBS_DOMAIN),
			__('Icon',PLUGIN_CBS_DOMAIN)
		);

		for($i=1;$i<=$this->data['colorCount'];$i++)
		{
?>
                        <li>
                            <h5><?php echo $text[$i-1]; ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Select color in HEX format for elements in this group. Leave the field blank to use the default color.',PLUGIN_CBS_DOMAIN); ?><br/>
                                <?php echo sprintf(esc_html__('More info about colors you can find %shere%s.',PLUGIN_CBS_DOMAIN),'<a href="'.PLUGIN_CBS_MEDIA_URL.'image/admin/color.png" target="_blank">','</a>'); ?>
                            </span>
                            <div>
                                <input type="text" class="to-color-picker" name="<?php CBSHelper::getFormName('color_'.$i); ?>" id="<?php CBSHelper::getFormName('color_'.$i); ?>" value="<?php echo esc_attr($this->data['meta']['color'][$i]); ?>"/>
                            </div>
                        </li>
<?php
		}
?>
                    </ul>                    
                </div>
            </div>
        </div>
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{	
				$('.to').themeOptionElement({init:true});
				$('#to-table-date-exclude').table();
			});
		</script>
