<?php

/******************************************************************************/
/******************************************************************************/

class CBSPostMeta
{
	/**************************************************************************/
	
	static function getPostMeta($post)
	{
		$data=array();
		
		$prefix=PLUGIN_CBS_CONTEXT.'_';
		
		if(!is_object($post)) $post=get_post($post);
		
		$meta=get_post_meta($post->ID);

		
		if(!is_array($meta)) $meta=array();
		
		foreach($meta as $metaIndex=>$metaData)
		{
			if(preg_match('/^'.$prefix.'/',$metaIndex))
				$data[preg_replace('/'.$prefix.'/',null,$metaIndex)]=$metaData[0];
		}
		
		switch($post->post_type)
		{
			case PLUGIN_CBS_CONTEXT.'_vehicle':
				
				$Vehicle=new CBSVehicle();
				$Vehicle->setPostMetaDefault($data);
				
			break;
		
			case PLUGIN_CBS_CONTEXT.'_service':
				
				$CBSService=new CBSService();
				$CBSService->setPostMetaDefault($data);
				
			break;
		
			case PLUGIN_CBS_CONTEXT.'_package':
				
				$CBSPackage=new CBSPackage();
				$CBSPackage->setPostMetaDefault($data);
				
			break;
		
			case PLUGIN_CBS_CONTEXT.'_location':
				
				$CBSLocation=new CBSLocation();
				
				if(array_key_exists('color',$data))
					$data['color']=maybe_unserialize($data['color']);
				if(array_key_exists('business_hour',$data))
					$data['business_hour']=maybe_unserialize($data['business_hour']);
				if(array_key_exists('break_hour',$data))
					$data['break_hour']=maybe_unserialize($data['break_hour']);
				if(array_key_exists('date_exclude',$data))
					$data['date_exclude']=maybe_unserialize($data['date_exclude']);
				if(array_key_exists('user',$data))
					$data['user']=maybe_unserialize($data['user']);
				
				$CBSLocation->setPostMetaDefault($data);
				
			break;
			
			case PLUGIN_CBS_CONTEXT.'_coupon':
				
				$CBSCoupon=new CBSCoupon();
				$CBSCoupon->setPostMetaDefault($data);
				
			break;
			
			case PLUGIN_CBS_CONTEXT.'_booking':
				
				$CBSBooking=new CBSBooking();
				$CBSBooking->setPostMetaDefault($data);
			
			break;
		}
		
		return($data);
	}
	
	/**************************************************************************/
	
	static function updatePostMeta($post,$name,$value)
	{
		$name=PLUGIN_CBS_CONTEXT.'_'.$name;
		$postId=(int)(is_object($post) ? $post->ID : $post);
		
		update_post_meta($postId,$name,$value);
	}
	
	/**************************************************************************/
	
	static function createArray(&$array,$index)
	{
		$array=array($index=>array());
		return($array);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/