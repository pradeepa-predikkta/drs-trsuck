<?php

/******************************************************************************/
/******************************************************************************/

class CBSPaymentPaypal extends CBSPayment
{
	/**************************************************************************/
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function handleIPN()
	{
		$request='cmd='.urlencode('_notify-validate');

		foreach($_POST as $key=>$value) 
			$request.='&'.$key.'='.urlencode(stripslashes($value));

		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,'https://www.paypal.com/cgi-bin/webscr');
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$request);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
		curl_setopt($ch,CURLOPT_HTTPHEADER,array('Host: www.paypal.com'));
		$response=curl_exec($ch);
		
		if(curl_errno($ch)) return;
		if(!strcmp($response,'VERIFIED')==0) return;
		
		$bookingId=(int)$_POST['item_number'];
		
		$Booking=new CBSBooking();
		$booking=$Booking->getBooking($bookingId);
		
		if(!count($booking)) return;
		
		global $wpdb;
		
		$data=array_map('stripslashes',$_POST);
		
		$query=$wpdb->prepare('insert into '.CBSHelper::getMySQLTableName('booking_payment').' values(%d,%s,%s,%s,%s,%f,%s)',$bookingId,$data['txn_id'],$data['payment_type'],date('Y-m-d H:i:s',strtotime($data['payment_date'])),$data['payment_status'],$data['mc_gross'],$data['mc_currency']);
		$wpdb->query($query);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/