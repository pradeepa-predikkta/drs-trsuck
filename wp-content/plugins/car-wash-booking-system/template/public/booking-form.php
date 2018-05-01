	<div class="cbs-main-list-item-section-content cbs-clear-fix <?php echo esc_attr($this->data['class']); ?>">
		<div class="cbs-clear-fix">
<?php
		$columnWidth=CBSHelper::getColumnWidth(3,array($this->data['client_company_name_enable']));
?>
			<div class="cbs-form-field cbs-form-field-first-name cbs-form-width-<?php echo $columnWidth; ?>">
				<label><?php esc_html_e('First name *',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_first_name" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['first_name']); ?>"/>
			</div>
			<div class="cbs-form-field cbs-form-field-last-name cbs-form-width-<?php echo $columnWidth; ?>">
				<label><?php esc_html_e('Last Name *',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_second_name" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['last_name']); ?>"/>
			</div>
<?php
		if($this->data['client_company_name_enable'])
		{
?>
			<div class="cbs-form-field cbs-form-field-company-name cbs-form-width-<?php echo $columnWidth; ?>">
				<label><?php esc_html_e('Company name',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_company_name" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['company_name']); ?>"/>
			</div>
<?php
		}
?>
		</div>
		<div class="cbs-clear-fix">
<?php
		if($this->data['client_address_enable'])
		{
			$columnWidth=CBSHelper::getColumnWidth(2,array($this->data['client_address_street_enable'],$this->data['client_address_post_code_enable']));
			if($this->data['client_address_street_enable'])
			{
?>	
			<div class="cbs-form-field cbs-form-field-address-street cbs-form-width-<?php echo $columnWidth; ?>">
				<label><?php esc_html_e('Street',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_address_street" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['address_street']); ?>"/>
			</div>
<?php
			}
			if($this->data['client_address_post_code_enable'])
			{
?>
			<div class="cbs-form-field cbs-form-field-address-post-code cbs-form-width-<?php echo $columnWidth; ?>">
				<label><?php esc_html_e('ZIP Code',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_address_post_code" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['address_post_code']); ?>"/>
			</div>
<?php
			}
?>
		</div>
		<div class="cbs-clear-fix">
<?php
			$columnWidth=CBSHelper::getColumnWidth(3,array($this->data['client_address_city_enable'],$this->data['client_address_state_enable'],$this->data['client_address_country_enable']));
			if($this->data['client_address_city_enable'])
			{
?>
			<div class="cbs-form-field cbs-form-field-address-city cbs-form-width-<?php echo $columnWidth; ?>">
				<label><?php esc_html_e('City',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_address_city" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['address_city']); ?>"/>
			</div>	
<?php
			}
			if($this->data['client_address_state_enable'])
			{
?>
			<div class="cbs-form-field cbs-form-field-address-state cbs-form-width-<?php echo $columnWidth; ?>">
				<label><?php esc_html_e('State',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_address_state" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['address_state']); ?>"/>
			</div>
<?php
			}
			if($this->data['client_address_country_enable'])
			{
?>
			<div class="cbs-form-field cbs-form-field-address-country cbs-form-width-<?php echo $columnWidth; ?>">
				<label><?php esc_html_e('Country',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_address_country" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['address_country']); ?>"/>
			</div>
<?php
			}
		}
?>		
		</div>
		<div class="cbs-clear-fix">
			<div class="cbs-form-field cbs-form-field-email cbs-form-width-50">
				<label><?php esc_html_e('Your E-mail *',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_email_address" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['email_address']); ?>"/>
			</div>
			<div class="cbs-form-field cbs-form-field-phone cbs-form-width-50">
				<label><?php esc_html_e('Phone Number *',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_phone_number" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['phone_number']); ?>"/>
			</div>
		</div>
		<div class="cbs-clear-fix">
			<div class="cbs-form-field cbs-form-field-model cbs-form-width-100">
				<label><?php esc_html_e('Vehicle Make and Model *',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="client_vehicle" autocomplete="off" value="<?php echo esc_attr($this->data['user_contact_data']['vehicle']); ?>"/>
			</div>
		</div>
<?php
        if($this->data['client_message_enable'])
        {
?>
		<div class="cbs-clear-fix">
			<div class="cbs-form-field cbs-form-field-message cbs-form-width-100">
				<label><?php esc_html_e('Message',PLUGIN_CBS_DOMAIN); ?></label>
				<textarea rows="1" cols="1" name="client_message"></textarea>
			</div>
		</div>
<?php
		}
        if($this->data['gratuity_enable'])
        {
?>
		<div class="cbs-clear-fix">
			<div class="cbs-form-field cbs-form-field-model cbs-form-width-100">
				<label><?php esc_html_e('Gratuity',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="gratuity" autocomplete="off" value="0.00"/>
			</div>
		</div>
<?php
        }
		if($this->data['register_user'])
		{
?>
		<div class="cbs-clear-fix">
			<div class="cbs-form-field cbs-form-field-username cbs-form-width-33 cbs-state-hidden">
				<label><?php esc_html_e('Username',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="text" name="register_username" autocomplete="off"  />
			</div>			
			<div class="cbs-form-field cbs-form-field-password cbs-form-width-33 cbs-state-hidden">
				<label><?php esc_html_e('Password',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="password" name="register_password" autocomplete="off"  />
			</div>
			<div class="cbs-form-field cbs-form-field-password-check cbs-form-width-33 cbs-state-hidden">
				<label><?php esc_html_e('Repeat password',PLUGIN_CBS_DOMAIN); ?></label>
				<input type="password" name="register_password_check" autocomplete="off"  />
			</div>
		</div>
<?php
		}
?>
		<div class="cbs-form-summary cbs-clear-fix">
<?php
		if($this->data['enable_coupons'])
		{
?>
			<div class="cbs-coupon-code cbs-clear-fix">
				<a class="cbs-show-coupon" href="#"><?php esc_html_e('Do you have a coupon code ?',PLUGIN_CBS_DOMAIN); ?></a>				
				<input type="text" name="coupon_code" autocomplete="off"/>
				<a class="cbs-button cbs-button-apply-coupon" href="#"><?php esc_html_e('Apply',PLUGIN_CBS_DOMAIN); ?></a>				
				<div class="cbs-coupon-code-success">
                    <?php esc_html_e('The provided coupon coupon is valid, total order value was reduced respectively.',PLUGIN_CBS_DOMAIN); ?><br/>
                    <?php esc_html_e('Please note that if you change your booking details then you will have to insert coupon code once again.',PLUGIN_CBS_DOMAIN); ?>
                </div>
				<div class="cbs-coupon-code-failure"><?php esc_html_e('It seems that your coupon code is invalid. Possible reasons: total price is lower than minimum price, code is incorrect, it was used too many times or it\'s no longer active.',PLUGIN_CBS_DOMAIN); ?></div>
			</div>
<?php
		}
		if($this->data['register_user'])
		{
?>			
			<div class="cbs-register cbs-clear-fix">
				<label>
					<input type="checkbox" name="register_user" value="1"><?php esc_html_e('Do you want to create an account ?',PLUGIN_CBS_DOMAIN); ?>
				</label>
			</div>
<?php
		}
		$Validation=new CBSValidation();
		if($Validation->isNotEmpty($this->data['text_1']))
		{
?>
			<div class="cbs-form-info"><?php echo nl2br(esc_html($this->data['text_1'])); ?></div>
<?php
		}
?>
			<input type="submit" class="cbs-button" value="<?php esc_attr_e('Confirm Booking',PLUGIN_CBS_DOMAIN); ?>" />
		</div>
	</div>


		
