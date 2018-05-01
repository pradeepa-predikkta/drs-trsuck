<?php

/******************************************************************************/
/******************************************************************************/

class TFGoogleFont
{
	/**************************************************************************/
	
	function __construct()
	{
		
	}
	
	/**************************************************************************/

	function scheduleDownload()
	{
		$cTime=time();
		$oTime=(int)TFOption::getOption('time_google_font');

		if($cTime-$oTime>(PLUGIN_THEME_FONT_GOOGLE_FONT_INTERVAL)) $this->download();
	}
	
	/**************************************************************************/		

	function download()
	{
		$response=wp_remote_get('http://quanticalabs.com/.tools/GoogleFont/font.txt',array('sslverify'=>false));
		
		$option=TFOption::getOption();
		$option['time_google_font']=time();
		
		TFOption::updateOption($option);
		
		if(!$this->checkResponse($response)) return(false);
		
		update_option(PLUGIN_THEME_FONT_GOOGLE_FONT_OPTION_NAME,$response['body']);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function checkResponse($response)
	{
		if(is_wp_error($response)) return(false);
		
		if(!array_key_exists('body',$response)) return(false);
		
		$response=json_decode($response['body']);
		if(is_null($response)) return(false);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function unpack()
	{
		$data=array();
		$font=json_decode(get_option(PLUGIN_THEME_FONT_GOOGLE_FONT_OPTION_NAME));

		foreach((array)$font->items as $value)
			$data[$value->family]=array('variant'=>$value->variants,'subset'=>$value->subsets);	
		
		return($data);
	}
	
	/**************************************************************************/
	
	function getFontByName()
	{
		$query=$_GET['query'];
		
		$data=array();
		$dictionary=$this->unpack();
		
		foreach($dictionary as $index=>$value)
		{
			if(preg_match('/^'.preg_quote($query,'/').'/i',$index,$result))
			{
				$data[]=array('label'=>$index,'value'=>$index,'variant'=>json_encode($value['variant']));
				if(count($data)==10) break;
			}
		}
		
		echo json_encode($data);
		exit;
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/