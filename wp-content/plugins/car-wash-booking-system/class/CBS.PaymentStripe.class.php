<?php

/******************************************************************************/
/******************************************************************************/

class CBSPaymentStripe extends CBSPayment
{
	/**************************************************************************/
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function createCharge($stripeToken)
	{
		$bookingId=CBSHelper::getGetValue('bookingId',false);
		if($bookingId)
		{
			$Booking=new CBSBooking();
			$booking=$Booking->getBooking($bookingId);
			if(!count($booking)) return;
			
			$locationId=$booking['meta']['location_id'];
			$Location=new CBSLocation();			
			$location=$Location->getDictionary(array('location_id'=>$locationId));
			if(count($location)!=1) return(null);
			
			$data=array(
				'source'														=>	$stripeToken,
				'description'													=>	$booking['post']->post_title,
				'amount'														=>	$booking['meta']['price']*100,
				'currency'														=>	$booking['meta']['currency_id'],
			);
			$data_string = http_build_query($data);

			$ch=curl_init();
			curl_setopt($ch,CURLOPT_URL,'https://api.stripe.com/v1/charges');
			curl_setopt($ch,CURLOPT_USERPWD,$location[$locationId]['meta']['payment_stripe_secret_key']);
			curl_setopt($ch,CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$data_string);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
			curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
			$result=curl_exec($ch);
			
			if($result)
			{
				$result=json_decode($result);
				if(property_exists($result,'error')) return;
				
				global $wpdb;
				
				$query=$wpdb->prepare('insert into '.CBSHelper::getMySQLTableName('booking_payment').' values(%d,%s,%s,%s,%s,%f,%s)',$bookingId,$result->id,$result->source->object,date("Y-m-d H:i:s",$result->created),$result->status,$result->amount/100,$result->currency);
				$wpdb->query($query);
			}
			
			curl_close($ch);
		}
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/