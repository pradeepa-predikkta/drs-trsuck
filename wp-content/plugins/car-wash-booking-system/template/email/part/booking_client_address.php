<?php
		$Validation=new CBSValidation();

		$detail=array
		(
			array
			(
				__('First name',PLUGIN_CBS_DOMAIN),
				'client_first_name'
			),
			array
			(
				__('Last Name',PLUGIN_CBS_DOMAIN),
				'client_second_name'
			),
			array
			(
				__('Company name',PLUGIN_CBS_DOMAIN),
				'client_company_name'
			),			
			array
			(
				__('Street',PLUGIN_CBS_DOMAIN),
				'client_address_street'
			),			
			array
			(
				__('ZIP Code',PLUGIN_CBS_DOMAIN),
				'client_address_post_code'
			),	
			array
			(
				__('City',PLUGIN_CBS_DOMAIN),
				'client_address_city'
			),	
			array
			(
				__('State',PLUGIN_CBS_DOMAIN),
				'client_address_state'
			),	
			array
			(
				__('Country',PLUGIN_CBS_DOMAIN),
				'client_address_country'
			),	
			array
			(
				__('E-mail address',PLUGIN_CBS_DOMAIN),
				'client_email_address'
			),
			array
			(
				__('Phone number',PLUGIN_CBS_DOMAIN),
				'client_phone_number'
			),
			array
			(
				__('Vehicle make and model',PLUGIN_CBS_DOMAIN),
				'client_vehicle'
			),
			array
			(
				__('Message',PLUGIN_CBS_DOMAIN),
				'client_message'
			)
		);
		
		foreach($detail as $detailIndex=>$detailData)
		{
			switch($detailData[1])
			{
				case 'client_email_address':
					
					if(!$Validation->isEmailAddress($this->data['booking']['meta'][$detailData[1]]))
						unset($detail[$detailIndex]);
					
				break;
			
				default:
					
					if($Validation->isEmpty($this->data['booking']['meta'][$detailData[1]]))
						unset($detail[$detailIndex]);					
			}
		}
		
		if(count($detail))
		{
?>
			<tr><td<?php echo $this->data['format']['separator'][2]; ?>><td></tr>
			<tr>
				<td<?php echo $this->data['format']['header']; ?>><?php esc_html_e('Client details',PLUGIN_CBS_DOMAIN); ?></td>
			</tr>
			<tr><td<?php echo $this->data['format']['separator'][3]; ?>><td></tr>
			<tr>
				<td>
					<table cellspacing="0" cellpadding="0">
<?php	
			foreach($detail as $detailIndex=>$detailData)
			{
?>
						<tr>
							<td<?php echo $this->data['format']['cell'][1]; ?>><?php echo esc_html($detailData[0]); ?></td>
							<td<?php echo $this->data['format']['cell'][2]; ?>><?php echo nl2br(esc_html($this->data['booking']['meta'][$detailData[1]])); ?></td>
						</tr>
<?php				
			}
?>
					</table>
				</td>
			</tr>
<?php
		}