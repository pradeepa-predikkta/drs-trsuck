<?php

/******************************************************************************/
/******************************************************************************/

class CBSPaymentType
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->paymentType=array
		(
			'paypal'															=>	array(__('Paypal',PLUGIN_CBS_DOMAIN)),
			'stripe'															=>	array(__('Stripe',PLUGIN_CBS_DOMAIN)),
		);
	}
	
	/**************************************************************************/
	
	function isPayment($paymentType)
	{
		return(isset($this->paymentType[$paymentType]));
	}
	
	/**************************************************************************/
	
	function getName($paymentType)
	{
		if(!$this->isPayment($paymentType)) return(null);
		return($this->paymentType[$paymentType][0]);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/