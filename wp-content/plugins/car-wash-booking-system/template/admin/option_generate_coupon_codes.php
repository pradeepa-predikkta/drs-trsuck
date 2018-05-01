		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Generate coupon codes',PLUGIN_CBS_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('To generate multiple coupon codes please fill form below.',PLUGIN_CBS_DOMAIN); ?><br/>
				</span>
			</li>
			<li>
				<h5><?php esc_html_e('Location',PLUGIN_CBS_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Coupon will be active for selected location.',PLUGIN_CBS_DOMAIN); ?></span>
				<div>
<?php
        if(count($this->data['dictionary']['location']))
        {
?>
					<select name="<?php CBSHelper::getFormName('coupon_location'); ?>" id="<?php CBSHelper::getFormName('coupon_location'); ?>">
<?php
            foreach($this->data['dictionary']['location'] as $locationId=>$locationData)
            {
?>
						<option value="<?php echo esc_attr($locationId); ?>"><?php echo esc_html($locationData['post']->post_title); ?></option>		
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
				<h5><?php esc_html_e('Count',PLUGIN_CBS_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('How many coupon codes should be generated (Min: 1, Max: 1,000).',PLUGIN_CBS_DOMAIN); ?><br/>
				</span>
				<div class="to-clear-fix">
					<input type="text" name="<?php CBSHelper::getFormName('count'); ?>" id="<?php CBSHelper::getFormName('count'); ?>" value="1"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Usage limit',PLUGIN_CBS_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('How many times the coupon can be used. Leave blank for unlimited.',PLUGIN_CBS_DOMAIN); ?><br/>
				</span>
				<div class="to-clear-fix">
					<input type="text" name="<?php CBSHelper::getFormName('usage_limit'); ?>" id="<?php CBSHelper::getFormName('usage_limit'); ?>" value=""/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Discount',PLUGIN_CBS_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('Percentage discount (Min: 0, Max: 100).',PLUGIN_CBS_DOMAIN); ?><br/>
				</span>
				<div class="to-clear-fix">
					<input type="text" name="<?php CBSHelper::getFormName('discount'); ?>" id="<?php CBSHelper::getFormName('discount'); ?>" value="0"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Deduction',PLUGIN_CBS_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('Fixed amount.',PLUGIN_CBS_DOMAIN); ?><br/>
				</span>
				<div class="to-clear-fix">
					<input type="text" name="<?php CBSHelper::getFormName('deduction'); ?>" id="<?php CBSHelper::getFormName('deduction'); ?>" value="0"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Minimal price',PLUGIN_CBS_DOMAIN); ?></h5>
				<span class="to-legend"><?php esc_html_e('Note, that coupon won\'t be applied if the total value of the order will be lower than specified.',PLUGIN_CBS_DOMAIN); ?></span>
				<div>
					<input type="text" name="<?php CBSHelper::getFormName('minimal_price'); ?>" id="<?php CBSHelper::getFormName('minimal_price'); ?>" value="0" maxlength="12"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Active from',PLUGIN_CBS_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('Start date in DD-MM-YYYY format. Leave blank for no start date.',PLUGIN_CBS_DOMAIN); ?><br/>
				</span>
				<div class="to-clear-fix">
					<input type="text" maxlength="10" class="to-datepicker" value="" name="<?php CBSHelper::getFormName('date_active_start'); ?>" title="<?php esc_attr_e('Enter start date in format DD-MM-YYYY.',PLUGIN_CBS_DOMAIN); ?>"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Active to',PLUGIN_CBS_DOMAIN); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('End date in DD-MM-YYYY format. Leave blank for no end date.',PLUGIN_CBS_DOMAIN); ?><br/>
				</span>
				<div class="to-clear-fix">
					<input type="text" maxlength="10" class="to-datepicker" value="" name="<?php CBSHelper::getFormName('date_active_stop'); ?>" title="<?php esc_attr_e('Enter end date in format DD-MM-YYYY.',PLUGIN_CBS_DOMAIN); ?>"/>
				</div>
			</li>
			<li>
				<input type="button" name="<?php CBSHelper::getFormName('generate_coupon_codes'); ?>" id="<?php CBSHelper::getFormName('generate_coupon_codes'); ?>" class="to-button to-margin-0" value="<?php esc_attr_e('Generate',PLUGIN_CBS_DOMAIN); ?>"/>
			</li>
		</ul>
		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				$('#<?php CBSHelper::getFormName('generate_coupon_codes'); ?>').bind('click',function(e) 
				{
					e.preventDefault();
					$('#action').val('<?php echo PLUGIN_CBS_CONTEXT.'_option_page_generate_coupon_codes'; ?>');
					$('#to_form').submit();
					$('#action').val('<?php echo PLUGIN_CBS_CONTEXT.'_option_page_save'; ?>');
				});
			});
		</script>