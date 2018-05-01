<?php
		global $post;
		$Template=new CBSTemplatePublic();
?>
		<div<?php CBSHelper::displayCSSClassAttribute('cbs-main','cbs-clear-fix','cbs-template-public','cbs-location-'.$this->data['locationId'],'cbs-location-content-type-'.$this->data['contentType']); ?> id="<?php echo esc_attr($this->data['id']); ?>">

			<div<?php CBSHelper::displayCSSClassAttribute('cbs-notice','cbs-notice-main'); ?>>
				<div class="cbs-notice-icon cbs-meta-icon"></div>
				<div class="cbs-notice-content">
					<div class="cbs-notice-header"></div>
					<div class="cbs-notice-text"></div>
				</div>
			</div>
			
			<form<?php CBSHelper::displayCSSClassAttribute('cbs-form'); ?>>
			
				<ul<?php CBSHelper::displayCSSClassAttribute('cbs-main-list','cbs-clear-fix','cbs-list-reset'); ?>>

				
					<!-- Vehicle -->

					<li<?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item','cbs-main-list-item-vehicle-list','cbs-clear-fix'); ?>>
<?php 
		$Template->output('list-element',array
		(
			'step'																=>	$this->data['step'][0],
			'stepCount'															=>	$this->data['step']['count'],
			'header'															=>	array
			(
				__('Vehicle type',PLUGIN_CBS_DOMAIN),
			),
			'subheader'															=> array
			(
					__('Select vehicle type below.',PLUGIN_CBS_DOMAIN)
			)
		));
?>
						<div<?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item-section-content','cbs-clear-fix'); ?>>
<?PHP
		$Template->output('vehicle-list',array
		(
			'vehicle'															=>	$this->data['vehicle'],
			'vehicleSelected'													=>	$this->data['vehicleSelected'],
		));
?>
						</div>
					
					</li>

				
					<!-- Package -->
<?php
		if(in_array($this->data['locationMeta']['content_type'],array(2,3)))
		{
			$class=array('cbs-main-list-item','cbs-main-list-item-package-list','cbs-clear-fix');
			if(!count($this->data['package'])) array_push($class,'cbs-state-disable');
?>
					<li<?php CBSHelper::displayCSSClassAttribute($class); ?>>
<?php 
			$Template->output('list-element',array
			(
				'step'															=>	$this->data['step'][1],
				'stepCount'														=>	$this->data['step']['count'],
				'header'														=>	array
				(
					__('Wash packages',PLUGIN_CBS_DOMAIN)
				),
				'subheader'														=>	array
				(
					__('Which wash is best for your vehicle?',PLUGIN_CBS_DOMAIN)
				)
			));
?>
						<div<?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item-section-content','cbs-clear-fix'); ?>>
<?php
			$Template->output('package-list',array
			(
				'package'														=>	$this->data['package'],
				'currencySymbol'												=>	$this->data['currencySymbol'],
				'currencySymbolPosition'										=>	$this->data['currencySymbolPosition']
			));
?>
						</div>
						
					</li>
<?php
		}
?>
				
				
					<!-- Service -->
<?php
		$class=array('cbs-main-list-item','cbs-main-list-item-service-list','cbs-clear-fix');
		if(!count($this->data['service'])) array_push($class,'cbs-state-disable');
?>
					<li<?php CBSHelper::displayCSSClassAttribute($class); ?>>
<?php 
		$data=array
		(
			'step'																=>	$this->data['step'][2],
			'stepCount'															=>	$this->data['step']['count'],
			'header'															=>	array
			(
				__('Services menu',PLUGIN_CBS_DOMAIN),
				__('Add-on options',PLUGIN_CBS_DOMAIN)
			),
			'subheader'															=>	array
			(
				__('A la carte services menu.',PLUGIN_CBS_DOMAIN),
				__('Add services to your package.',PLUGIN_CBS_DOMAIN)
			)			
		);

		if($this->data['contentType']==1) 
			unset($data['header'][1],$data['subheader'][1]);
		if($this->data['contentType']==2) 
			unset($data['header'][0],$data['subheader'][0]);
			
		$Template->output('list-element',$data);
?>
						<div<?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item-section-content','cbs-clear-fix'); ?>>
<?php
		$Template->output('service-list',array
		(
			'service'															=>	$this->data['service'],
			'currencySymbol'													=>	$this->data['currencySymbol'],
			'currencySymbolPosition'											=>	$this->data['currencySymbolPosition'],
			'currencySeparator'													=>	$this->data['currencySeparator'],
			'currencyId'														=>	$this->data['currencyId'],
			'serviceVisibleNumber'												=>	$this->data['serviceVisibleNumber']
		));
?>
						</div>
						
					</li>
				
				
					<!-- Date and time -->
				
					<li<?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item','cbs-main-list-item-calendar','cbs-clear-fix'); ?>>
<?php 
		$Template->output('list-element',array
		(
			'step'																=>	$this->data['step'][3],
			'stepCount'															=>	$this->data['step']['count'],
			'header'															=>	array
			(
				__('Select date and time',PLUGIN_CBS_DOMAIN),
			),
			'subheader'															=>	array
			(
				__('Click on any time to make a booking.',PLUGIN_CBS_DOMAIN)
			)
		));
?>
					<div<?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item-section-content','cbs-clear-fix'); ?>>
<?php
		$Template->output('calendar',array
		(
			'date'																=>	$this->data['calendar']['date'],
			'header'															=>	$this->data['calendar']['header'],
			'hourVisibleNumber'													=>	$this->data['hourVisibleNumber']
		));
?>
						</div>
					
					</li>
				
				
					<!-- Booking summary -->
			
					<li<?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item','cbs-main-list-item-booking','cbs-clear-fix'); ?>>
<?php 
		$Template->output('list-element',array
		(
			'step'																=>	$this->data['step'][4],
			'stepCount'															=>	$this->data['step']['count'],
			'header'															=>	array
			(
				__('Booking summary',PLUGIN_CBS_DOMAIN)
			),
			'subheader'															=> array
			(
				__('Please provide us with your contact information.',PLUGIN_CBS_DOMAIN)
			),
			'contentType'														=>	$this->data['contentType']
		));
?>
						<div<?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item-section-content','cbs-clear-fix'); ?>>
<?php
		$Template->output('booking-summary',array
		(
			'currencySymbol'													=>	$this->data['currencySymbol'],
			'currencySymbolPosition'											=>	$this->data['currencySymbolPosition'],
			'currencySeparator'													=>	$this->data['currencySeparator']
		));
		
		if($this->data['enable_logging'])
		{
?>
							<div<?php CBSHelper::displayCSSClassAttribute('cbs-contact-details-options',(is_user_logged_in() ? 'cbs-state-hidden' : '')); ?>>
								<a class="cbs-button cbs-create-login-form" href="#"><?php esc_html_e('Log in',PLUGIN_CBS_DOMAIN); ?></a>
								<?php esc_html_e('or',PLUGIN_CBS_DOMAIN); ?>
								<a class="cbs-button cbs-create-contact-details-form" href="#"><?php esc_html_e('Place order',PLUGIN_CBS_DOMAIN); ?></a>
							</div>
							<div<?php CBSHelper::displayCSSClassAttribute('cbs-notice','cbs-notice-contact-details'); ?>>
								<div class="cbs-notice-icon cbs-meta-icon"></div>
								<div class="cbs-notice-content">
									<div class="cbs-notice-header"></div>
									<div class="cbs-notice-text"></div>
								</div>
							</div>
<?php
		}
?>							
							<div<?php CBSHelper::displayCSSClassAttribute('cbs-main-list-item-contact-details'); ?>>
<?php
		if($this->data['enable_logging'] && is_user_logged_in())
		{
			$Template->output('booking-user-contact-details',array
			(
				'class'															=>	'',
				'text_1'														=>	$this->data['text_1'],
				'client_address_enable'											=>	$this->data['client_address_enable'],
				'user_contact_data'												=>	$this->data['user_contact_data'],
				'client_company_name_enable'									=>	$this->data['client_company_name_enable'],
				'client_address_street_enable'									=>	$this->data['client_address_street_enable'],
				'client_address_post_code_enable'								=>	$this->data['client_address_post_code_enable'],
				'client_address_city_enable'									=>	$this->data['client_address_city_enable'],
				'client_address_state_enable'									=>	$this->data['client_address_state_enable'],
				'client_address_country_enable'									=>	$this->data['client_address_country_enable'],
				'client_message_enable'											=>	$this->data['client_message_enable'],
				'gratuity_enable'												=>	$this->data['gratuity_enable'],
				'enable_coupons'												=>	$this->data['enable_coupons'],
				'register_user'													=>	0,
			));
		}
		if(!$this->data['enable_logging'])
		{
			$Template->output('booking-form',array
			(
				'class'															=>	'',
				'text_1'														=>	$this->data['text_1'],
				'client_address_enable'											=>	$this->data['client_address_enable'],				
				'user_contact_data'												=>	$this->data['user_contact_data'],
				'client_company_name_enable'									=>	$this->data['client_company_name_enable'],
				'client_address_street_enable'									=>	$this->data['client_address_street_enable'],
				'client_address_post_code_enable'								=>	$this->data['client_address_post_code_enable'],
				'client_address_city_enable'									=>	$this->data['client_address_city_enable'],
				'client_address_state_enable'									=>	$this->data['client_address_state_enable'],
				'client_address_country_enable'									=>	$this->data['client_address_country_enable'],
				'client_message_enable'											=>	$this->data['client_message_enable'],
				'enable_coupons'												=>	$this->data['enable_coupons'],
                'gratuity_enable'												=>	$this->data['gratuity_enable'],
				'register_user'													=>	0,
			));
		}
?>		
							</div>
						</div>
						
					</li>

				</ul>
			
				<div id="cbs-preloader"></div>
				
			</form>
			
		</div>

		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				$('#<?php echo $this->data['id']; ?>').CBSPlugin({locationId:<?php echo $this->data['locationId']; ?>,pageId:<?php echo $post->ID; ?>});
			});
		</script>