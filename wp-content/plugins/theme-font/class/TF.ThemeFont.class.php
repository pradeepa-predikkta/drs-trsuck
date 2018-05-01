<?php

/******************************************************************************/
/******************************************************************************/

class TFThemeFont
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->includeConfig();
		
		$this->libraryDefault=array
		(
			'script'															=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_THEME_FONT_SCRIPT_URL,
				'file'															=>	'',
				'in_footer'														=>	true,
				'dependencies'													=>	array('jquery'),
			),
			'style'																=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_THEME_FONT_STYLE_URL,
				'file'															=>	'',
				'dependencies'													=>	array()
			)
		);
	}
	
	/**************************************************************************/
	
	function prepareLibrary()
	{
		$this->library=array
		(
			'script'															=>	array
			(
				'jquery'														=>	array
				(
					'path'														=>	'',
					'in_footer'													=>	false,
					'dependencies'												=>	array()
				),
				'jquery-ui-core'												=>	array
				(
					'path'														=>	''
				),
				'jquery-ui-autocomplete'										=>	array
				(
					'path'														=>	''
				),
				'jquery-bbq'													=>	array
				(
					'file'														=>	'jquery.bbq.min.js'
				),	
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.js'
				),
				'jquery-qtip'													=>	array
				(
					'file'														=>	'jquery.qtip.min.js'
				),
				'jquery-blockUI'												=>	array
				(
					'file'														=>	'jquery.blockUI.js'
				),				
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.js'
				),
				'jquery-themeOptionElement'										=>	array
				(
					'file'														=>	'jquery.themeOptionElement.js'
				)
			),
			'style'																=>	array
			(
				'jquery-ui'														=>	array
				(
					'file'														=>	'jquery.ui.min.css'
				),
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.css'
				),
				'jquery-qtip'													=>	array
				(
					'file'														=>	'jquery.qtip.min.css'
				),
				'google-font-open-sans'											=>	array
				(
					'path'														=>	'',
					'file'														=>	'//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
				),
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.css'
				),
				'jquery-themeOption-rtl'										=>	array
				(
					'inc'														=>	false,
					'file'														=>	'jquery.themeOption.rtl.css'
				),
				'tf-jquery-themeOption-overwrite'								=>	array
				(
					'file'														=>	'jquery.themeOption.overwrite.css'
				),
				'tf-frontend'													=>	array
				(
					'use'														=>	2,
					'path'														=>	TFData::get('theme_url_multisite_style'),
					'file'														=>	'TF.Frontend.css'
				)
			)
		);
	}
	
	/**************************************************************************/
	
	function addLibrary($type,$use)
	{
		foreach($this->library[$type] as $index=>$value)
			$this->library[$type][$index]=array_merge($this->libraryDefault[$type],$value);
		
		foreach($this->library[$type] as $index=>$data)
		{
			if(!$data['inc']) continue;
			
			if($data['use']!=3)
			{
				if($data['use']!=$use) continue;
			}			
			
			if($type=='script')
			{
				wp_enqueue_script($index,$data['path'].$data['file'],$data['dependencies'],false,$data['in_footer']);
			}
			else 
			{
				wp_enqueue_style($index,$data['path'].$data['file'],$data['dependencies'],false);
			}
		}
	}
	
	/**************************************************************************/
	
	function includeLibrary($test,$script=array(),$style=array())
	{
		if($test!=1) return;

		foreach((array)$script as $value)
		{
			if(array_key_exists($value,$this->library['script']))
				$this->library['script'][$value]['inc']=true;
		}
		foreach((array)$style as $value)
		{
			if(array_key_exists($value,$this->library['style']))
				$this->library['style'][$value]['inc']=true;	
		}
	}

	/**************************************************************************/
	
	function pluginActivation()
	{
		$option=array();
		
		global $tf_element;
	
		if(!is_array($tf_element)) return;
		
		foreach($tf_element as $elementId=>$elementData)
		{
			foreach($elementData['attribute'] as $attributeId=>$attributeValue)
			{
				if(is_array($attributeValue))
				{
					$count=count($attributeValue);
					for($i=1;$i<=$count;$i++)
					{
						$optionName=$this->getOptionName($elementId,$attributeId,$i);
						$optionValue=TFOption::getOption($optionName);
						$option[$optionName]=$optionValue===false ? $attributeValue[$i-1] : $optionValue;
					}
				}
				else 
				{
					$optionName=$this->getOptionName($elementId,$attributeId);
					$optionValue=TFOption::getOption($optionName);
					$option[$optionName]=$optionValue===false ? $attributeValue : $optionValue;
				}
			}
		}

		TFOption::updateOption($option);
		
		$this->createCSSFile();
	}
	
	/**************************************************************************/
	
	function pluginDeactivation()
	{

	}
	
	/**************************************************************************/
	
	function init()
	{
	
	}
	
	/**************************************************************************/
	
	function publicInit()
	{
		$this->setToStyle();
		
		$this->addLibrary('style',2);
		$this->addLibrary('script',2);		
	}
	
	/**************************************************************************/
	
	function adminInit()
	{		
		$this->includeLibrary(is_rtl(),array(),array('jquery-themeOption-rtl'));
		
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
	}
	
	/**************************************************************************/
	
	function setToStyle()
	{
		global $tf_element;
		
		$GoogleFont=new TFGoogleFont();
		$Validation=new TFValidation();
		
		$download=array();
	
		$dictionary=$GoogleFont->unpack();

		foreach($tf_element as $elementId=>$elementData)
		{
			if(TFOption::getOption($this->getOptionName($elementId,'enable'))!=1) continue;
			
			$font=TFOption::getOption($this->getOptionName($elementId,'font_family_google'));
					
			if(($Validation->isNotEmpty($font)) && (!in_array($font,$download)))
			{
				if(!isset($dictionary[$font])) continue;
				
				$subset=join(',',(array)$dictionary[$font]['subset']);
				$variant=join(',',(array)$dictionary[$font]['variant']);
				
				$download[]=$font;
				$this->library['style']['google-font-'.preg_replace('/ /','-',strtolower($font))]=array
				(
					'use'				=>	2,
					'inc'				=>	true,
					'path'				=>	null,
					'file'				=>	'//fonts.googleapis.com/css?family='.urlencode($font).':'.$variant.'&subset='.$subset,
					'dependencies'		=>	array()
				);
			}
		}	
	}

	/**************************************************************************/
	
	function adminMenuInit()
	{
		add_theme_page(__('Theme Fonts',PLUGIN_THEME_FONT_DOMAIN),__('Theme Fonts',PLUGIN_THEME_FONT_DOMAIN),'edit_theme_options','theme_font_edit',array($this,'adminCreatePanel'));
	}
	
	/**************************************************************************/
	
	function getFieldName($elementId,$attributeId,$fieldNumber=-1)
	{
		$name=array(PLUGIN_THEME_FONT_CONTEXT,$elementId,$attributeId);
		
		if($fieldNumber!==-1) array_push($name,$fieldNumber);
		
		return(join('_',$name));
	}
	
	/**************************************************************************/
	
	function getOptionName($elementId,$attributeId,$fieldNumber=-1)
	{
		$name=array($elementId,$attributeId);
		
		if($fieldNumber!==-1) array_push($name,$fieldNumber);
		
		return(join('_',$name));		
	}
	
	/**************************************************************************/
	
	function adminCreatePanel()
	{
		$html=null;
		
		$html=
		'
			<div id="to" class="to to-tf">

				<div id="to_notice"></div>

				<form name="to_form" id="to_form" method="POST" action="#">

					<div class="to-header to-clear-fix">

						<div class="to-header-left">

							<div>
								<h3>QuanticaLabs</h3>
								<h6>'.esc_html__('Theme Fonts',PLUGIN_THEME_FONT_DOMAIN).'</h6>
							</div>

						</div>

						<div class="to-header-right">

							<div>
								<h3>'.esc_html__('Theme Fonts',PLUGIN_THEME_FONT_DOMAIN).'</h3>
								<h6>'.sprintf(esc_html__('WordPress Plugin ver. %s',PLUGIN_THEME_FONT_DOMAIN),PLUGIN_THEME_FONT_VERSION).'</h6>&nbsp;&nbsp;
							</div>

							<a href="http://quanticalabs.com" class="to-header-right-logo"></a>

						</div>

					</div>

					<div class="to-content to-clear-fix">

						<div class="to-content-left">

							<ul class="to-menu" id="to_menu">
								'.$this->adminCreatePanelMenu().'
							</ul>

						</div>

						<div class="to-content-right" id="to_panel">
							'.$this->adminCreatePanelPanel().'
						</div>

					</div>

					<div class="to-footer to-clear-fix">

						<div class="to-footer-left">

							<ul class="to-social-list">
								<li><a href="http://themeforest.net/user/QuanticaLabs?ref=quanticalabs" class="to-social-list-envato" title="Envato"></a></li>
								<li><a href="http://www.facebook.com/QuanticaLabs" class="to-social-list-facebook" title="Facebook"></a></li>
								<li><a href="http://twitter.com/quanticalabs" class="to-social-list-twitter" title="Twitter"></a></li>
								<li><a href="http://quanticalabs.tumblr.com/" class="to-social-list-tumblr" title="Tumblr"></a></li>
							</ul>

						</div>

						<div class="to-footer-right">
							<input type="submit" value="'.esc_attr__('Save changes',PLUGIN_THEME_FONT_DOMAIN).'" name="Submit" id="Submit" class="to-button"/>
						</div>			

					</div>

					<input type="hidden" name="action" id="action" value="'.PLUGIN_THEME_FONT_CONTEXT.'_save"/>

					<script type="text/javascript">
					
						jQuery(document).ready(function($)
						{
							$(\'#to\').themeOption({submitOneField:true});
							$(\'#to\').themeOptionElement({init:true});
						});

					</script>

				</form>

			</div>	
		';
		
		echo $html;
	}

	/**************************************************************************/
	
	function adminCreatePanelMenu()
	{
		global $tf_element;
		
		$html=null;
		
		foreach($tf_element as $elementId=>$elementData)
		{
			$html.=
			'
				<li>
					<a href="#'.esc_attr($elementId).'">'.$elementData['label']['label'].'</a>
				</li>
			';
		}
		
		return($html);
	}
		
	/**************************************************************************/
	
	function adminCreatePanelPanel()
	{
		global $tf_element;
		
		$html=null;
		
		$Font=new TFFont();
		$Validation=new TFValidation();
		$ResponsiveMode=new TFResponsiveMode(TFData::get('responsive_mode'));
		
		$media=$ResponsiveMode->getMedia();
		
		foreach($tf_element as $elementId=>$elementData)
		{
			$fieldHTML=null;
			
			foreach($elementData['attribute'] as $attributeId=>$attributeValue)
			{
				$fieldName=$this->getFieldName($elementId,$attributeId);
				
				$optionValue=TFOption::getOption($this->getOptionName($elementId,$attributeId));
				
				switch($attributeId)
				{
					case 'enable':
						
						$fieldHTML.=
						'
							<li>
								<h5>'.esc_html__('Font Enable',PLUGIN_THEME_FONT_DOMAIN).'</h5>
								<span class="to-legend">'.esc_html__('Enable or disable font. Disabled font isn\'t used.',PLUGIN_THEME_FONT_DOMAIN).'</span>
								<div class="to-radio-button">
									<input type="radio" name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'_1" value="1"'.TFHelper::checkedIf($optionValue,1,false).'/>
									<label for="'.esc_attr($fieldName).'_1">'.esc_html__('Enable',PLUGIN_THEME_FONT_DOMAIN).'</label>
									<input type="radio" name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'_0" value="0"'.TFHelper::checkedIf($optionValue,0,false).'/>
									<label for="'.esc_attr($fieldName).'_0">'.esc_html__('Disable',PLUGIN_THEME_FONT_DOMAIN).'</label>
								</div>
							</li>		
						';
						
					break;
					
					case 'font_family_system':
						
						$fieldHTML.=
						'
							<li>
								<h5>'.esc_html__('System font',PLUGIN_THEME_FONT_DOMAIN).'</h5>
								<span class="to-legend">'.esc_html__('Enter name of system font.',PLUGIN_THEME_FONT_DOMAIN).'</span>
								<div>
									<input type="text" name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'" value="'.esc_attr($optionValue).'" maxlength="255"/>
								</div>
							</li>							
						';
						
					break;
				
					case 'font_family_google':
				
						$fieldHTML.=
						'
							<li>
								<h5>'.esc_html__('Google Font',PLUGIN_THEME_FONT_DOMAIN).'</h5>
								<span class="to-legend">'.esc_html__('Enter name of Google Font and select it from list. This font has priority before system fonts.',PLUGIN_THEME_FONT_DOMAIN).'</span>
								<div>
									<input type="text" name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'" value="'.esc_attr($optionValue).'" maxlength="255"/>
								</div>	
								<script type="text/javascript">
									jQuery(document).ready(function($)
									{
										var element=$(\'.to\').themeOptionElement();
										element.createGoogleFontAutocomplete(\'#'.esc_attr($fieldName).'\');
									});
								</script>									
							</li>							
						';
				
					break;
				
					case 'font_size':
	
						$fieldHTML.=
						'
							<li>
								<h5>'.esc_html__('Font size',PLUGIN_THEME_FONT_DOMAIN).'</h5>
								<span class="to-legend">'.esc_html__('Font size in pixels for each screen. Value -1 means, that selected font size isn\'t used.',PLUGIN_THEME_FONT_DOMAIN).'</span>
								<div class="to-clear-fix">
						';
						
						foreach($media as $mediaId=>$mediaData)
						{
							$fieldName=$this->getFieldName($elementId,$attributeId,$mediaId);
							
							$optionValue=(int)TFOption::getOption($this->getOptionName($elementId,$attributeId,$mediaId));
							
							$label=esc_html__('Default font size.',PLUGIN_THEME_FONT_DOMAIN);
							
							if($mediaId!==1) 
								$label=sprintf(esc_html__('For page width between %dpx and %dpx.',PLUGIN_THEME_FONT_DOMAIN),$mediaData['min-width'],$mediaData['max-width']);
							
							$fieldHTML.=
							'
								<div>
									<div id="'.esc_attr($fieldName).'"></div>
									<input type="text" name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'" class="to-slider-range" readonly/>
									<label class="to-label-1 to-clear-fix">'.$label.'</label>
								</div>				
								<script type="text/javascript">
									jQuery(document).ready(function($)
									{
										var element=$(\'.to\').themeOptionElement();
										element.createSlider(\'#'.esc_attr($fieldName).'\',-1,200,'.$optionValue.');
									});
								</script>								
							';
						}
						
						$fieldHTML.=
						'
								</div>
							</li>
						';
						
					break;
					
					case 'font_style':
						
						$fieldHTML.=
						'
							<li>
								<h5>'.esc_html__('Font style',PLUGIN_THEME_FONT_DOMAIN).'</h5>
								<span class="to-legend">'.esc_html__('Font style. Value [None] means that style isn\'t used.',PLUGIN_THEME_FONT_DOMAIN).'</span>
								<div class="to-clear-fix">
									<select name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'">							
						';
	
						foreach($Font->fontStyle as $index=>$value)
							$fieldHTML.='<option value="'.esc_attr($index).'"'.TFHelper::selectedIf($optionValue,$index,false).'>'.esc_html($value[0]).'</option>';

						$fieldHTML.=
						'
									</select>
								</div>
							</li>							
						';
						
					break;
					
					case 'font_weight':
						
						$fieldHTML.=
						'
							<li>
								<h5>'.esc_html__('Font weight',PLUGIN_THEME_FONT_DOMAIN).'</h5>
								<span class="to-legend">'.esc_html__('Font weight. Value [None] means that weight isn\'t used.',PLUGIN_THEME_FONT_DOMAIN).'</span>
								<div class="to-clear-fix">
									<select name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'">							
						';
	
						foreach($Font->fontWeight as $index=>$value)
							$fieldHTML.='<option value="'.esc_attr($index).'"'.TFHelper::selectedIf($optionValue,$index,false).'>'.esc_html($value[0]).'</option>';

						$fieldHTML.=
						'
									</select>
								</div>
							</li>							
						';
						
					break;
					
					case 'text_transform':
						
						$fieldHTML.=
						'
							<li>
								<h5>'.esc_html__('Text transform',PLUGIN_THEME_FONT_DOMAIN).'</h5>
								<span class="to-legend">'.esc_html__('Text transform. Value [None] means that transform isn\'t used.',PLUGIN_THEME_FONT_DOMAIN).'</span>
								<div class="to-clear-fix">
									<select name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'">							
						';
	
						foreach($Font->textTransform as $index=>$value)
							$fieldHTML.='<option value="'.esc_attr($index).'"'.TFHelper::selectedIf($optionValue,$index,false).'>'.esc_html($value[0]).'</option>';

						$fieldHTML.=
						'
									</select>
								</div>
							</li>							
						';						
						
					break;
					
					case 'line_height':
						
						$fieldHTML.=
						'
							<li>
								<h5>'.esc_html__('Line height',PLUGIN_THEME_FONT_DOMAIN).'</h5>
								<span class="to-legend">'.esc_html__('Line height with selected unit. E.g: 1.2em, 2px etc.',PLUGIN_THEME_FONT_DOMAIN).'</span>
								<div>
									<input type="text" name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'" value="'.esc_attr($optionValue).'" maxlength="255"/>
								</div>
							</li>	
						';
						
					break;
				
					case 'letter_spacing':
						
						$fieldHTML.=
						'
							<li>
								<h5>'.esc_html__('Letter spacing',PLUGIN_THEME_FONT_DOMAIN).'</h5>
								<span class="to-legend">'.esc_html__('Letter spacing with selected unit. E.g: 1.2em, 2px etc.',PLUGIN_THEME_FONT_DOMAIN).'</span>
								<div>
									<input type="text" name="'.esc_attr($fieldName).'" id="'.esc_attr($fieldName).'" value="'.esc_attr($optionValue).'" maxlength="255"/>
								</div>
							</li>	
						';
						
					break;
				}
			}
			
			$html.=
			'
				<div id="'.esc_attr($elementId).'">
			';
			
			if($Validation->isNotEmpty($elementData['label']['description']))
				$html.='<div class="to-panel-description">'.$elementData['label']['description'].'</div>';
			
			$html.=
			'
					<ul class="to-form-field-list">				
						'.$fieldHTML.'
					</ul>				
				</div>
			';
		}
		
		return($html);
	}
	
	/**************************************************************************/
	
	function adminSavePanel()
	{
		global $tf_element;
		
		$Font=new TFFont();
		$Validation=new TFValidation();
		$ResponsiveMode=new TFResponsiveMode(TFData::get('responsive_mode'));
		
		$media=$ResponsiveMode->getMedia();
		
		$temp=array();
		$option=array();
		$response=array('global'=>array('error'=>1),'local'=>array());
		
		parse_str(TFHelper::stripslashesPOST($_POST['value']),$temp);
		
		foreach($temp as $index=>$value)
		{
			$index=preg_replace('/'.PLUGIN_THEME_FONT_CONTEXT.'_/',null,$index);
			$data[$index]=$value;
		}	

		foreach($tf_element as $elementId=>$elementData)
		{
			foreach($elementData['attribute'] as $attributeId=>$attributeData)
			{
				$fieldName=$this->getFieldName($elementId,$attributeId);
				$optionName=$this->getOptionName($elementId,$attributeId);
				
				$value=null;
				if(array_key_exists($optionName,$data)) $value=$data[$optionName];
				
				$option[$optionName]=$value;
				
				switch($attributeId)
				{
					case 'enable':
						
						if(!$Validation->isBool($value,true))
							$response['local'][]=array($fieldName,__('Invalid value.',PLUGIN_THEME_FONT_DOMAIN));
						
					break;
				
					case 'font_size':
						
						$count=count($media);
						
						for($i=1;$i<=$count;$i++)
						{
							$fieldName=$this->getFieldName($elementId,$attributeId,$i);
							$optionName=$this->getOptionName($elementId,$attributeId,$i);
							
							$value=null;
							if(array_key_exists($optionName,$data)) $value=$data[$optionName];							

							$option[$optionName]=$value;
							
							if(!$Validation->isNumber($value,-1,200))
								$response['local'][]=array($fieldName,__('Invalid value.',PLUGIN_THEME_FONT_DOMAIN));
						}
						
					break;
				
					case 'font_style':
						
						if(!array_key_exists($value,$Font->fontStyle))
							$response['local'][]=array($fieldName,__('Invalid value.',PLUGIN_THEME_FONT_DOMAIN));
						
					break;
				
					case 'font_weight':
						
						if(!array_key_exists($value,$Font->fontWeight))
							$response['local'][]=array($fieldName,__('Invalid value.',PLUGIN_THEME_FONT_DOMAIN));
						
					break;
					
					case 'text_transform':
						
						if(!array_key_exists($value,$Font->textTransform))
							$response['local'][]=array($fieldName,__('Invalid value.',PLUGIN_THEME_FONT_DOMAIN));
						
					break;
				}
			}
		}

		$response['global']['error']=(bool)count($response['local']);
		
		if($response['global']['error'])
		{
			$response['global']['notice']=
			'
				<div class="to-notice to-notice-error">
					<span></span>
					<h4>'.__('Error',PLUGIN_THEME_FONT_DOMAIN).'</h4>
					<h6>'.__('Changes can not be saved.',PLUGIN_THEME_FONT_DOMAIN).'</h6>
				</div>
			';
		}
		else
		{
			$response['global']['notice']=
			'
				<div class="to-notice to-notice-success">
					<span></span>
					<h4>'.__('Success',PLUGIN_THEME_FONT_DOMAIN).'</h4>
					<h6>'.__('All changes have been saved.',PLUGIN_THEME_FONT_DOMAIN).'</h6>
				</div>
			';		
			
			TFOption::updateOption($option);
			
			$this->createCSSFile();
		}

		echo json_encode($response);
		exit;		
	}
	
	/**************************************************************************/
	
	function addSkin()
	{
		TFOption::updateOption(array());
		$this->includeConfig();
		$this->pluginActivation();		
	}
	
	/**************************************************************************/
	
	function createCSSFile()
	{
		$this->includeConfig();
		
		global $tf_element;
		
		$CSS=new TFCSS();
		$ResponsiveMode=new TFResponsiveMode(TFData::get('responsive_mode'));
		
		$media=$ResponsiveMode->getMedia();

        if(TFData::get('responsive_mode_enable')!=1)
           $media=array(1=>$media[1],2=>$media[2]); 

		$content=null;
		
		foreach($tf_element as $elementId=>$elementData)
		{
			if(TFOption::getOption($this->getOptionName($elementId,'enable'))!=1) continue;
			
			$style=array();
			
			foreach($elementData['attribute'] as $attributeId=>$attributeData)
			{
				$optionName=$this->getOptionName($elementId,$attributeId);
				$optionValue=TFOption::getOption($optionName);
				
				switch($attributeId)
				{
					case 'font_family_system':
					case 'font_family_google':
						
						if(!array_key_exists('font-family',$style)) 
							$style['font-family']=array();
						
						$optionValue=explode(',',$optionValue);
						
						foreach($optionValue as $optionValueValue)
							array_push($style['font-family'],$optionValueValue);
	
					break;
					
					case 'font_size':
						
						foreach($media as $mediaIndex=>$mediaValue)
						{
							$optionName=$this->getOptionName($elementId,$attributeId,$mediaIndex);
						
							$content.=$CSS->create(array
							(
								'selector'			=>	$elementData['selector'],
								'property'			=>	array
								(
									'font-size'		=>	TFOption::getOption($optionName)
								),
								'media'				=>	$mediaValue
							));							
						}
						
					break;
				
					case 'font_weight':
						
						$style['font-weight']=$optionValue;
						
					break;
				
					case 'font_style':
						
						$style['font-style']=$optionValue;
						
					break;
				
					case 'text_transform':
						
						$style['text-transform']=$optionValue;
						
					break;					
				
					case 'line_height':
						
						$style['line-height']=$optionValue;
						
					break;
				
					case 'letter_spacing':
						
						$style['letter-spacing']=$optionValue;
						
					break;
				}
			}

			$content.=$CSS->create(array
			(
				'selector'	=>	$elementData['selector'],
				'property'	=>	$style
			));	
		}
		
		$file=TFData::get('theme_path_multisite_style').'TF.Frontend.css';
		
		$TFWPFileSystem=new TFWPFileSystem();
		if($TFWPFileSystem->put_contents($file,$content,0755)===false) return(false);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function adminNotice()
	{
		$file=array(TFData::get('theme_path_multisite_style').'TF.Frontend.css');
		foreach($file as $path)
		{
			if(!is_writable($path))
			{
				echo 
				'
					<div class="error">
						<p>'.sprintf(__('<b>File %s cannot be created. Please make sure that this location is writable.</b>',PLUGIN_THEME_FONT_DOMAIN),str_replace('\\','/',$path)).'</p>
					</div>				
				';				
			}
		}
	}
	
	/**************************************************************************/
	
	function setSkin($skinIndex)
	{
		update_option(PLUGIN_THEME_FONT_SKIN_OPTION_NAME,$skinIndex);
	}
	
	/**************************************************************************/
	
	function getSkin()
	{
        if(defined('PLUGIN_THEME_FONT_SKIN_OPTION_NAME'))
            return(get_option(PLUGIN_THEME_FONT_SKIN_OPTION_NAME,1));
	}
	
	/**************************************************************************/
	
	function includeConfig()
	{
        $file=get_template_directory().'/config/tf_config.php';
        if(TFFile::fileExist($file)) require_once($file);
        
        $file=get_template_directory().'/config/'.$this->getSkin().'/tf_config.php';
        if(TFFile::fileExist($file)) include($file);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/