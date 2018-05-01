<?php

/******************************************************************************/
/******************************************************************************/

class CBSDemo
{
	/**************************************************************************/
	
	function __construct()
	{

	}
	
	/**************************************************************************/
	
	function import()
	{
		error_reporting(E_ALL);
		
		ob_start();
		ob_clean();
		
		global $wpdb;
		
		/***/
		
		if(!defined('WP_LOAD_IMPORTERS')) define('WP_LOAD_IMPORTERS',true);

		CBSInclude::includeFile(ABSPATH.'wp-admin/includes/import.php');

		$includeClass=array
		(
			array
			(
				'class'	=>	'WP_Import',
				'path'	=>	PLUGIN_CBS_LIBRARY_PATH.'wordpress-importer.php'				
			)
		);

		foreach($includeClass as $value)
		{
			$r=CBSInclude::includeClass($value['path'],array($value['class']));
			if($r!==true) break;
		}

		if($r===false) return(false);

		/***/
		
		$Import=new WP_Import();
		$Import->fetch_attachments=true;
		$Import->import(PLUGIN_CBS_DUMMY_CONTENT_PATH.'dummy_content.xml.gz');
	
		/***/
		
		$dataPost=array
		(
			'location'															=>	array
			(
				array
				(
					'name'														=>	'portland',
					'post_id'													=>	'32'
				),
				array
				(
					'name'														=>	'tampa',
					'post_id'													=>	'213'
				),
				array
				(
					'name'														=>	'lake-worth',
					'post_id'													=>	'214'
				)
			),
			'vehicle'															=>	array
			(
				array
				(
					'name'														=>	'small-car',
					'post_id'													=>	'24'
				),
				array
				(
					'name'														=>	'medium-car',
					'post_id'													=>	'25'
				),
				array
				(
					'name'														=>	'suv',
					'post_id'													=>	'26'
				),
				array
				(
					'name'														=>	'minivan',
					'post_id'													=>	'27'
				),
				array
				(
					'name'														=>	'small-truck',
					'post_id'													=>	'28'
				),
				array
				(
					'name'														=>	'pickup-truck',
					'post_id'													=>	'30'
				),
				array
				(
					'name'														=>	'mid-size-bus-2',
					'post_id'													=>	'224'
				),
				array
				(
					'name'														=>	'bus-3',
					'post_id'													=>	'225'
				),
				array
				(
					'name'														=>	'heavy-equipment',
					'post_id'													=>	'226'
				),				
				array
				(
					'name'														=>	'heavy-equipment-2',
					'post_id'													=>	'227'
				),
			),
			'service'															=>	array
			(
				array
				(
					'name'														=>	'towel-hand-dry',
					'post_id'													=>	'37',
				),
				array
				(
					'name'														=>	'car-wash',
					'post_id'													=>	'34'
				),
				array
				(
					'name'														=>	'hand-wheel-wash',
					'post_id'													=>	'38'
				),
				array
				(
					'name'														=>	'interior-vacuum',
					'post_id'													=>	'39'
				),
				array
				(
					'name'														=>	'windows-in-out',
					'post_id'													=>	'40'
				),
				array
				(
					'name'														=>	'dashboard-clean',
					'post_id'													=>	'42'
				),
				array
				(
					'name'														=>	'door-shuts-plastics',
					'post_id'													=>	'43'
				),
				array
				(
					'name'														=>	'sealer-wax',
					'post_id'													=>	'44'
				),
				array
				(
					'name'														=>	'tire-shine',
					'post_id'													=>	'45'
				),
				array
				(
					'name'														=>	'engine-bay-clean',
					'post_id'													=>	'47'
				),
				array
				(
					'name'														=>	'boot-vacuum',
					'post_id'													=>	'50'
				),
				array
				(
					'name'														=>	'air-freshener',
					'post_id'													=>	'51'
				),
				array
				(
					'name'														=>	'paint-protection',
					'post_id'													=>	'52'
				),
				array
				(
					'name'														=>	'carnauba-hand-wax',
					'post_id'													=>	'54'
				),
				array
				(
					'name'														=>	'exterior-vinyl-protectant',
					'post_id'													=>	'80'
				),
				array
				(
					'name'														=>	'rain-x-surface-protectant',
					'post_id'													=>	'81'
				)
			),
			'package'															=>	array
			(
				array
				(
					'name'														=>	'basic-hand-wash',
					'post_id'													=>	'55'
				),
				array
				(
					'name'														=>	'custom-deluxe',
					'post_id'													=>	'56'
				),
				array
				(
					'name'														=>	'ultimate-shine',
					'post_id'													=>	'57'
				),
				array
				(
					'name'														=>	'platinum-hand-detail',
					'post_id'													=>	'58'
				)
			)
		);
		
		/***/
		
		$replaceId=array();
		global $post;
		
		foreach($dataPost as $dataIndex=>$dataValue)
		{
			foreach($dataValue as $dataValueLine)
			{
				$argument=array
				(
					'post_type'													=>	PLUGIN_CBS_CONTEXT.'_'.$dataIndex,
					'name'														=>	$dataValueLine['name']
				);

				$query=new WP_Query($argument);

				if($query===false) continue;
				if($query->post_count!=1) continue;

				$query->the_post();
				
				$replaceId[$dataIndex][$dataValueLine['post_id']]=$post->ID;
			}
		}
		
		/***/
		
		$dataCustom=array
		(
			'service_detail'													=>	array
			(
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'9.95','duration'=>'15'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'14.95','duration'=>'20'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'9.95','duration'=>'15'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'12.00','duration'=>'20'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'6.00','duration'=>'10'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'226','enable'=>'1','price'=>'12.95','duration'=>'15'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'227','enable'=>'1','price'=>'12.95','duration'=>'15'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'12.50','duration'=>'15'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'12.50','duration'=>'15'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'8.50','duration'=>'10'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'12.50','duration'=>'15'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'6.95','duration'=>'15'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'9.95','duration'=>'20'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'227','enable'=>'1','price'=>'10.00','duration'=>'20'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'226','enable'=>'1','price'=>'10.00','duration'=>'20'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'5.00','duration'=>'10'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'5.00','duration'=>'10'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'7.00','duration'=>'10'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'580.00','duration'=>'300'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'700.00','duration'=>'360'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'7.50','duration'=>'15'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'10.50','duration'=>'20'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'13.50','duration'=>'25'),
				array('service_id'=>'37','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'10.50','duration'=>'20'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'23.95','duration'=>'40'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'26.95','duration'=>'45'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'6.00','duration'=>'10'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'30.50','duration'=>'60'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'5.00','duration'=>'10'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'49.95','duration'=>'60'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'12.95','duration'=>'15'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'9.95','duration'=>'10'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'227','enable'=>'1','price'=>'24.95','duration'=>'25'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'226','enable'=>'1','price'=>'29.95','duration'=>'30'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'29.95','duration'=>'30'),
				array('service_id'=>'39','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'9.95','duration'=>'10'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'19.95','duration'=>'20'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'14.95','duration'=>'15'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'14.95','duration'=>'15'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'9.95','duration'=>'10'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'7.00','duration'=>'10'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'14.00','duration'=>'20'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'10.50','duration'=>'15'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'14.00','duration'=>'20'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'10.50','duration'=>'15'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'12.50','duration'=>'15'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'12.50','duration'=>'15'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'8.50','duration'=>'10'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'12.50','duration'=>'15'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'8.50','duration'=>'10'),
				array('service_id'=>'43','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'14.95','duration'=>'30'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'9.95','duration'=>'20'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'6.95','duration'=>'15'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'9.95','duration'=>'20'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'6.95','duration'=>'15'),
				array('service_id'=>'44','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'226','enable'=>'1','price'=>'14.95','duration'=>'30'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'227','enable'=>'1','price'=>'19.95','duration'=>'40'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'20.95','duration'=>'35'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'20.95','duration'=>'35'),
				array('service_id'=>'54','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'23.95','duration'=>'40'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'23.95','duration'=>'40'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'20.95','duration'=>'35'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'26.95','duration'=>'45'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'23.95','duration'=>'40'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'7.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'7.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'13.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'10.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'7.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'10.75','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'227','enable'=>'1','price'=>'149.95','duration'=>'120'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'226','enable'=>'1','price'=>'79.95','duration'=>'60'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'79.95','duration'=>'60'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'460.00','duration'=>'240'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'460.00','duration'=>'240'),
				array('service_id'=>'52','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'580.00','duration'=>'300'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'580.00','duration'=>'300'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'460.00','duration'=>'240'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'700.00','duration'=>'360'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'580.00','duration'=>'300'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'14.95','duration'=>'20'),
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'9.95','duration'=>'15'),
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'30.95','duration'=>'40'),
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'19.95','duration'=>'25'),
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'19.95','duration'=>'25'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'30.95','duration'=>'40'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'9.95','duration'=>'15'),
				array('service_id'=>'34','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'227','enable'=>'1','price'=>'79.95','duration'=>'90'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'226','enable'=>'1','price'=>'39.95','duration'=>'60'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'39.95','duration'=>'60'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'15.95','duration'=>'30'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'34','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'460.00','duration'=>'240'),
				array('service_id'=>'52','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'52','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'47','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'7.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'7.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'10.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'10.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'13.75','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'81','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'80','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'20.95','duration'=>'35'),
				array('service_id'=>'54','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'54','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'9.95','duration'=>'20'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'14.95','duration'=>'30'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'9.95','duration'=>'20'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'6.95','duration'=>'15'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'6.95','duration'=>'15'),
				array('service_id'=>'44','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'51','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'226','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'42','location_id'=>'214','vehicle_id'=>'227','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'8.50','duration'=>'10'),
				array('service_id'=>'43','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'8.50','duration'=>'10'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'43','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'226','enable'=>'1','price'=>'14.00','duration'=>'20'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'225','enable'=>'1','price'=>'10.50','duration'=>'15'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'224','enable'=>'1','price'=>'7.00','duration'=>'10'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'30','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'28','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'27','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'26','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'50','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'9.95','duration'=>'10'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'9.95','duration'=>'10'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'14.95','duration'=>'15'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'14.95','duration'=>'15'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'19.95','duration'=>'20'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'39','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'25','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'40','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'5.00','duration'=>'10'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'45','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'6.00','duration'=>'10'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'38','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'7.50','duration'=>'15'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'10.50','duration'=>'20'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'10.50','duration'=>'20'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'13.50','duration'=>'25'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00','duration'=>'0'),
				array('service_id'=>'37','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00','duration'=>'0')
			),
			'package_detail'													=>	array
			(
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'30.95'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'27.95'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'32.95'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'42.95'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'45.95'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'65.95'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'52.95'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'40.45'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'55.95'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'72.95'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'75.45'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'105.45'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'28','enable'=>'1','price'=>'139.95'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'30','enable'=>'1','price'=>'112.45'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'27','enable'=>'1','price'=>'109.45'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'26','enable'=>'1','price'=>'85.95'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'25','enable'=>'1','price'=>'82.95'),
				array('package_id'=>'58','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'65.95'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'28','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'30','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'17.95'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'15.95'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'19.45'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'27.95'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'45.95'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'32.95'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'27','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'26','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'30','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'28','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'25','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'213','vehicle_id'=>'24','enable'=>'1','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'28','enable'=>'1','price'=>'139.95'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'30','enable'=>'1','price'=>'112.45'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'27','enable'=>'1','price'=>'109.45'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'26','enable'=>'1','price'=>'85.95'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'25','enable'=>'1','price'=>'82.95'),
				array('package_id'=>'58','location_id'=>'32','vehicle_id'=>'24','enable'=>'1','price'=>'65.95'),
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'15.95'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'25','enable'=>'1','price'=>'17.95'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'26','enable'=>'1','price'=>'19.45'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'27','enable'=>'1','price'=>'27.95'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'30','enable'=>'1','price'=>'32.95'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'28','enable'=>'1','price'=>'45.95'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'55','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'27.95'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'25','enable'=>'1','price'=>'30.95'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'26','enable'=>'1','price'=>'32.95'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'27','enable'=>'1','price'=>'42.95'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'30','enable'=>'1','price'=>'45.95'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'28','enable'=>'1','price'=>'65.95'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'56','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'213','vehicle_id'=>'227','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'24','enable'=>'1','price'=>'40.45'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'25','enable'=>'1','price'=>'52.95'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'26','enable'=>'1','price'=>'55.95'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'27','enable'=>'1','price'=>'72.95'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'30','enable'=>'1','price'=>'75.45'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'28','enable'=>'1','price'=>'105.45'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'224','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'225','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'226','enable'=>'0','price'=>'0.00'),
				array('package_id'=>'57','location_id'=>'214','vehicle_id'=>'227','enable'=>'0','price'=>'0.00')
			),
			'package_service'													=>	array
			(
				array('package_id'=>'55','service_id'=>'52','service_type'=>'0'),
				array('package_id'=>'55','service_id'=>'47','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'81','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'80','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'54','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'44','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'51','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'42','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'43','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'50','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'39','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'40','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'45','service_type'=>'2'),
				array('package_id'=>'55','service_id'=>'38','service_type'=>'1'),
				array('package_id'=>'56','service_id'=>'43','service_type'=>'2'),
				array('package_id'=>'56','service_id'=>'39','service_type'=>'2'),
				array('package_id'=>'56','service_id'=>'52','service_type'=>'0'),
				array('package_id'=>'56','service_id'=>'47','service_type'=>'2'),
				array('package_id'=>'56','service_id'=>'81','service_type'=>'2'),
				array('package_id'=>'56','service_id'=>'44','service_type'=>'1'),
				array('package_id'=>'56','service_id'=>'54','service_type'=>'2'),
				array('package_id'=>'56','service_id'=>'42','service_type'=>'2'),
				array('package_id'=>'56','service_id'=>'40','service_type'=>'1'),
				array('package_id'=>'56','service_id'=>'80','service_type'=>'2'),
				array('package_id'=>'56','service_id'=>'37','service_type'=>'1'),
				array('package_id'=>'56','service_id'=>'38','service_type'=>'1'),
				array('package_id'=>'56','service_id'=>'51','service_type'=>'2'),
				array('package_id'=>'57','service_id'=>'52','service_type'=>'0'),
				array('package_id'=>'56','service_id'=>'34','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'47','service_type'=>'2'),
				array('package_id'=>'57','service_id'=>'81','service_type'=>'2'),
				array('package_id'=>'57','service_id'=>'80','service_type'=>'2'),
				array('package_id'=>'57','service_id'=>'54','service_type'=>'2'),
				array('package_id'=>'57','service_id'=>'44','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'51','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'42','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'43','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'50','service_type'=>'2'),
				array('package_id'=>'56','service_id'=>'50','service_type'=>'2'),
				array('package_id'=>'57','service_id'=>'39','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'40','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'45','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'38','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'37','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'52','service_type'=>'0'),
				array('package_id'=>'56','service_id'=>'45','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'47','service_type'=>'2'),
				array('package_id'=>'58','service_id'=>'81','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'80','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'54','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'44','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'51','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'42','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'43','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'50','service_type'=>'2'),
				array('package_id'=>'58','service_id'=>'39','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'40','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'45','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'38','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'37','service_type'=>'1'),
				array('package_id'=>'58','service_id'=>'34','service_type'=>'1'),
				array('package_id'=>'57','service_id'=>'34','service_type'=>'1'),
				array('package_id'=>'55','service_id'=>'37','service_type'=>'1'),
				array('package_id'=>'55','service_id'=>'34','service_type'=>'1')
			)
		);
		
		/***/
	
		$postType=array_keys($dataPost);
		
		foreach($dataCustom as $tableName=>$tableData)
		{
			foreach($tableData as $line)
			{
				$error=false;
				foreach($postType as $postName)
				{
					if(array_key_exists($postName.'_id',$line))
					{			
						$id=$line[$postName.'_id'];
						if(isset($replaceId[$postName][$id]))
							$line[$postName.'_id']=$replaceId[$postName][$id];
						else $error=true;
					}
				}
				
				if(!$error) 
				{
					$query='insert into '.CBSHelper::getMySQLTableName($tableName).' values('.join(',',$line).')';
					$wpdb->query($query);
				}
			}		
		}
		
		/***/
		
		$Location=new CBSLocation();
		$location=$Location->getDictionary();
		
		foreach($location as $locationId=>$locationData)
			$Location->createCSSFile($locationId);
		
		/***/
		
		$buffer=ob_get_clean();
		if(ob_get_contents()) ob_end_clean();
		
		return($buffer);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/