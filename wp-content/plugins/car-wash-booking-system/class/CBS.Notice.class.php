<?php

/******************************************************************************/
/******************************************************************************/

class CBSNotice
{
	/**************************************************************************/

	function __construct()
	{
		$this->error=array();
	}

	/**************************************************************************/

	function addError($fieldName,$errorMessage)
	{
		$this->error[]=array($fieldName,$errorMessage);
	}

	/**************************************************************************/

	function getError()
	{
		return($this->error);
	}

	/**************************************************************************/

	function isError()
	{
		return(count($this->error));
	}
	
	/**************************************************************************/
	
	function createHTML($templatePath,$forceError=false,$error=false,$subtitle=null)
	{
		$data=array();
		
		$data['type']=($forceError ? $error : $this->isError()) ? 'error' : 'success';
		
		if($this->isError())
		{
			$data['title']=esc_html__('Error',PLUGIN_CBS_DOMAIN);
			$data['subtitle']=is_null($subtitle) ? esc_html__('Changes can not be saved.',PLUGIN_CBS_DOMAIN) : $subtitle;				
		}
		else
		{
			$data['title']=esc_html__('Success',PLUGIN_CBS_DOMAIN);
			$data['subtitle']=is_null($subtitle) ? esc_html__('All changes have been saved.',PLUGIN_CBS_DOMAIN) : $subtitle;			
		}
		
		$Template=new CBSTemplate($data,$templatePath);
		return($Template->output());
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/