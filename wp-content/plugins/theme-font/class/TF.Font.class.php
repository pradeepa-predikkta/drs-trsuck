<?php

/******************************************************************************/
/******************************************************************************/

class TFFont
{
	/**************************************************************************/

	function __construct()
	{
		$this->fontWeight=array
		(
			'-1'																=>	array(__('[None]',PLUGIN_THEME_FONT_DOMAIN)),
			'100'																=>	array(__('100',PLUGIN_THEME_FONT_DOMAIN)),
			'200'																=>	array(__('200',PLUGIN_THEME_FONT_DOMAIN)),
			'300'																=>	array(__('300',PLUGIN_THEME_FONT_DOMAIN)),
			'400'																=>	array(__('400',PLUGIN_THEME_FONT_DOMAIN)),
			'500'																=>	array(__('500',PLUGIN_THEME_FONT_DOMAIN)),
			'600'																=>	array(__('600',PLUGIN_THEME_FONT_DOMAIN)),
			'700'																=>	array(__('700',PLUGIN_THEME_FONT_DOMAIN)),
			'800'																=>	array(__('800',PLUGIN_THEME_FONT_DOMAIN)),
			'900'																=>	array(__('900',PLUGIN_THEME_FONT_DOMAIN)),	
			'bold'																=>	array(__('bold',PLUGIN_THEME_FONT_DOMAIN)),
			'bolder'															=>	array(__('bolder',PLUGIN_THEME_FONT_DOMAIN)),
			'inherit'															=>	array(__('inherit',PLUGIN_THEME_FONT_DOMAIN)),
			'lighter'															=>	array(__('lighter',PLUGIN_THEME_FONT_DOMAIN)),
			'normal'															=>	array(__('normal',PLUGIN_THEME_FONT_DOMAIN))
		);

		$this->fontStyle=array
		(
			'-1'																=>	array(__('[None]',PLUGIN_THEME_FONT_DOMAIN)),
			'inherit'															=>	array(__('inherit',PLUGIN_THEME_FONT_DOMAIN)),
			'italic'															=>	array(__('italic',PLUGIN_THEME_FONT_DOMAIN)),
			'normal'															=>	array(__('normal',PLUGIN_THEME_FONT_DOMAIN)),
			'oblique'															=>	array(__('oblique',PLUGIN_THEME_FONT_DOMAIN))
		);
		
		$this->textTransform=array
		(
			'-1'																=>	array(__('[None]',PLUGIN_THEME_FONT_DOMAIN)),
			'none'																=>	array(__('None',PLUGIN_THEME_FONT_DOMAIN)),
			'capitalize'														=>	array(__('Capitalize',PLUGIN_THEME_FONT_DOMAIN)),
			'uppercase'															=>	array(__('Uppercase',PLUGIN_THEME_FONT_DOMAIN)),
			'lowercase'															=>	array(__('Lowercase',PLUGIN_THEME_FONT_DOMAIN)),
			'initial'															=>	array(__('Initial',PLUGIN_THEME_FONT_DOMAIN)),
			'inherit'															=>	array(__('Inherit',PLUGIN_THEME_FONT_DOMAIN))
		);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/