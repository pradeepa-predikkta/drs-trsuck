<?php
		$Validation=new CBSValidation();
?>
			<tr>
				<td<?php echo $this->data['format']['header']; ?>><?php esc_html_e('Booking details',PLUGIN_CBS_DOMAIN); ?></td>
			</tr>
			<tr><td<?php echo $this->data['format']['separator'][3]; ?>><td></tr>
			<tr>
				<td>
					<table cellspacing="0" cellpadding="0">
						<tr>
							<td<?php echo $this->data['format']['cell'][1]; ?>><?php esc_html_e('Booking',PLUGIN_CBS_DOMAIN); ?></td>
<?php
		if($this->data['admin'])
		{
?>
							<td<?php echo $this->data['format']['cell'][2]; ?>><a href="<?php echo esc_attr($this->data['other']['bookingUrl']); ?>"><?php echo esc_html($this->data['booking']['post']->post_title); ?></a></td>	
<?php
		}
		else
		{
?>
							<td<?php echo $this->data['format']['cell'][2]; ?>><?php echo esc_html($this->data['booking']['post']->post_title); ?></td>	
<?php
		}
?>
						<tr>
							<td<?php echo $this->data['format']['cell'][1]; ?>><?php esc_html_e('Status',PLUGIN_CBS_DOMAIN); ?></td>
							<td<?php echo $this->data['format']['cell'][2]; ?>><?php echo esc_html($this->data['other']['bookingStatus']); ?></td>
						</tr>
						<tr>
							<td<?php echo $this->data['format']['cell'][1]; ?>><?php esc_html_e('Duration',PLUGIN_CBS_DOMAIN); ?></td>
							<td<?php echo $this->data['format']['cell'][2]; ?>><?php echo esc_html($this->data['other']['bookingDuration']); ?></td>
						</tr>
						<tr>
							<td<?php echo $this->data['format']['cell'][1]; ?>><?php esc_html_e('Price',PLUGIN_CBS_DOMAIN); ?></td>
							<td<?php echo $this->data['format']['cell'][2]; ?>><?php echo esc_html($this->data['other']['bookingPrice']); ?></td>
						</tr>
<?php
        if($this->data['other']['gratuity']!=0)
        {
?>
						<tr>
							<td<?php echo $this->data['format']['cell'][1]; ?>><?php esc_html_e('Gratuity',PLUGIN_CBS_DOMAIN); ?></td>
							<td<?php echo $this->data['format']['cell'][2]; ?>><?php echo esc_html($this->data['other']['bookingGratuity']); ?></td>
						</tr>
<?php
        }
		if(array_key_exists('couponCode', $this->data['other']))
		{
?>
						<tr>
							<td<?php echo $this->data['format']['cell'][1]; ?>><?php esc_html_e('Coupon',PLUGIN_CBS_DOMAIN); ?></td>
							<td<?php echo $this->data['format']['cell'][2]; ?>><?php echo esc_html($this->data['other']['couponCode']); ?></td>
						</tr>
<?php
		}
?>
						<tr>
							<td<?php echo $this->data['format']['cell'][1]; ?>><?php esc_html_e('Selected vehicle',PLUGIN_CBS_DOMAIN); ?></td>
							<td<?php echo $this->data['format']['cell'][2]; ?>><?php echo esc_html($this->data['booking']['meta']['vehicle_name']); ?></td>
						</tr>
<?php
		if(array_key_exists('package_id',$this->data['booking']['meta'])&&$this->data['booking']['meta']['package_id']!=0)
		{
?>
						<tr>
							<td<?php echo $this->data['format']['cell'][1]; ?>><?php esc_html_e('Selected package',PLUGIN_CBS_DOMAIN); ?></td>
							<td<?php echo $this->data['format']['cell'][2]; ?>><?php echo esc_html($this->data['booking']['meta']['package_name']); ?></td>
						</tr>
<?php
		}
?>
					</table>
				</td>
			</tr>