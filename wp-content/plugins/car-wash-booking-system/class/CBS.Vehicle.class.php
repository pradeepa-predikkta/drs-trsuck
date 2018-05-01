<?php

/******************************************************************************/
/******************************************************************************/

class CBSVehicle
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->icon=array
		(
			'4x4'																=>	array('title'=>__('4x4',PLUGIN_CBS_DOMAIN)),
			'bicycle'															=>	array('title'=>__('Bicycle',PLUGIN_CBS_DOMAIN)),
			'boat'																=>	array('title'=>__('Boat',PLUGIN_CBS_DOMAIN)),
			'bus'																=>	array('title'=>__('Bus',PLUGIN_CBS_DOMAIN)),
			'car-mid-size'														=>	array('title'=>__('Car mid size',PLUGIN_CBS_DOMAIN)),
			'caravan'															=>	array('title'=>__('Caravan',PLUGIN_CBS_DOMAIN)),
			'double-decker'														=>	array('title'=>__('Double decker',PLUGIN_CBS_DOMAIN)),
			'heavy-equipment'													=>	array('title'=>__('Heavy equipment',PLUGIN_CBS_DOMAIN)),
			'jetski'															=>	array('title'=>__('Jetski',PLUGIN_CBS_DOMAIN)),
			'limousine'															=>	array('title'=>__('Limousine',PLUGIN_CBS_DOMAIN)),
			'midibus'															=>	array('title'=>__('Midibus',PLUGIN_CBS_DOMAIN)),
			'mini-car'															=>	array('title'=>__('Mini car',PLUGIN_CBS_DOMAIN)),
			'minibus'															=>	array('title'=>__('Minibus',PLUGIN_CBS_DOMAIN)),
			'minivan'															=>	array('title'=>__('Minivan',PLUGIN_CBS_DOMAIN)),
			'motorcycle'														=>	array('title'=>__('Motorcycle',PLUGIN_CBS_DOMAIN)),
			'pickup'															=>	array('title'=>__('Pickup',PLUGIN_CBS_DOMAIN)),
			'small-car'															=>	array('title'=>__('Small car',PLUGIN_CBS_DOMAIN)),
			'station-wagon'														=>	array('title'=>__('Station wagon',PLUGIN_CBS_DOMAIN)),
			'suv'																=>	array('title'=>__('Suv',PLUGIN_CBS_DOMAIN)),
			'trailer'															=>	array('title'=>__('Trailer',PLUGIN_CBS_DOMAIN)),
			'truck-large'														=>	array('title'=>__('Truck large',PLUGIN_CBS_DOMAIN)),
			'truck-mid-size'													=>	array('title'=>__('Truck mid size',PLUGIN_CBS_DOMAIN)),
			'truck'																=>	array('title'=>__('Truck',PLUGIN_CBS_DOMAIN)),
			'van'																=>	array('title'=>__('Van',PLUGIN_CBS_DOMAIN)),
		);
	}
	
	/**************************************************************************/
	
	function init()
	{
		register_post_type
		(
			PLUGIN_CBS_CONTEXT.'_vehicle',
			array
			(
				'labels'														=>	array
				(
					'name'														=>	__('Vehicles',PLUGIN_CBS_DOMAIN),
					'singular_name'												=>	__('Vehicle',PLUGIN_CBS_DOMAIN),
					'add_new'													=>	__('Add New',PLUGIN_CBS_DOMAIN),
					'add_new_item'												=>	__('Add New Vehicle',PLUGIN_CBS_DOMAIN),
					'edit_item'													=>	__('Edit Vehicle',PLUGIN_CBS_DOMAIN),
					'new_item'													=>	__('New Vehicle',PLUGIN_CBS_DOMAIN),
					'all_items'													=>	__('Vehicles',PLUGIN_CBS_DOMAIN),
					'view_item'													=>	__('View Vehicle',PLUGIN_CBS_DOMAIN),
					'search_items'												=>	__('Search Vehicles',PLUGIN_CBS_DOMAIN),
					'not_found'													=>	__('No Vehicles Found',PLUGIN_CBS_DOMAIN),
					'not_found_in_trash'										=>	__('No Vehicles Found in Trash',PLUGIN_CBS_DOMAIN), 
					'parent_item_colon'											=>	'',
					'menu_name'													=>	__('Vehicles',PLUGIN_CBS_DOMAIN)
				),	
				'public'														=>	false,  
				'show_ui'														=>	true, 
				'show_in_menu'													=>	'edit.php?post_type=cbs_booking',
				'capability_type'												=>	'post',
				'menu_position'													=>	2,
				'hierarchical'													=>	false,  
				'rewrite'														=>	false,  
				'supports'														=>	array('title','page-attributes','thumbnail')  
			)
		);
		
		add_filter('manage_edit-'.PLUGIN_CBS_CONTEXT.'_vehicle_columns',array($this,'manageEditColumn')); 
		add_action('manage_'.PLUGIN_CBS_CONTEXT.'_vehicle_posts_custom_column',array($this,'manageColumn'));
		add_filter('manage_edit-'.PLUGIN_CBS_CONTEXT.'_vehicle_sortable_columns',array($this,'manageEditSortableColumn'));
        add_filter('postbox_classes_'.PLUGIN_CBS_CONTEXT.'_vehicle_cbs_meta_box_vehicle',array($this,'adminCreateMetaBoxClass'));
		
		add_action('save_post',array($this,'savePost'));
		add_action('add_meta_boxes_'.PLUGIN_CBS_CONTEXT.'_vehicle',array($this,'addMetaBox'));
	}
	
	/**************************************************************************/
	
	function addMetaBox()
	{
		add_meta_box(PLUGIN_CBS_CONTEXT.'_meta_box_vehicle',__('General',PLUGIN_CBS_DOMAIN),array($this,'addMetaBoxGeneral'),PLUGIN_CBS_CONTEXT.'_vehicle','normal','low');	
	}
   	
	/**************************************************************************/
	
	function addMetaBoxGeneral()
	{
		global $post;
		
		$data=array();
		
		$data['nonce']=CBSHelper::createNonceField(PLUGIN_CBS_CONTEXT.'_meta_box_vehicle');
		
		$data['dictionary']['icon']=$this->icon;
		
		$data['meta']=CBSPostMeta::getPostMeta($post);

		$Template=new CBSTemplate($data,PLUGIN_CBS_TEMPLATE_PATH.'admin/meta_box_vehicle.php');
		echo $Template->output();
	}
    
    /**************************************************************************/
    
    function adminCreateMetaBoxClass($class) 
    {
        array_push($class,'to-postbox-1');
        return($class);
    }
	
	/**************************************************************************/
	
	function getDictionary($attr=array())
	{
		global $post;
		
		$dictionary=array();
		
		$default=array
		(
			'vehicle_id'														=>	0
		);
		
		$attribute=shortcode_atts($default,$attr);

		CBSHelper::preservePost($post,$bPost);

		$argument=array
		(
			'post_type'															=>	PLUGIN_CBS_CONTEXT.'_vehicle',
			'post_status'														=>	'publish',
			'posts_per_page'													=>	-1,
			'orderby'															=>	array('menu_order'=>'asc','title'=>'asc')
		);
		
		if($attribute['vehicle_id'])
			$argument['p']=$attribute['vehicle_id'];

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
	
	function manageEditColumn($column)
	{
		$column=array
		(  
			'cb'																=>	'<input type="checkbox"/>',
			'name'																=>	__('Vehicle Type',PLUGIN_CBS_DOMAIN),
			'icon'																=>	__('Icon',PLUGIN_CBS_DOMAIN),
			'order'																=>	__('Order',PLUGIN_CBS_DOMAIN),
		);   
		
		return($column);  
	}  
	
	/**************************************************************************/
	
	function manageEditSortableColumn($column)
	{
		$column['name']='title';
		$column['icon']='title';
		$column['order']='menu_order';
		
		return($column);
	}
	
	/**************************************************************************/
	
	function manageColumn($column)
	{
		global $post;
		
		$meta=CBSPostMeta::getPostMeta($post);
		
		switch($column) 
		{
			case 'name':
				echo '<strong><a class="row-title" href="'.get_edit_post_link($post->ID).'">'.get_the_title().'</a></strong>'; 
			break;
			case 'order':
				echo esc_html($post->menu_order);
			break;
			case 'icon':
				echo $this->getVehicleIcon($post->ID,$meta);
			break;
		}
		
		return($column);
	}
	
	/**************************************************************************/
	
	function savePost($postId)
	{
		if(!$_POST) return(false);
		
		if(CBSHelper::checkSavePost($postId,PLUGIN_CBS_CONTEXT.'_meta_box_vehicle_noncename','savePost')===false) return(false);
		
		$Validation=new CBSValidation();
		
		CBSPostMeta::updatePostMeta($postId,'icon',CBSHelper::getPostValue('icon'));	
		
		if($Validation->isNumber(CBSHelper::getPostValue('icon_image_height'),0,999))
			CBSPostMeta::updatePostMeta($postId,'icon_image_height',CBSHelper::getPostValue('icon_image_height'));
	}
	
	/**************************************************************************/
	
	function setPostMetaDefault(&$meta)
	{
		CBSHelper::setDefault($meta,'icon','icon-1');
		CBSHelper::setDefault($meta,'icon_image_height','42');
	}
	
	/**************************************************************************/
	
	function getVehiclePublic($argument,$service,$package)
	{
		global $wpdb;
		
		$default=array
		(
			'location_id'														=> 0,
			'vehicle_id'														=> 0
		);
		
		$attribute=shortcode_atts($default,$argument);
		
		/***/
		
		$serviceIndex=array_keys($service);
		
		foreach($package as $packageData)
		{
			if(is_array($packageData['service']))
				$serviceIndex+=array_keys($packageData['service']);
		}
		
		/***/
		
		$query=$wpdb->prepare('select vehicle_id from '.CBSHelper::getMySQLTableName('service_detail').' where enable=1 and service_id in ('.join(',',$serviceIndex).') and location_id=%d',$attribute['location_id']);
		$result=$wpdb->get_results($query);
		
		$vehicle=array();
		foreach($result as $line)
			$vehicle[]=$line->{'vehicle_id'};
		
		$vehicle=array_unique($vehicle);
			
		/***/
		
		$dictionary=$this->getDictionary();
		
		foreach($dictionary as $dictionaryIndex=>$dictionaryValue)
		{
			if(!in_array($dictionaryIndex,$vehicle))
				unset($dictionary[$dictionaryIndex]);
		}
	
		/***/
		
		return($dictionary);
	}
	
	/**************************************************************************/
	
	function getVehicleIcon($postId,$postMeta=null,$tag='span')
	{
		$html=null;
		
		if(is_null($postMeta)) $postMeta=CBSPostMeta::getPostMeta($postId);
		
		if(has_post_thumbnail($postId))
			$html='<img src="'.esc_url(wp_get_attachment_url(get_post_thumbnail_id($postId))).'" style="max-height:'.(int)$postMeta['icon_image_height'].'px" alt="" />';
		else $html='<'.$tag.' class="cbs-vehicle-icon cbs-vehicle-icon-'.esc_attr($postMeta['icon']).'"></'.$tag.'>';

		return($html);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/