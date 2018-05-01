<div class="cbs-to-tab cbs-user-contact-details">
	<ul>
		<li><a href="#cbs-current-order"><?php esc_html_e('Current Order',PLUGIN_CBS_DOMAIN); ?></a></li>
		<li><a href="#cbs-user-details"><?php esc_html_e('Your Details',PLUGIN_CBS_DOMAIN); ?></a></li>
		<li><a href="#cbs-user-log-out"><?php esc_html_e('Log Out',PLUGIN_CBS_DOMAIN); ?></a></li>
	</ul>
	<div id="cbs-current-order">
<?php
		$this->output('booking-form',array
		(
			'class'																=>	$this->data['class'],
			'text_1'															=>	$this->data['text_1'],
			'client_address_enable'												=>	$this->data['client_address_enable'],
			'user_contact_data'													=>	$this->data['user_contact_data'],
			'client_company_name_enable'										=>	$this->data['client_company_name_enable'],
			'client_address_street_enable'										=>	$this->data['client_address_street_enable'],
			'client_address_post_code_enable'									=>	$this->data['client_address_post_code_enable'],
			'client_address_city_enable'										=>	$this->data['client_address_city_enable'],
			'client_address_state_enable'										=>	$this->data['client_address_state_enable'],
			'client_address_country_enable'										=>	$this->data['client_address_country_enable'],
			'client_message_enable'												=>	$this->data['client_message_enable'],
			'gratuity_enable'													=>	$this->data['gratuity_enable'],
			'enable_coupons'													=>	$this->data['enable_coupons'],
			'register_user'														=>	0,
		));
?>
	</div>
	<div id="cbs-user-details">
<?php
		$this->output('booking-update-user',array
		(
			'class'																=>	$this->data['class'],			
			'client_address_enable'												=>	$this->data['client_address_enable'],
			'user_contact_data'													=>	$this->data['user_contact_data'],
			'client_company_name_enable'										=>	$this->data['client_company_name_enable'],
			'client_address_street_enable'										=>	$this->data['client_address_street_enable'],
			'client_address_post_code_enable'									=>	$this->data['client_address_post_code_enable'],
			'client_address_city_enable'										=>	$this->data['client_address_city_enable'],
			'client_address_state_enable'										=>	$this->data['client_address_state_enable'],
			'client_address_country_enable'										=>	$this->data['client_address_country_enable'],
		));
?>
	</div>
	<div id="cbs-user-log-out"></div>
</div>