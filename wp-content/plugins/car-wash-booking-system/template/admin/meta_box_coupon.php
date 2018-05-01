<?php 
		global $post;
		echo $this->data['nonce']; 
		$Date=new CBSDate();
		$Validation=new CBSValidation();
?>	
		<div class="to">
            <div class="ui-tabs">
                <ul>
                    <li><a href="#meta-box-coupon-1"><?php esc_html_e('General',PLUGIN_CBS_DOMAIN); ?></a></li>
                </ul>
                <div id="meta-box-coupon-1">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Coupon code',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Unique alphanumerical code, accepts only capital letters (Min: 4, Max: 12 characters).',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" maxlength="12" name="<?php CBSHelper::getFormName('coupon_code'); ?>" id="<?php CBSHelper::getFormName('coupon_code'); ?>" value="<?php echo esc_attr($this->data['meta']['coupon_code']); ?>"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Location',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Coupon will be active for selected location.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
<?php
		if(count($this->data['dictionary']['location']))
		{
?>
                                <select  name="<?php CBSHelper::getFormName('coupon_location'); ?>" id="<?php CBSHelper::getFormName('coupon_location'); ?>">
<?php
			foreach($this->data['dictionary']['location'] as $locationId=>$locationData)
			{
				
?>
                                    <option value="<?php echo esc_attr($locationId); ?>" <?php CBSHelper::selectedIf($locationId,$this->data['meta']['coupon_location']); ?>><?php echo esc_html($locationData['post']->post_title); ?></option>		
<?php
			}
?>
                                </select>
<?php
		}
?>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Usage count',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('How many times the coupon has been used.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" class="to-field-disabled" name="<?php CBSHelper::getFormName('usage_count'); ?>" id="<?php CBSHelper::getFormName('usage_count'); ?>" value="<?php echo esc_attr($this->data['meta']['usage_count']); ?>" readonly/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Usage limit',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('How many times the coupon can be used. Leave blank for unlimited.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('usage_limit'); ?>" id="<?php CBSHelper::getFormName('usage_limit'); ?>" value="<?php echo esc_attr($this->data['meta']['usage_limit']); ?>"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Discount',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Percentage discount (Min: 0, Max: 100).',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('discount'); ?>" id="<?php CBSHelper::getFormName('discount'); ?>" value="<?php echo esc_attr($this->data['meta']['discount']); ?>" maxlength="3"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Deduction',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Fixed amount.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('deduction'); ?>" id="<?php CBSHelper::getFormName('deduction'); ?>" value="<?php echo esc_attr($this->data['meta']['deduction']); ?>" maxlength="12"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Minimal price',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Note, that coupon won\'t be applied if the total value of the order will be lower than specified.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('minimal_price'); ?>" id="<?php CBSHelper::getFormName('minimal_price'); ?>" value="<?php echo esc_attr($this->data['meta']['minimal_price']); ?>" maxlength="12"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Active from',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Start date in DD-MM-YYYY format. Leave blank for no start date.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" maxlength="10" class="to-datepicker" value="<?php echo ($Validation->isNotEmpty($this->data['meta']['date_active_start']) ? esc_attr($this->data['meta']['date_active_start']) : ''); ?>" name="<?php CBSHelper::getFormName('date_active_start'); ?>" title="<?php esc_attr_e('Enter start date in format DD-MM-YYYY.',PLUGIN_CBS_DOMAIN); ?>"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Active to',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"><?php esc_html_e('End date in DD-MM-YYYY format. Leave blank for no end date.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <input type="text" maxlength="10" class="to-datepicker" value="<?php echo ($Validation->isNotEmpty($this->data['meta']['date_active_stop']) ? esc_attr($this->data['meta']['date_active_stop']) : ''); ?>" name="<?php CBSHelper::getFormName('date_active_stop'); ?>" title="<?php esc_attr_e('Enter end date in format DD-MM-YYYY.',PLUGIN_CBS_DOMAIN); ?>"/>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{	
				$('.to').themeOptionElement({init:true});
			});
		</script>
