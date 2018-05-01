<?php

/******************************************************************************/
/******************************************************************************/

class TFCSS
{
	/**************************************************************************/

	function __construct()
	{

	}

	/**************************************************************************/
	
	function create($option)
	{
		$option['property']=$this->validateProperty($option['property']);
		
		if(!count($option['property'])) return;
		
		TFHelper::removeUIndex($option,array('media',array()),array('selector',array()),'property');
		
		$output=null;
		
		$output.=$this->createMedia($option['media']);
		$output.=$this->createSelector($option['selector']);
		$output.=$this->createProperty($option['property']);
		$output.=$this->createMedia($option['media'],false);
		
		return($output);
	}
	
	/**************************************************************************/
	
	function validateProperty($property)
	{
		$data=array();
		
		$Font=new TFFont();
		$Validation=new	TFValidation();
		
		foreach($property as $name=>$value)
		{
			switch($name)
			{
				case 'font-family'			:
					
					foreach($value as $fontName)
					{
						if($Validation->isEmpty($fontName)) continue;
						
						if(array_key_exists($name,$data)) $data[$name].=',';
						else $data[$name]='';
						
						$data[$name].='\''.$fontName.'\'';
					}
					
				break;
				
				case 'font-size'			:
					
					if($Validation->isNumber($value,0,200)) $data[$name]=$value.'px';
					
				break;
				
				case 'font-style'			:
					
					if(array_key_exists($value,$Font->fontStyle))
					{
						if($value!=-1) $data[$name]=$value;
					}
					
				break;
				
				case 'font-weight'			:
					
					if(array_key_exists($value,$Font->fontWeight))
					{
						if($value!=-1) $data[$name]=$value;					
					}
					
				break;
				
				case 'text-transform'		:
					
					if(array_key_exists($value,$Font->textTransform))
					{
						if($value!=-1) $data[$name]=$value;					
					}
					
				break;
				
				case 'line-height'			:
					
					if($Validation->isNotEmpty($value)) $data[$name]=$value;
					
				break;
				
				case 'letter-spacing'		:
					
					if($Validation->isNotEmpty($value)) $data[$name]=$value;
					
				break;
			}
		}
		
		return($data);
	}
	
	/**************************************************************************/
	
	function createSelector($selector)
	{
		$output=null;
		
		foreach($selector as $name)
		{
			if(!is_null($output)) $output.=",\n";
			$output.=$name;
		}
		
		return("\n".$output."\n{\n");
	}
	
	/**************************************************************************/
	
	function createProperty($property)
	{
		$output=null;
		
		foreach($property as $name=>$value)
		{
			if(!is_null($output)) $output.="\n";
			$output.="\t".$name.':'.$value.';';
		}
		
		return($output."\n}\n");		
	}
	
	/**************************************************************************/
	
	function createMedia($media,$start=true)
	{
		if(!count($media)) return;
		
		if($start)
		{
			$output=null;
			foreach($media as $index=>$value)
				$output.=' and ('.$index.':'.$value.'px)';
	
			$output="@media only screen ".$output."\n{\n";
		}
		else $output="}\n\n";
		
		return($output);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/