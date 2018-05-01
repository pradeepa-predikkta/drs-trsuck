<?php

/******************************************************************************/
/******************************************************************************/

class CBSBooking
{
	/**************************************************************************/
	
	function __construct()
	{
		
	}
	
	/**************************************************************************/
	
	function init()
	{
		register_post_type
		(
			PLUGIN_CBS_CONTEXT.'_booking',
			array
			(
				'labels'														=>	array
				(
					'name'														=>	__('Bookings',PLUGIN_CBS_DOMAIN),
					'singular_name'												=>	__('Booking',PLUGIN_CBS_DOMAIN),
					'edit_item'													=>	__('Edit Booking',PLUGIN_CBS_DOMAIN),
					'all_items'													=>	__('Bookings',PLUGIN_CBS_DOMAIN),
					'view_item'													=>	__('View Booking',PLUGIN_CBS_DOMAIN),
					'search_items'												=>	__('Search Bookings',PLUGIN_CBS_DOMAIN),
					'not_found'													=>	__('No Bookings Found',PLUGIN_CBS_DOMAIN),
					'not_found_in_trash'										=>	__('No Bookings Found in Trash',PLUGIN_CBS_DOMAIN), 
					'parent_item_colon'											=>	'',
					'menu_name'													=>	__('Car Wash Booking&nbsp;System',PLUGIN_CBS_DOMAIN)
				),	
				'public'														=>	false,  
				'menu_icon'														=>	'dashicons-calendar-alt',
				'show_ui'														=>	true,  
				'capability_type'												=>	'post',
				'capabilities'													=>	array
				(
					 'create_posts'												=>	'do_not_allow',
				),
				'map_meta_cap'													=>	true, 
				'menu_position'													=>	100,
				'hierarchical'													=>	false,  
				'rewrite'														=>	false,  
				'supports'														=>	array('title','page-attributes')  
			)
		);
		
		add_filter('manage_edit-'.PLUGIN_CBS_CONTEXT.'_booking_columns',array($this,'manageEditColumn')); 
		add_action('manage_'.PLUGIN_CBS_CONTEXT.'_booking_posts_custom_column',array($this,'manageColumn'));
		add_filter('manage_edit-'.PLUGIN_CBS_CONTEXT.'_booking_sortable_columns',array($this,'manageEditSortableColumn'));
        add_filter('postbox_classes_'.PLUGIN_CBS_CONTEXT.'_booking_cbs_meta_box_booking',array($this,'adminCreateMetaBoxClass'));

		add_action('add_meta_boxes_'.PLUGIN_CBS_CONTEXT.'_booking',array($this,'addMetaBox'));
		
		add_action('save_post',array($this,'savePost'));
		
		add_action('restrict_manage_posts',array($this,'manageBookingList'));
		add_filter('parse_query',array($this,'manageBookingListPostFiler'));
	}
	
	/**************************************************************************/
	/**************************************************************************/
	
	function addMetaBox()
	{
		global $post;
		
		$User=new CBSuser();
		$User->canUserManageBooking($post->ID);
		
		add_meta_box(PLUGIN_CBS_CONTEXT.'_meta_box_booking',__('General',PLUGIN_CBS_DOMAIN),array($this,'addMetaBoxGeneral'),PLUGIN_CBS_CONTEXT.'_booking','normal','low');		
	}
	
	/**************************************************************************/
	
	function addMetaBoxGeneral()
	{
		global $post;
		
		$Date=new CBSDate();
		$Price=new CBSPrice();
		$Coupon=new CBSCoupon();
		
		$data=array();
		
		$BookingStatus=new CBSBookingStatus();
		
		$data['nonce']=CBSHelper::createNonceField(PLUGIN_CBS_CONTEXT.'_meta_box_booking');
		
		$booking=$this->getBooking($post->ID);

		if(array_key_exists('payment',$booking))
			$data['payment']=$booking['payment'];
		
		$data['meta']=$booking['meta'];
		
		$data['dictionary']['bookingStatus']=$BookingStatus->getBookingStatus();
		
		$data['other']['bookingPrice']=$Price->formatToDisplay2($data['meta']['price'],$data['meta']['currency_id']);
		$data['other']['bookingDuration']=$this->getBookingDuration($Date->reverse($data['meta']['date']).' '.$data['meta']['time'],$data['meta']['duration']);
		
		if(array_key_exists('coupon_id',$data['meta']))
		{
			$coupon=$Coupon->getCoupon($data['meta']['coupon_id']);
			$data['other']['couponCode']=(count($coupon) ? sprintf(__('%s (Discount: %s%% and Deduction: %s)',PLUGIN_CBS_DOMAIN),$coupon['meta']['coupon_code'],$coupon['meta']['discount'],$coupon['meta']['deduction']) : '');
			$data['other']['couponId']=(count($coupon) ? $coupon['post']->ID : 0);
			$data['other']['bookingPrice'].=sprintf(__(' (Before %s%% discount and %s deduction: %s)',PLUGIN_CBS_DOMAIN),$coupon['meta']['discount'],$coupon['meta']['deduction'],$Price->formatToDisplay2($data['meta']['price_old'],$data['meta']['currency_id']));
		}
        
        $data['other']['bookingGratuity']=$Price->formatToDisplay2($data['meta']['gratuity'],$data['meta']['currency_id']);
		
        $data['booking']=$this->getBooking($post->ID);
        
		$Template=new CBSTemplate($data,PLUGIN_CBS_TEMPLATE_PATH.'admin/meta_box_booking.php');
		echo $Template->output();			
	}
	
    /**************************************************************************/
    
    function adminCreateMetaBoxClass($class) 
    {
        array_push($class,'to-postbox-1');
        return($class);
    }
	
	/**************************************************************************/
	/**************************************************************************/
	
	function manageBookingList()
	{
		if(!is_admin()) return;
		if(CBSHelper::getGetValue('post_type',false)!==PLUGIN_CBS_CONTEXT.'_booking') return;
				
		$Date=new CBSDate();
		
		$html=array_fill(0,3,null);
		
		/***/
		
		$Location=new CBSLocation();
		$location=$Location->getDictionary();
		
		if(!count($location)) return;
		
		$directory=array();
		foreach($location as $locationId=>$locationData)
			$directory[$locationId]=$locationData['post']->{'post_title'};
		
		asort($directory,SORT_STRING);
		
		$User=new CBSuser();
		$userMeta=$User->getMeta(get_current_user_id());
		
		foreach($directory as $directoryIndex=>$directoryValue)
		{
			if(!$User->canUserManageLocation($directoryIndex,get_current_user_id(),$userMeta))
				unset($directory[$directoryIndex]);
		}
		
		foreach($directory as $directoryId=>$directoryData)
			$html[0].='<option value="'.(int)$directoryId.'" '.(((int)CBSHelper::getGetValue('location_id',false)==$directoryId) ?  'selected' : null).'>'.esc_html($directoryData).'</option>';
		
		$html[0]=
		'
			<select name="location_id">
				<option value="0">'.__('All locations',PLUGIN_CBS_DOMAIN).'</option>
				'.$html[0].'
			</select>
		';
		
		/***/
		
		$BookingStatus=new CBSBookingStatus();
		$bookingStatus=$BookingStatus->getBookingStatus();
		
		if(!count($bookingStatus)) return;
		
		$directory=array();
		foreach($bookingStatus as $bookingStatusId=>$bookingStatusData)
			$directory[$bookingStatusId]=$bookingStatusData[0];
		
		$directory[-2]=__('New & accepted',PLUGIN_CBS_DOMAIN);
		
		asort($directory,SORT_STRING);
		
		if(!array_key_exists('booking_status_id',$_GET))
			$_GET['booking_status_id']=-2;

		foreach($directory as $directoryId=>$directoryData)
			$html[1].='<option value="'.(int)$directoryId.'" '.(((int)CBSHelper::getGetValue('booking_status_id',false)==$directoryId) ?  'selected' : null).'>'.esc_html($directoryData).'</option>';
		
		$html[1]=
		'
			<select name="booking_status_id">
				<option value="0">'.__('All statuses',PLUGIN_CBS_DOMAIN).'</option>
				'.$html[1].'
			</select>
		';		
		
		/***/
		
		if(!array_key_exists('booking_date_operator',$_GET))
			$_GET['booking_date_operator']='gt';
		
		foreach($Date->compareOperator as $compareOperatorId=>$compareOperatorData)
			$html[2].='<option value="'.esc_attr($compareOperatorId).'" '.((CBSHelper::getGetValue('booking_date_operator',false)==$compareOperatorId) ?  'selected' : null).'>'.esc_html($compareOperatorData).'</option>';
			
		$html[2]=
		'
			<span>'.esc_html__('Booking date:',PLUGIN_CBS_DOMAIN).'</span>
			<select name="booking_date_operator">
				'.$html[2].'
			</select>				
			<input type="text" name="booking_date" class="to-datepicker" value="'.esc_attr(CBSHelper::getGetValue('booking_date',false)).'" />
		';
		
		/***/
		
		echo 
		'
			'.join('',$html).'
			<script type="text/javascript">
				jQuery(document).ready(function($)
				{
					var element=$(\'#posts-filter\').themeOptionElement({init:false});
					element.createDatePicker();
				});
			</script>
		';
	}
	
	/**************************************************************************/
	
	function manageBookingListPostFiler($query)
	{
		if(!is_admin()) return;
		if(CBSHelper::getGetValue('post_type',false)!==PLUGIN_CBS_CONTEXT.'_booking') return;
		if($query->query['post_type']!==PLUGIN_CBS_CONTEXT.'_booking') return;

		$metaQuery=array();
		
		$Date=new CBSDate();
		$User=new CBSuser();
		$Validation=new CBSValidation();
		
		/***/
		
		$locationId=(int)CBSHelper::getGetValue('location_id',false);

		global $cbsLocationQuery;
		
		if(!is_array($cbsLocationQuery))
		{
			$cbsLocationQuery=array(-2);
			
			$userMeta=$User->getMeta(get_current_user_id());
			
			if($locationId!=0)
			{
				if($User->canUserManageLocation($locationId,get_current_user_id(),$userMeta))
					$cbsLocationQuery=array($locationId);
			}
			else
			{
				if($User->canUserManageLocation(-1,get_current_user_id(),$userMeta)) $cbsLocationQuery=array();
				else $cbsLocationQuery=$userMeta['location'];
			}
		}
			
		if(count($cbsLocationQuery))
		{
			array_push($metaQuery,array
			(
				'key'															=>	PLUGIN_CBS_CONTEXT.'_location_id',
				'value'															=>	$cbsLocationQuery,
				'compare'														=>	'IN'
			));
		}
		
		/***/
		
		$bookingStatusId=CBSHelper::getGetValue('booking_status_id',false);
		if($Validation->isEmpty($bookingStatusId)) $bookingStatusId=-2;

		if($bookingStatusId!=0)
		{
			array_push($metaQuery,array
			(
				'key'															=>	PLUGIN_CBS_CONTEXT.'_booking_status',
				'value'															=>	$bookingStatusId==-2 ? array(1,2) : array($bookingStatusId),
				'compare'														=>	'IN'
			));
		}
		
		/***/
		
		$date=CBSHelper::getGetValue('booking_date',false);
		$dateOperator=array_key_exists('booking_date_operator',$_GET) ? CBSHelper::getGetValue('booking_date_operator',false) : 'gt';

		if(($Validation->isDate($date)) && (isset($Date->compareOperator[$dateOperator])))
		{
			array_push($metaQuery,array
			(
				'key'															=>	PLUGIN_CBS_CONTEXT.'_date',
				'value'															=>	$Date->reverse($date),
				'compare'														=>	$Date->compareOperator[$dateOperator],
				'type'															=>	'DATE'
			));			
		}

		/***/
		
		$order=CBSHelper::getGetValue('order',false);
		$orderby=CBSHelper::getGetValue('orderby',false);
		
		if($orderby=='title')
		{
			$query->set('orderby','title');
		}
		else
		{
			switch($orderby)
			{


				case 'location':

					$query->set('meta_key',PLUGIN_CBS_CONTEXT.'_location_name');

					$metaQuery[]=array
					(
						'key'														=>	PLUGIN_CBS_CONTEXT.'_location_name'
					);

				break;

				case 'price':

					$query->set('meta_key',PLUGIN_CBS_CONTEXT.'_price');
					$query->set('meta_type','DECIMAL');

				break;	

				case 'duration':

					$query->set('meta_key',PLUGIN_CBS_CONTEXT.'_duration');
					$query->set('meta_type','DECIMAL');

				break;	

				case 'client':

					$query->set('meta_key',PLUGIN_CBS_CONTEXT.'_client_second_name');

				break;	

				default:

					$query->set('meta_key',PLUGIN_CBS_CONTEXT.'_datetime');
					$query->set('meta_type','DATETIME');

					if($Validation->isEmpty($order)) $order='asc';
			}

			$query->set('orderby','meta_value');
		}

		$query->set('order',$order);
			
		if(count($metaQuery)) $query->set('meta_query',$metaQuery);
	}
	
	/**************************************************************************/
	
	function manageEditColumn($column)
	{
		$column=array
		(  
			'cb'																=>	'<input type="checkbox"/>',
			'name'																=>	__('Name',PLUGIN_CBS_DOMAIN),
			'location'															=>	__('Location',PLUGIN_CBS_DOMAIN),
			'status'															=>	__('Status',PLUGIN_CBS_DOMAIN),
			'price'																=>	__('Price',PLUGIN_CBS_DOMAIN),
			'duration'															=>	__('Duration',PLUGIN_CBS_DOMAIN),
			'booking_date'														=>	__('Booking Date',PLUGIN_CBS_DOMAIN),
			'client'															=>	__('Client',PLUGIN_CBS_DOMAIN)
		);   
		
		return($column);  
	}  
	
	/**************************************************************************/
	
	function manageEditSortableColumn($column)
	{
		$column['name']='title';
		$column['location']='location';
		$column['price']='price';
		$column['duration']='duration';
		$column['booking_date']='booking_date';
		$column['client']='client';
		return($column);
	}
	
	/**************************************************************************/
	
	function manageColumn($column)
	{		
		global $post;
		
		$Date=new CBSDate();
		$Price=new CBSPrice();
		$BookingStatus=new CBSBookingStatus();
		
		$booking=$this->getBooking($post->ID);
		
		$meta=CBSPostMeta::getPostMeta($post);
		
		switch($column) 
		{
			case 'name':
				
				echo '<strong><a class="row-title" href="'.get_edit_post_link($post->ID).'">'.get_the_title().'</a></strong>'; 
			
			break;
			
			case 'location':
				
				echo '<a href="'.get_edit_post_link($booking['meta']['location_id']).'">'.esc_html($booking['meta']['location_name']).'</a>'; 
				
			break;
		
			case 'status':
				
				esc_html_e($BookingStatus->bookingStatus[$booking['meta']['booking_status']][0]); 
				
			break;
		
			case 'price':
				
				echo $Price->formatToDisplay2($meta['price'],$meta['currency_id']);
				
			break;
		
			case 'duration':
				
				echo $meta['duration'].' '.esc_html__('min ',PLUGIN_CBS_DOMAIN);
				
			break;	
		
			case 'booking_date':
				
				esc_html_e($this->getBookingDuration($Date->reverse($meta['date']).' '.$meta['time'],$meta['duration'])); 
				
			break;
		
			case 'client':
				
				echo '<b>'.esc_html($booking['meta']['client_second_name']).'</b> '.esc_html($booking['meta']['client_first_name']);
				
			break;
		}
	}

	/**************************************************************************/
	/**************************************************************************/

	function getDictionary($attr=array())
	{
		global $post;
		
		$Validation=new CBSValidation();
		$dictionary=array();
		
		$default=array
		(
			'coupon_id'															=>	0,
			'booking_from'														=>	'',
			'booking_to'														=>	'',
			'orderby_booking_date'												=>	0,
		);
		
		$attribute=shortcode_atts($default,$attr);
		
		CBSHelper::preservePost($post,$bPost);
		
		$argument=array
		(
			'post_type'															=>	PLUGIN_CBS_CONTEXT.'_booking',
			'post_status'														=>	'publish',
			'posts_per_page'													=>	-1,
			'orderby'															=>	array('menu_order'=>'asc','title'=>'asc'),
			'meta_query'														=>	array(),
		);
		
		if($attribute['coupon_id'])
		{
			$argument['meta_key']=PLUGIN_CBS_CONTEXT.'_coupon_id';
			$argument['meta_value']=$attribute['coupon_id'];
		}
		
		if($attribute['orderby_booking_date'])
		{
			$argument['meta_key']=PLUGIN_CBS_CONTEXT.'_datetime';
			$argument['meta_type']='DATETIME';
			$argument['orderby']='meta_value';
			$argument['order']='asc';
		}
		
		if($attribute['booking_from'])
		{
			$argument['meta_query'][]=array
			(
				'key'														=>	PLUGIN_CBS_CONTEXT.'_date',
				'value'														=>	$attribute['booking_from'],
				'compare'													=>	'>=',
				'type'														=>	'DATE',
			);
		}
		
		if($attribute['booking_to'])
		{
			$argument['meta_query'][]=array
			(
				'key'														=>	PLUGIN_CBS_CONTEXT.'_date',
				'value'														=>	$attribute['booking_to'],
				'compare'													=>	'<=',
				'type'														=>	'DATE'	
			);
		}
		
		$query=new WP_Query($argument);
		if($query===false) return($dictionary);
		
		while($query->have_posts())
		{
			$query->the_post();
			$dictionary[$post->ID]['post']=$post;
			$dictionary[$post->ID]['meta']=CBSPostMeta::getPostMeta($post);
		}
		
		CBSHelper::preservePost($post,$bPost,0);	
		
		return($dictionary);
	}
	
	/**************************************************************************/
	
	function savePost($postId)
	{		
		if(CBSHelper::checkSavePost($postId,PLUGIN_CBS_CONTEXT.'_meta_box_booking_noncename','savePost')===false) return(false);
	
		$User=new CBSuser();
		if(!$User->canUserManageBooking($postId,false)) return(false);
		
		$oldMeta=CBSPostMeta::getPostMeta($postId);
		
		$BookingStatus=new CBSBookingStatus();
		
		if(array_key_exists(CBSHelper::getPostValue('booking_status'),$BookingStatus->getBookingStatus()))
			CBSPostMeta::updatePostMeta($postId,'booking_status',CBSHelper::getPostValue('booking_status'));

		$currMeta=CBSPostMeta::getPostMeta($postId);
		
		$currPost=get_post($postId);
		
		if($oldMeta['booking_status']!=$currMeta['booking_status'])
			$this->sendEmail($postId,'booking_change_status_client',sprintf(__('Booking "%s" has changed its status to "%s"',PLUGIN_CBS_DOMAIN),$currPost->{'post_title'},$BookingStatus->bookingStatus[$currMeta['booking_status']][0]),array($currMeta['client_email_address']));
	}
	
	/**************************************************************************/
	
	function setPostMetaDefault(&$meta)
	{
		CBSHelper::setDefault($meta,'booking_status','1');
		
		CBSHelper::setDefault($meta,'date','');
		CBSHelper::setDefault($meta,'time','');
		CBSHelper::setDefault($meta,'duration','');
		CBSHelper::setDefault($meta,'price','');
		CBSHelper::setDefault($meta,'currency_id','');
		
		CBSHelper::setDefault($meta,'client_first_name','');
		CBSHelper::setDefault($meta,'client_second_name','');
		CBSHelper::setDefault($meta,'client_company_name','');
		CBSHelper::setDefault($meta,'client_vehicle','');
		CBSHelper::setDefault($meta,'client_email_address','');
		CBSHelper::setDefault($meta,'client_phone_number','');
		CBSHelper::setDefault($meta,'client_message','');
		
		CBSHelper::setDefault($meta,'client_address_street','');
		CBSHelper::setDefault($meta,'client_address_post_code','');
		CBSHelper::setDefault($meta,'client_address_city','');
		CBSHelper::setDefault($meta,'client_address_state','');
		CBSHelper::setDefault($meta,'client_address_country','');
	}
	
	/**************************************************************************/
	
	function createBooking()
	{
		$Date=new CBSDate();
		
		global $wpdb;
		
		$response=array('error'=>1,'message'=>null,'reset'=>0,'form'=>null,'bookingId'=>0);
		
		$attribute=array
		(
			'location_id'														=>	(int)CBSHelper::getPostValue('locationId',false),
			'vehicle_id'														=>	(int)CBSHelper::getPostValue('vehicleId',false),
			'package_id'														=>	(int)CBSHelper::getPostValue('packageId',false),
			'service_id'														=>	CBSHelper::getPostValue('serviceId',false),
			'coupon_code'														=>	CBSHelper::getPostValue('couponCode',false),
            'gratuity'                                                          =>	CBSHelper::getPostValue('gratuity',false)
		);
		
		$client=array
		(
			'client_first_name'													=>	CBSHelper::getPostValue('clientFirstName',false),
			'client_second_name'												=>	CBSHelper::getPostValue('clientSecondName',false),
			'client_company_name'												=>	CBSHelper::getPostValue('clientCompanyName',false),
			'client_vehicle'													=>	CBSHelper::getPostValue('clientVehicle',false),
			'client_email_address'												=>	CBSHelper::getPostValue('clientEmailAddress',false),
			'client_phone_number'												=>	CBSHelper::getPostValue('clientPhoneNumber',false),
			'client_message'													=>	CBSHelper::getPostValue('clientMessage',false),
			'client_address_street'												=>	CBSHelper::getPostValue('clientAddressStreet',false),
			'client_address_post_code'											=>	CBSHelper::getPostValue('clientAddressPostCode',false),
			'client_address_city'												=>	CBSHelper::getPostValue('clientAddressCity',false),
			'client_address_state'												=>	CBSHelper::getPostValue('clientAddressState',false),
			'client_address_country'											=>	CBSHelper::getPostValue('clientAddressCountry',false)
		);
		
		$registerUser=array
		(
			'register'															=>	(int)CBSHelper::getPostValue('registerUser',false),
			'username'															=>	CBSHelper::getPostValue('username',false),
			'password'															=>	CBSHelper::getPostValue('password',false),
			'password_check'													=>	CBSHelper::getPostValue('passwordCheck',false),
		);
		
		$User=new CBSuser();
		$Price=new CBSPrice();
		$Package=new CBSPackage();
		$Service=new CBSService();
		$Coupon=new CBSCoupon();
		$Vehicle=new CBSVehicle();
		$Location=new CBSLocation();
		$Validation=new CBSValidation();
		
		$package=array();
		$service=array();
		
		$locationId=$attribute['location_id'];
		$packageId=$attribute['package_id'];
		
		$serviceId=CBSHelper::getPostValue('serviceId',false);
		if(!is_array($serviceId)) $serviceId=array();
		
		$dateId=CBSHelper::getPostValue('dateId',false);
		
		$date=null;
		$time=null;
		
		if(strlen($dateId)==12)
		{
			$date=substr($dateId,0,2).'-'.substr($dateId,2,2).'-'.substr($dateId,4,4);
			$time=substr($dateId,8,2).':'.substr($dateId,10,2);		
		}
		
		/***/
		
		$location=$Location->getDictionary($attribute);
		if(count($location)!=1)
		{
			$response['message']=__('Please select valid location.',PLUGIN_CBS_DOMAIN);
			$this->createBookingJSONResponse($response);
		}
		
		$response['reset']=$location[$locationId]['meta']['reset_form_enable'];

		/***/
	
		$service=$Service->getServicePublic($attribute);
		if(in_array($location[$locationId]['meta']['content_type'],array(2,3))&&$attribute['package_id'])
			$package=$Package->getPackagePublic($attribute);			
		
		/***/
		
		$vehicle=$Vehicle->getVehiclePublic($attribute,$service,$package);
		if(!isset($vehicle[$attribute['vehicle_id']]))
		{
			$response['message']=__('Please select valid car type.',PLUGIN_CBS_DOMAIN);
			$this->createBookingJSONResponse($response);			
		}
		
		/***/
		
		$coupon=$Coupon->getDictionary($attribute);
		$couponId=0;
		if(count($coupon)===1)
		{
			$couponKeys=array_keys($coupon);
			$couponId=array_shift($couponKeys);
		}
		
		/***/
		
		if($location[$locationId]['meta']['content_type']==1)
		{
			$packageId=0;
			
			foreach($serviceId as $serviceIndex)
			{
				if(!array_key_exists($serviceIndex,$service))
					unset($serviceId[$serviceIndex]);
			}
			if(!count($serviceId))
			{
				$response['message']=__('Please select at least one service.',PLUGIN_CBS_DOMAIN);
				$this->createBookingJSONResponse($response);					
			}
		}
		elseif($location[$locationId]['meta']['content_type']==2)
		{
			if(!isset($package[$attribute['package_id']]))
			{
				$response['message']=__('Please select valid package.',PLUGIN_CBS_DOMAIN);
				$this->createBookingJSONResponse($response);			
			}			
		}
		elseif($location[$locationId]['meta']['content_type']==3)
		{
			if(isset($package[$packageId]))
			{
				foreach($serviceId as $serviceIndex)
				{		
					if(!array_key_exists($serviceIndex,$package[$packageId]['service']))
						unset($serviceId[$serviceIndex]);	
					elseif($package[$packageId]['service'][$serviceIndex]['service_type']!=2)
						unset($serviceId[$serviceIndex]);
				}
			}
			else
			{
				foreach($serviceId as $serviceIndex)
				{
					if(!array_key_exists($serviceIndex,$service))
						unset($serviceId[$serviceIndex]);	
				}
				
				if(!count($serviceId))
				{
					$response['message']=__('Please select at least one package/service.',PLUGIN_CBS_DOMAIN);
					$this->createBookingJSONResponse($response);					
				}				
			}
		}		
		
		/***/

		if($Validation->isDate($date) && $Validation->isTime($time))
		{
			$dayNumber=date_i18n('N',strtotime($date));
			
			$cost=$Location->calculateCost($attribute);
			$dateUnavailable=$this->getUnavailableDate($locationId,$date,$date);
			
			$businessHour=$location[$locationId]['meta']['business_hour'][$dayNumber];

			if(!$this->isAvailableDate($date,$time,$cost['duration']['minute_sum'],$location[$locationId]['meta']['slot_number'],array($businessHour['start'],$businessHour['stop']),$dateUnavailable))
			{
				$response['message']=__('Please select valid date/time.',PLUGIN_CBS_DOMAIN);
				$this->createBookingJSONResponse($response);					
			}			
		}
		else
		{
			$response['message']=__('Please select valid date/time.',PLUGIN_CBS_DOMAIN);
			$this->createBookingJSONResponse($response);			
		}
		
		/***/
		
		$message=array();
		
		if($Validation->isEmpty($client['client_first_name']))
			array_push($message,__('Please enter your First Name.',PLUGIN_CBS_DOMAIN));
		if($Validation->isEmpty($client['client_second_name']))
			array_push($message,__('Please enter your Last Name.',PLUGIN_CBS_DOMAIN));
		if($Validation->isEmpty($client['client_vehicle']))
			array_push($message,__('Please enter your Vehicle Make and Model.',PLUGIN_CBS_DOMAIN));
		if(!$Validation->isEmailAddress($client['client_email_address']))
			array_push($message,__('Please enter valid E-mail.',PLUGIN_CBS_DOMAIN));
		if($Validation->isEmpty($client['client_phone_number']))
			array_push($message,__('Please enter your Phone Number.',PLUGIN_CBS_DOMAIN));
			 
        if($location[$locationId]['meta']['gratuity_enable']==1)
        {
            if(!$Validation->isFloat($attribute['gratuity'],0,9999999999.99,true))
                array_push($message,__('Please enter valid value of Gratuity.',PLUGIN_CBS_DOMAIN));
        }
        else $attribute['gratuity']=0;
        
        $attribute['gratuity']=preg_replace('/,/','.',$attribute['gratuity']);
        
		if(count($message))
		{
			$response['message']=$message;
			$this->createBookingJSONResponse($response);
		}
        
		if($registerUser['register'])
		{
			if($Validation->isEmpty($registerUser['username']))
			{
				$response['message']=__('Please enter your username.',PLUGIN_CBS_DOMAIN);
				$this->createBookingJSONResponse($response);
			}
			
			if($Validation->isEmpty($registerUser['password']) || $Validation->isEmpty($registerUser['password_check']))
			{
				$response['message']=__('Please enter your password.',PLUGIN_CBS_DOMAIN);
				$this->createBookingJSONResponse($response);
			}
			
			if($registerUser['password']!=$registerUser['password_check'])
			{
				$response['message']=__('Passwords doesn\'t match.',PLUGIN_CBS_DOMAIN);
				$this->createBookingJSONResponse($response);
			}
			
			$userData=array
			(
				'username'														=>	$registerUser['username'],
				'password'														=>	$registerUser['password'],
				'email'															=>	$client['client_email_address'],
			);
			$userMeta=array
			(
				'first_name'													=>	$client['client_first_name'],
				'last_name'														=>	$client['client_second_name'],
				'company_name'													=>	$client['client_company_name'],
				'phone_number'													=>	$client['client_phone_number'],
				'vehicle'														=>	$client['client_vehicle'],
				'address_street'												=>	$client['client_address_street'],
				'address_post_code'												=>	$client['client_address_post_code'],
				'address_city'													=>	$client['client_address_city'],
				'address_state'													=>	$client['client_address_state'],
				'address_country'												=>	$client['client_address_country'],
				'show_admin_bar_front'											=>	false,
			);
			$user=$User->createUser($userData,$userMeta);
			if(!$Validation->isNumber($user, 1, 999999))
			{
				$response['message']=$user;
				$this->createBookingJSONResponse($response);
			}
		}
		
		/***/
		
		$booking=array
		(
			'post_type'															=>	PLUGIN_CBS_CONTEXT.'_booking',
			'post_status'														=>	'publish'
		);
		
		$bookingId=wp_insert_post($booking);
		if($bookingId==0)
		{
			$response['message']=__('We cannot send this booking.',PLUGIN_CBS_DOMAIN);
			$this->createBookingJSONResponse($response);
		}
		
		$booking=array
		(
			'ID'																=>	$bookingId,
			'post_title'														=>	$this->getBookingTitle($bookingId)
		);
		
		wp_update_post($booking);
		
		/***/
		
		CBSPostMeta::updatePostMeta($bookingId,'booking_status',1);
		
		CBSPostMeta::updatePostMeta($bookingId,'location_id',$attribute['location_id']);
		CBSPostMeta::updatePostMeta($bookingId,'location_name',$location[$attribute['location_id']]['post']->post_title);
		
		CBSPostMeta::updatePostMeta($bookingId,'vehicle_id',$attribute['vehicle_id']);
		CBSPostMeta::updatePostMeta($bookingId,'vehicle_name',$vehicle[$attribute['vehicle_id']]['post']->post_title);
		
		if(in_array($location[$locationId]['meta']['content_type'],array(2,3))&&$attribute['package_id'])		
		{
			CBSPostMeta::updatePostMeta($bookingId,'package_id',$attribute['package_id']);
			CBSPostMeta::updatePostMeta($bookingId,'package_name',$package[$attribute['package_id']]['post']->post_title);
		}
		
		if($Coupon->isActive($couponId,$locationId,(float)$Price->formatToSave($cost['price']['unit'].','.$cost['price']['decimal'])))
			CBSPostMeta::updatePostMeta($bookingId,'coupon_id',$couponId);
		
		CBSPostMeta::updatePostMeta($bookingId,'content_type',$location[$locationId]['meta']['content_type']);
		
		foreach($client as $clientIndex=>$clientData)
			CBSPostMeta::updatePostMeta($bookingId,$clientIndex,$clientData);
		
		CBSPostMeta::updatePostMeta($bookingId,'duration',$cost['duration']['minute_sum']);
		CBSPostMeta::updatePostMeta($bookingId,'currency_id',$location[$locationId]['meta']['currency']);
		CBSPostMeta::updatePostMeta($bookingId,'price',$Price->formatToSave($cost['price']['unit'].','.$cost['price']['decimal']));
		CBSPostMeta::updatePostMeta($bookingId,'price_old',$Price->formatToSave($cost['price_old']['unit'].','.$cost['price_old']['decimal']));
		
		CBSPostMeta::updatePostMeta($bookingId,'time',$time);
		CBSPostMeta::updatePostMeta($bookingId,'date',$Date->reverse($date));		
		CBSPostMeta::updatePostMeta($bookingId,'datetime',date_i18n('Y-m-d H:i',strtotime($date.' '.$time)));
		
        CBSPostMeta::updatePostMeta($bookingId,'gratuity',$attribute['gratuity']);
        
		/****/

		$query=null;
		
		if(in_array($location[$locationId]['meta']['content_type'],array(2,3))&&$attribute['package_id'])
		{
			if(isset($package[$packageId]))
			{
				$i=0;
				foreach($service as $serviceIndex=>$serviceData)
				{
					if(!isset($package[$packageId]['service'][$serviceIndex])) continue;
					if($package[$packageId]['service'][$serviceIndex]['service_type']!=1) continue;
					
					if($Validation->isNotEmpty($query)) $query.=',';
					$query.=$wpdb->prepare('(%d,%d,%d,%s,%f,%d,%d)',$bookingId,$serviceIndex,1,$serviceData['post']->{'post_title'},$serviceData['cost']['price'],$serviceData['cost']['duration'],(++$i));
				}
			}			
		}
		
		$i=0;
		foreach($service as $serviceIndex=>$serviceData)
		{
			if(!in_array($serviceIndex,$serviceId)) continue;
			
			if($Validation->isNotEmpty($query)) $query.=',';
			$query.=$wpdb->prepare('(%d,%d,%d,%s,%f,%d,%d)',$bookingId,$serviceIndex,2,$serviceData['post']->{'post_title'},$serviceData['cost']['price'],$serviceData['cost']['duration'],(++$i));
		}

		$query='insert into '.CBSHelper::getMySQLTableName('booking_service').'(booking_id,service_id,service_type,name,price,duration,service_order) values'.$query;
		$wpdb->query($query);
		
		/****/
		
		$this->sendEmail($bookingId,'booking_new_client',sprintf(__('New booking "%s" is received',PLUGIN_CBS_DOMAIN),$booking['post_title']),array($client['client_email_address']));
		$this->sendEmail($bookingId,'booking_new_admin',sprintf(__('New booking "%s" is received',PLUGIN_CBS_DOMAIN),$booking['post_title']),preg_split('/;/',$location[$locationId]['meta']['recipient_email']));
		
		/***/
		
		$response['error']=0;
		$response['bookingId']=$bookingId;
		
		$response['message']=__('Your booking has been sent.',PLUGIN_CBS_DOMAIN);
		$response['form']='';
		
		if($Location->isPaymentAvailable($locationId,'paypal'))
		{		
			$response['message'].='<br><a href="#" class="cbs-paypal-link">'.__('Click to pay via paypal.',PLUGIN_CBS_DOMAIN).'</a>';
			$response['form'].=$this->createPaypalForm($bookingId);
		}
		
		if($Location->isPaymentAvailable($locationId,'stripe'))
		{		
			$response['message'].='<br><a href="#" class="cbs-stripe-link">'.__('Click to pay via stripe.',PLUGIN_CBS_DOMAIN).'</a>';
			$response['form'].=$this->createStripeForm($bookingId);
		}
		
		$this->createBookingJSONResponse($response);
	}
	
	/**************************************************************************/
	
	function createBookingJSONResponse($data)
	{
		$response=array();
		
		$response['form']=$data['form'];
		$response['error']=$data['error'];
		$response['reset']=$data['reset'];
		$response['bookingId']=$data['bookingId'];
		
		$response['notice']['text']='';
		$response['notice']['header']=$data['error']==1 ? __('Errors Found!',PLUGIN_CBS_DOMAIN) : __('Thank you!',PLUGIN_CBS_DOMAIN);
		
		if(is_array($data['message']))
		{
			foreach($data['message'] as $dataValue)
				$response['notice']['text'].='<div>'.$dataValue.'</div>';
		}
		else $response['notice']['text']='<div>'.$data['message'].'</div>';
		
		CBSHelper::createJSONResponse($response);
	}
	
	/**************************************************************************/
	
	function getBookingTitle($bookingId)
	{
		return(__('Booking #',PLUGIN_CBS_DOMAIN).$bookingId);
	}
	
	/**************************************************************************/
	
	function getBooking($bookingId)
	{
		global $post,$wpdb;
		
		$data=array();

		CBSHelper::preservePost($post,$bPost);
		
		$argument=array
		(
			'p'																	=>	$bookingId,
			'post_type'															=>	PLUGIN_CBS_CONTEXT.'_booking',
			'post_status'														=>	'publish',
			'posts_per_page'													=>	-1
		);
		
		$query=new WP_Query($argument);
		if($query===false) return($data);
		
		while($query->have_posts())
		{
			$query->the_post();
			$data['post']=$post;
			$data['meta']=CBSPostMeta::getPostMeta($post);
		}
		
		CBSHelper::preservePost($post,$bPost,0);	
		
		/***/
		
		$query=$wpdb->prepare('select * from '.CBSHelper::getMySQLTableName('booking_service').' where booking_id=%d order by service_type,service_order',$bookingId);
		$result=$wpdb->get_results($query);
		
		foreach($result as $line)
			$data['detail'][]=$line;

		if(isset($data['detail']))
		{
			foreach($data['detail'] as $detailIndex=>$detailData)
			{
				$data['detail'][$detailIndex]->{'service_price'}=$this->getBookingServicePrice($detailData->{'price'},$data['meta']['currency_id'],$detailData->{'service_type'});
				$data['detail'][$detailIndex]->{'service_type_name'}=$this->getBookingServiceTypeName($detailData->{'service_type'},(isset($data['meta']['package_name']) ? $data['meta']['package_name'] : null));
			}
		}
		
		/***/
		
		$query=$wpdb->prepare('select * from '.CBSHelper::getMySQLTableName('booking_payment').' where booking_id=%d order by payment_date desc',$bookingId);
		$result=$wpdb->get_results($query);
		
		foreach($result as $line)
			$data['payment'][]=$line;

		return($data);		
	}
	
	/**************************************************************************/
	
	function sendEmail($bookingId,$file,$subject,$recipient)
	{
		$Date=new CBSDate();
		$Price=new CBSPrice();
		$Email=new CBSEmail();
		$Booking=new CBSBooking();
		$Coupon=new CBSCoupon();
		$Location=new CBSLocation();
		$Validation=new CBSValidation();
		$BookingStatus=new CBSBookingStatus();
		
		$booking=$Booking->getBooking($bookingId);
		if(!count($booking)) return(false);

		$locationId=$booking['meta']['location_id'];
		
		$location=$Location->getDictionary(array('location_id'=>$locationId));
		if(!isset($location[$locationId])) return(false);

		if(!$Validation->isEmailAddress($location[$locationId]['meta']['sender_email'])) return;
		if($Validation->isEmpty($location[$locationId]['meta']['sender_name'])) return;
		
		global $cbs_phpmailer;
			
		$cbs_phpmailer['account']['name']=$location[$locationId]['meta']['sender_name'];
		$cbs_phpmailer['account']['email']=$location[$locationId]['meta']['sender_email'];
		
		$cbs_phpmailer['smtp']['enable']=$location[$locationId]['meta']['sender_smtp_enable'];
		$cbs_phpmailer['smtp']['username']=$location[$locationId]['meta']['sender_smtp_username'];
		$cbs_phpmailer['smtp']['password']=$location[$locationId]['meta']['sender_smtp_password'];
		$cbs_phpmailer['smtp']['host']=$location[$locationId]['meta']['sender_smtp_host'];
		$cbs_phpmailer['smtp']['port']=$location[$locationId]['meta']['sender_smtp_port'];
		$cbs_phpmailer['smtp']['secure_connection_type']=$location[$locationId]['meta']['sender_smtp_secure_connection_type'];
		$cbs_phpmailer['smtp']['debug_enable']=$location[$locationId]['meta']['smtp_debug_enable'];
		
		$data=array();
		
		$data['booking']=$booking;
		$data['location']=$location[$locationId];
		
		$data['admin']=($file=='booking_new_admin' ? 1 : 0);
		
		$data['format']=$this->getEmailStyle();
		
		$data['other']['bookingUrl']=admin_url('post.php').'?post='.$bookingId.'&action=edit';
		$data['other']['bookingStatus']=$BookingStatus->bookingStatus[$booking['meta']['booking_status']][0];
		$data['other']['bookingDuration']=$this->getBookingDuration($Date->reverse($booking['meta']['date']).' '.$booking['meta']['time'],$booking['meta']['duration'],$locationId);

		$data['other']['bookingPrice']=$Price->formatToDisplay2($booking['meta']['price'],$booking['meta']['currency_id']);
		$data['other']['gratuity']=$booking['meta']['gratuity'];
		$data['other']['bookingGratuity']=$Price->formatToDisplay2($booking['meta']['gratuity'],$booking['meta']['currency_id']);
		
		if(array_key_exists('coupon_id', $booking['meta']))
		{
			$couponId=$booking['meta']['coupon_id'];
			$coupon=$Coupon->getCoupon($couponId);
			$data['other']['couponCode']=(count($coupon) ? sprintf(__('%s (Discount: %s%% and Deduction: %s)',PLUGIN_CBS_DOMAIN),$coupon['meta']['coupon_code'],$coupon['meta']['discount'],$coupon['meta']['deduction']) : '');
			
			$data['other']['bookingPrice'].=sprintf(__(' (Before %s%% discount and %s deduction: %s)',PLUGIN_CBS_DOMAIN),$coupon['meta']['discount'],$coupon['meta']['deduction'],$Price->formatToDisplay2($booking['meta']['price_old'],$booking['meta']['currency_id']));
		}
		
		if(array_key_exists('payment_type',$booking['meta']))
		{
			if($booking['meta']['payment_type']=='paypal')
				$data['other']['paymentForm']=$this->createPaypalForm($bookingId,true);
			if($booking['meta']['payment_type']=='stripe')
				$data['other']['paymentForm']=$this->createStripeForm($bookingId,true);
		}
		
		$Template=new CBSTemplateEmail();
		$body=$Template->output($file,$data,false,true,true);

		$Email->send($recipient,$subject,$body);
	}
	
	/**************************************************************************/
	
	function getEmailStyle()
	{
		$style=array();
		
		$style['separator'][1]=' style="height:45px" ';
		$style['separator'][2]=' style="height:30px" ';
		$style['separator'][3]=' style="height:15px" ';

		$style['base']=' style="font-family:Aial;font-size:15px;color:#777777;line-height:150%;" ';
		
		$style['cell'][1]=' style="width:250px;" ';
		$style['cell'][2]=' style="width:300px;" ';
		
		$style['header']=' style="font-weight:bold;color:#444444;border-bottom:dotted 1px #AAAAAA;padding-bottom:5px;text-transform:uppercase" ';
		
		return($style);
	}
	
	/**************************************************************************/
	
	function getUnavailableDate($locationId,$dateStart,$dateStop)
	{
		global $post;
		
		$Date=new CBSDate();
		
		$date=array();
		
		CBSHelper::preservePost($post,$bPost);
		
		$argument=array
		(
			'post_type'															=>	PLUGIN_CBS_CONTEXT.'_booking',
			'post_status'														=>	'publish',
			'posts_per_page'													=>	-1,
			'meta_query'														=>	array
			(
				array
				(
					'key'														=>	PLUGIN_CBS_CONTEXT.'_location_id',
					'value'														=>	$locationId,
					'compare'													=>	'=',
				),
				array
				(
					'key'														=>	PLUGIN_CBS_CONTEXT.'_date',
					'value'														=>	array($Date->reverse($dateStart),$Date->reverse($dateStop)),
					'compare'													=>	'BETWEEN',
					'type'														=>	'DATE'
				),
				array
				(
					'key'														=>	PLUGIN_CBS_CONTEXT.'_booking_status',
					'value'														=>	array(3),
					'compare'													=>	'NOT IN',
				)
			)
		);
		
		$query=new WP_Query($argument);
		if($query===false) return($date);
		
		while($query->have_posts())
		{
			$query->the_post();
			
			$meta=CBSPostMeta::getPostMeta($post);
		
			$dateStart=$Date->reverse($meta['date']).' '.$meta['time'];
			$dateStop=date_i18n('d-m-Y H:i',strtotime($dateStart.' + '.($meta['duration']==0 ? 1 : $meta['duration']).' minute'));
			
			$date[]=array($dateStart,$dateStop);
		}
		
		CBSHelper::preservePost($post,$bPost,0);	
		
		return($date);		
	}
	
	/**************************************************************************/
	
	function isAvailableDate($dateToCheck,$timeToCheck,$duration,$slotCount,$businessHour,$dateUnavailable)
	{
		$Date=new CBSDate();
		
		$dateToCheckStart=date_i18n('d-m-Y H:i',strtotime($dateToCheck.' '.$timeToCheck));
		$dateToCheckStop=date_i18n('d-m-Y H:i',strtotime($dateToCheck.' '.$timeToCheck.' + '.$duration.' minute'));
		
		$count=0;
		foreach($dateUnavailable as $dateUnavailableValue)
		{
			$colision=false;
			
			if(strtotime($dateToCheckStart)===strtotime($dateUnavailableValue[0])) $colision=true;
			if(strtotime($dateToCheckStop)===strtotime($dateUnavailableValue[1])) $colision=true;

			if(($Date->checkInRange($dateToCheckStart,$dateUnavailableValue[0],$dateUnavailableValue[1])) || ($Date->checkInRange($dateToCheckStop,$dateUnavailableValue[0],$dateUnavailableValue[1])))
				$colision=true;
			
			if($colision)
			{
				$count++;
				if($count>=$slotCount) return(false);
			}
		}

		if(!(($Date->checkInRange($dateToCheckStart,date_i18n('d-m-Y',strtotime($dateToCheckStart)).' '.$businessHour[0],date_i18n('d-m-Y',strtotime($dateToCheckStart)).' '.$businessHour[1],true)) || ($Date->checkInRange($dateToCheckStop,date_i18n('d-m-Y',strtotime($dateToCheckStop)).' '.$businessHour[0],date_i18n('d-m-Y',strtotime($dateToCheckStop)).' '.$businessHour[1],true)))) return(false);

		return(true);
	}
	
	/**************************************************************************/
	
	function getBookingDuration($date,$duration,$locationId=0)
	{
		$Date=new CBSDate();
		$Validation=new CBSValidation();
		
		$startDate=date_i18n('d-m-Y',strtotime($date));
		$startTime=date_i18n('H:i',strtotime($date));
		
		$stopTime=date_i18n('H:i',strtotime('+ '.$duration.' minutes',strtotime($date)));
		
		if($locationId!=0)
		{
			$Location=new CBSLocation();
			$location=$Location->getDictionary(array('location_id'=>$locationId));
			
			if(isset($location[$locationId]))
			{
				if($Validation->isNotEmpty($location[$locationId]['meta']['booking_date_format']))
					$startDate=date_i18n($Validation->isEmpty($location[$locationId]['meta']['booking_date_format']) ? 'd-m-Y' : $location[$locationId]['meta']['booking_date_format'],strtotime($startDate));
				
				$postfix=null;
				$Date->formatTime($startTime,$postfix,$location[$locationId]['meta']['booking_time_format']);
				$startTime=$startTime.$postfix;
				
				$postfix=null;
				$Date->formatTime($stopTime,$postfix,$location[$locationId]['meta']['booking_time_format']);
				$stopTime=$stopTime.$postfix;
			}
		}
		
		
		return($startDate.': '.$startTime.' - '.$stopTime.' '.sprintf(__('(%d min)',PLUGIN_CBS_DOMAIN),$duration));
	}
	
	/**************************************************************************/
	
	function getBookingServiceTypeName($serviceType,$packageName)
	{
		return($serviceType==1 ? sprintf(__('%s Package',PLUGIN_CBS_DOMAIN),$packageName) : __('Single Service',PLUGIN_CBS_DOMAIN));
	}
	
	/**************************************************************************/
	
	function getBookingServicePrice($price,$currencyId,$serviceType)
	{
		$Price=new CBSPrice();
		
		$price=$serviceType==1 ? 0.00 : $price;
		return($Price->formatToDisplay2($price,$currencyId));
	}
	
	/**************************************************************************/
	
	function createPaypalForm($bookingId,$submitButton=false)
	{
		$Location=new CBSLocation();
		
		$booking=$this->getBooking($bookingId);
		if(!count($booking)) return(null);
		
		$locationId=$booking['meta']['location_id'];

		$location=$Location->getDictionary(array('location_id'=>$locationId));
		if(count($location)!=1) return(null);
		
		$pageId=(int)CBSHelper::getPostValue('pageId',false);
		
		$html=
		'
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="cbs-paypal-form">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="'.esc_attr($location[$locationId]['meta']['payment_paypal_email_address']).'">				
				<input type="hidden" name="item_name" value="'.esc_attr(get_the_title($bookingId)).'">
				<input type="hidden" name="item_number" value="'.(int)$bookingId.'">
				<input type="hidden" name="amount" value="'.esc_attr($booking['meta']['price']).'">	
				<input type="hidden" name="currency_code" value="'.esc_attr($booking['meta']['currency_id']).'">
				<input type="hidden" value="1" name="no_shipping">
				<input type="hidden" value="'.get_the_permalink($pageId).'?action=ipn" name="notify_url">				
				<input type="hidden" value="'.get_the_permalink($pageId).'?action=success" name="return">
				<input type="hidden" value="'.get_the_permalink($pageId).'?action=cancel" name="cancel_return">
				'.($submitButton ? __('Click on this link to pay for booking:',PLUGIN_CBS_DOMAIN).'<input type="submit" value="'.esc_attr__('Click to pay via Paypal',PLUGIN_CBS_DOMAIN).'" style="background:none;border:none;cursor:pointer;text-decoration:underline;color:#1155CC">' : null).'
			</form>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function createStripeForm($bookingId,$submitButton=false)
	{
		$booking=$this->getBooking($bookingId);
		if(!count($booking)) return(null);

		$locationId=$booking['meta']['location_id'];
		$Location=new CBSLocation();
		$location=$Location->getDictionary(array('location_id'=>$locationId));
		if(count($location)!=1) return(null);
		
		$pageId=(int)CBSHelper::getPostValue('pageId',false);
		$amount=$booking['meta']['price']*100;
		
		$html='';
		
		if($submitButton)
		{
			$html.=
			'
				<form id="cbs-stripe-form" action="'.get_the_permalink($pageId).'" method="post" target="_blank">
					<input type="hidden" name="bookingId" value="'.esc_attr($bookingId).'"/>
					<input type="hidden" name="pageId" value="'.esc_attr($pageId).'"/>
					<input type="hidden" name="stripeForm" value="show"/>
					'.__('Click on this link to pay for booking:',PLUGIN_CBS_DOMAIN).'<input type="submit" value="'.esc_attr__('Click to pay via Stripe',PLUGIN_CBS_DOMAIN).'" style="background:none;border:none;cursor:pointer;text-decoration:underline;color:#1155CC">'.'
				</form>
			';
		}
		else
		{
			$html.=
			'
				<form id="cbs-stripe-form" action="'.get_the_permalink($pageId).'?bookingId='.$bookingId.'" method="POST">
				<script
					src="https://checkout.stripe.com/checkout.js" class="stripe-button"
					data-key="'.$location[$locationId]['meta']['payment_stripe_publishable_key'].'"
					data-amount="'.$amount.'"
					data-name="'.esc_attr(get_the_title($bookingId)).'"
					data-description="'.esc_attr__('New order',PLUGIN_CBS_DOMAIN).'"
					data-currency="'.esc_attr($booking['meta']['currency_id']).'"
					data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
					data-locale="auto">
					</script>
					<button type="submit" formtarget="_blank" style="display:none !important;"></button>
				</form>';
		}
		return $html;
	}
	
	/**************************************************************************/
	
	function selectPayment()
	{
		$response=array();
		
		$PaymentType=new CBSPaymentType();
		
		$bookingId=CBSHelper::getPostValue('bookingId',false);
		$paymentType=CBSHelper::getPostValue('paymentType',false);
		
		$booking=$this->getBooking($bookingId);
		if((!count($booking)) || (!$PaymentType->isPayment($paymentType))) 
			CBSHelper::createJSONResponse($response);
			
		CBSPostMeta::updatePostMeta($bookingId,'payment_type',$paymentType);
		
		if($paymentType!='stripe')
			$this->sendEmail($bookingId,'booking_select_payment_client',sprintf(__('Payment for booking "%s"',PLUGIN_CBS_DOMAIN),get_the_title($bookingId)),array($booking['meta']['client_email_address']));
		
		CBSHelper::createJSONResponse($response);
	}
	
	/**************************************************************************/	
}

/******************************************************************************/
/******************************************************************************/