<?php 
		echo $this->data['nonce']; 
?>
		<div class="to">
            <div class="ui-tabs">
                <ul>
                    <li><a href="#meta-box-booking-1"><?php esc_html_e('General',PLUGIN_CBS_DOMAIN); ?></a></li>
                    <li><a href="#meta-box-booking-2"><?php esc_html_e('Details',PLUGIN_CBS_DOMAIN); ?></a></li>
                    <li><a href="#meta-box-booking-3"><?php esc_html_e('Client',PLUGIN_CBS_DOMAIN); ?></a></li>
                </ul>
                <div id="meta-box-booking-1">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Booking status',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Select booking status.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                            <div class="to-radio-button">
<?php
		foreach($this->data['dictionary']['bookingStatus'] as $bookingStatusIndex=>$bookingStatusData)
		{
?>
                                <input type="radio" value="<?php echo esc_attr($bookingStatusIndex); ?>" id="<?php CBSHelper::getFormName('booking_status_'.$bookingStatusIndex); ?>" name="<?php CBSHelper::getFormName('booking_status'); ?>" <?php CBSHelper::checkedIf($this->data['meta']['booking_status'],$bookingStatusIndex); ?>/>
                                <label for="<?php CBSHelper::getFormName('booking_status_'.$bookingStatusIndex); ?>"><?php echo esc_html($bookingStatusData[0]); ?></label>							
<?php		
		}
?>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Duration',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Duration.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('date_time'); ?>" id="<?php CBSHelper::getFormName('date_time'); ?>" value="<?php echo esc_attr($this->data['other']['bookingDuration']); ?>" disabled="disabled"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Price',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Price (including gratuity).',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('price'); ?>" id="<?php CBSHelper::getFormName('price'); ?>" value="<?php echo esc_attr($this->data['other']['bookingPrice']); ?>" disabled="disabled"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Gratuity',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Gratuity.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('gratuity'); ?>" id="<?php CBSHelper::getFormName('gratuity'); ?>" value="<?php echo esc_attr($this->data['other']['bookingGratuity']); ?>" disabled="disabled"/>
                            </div>
                        </li>                
<?php
		if(array_key_exists('coupon_id',$this->data['meta']))
		{
?>			
                        <li>
                            <h5><?php esc_html_e('Coupon',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Coupon.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('coupon_code'); ?>" id="<?php CBSHelper::getFormName('coupon_code'); ?>" value="<?php echo esc_attr($this->data['other']['couponCode']); ?>" disabled="disabled"/>
<?php
			if($this->data['other']['couponId'])
			{
?>
                                <a href="<?php echo get_edit_post_link($this->data['other']['couponId']); ?>"><?php esc_html_e('Edit this coupon',PLUGIN_CBS_DOMAIN); ?></a>
<?php
			}
?>
                            </div>
                        </li>
<?php
		}
		
		if(array_key_exists('payment_type',$this->data['meta']))
		{
			$PaymentType=new CBSPaymentType();
?>
                        <li>
                            <h5><?php esc_html_e('Payment type',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Payment type.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('payment_type'); ?>" id="<?php CBSHelper::getFormName('payment_type'); ?>" value="<?php echo esc_attr($PaymentType->getName($this->data['meta']['payment_type'])); ?>" disabled="disabled"/>
                            </div>
                        </li>			
<?php
			if(array_key_exists('payment',$this->data))
			{
?>				
                        <li>
                            <h5><?php esc_html_e('Transactions',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('List of registered transactions for this payment.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>	
                                <table class="to-table">
                                    <thead>
                                        <tr>
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Transaction ID',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Transaction ID.',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th style="width:15%">
                                                <div>
                                                    <?php esc_html_e('Type',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Type',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Date',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Date',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>	
                                            <th style="width:15%">
                                                <div>
                                                    <?php esc_html_e('Status',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Status',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Amount',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Amount',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>	
                                            <th style="width:10%">
                                                <div>
                                                    <?php esc_html_e('Currency',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Currency',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
				foreach($this->data['payment'] as $paymentIndex=>$paymentData)
				{
?>
                                        <tr>
                                            <td><div><?php echo esc_html($paymentData->{'txn_id'}); ?></div></td>
                                            <td><div><?php echo esc_html($paymentData->{'payment_type'}); ?></div></td>
                                            <td><div><?php echo esc_html($paymentData->{'payment_date'}); ?></div></td>
                                            <td><div><?php echo esc_html($paymentData->{'payment_status'}); ?></div></td>
                                            <td><div><?php echo esc_html($paymentData->{'mc_gross'}); ?></div></td>
                                            <td><div><?php echo esc_html($paymentData->{'mc_currency'}); ?></div></td>
                                        </tr>
<?php
				}
?>
                                    </tbody>
                                </table>
                            </div>
                        </li>
<?php				
			}
		}
?>
                        <li>
                            <h5><?php esc_html_e('Location',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Selected location.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('location'); ?>" id="<?php CBSHelper::getFormName('location'); ?>" value="<?php echo esc_attr($this->data['meta']['location_name']); ?>" disabled="disabled"/>
                                <a href="<?php echo get_edit_post_link($this->data['meta']['location_id']); ?>"><?php esc_html_e('Edit this location',PLUGIN_CBS_DOMAIN); ?></a>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Vehicle',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Selected vehicle type.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('vehicle'); ?>" id="<?php CBSHelper::getFormName('vehicle'); ?>" value="<?php echo esc_attr($this->data['meta']['vehicle_name']); ?>" disabled="disabled"/>
                                <a href="<?php echo get_edit_post_link($this->data['meta']['vehicle_id']); ?>"><?php esc_html_e('Edit this vehicle',PLUGIN_CBS_DOMAIN); ?></a>
                            </div>
                        </li>
<?php
		if((array_key_exists('package_id',$this->data['meta'])) && ($this->data['meta']['package_id']!=0))
		{
?>
                        <li>
                            <h5><?php esc_html_e('Package',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Selected package.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" name="<?php CBSHelper::getFormName('package'); ?>" id="<?php CBSHelper::getFormName('package'); ?>" value="<?php echo esc_attr($this->data['meta']['package_name']); ?>" disabled="disabled"/>
                                <a href="<?php echo get_edit_post_link($this->data['meta']['package_id']); ?>"><?php esc_html_e('Edit this package',PLUGIN_CBS_DOMAIN); ?></a>
                            </div>
                        </li>				
<?php
		}
?>
                    </ul>
                </div>
                <div id="meta-box-booking-2">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('List of services',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('List of services.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <table class="to-table">
                                    <thead>
                                        <tr>
                                            <th style="width:40%">
                                                <div>
                                                    <?php esc_html_e('Name',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Name',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Type',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Type',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Price',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Price',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>									
                                            <th style="width:20%">
                                                <div>
                                                    <?php esc_html_e('Duration',PLUGIN_CBS_DOMAIN); ?>
                                                    <span class="to-legend"><?php esc_html_e('Duration in minutes',PLUGIN_CBS_DOMAIN); ?></span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
		foreach($this->data['booking']['detail'] as $line)
		{
?>
                                        <tr>
                                            <td>
                                                <div><a href="<?php echo get_edit_post_link($line->{'service_id'}); ?>"><?php esc_html_e($line->{'name'}); ?></a></div>
                                            </td>
                                            <td>
                                                <div>
                                                    <?php echo esc_html($line->{'service_type_name'}); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <?php echo esc_html($line->{'service_price'}); ?>
                                                </div>
                                            </td>									
                                            <td>
                                                <div><?php esc_html_e($line->{'duration'}); ?></div>
                                            </td>
                                        </tr>								
<?php
		}
?>
                                    <tbody>
                                </table>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="meta-box-booking-3">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Client',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend"> <?php esc_html_e('Client details.',PLUGIN_CBS_DOMAIN); ?></span>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('First name:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_first_name']); ?>" id="<?php CBSHelper::getFormName('client_first_name'); ?>" name="<?php CBSHelper::getFormName('client_first_name'); ?>" disabled="disabled"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Last name:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_second_name']); ?>" id="<?php CBSHelper::getFormName('client_second_name'); ?>" name="<?php CBSHelper::getFormName('client_second_name'); ?>" disabled="disabled"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Company name:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_company_name']); ?>" id="<?php CBSHelper::getFormName('client_company_name'); ?>" name="<?php CBSHelper::getFormName('client_company_name'); ?>" disabled="disabled"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Street:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_address_street']); ?>" id="<?php CBSHelper::getFormName('client_address_street'); ?>" name="<?php CBSHelper::getFormName('client_address_street'); ?>" disabled="disabled"/>
                            </div>                            
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('ZIP Code:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_address_post_code']); ?>" id="<?php CBSHelper::getFormName('client_address_post_code'); ?>" name="<?php CBSHelper::getFormName('client_address_post_code'); ?>" disabled="disabled"/>
                                
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('City:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_address_city']); ?>" id="<?php CBSHelper::getFormName('client_address_city'); ?>" name="<?php CBSHelper::getFormName('client_address_city'); ?>" disabled="disabled"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('State:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_address_state']); ?>" id="<?php CBSHelper::getFormName('client_address_state'); ?>" name="<?php CBSHelper::getFormName('client_address_state'); ?>" disabled="disabled"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Country:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_address_country']); ?>" id="<?php CBSHelper::getFormName('client_address_country'); ?>" name="<?php CBSHelper::getFormName('client_address_country'); ?>" disabled="disabled"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('E-mail address:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_email_address']); ?>" id="<?php CBSHelper::getFormName('client_email_address'); ?>" name="<?php CBSHelper::getFormName('client_email_address'); ?>" disabled="disabled"/>
                            </div>
                            <div>
                                <span class="to-legend-field"><?php esc_html_e('Phone number:',PLUGIN_CBS_DOMAIN); ?></span>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_phone_number']); ?>" id="<?php CBSHelper::getFormName('client_phone_number'); ?>" name="<?php CBSHelper::getFormName('client_phone_number'); ?>" disabled="disabled"/>
                            </div>                            
                        </li>
                        <li>
                            <h5><?php esc_html_e('Vehicle',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Vehicle Make and Model.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <input type="text" value="<?php echo esc_attr($this->data['meta']['client_vehicle']); ?>" id="<?php CBSHelper::getFormName('client_vehicle'); ?>" name="<?php CBSHelper::getFormName('client_vehicle'); ?>" disabled="disabled"/>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Message',PLUGIN_CBS_DOMAIN); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Message.',PLUGIN_CBS_DOMAIN); ?><br/>
                            </span>
                            <div>
                                <textarea rows="1" cols="1" id="<?php CBSHelper::getFormName('client_message'); ?>" name="<?php CBSHelper::getFormName('client_message'); ?>" disabled="disabled"><?php echo esc_html($this->data['meta']['client_message']); ?></textarea>
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