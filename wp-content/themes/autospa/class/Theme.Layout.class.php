<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeLayout
{
	/**************************************************************************/

	function __construct()
	{
        $this->layout=array
        (
            '1/1'																=>	array(__('1/1','autospa'),0),
            '1/2+1/2'															=>	array(__('1/2 + 1/2','autospa'),30),
            '2/3+1/3'															=>	array(__('2/3 + 1/3','autospa'),30),
            '1/3+1/3+1/3'                                                       =>	array(__('1/3 + 1/3 + 1/3','autospa'),30),
            '1/4+1/4+1/4+1/4'                                                   =>	array(__('1/4 + 1/4 + 1/4 + 1/4','autospa'),30),
            '1/4+3/4'															=>	array(__('1/4 + 3/4','autospa'),30),
            '1/4+1/2+1/4'                                                       =>	array(__('1/4 + 1/2 + 1/4','autospa'),30),
            '5/6+1/6'															=>	array(__('5/6 + 1/6','autospa'),30),
            '1/6+1/6+1/6+1/6+1/6+1/6'                                           =>	array(__('1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6','autospa'),30),
            '1/6+4/6+1/6'                                                       =>	array(__('1/6 + 4/6 + 1/6','autospa'),30),
            '1/6+1/6+1/6+4/6'                                                   =>	array(__('1/6 + 1/6 + 1/6 + 4/6','autospa'),30)  
        );
	}
    
    /**************************************************************************/
    
    function getLayout()
    {
        return($this->layout);
    }
    
    /**************************************************************************/
    
    function getLayoutColumnWidth($layout,$columnIndex=0)
    {
        $column=explode('+',$layout);
        return($column[$columnIndex]);
    }
    
    /**************************************************************************/
    
    function getLayoutColumnCount($layout)
    {
        return(substr_count($layout,'+')+1);
    }
    
    /**************************************************************************/
    
    function getLayoutGap($layout)
    {
        return($this->layout[$layout][1]);
    }
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/