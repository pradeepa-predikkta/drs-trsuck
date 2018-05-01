<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeCSS
{
	/**************************************************************************/

	function __construct()
	{
		$this->fontWeight=array
		(
			'100'																=>	array(__('100','autospa')),
			'200'																=>	array(__('200','autospa')),
			'300'																=>	array(__('300','autospa')),
			'400'																=>	array(__('400','autospa')),
			'500'																=>	array(__('500','autospa')),
			'600'																=>	array(__('600','autospa')),
			'700'																=>	array(__('700','autospa')),
			'800'																=>	array(__('800','autospa')),
			'900'																=>	array(__('900','autospa')),	
			'bold'																=>	array(__('bold','autospa')),
			'bolder'															=>	array(__('bolder','autospa')),
			'inherit'															=>	array(__('inherit','autospa')),
			'lighter'															=>	array(__('lighter','autospa')),
			'normal'															=>	array(__('normal','autospa'))
		);

		$this->fontStyle=array
		(
			'inherit'															=>	array(__('inherit','autospa')),
			'italic'															=>	array(__('italic','autospa')),
			'normal'															=>	array(__('normal','autospa')),
			'oblique'															=>	array(__('oblique','autospa'))
		);	
	}
	
	/**************************************************************************/
	
	function create($option,$echo=false)
	{
		$option['property']=$this->validateProperty($option['property']);
		
		if(!count($option['property'])) return;
		
		Autospa_ThemeHelper::removeUIndex($option,array('media',array()),array('selector',array()),'property','autospa');
		
		$output=null;
		
		$output.=$this->createMedia($option['media']);
		$output.=$this->createSelector($option['selector']);
		$output.=$this->createProperty($option['property']);
		$output.=$this->createMedia($option['media'],false);
		
		if($echo) echo $output;
		else return($output);
	}
	
	/**************************************************************************/
	
	function validateProperty($property)
	{
		$data=array();
		$Validation=new	ThemeValidation();
		
		foreach($property as $name=>$value)
		{
			$unit='px';
			
			if(is_array($value))
			{
				if(isset($value['unit'])) $unit=$value['unit'];
				if(isset($value['value'])) $value=$value['value'];
			}

			switch($name)
			{
				case 'left':
				case 'width':
				case 'height':
				case 'font-size':
				case 'padding-top':
				case 'padding-left':
				case 'padding-right':
				case 'padding-bottom':
				case 'border-width':

					if($Validation->isNumber($value,0,9999)) $data[$name]=$value.$unit;
				
				break;
				
				case 'top':
				case 'margin-top':
				case 'margin-left':
				case 'margin-right':
				case 'margin-bottom':
					
					if($Validation->isNumber($value,-9999,9999)) $data[$name]=$value.$unit;
					
				break;
				
				case 'color':
				case 'border-color':
				case 'border-top-color':
				case 'border-right-color':
				case 'border-bottom-color':
				case 'border-left-color':	
				case 'outline-color':
				case 'background-color':
					
					$value=ThemeColor::getColor($value);
					if($Validation->isNotEmpty($value)) $data[$name]=$value;
					
				break;

				case 'font-family':
					
					foreach((array)$value as $family)
					{
						if($Validation->isNotEmpty($family)) 
						{
							Autospa_ThemeHelper::removeUIndex($data,$name);
							
							if($Validation->isNotEmpty($data[$name])) $data[$name].=',';
							$data[$name].='\''.$family.'\'';
						}
					}
					
				break;
				
				case 'font-style':
					
					if(isset($this->fontStyle[$value])) $data[$name]=$value;
	
				break;
				
				case 'font-weight':
					
					if(isset($this->fontWeight[$value])) $data[$name]=$value;
	
				break;
				
				case 'display':
				case 'border-style':
				case 'line-height':
				case 'background':
				case 'background-repeat':
				case 'background-position':
					
					if($Validation->isNotEmpty($value)) $data[$name]=$value;
					
				break;
				
				case 'background-image':
					
					if($Validation->isNotEmpty($value)) $data[$name]='url(\''.$value.'\')';
					
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