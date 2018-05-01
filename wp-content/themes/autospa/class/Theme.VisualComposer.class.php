<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeVisualComposer
{
	/**************************************************************************/
	
	function __construct()
	{		
        $this->elementToRemove=array('vc_icon','vc_message','vc_facebook','vc_tweetmeme','vc_googleplus','vc_pinterest','vc_toggle','vc_gallery','vc_tta_tabs','vc_images_carousel','vc_tta_tour','vc_tta_accordion','vc_tta_pageable','vc_btn','vc_cta','vc_widget_sidebar','vc_posts_slider','vc_gmaps','vc_flickr','vc_progress_bar','vc_pie','vc_round_chart','vc_line_chart','vc_basic_grid','vc_media_grid','vc_masonry_grid','vc_masonry_media_grid');
	}
    
    /**************************************************************************/
    
    function init()
    {
        add_action('vc_before_init',array($this,'beforeInitAction'));
        add_action('vc_after_init',array($this,'afterInitAction'));
        add_action('wp_enqueue_scripts',array($this,'removeScript'));
    }
    
    /**************************************************************************/
    
    function afterInitAction()
    {
        if(!function_exists('vc_remove_element')) return;
        
        foreach($this->elementToRemove as $value)
            vc_remove_element($value);

        /***/
        
        vc_remove_param('vc_row','gap'); 
        vc_remove_param('vc_row_inner','gap'); 
        
        /***/
        
        $paddingTop=array
        (
            'type'                                                              =>  'dropdown',
            'heading'                                                           =>  'Top padding',
            'param_name'                                                        =>  'as_padding_top',
            'description'                                                       =>  __('Select top padding.','autospa'),
            'value'                                                             =>  array
            (
                __('Default','autospa')                                         =>  '',
                __('Padding 1 (120px)','autospa')                               =>  'theme-padding-top-1',
                __('Padding 2 (90px)','autospa')                                =>  'theme-padding-top-2',
                __('Padding 3 (60px)','autospa')                                =>  'theme-padding-top-3',
                __('Padding 4 (30px)','autospa')                                =>  'theme-padding-top-4',
                __('Padding 5 (0px)','autospa')                                 =>  'theme-padding-top-5'
            ),
            'std'                                                               =>  ''  
        );
        
        $paddingBottom=array
        (
            'type'                                                              =>  'dropdown',
            'heading'                                                           =>  'Bottom padding',
            'param_name'                                                        =>  'as_padding_bottom',
            'description'                                                       =>  __('Select bottom padding.','autospa'),
            'value'                                                             =>  array
            (
                __('Default','autospa')                                         =>  '',
                __('Padding 1 (120px)','autospa')                               =>  'theme-padding-bottom-1',
                __('Padding 2 (90px)','autospa')                                =>  'theme-padding-bottom-2',
                __('Padding 3 (60px)','autospa')                                =>  'theme-padding-bottom-3',
                __('Padding 4 (30px)','autospa')                                =>  'theme-padding-bottom-4',
                __('Padding 5 (0px)','autospa')                                 =>  'theme-padding-bottom-5'
            ),
            'std'                                                               =>  ''  
        );
        
        $columnWidthType=array
        (
            'type'                                                              =>  'dropdown',
            'heading'                                                           =>  'Column width',
            'param_name'                                                        =>  'as_column_width_type',
            'description'                                                       =>  __('Select width type of columns in row.','autospa'),
            'value'                                                             =>  array
            (
                __('Column with gaps','autospa')                                =>  '0',
                __('Column without gaps (full width)','autospa')                =>  '1'
            ),
            'std'                                                               =>  '0'  
        );

        vc_add_param('vc_row',$paddingTop);
        vc_add_param('vc_row_inner',$paddingTop); 
        vc_add_param('vc_row',$paddingBottom); 
        vc_add_param('vc_row_inner',$paddingBottom);         
        vc_add_param('vc_row',$columnWidthType); 
        vc_add_param('vc_row_inner',$columnWidthType); 

        /***/
        
        $marginBottom=array
        (
            'type'                                                              =>  'dropdown',
            'heading'                                                           =>  'Bottom margin',
            'param_name'                                                        =>  'as_margin_bottom',
            'description'                                                       =>  __('Select bottom margin.','autospa'),
            'value'                                                             =>  array
            (
                __('Default','autospa')                                         =>  '',
                __('Margin 1 (120px)','autospa')                                =>  'theme-margin-bottom-1',
                __('Margin 2 (90px)','autospa')                                 =>  'theme-margin-bottom-2',
                __('Margin 3 (60px)','autospa')                                 =>  'theme-margin-bottom-3',
                __('Margin 4 (30px)','autospa')                                 =>  'theme-margin-bottom-4',
                __('Margin 5 (0px)','autospa')                                  =>  'theme-margin-bottom-5'
            ),
            'std'                                                               =>  ''  
        );
        
        $paddingInner=array
        (
            'type'                                                              =>  'dropdown',
            'heading'                                                           =>  'Inner padding',
            'param_name'                                                        =>  'as_padding_inner',
            'description'                                                       =>  __('Select inner padding.','autospa'),
            'value'                                                             =>  array
            (
                __('Default','autospa')                                         =>  '',
                __('Padding 1 (120px)','autospa')                                =>  'theme-padding-1'
            ),
            'std'                                                               =>  ''  
        );        
        
        vc_add_param('vc_column',$marginBottom); 
        vc_add_param('vc_column_inner',$marginBottom); 
        vc_add_param('vc_column',$paddingInner); 
        vc_add_param('vc_column_inner',$paddingInner); 
        
        /***/
    }
    
    /**************************************************************************/
    
    function beforeInitAction()
    {
        vc_set_as_theme();
        
        vc_set_default_editor_post_types(array('post','page'));
        
        $file=Autospa_ThemeFile::scanDir(AUTOSPA_THEME_PATH_VC_ELEMENT);
        if($file===false) return(false);
        
        foreach($file as $value)
            require_once(AUTOSPA_THEME_PATH_VC_ELEMENT.$value);
    }
    
    /**************************************************************************/
    
    function createParamDictionary($dictionary,$default=null)
    {
        if(!is_array($dictionary)) 
            $dictionary=array();
        
        if(!is_null($default))
        {
            if(key($dictionary)!=$default)
            {
                $nDictionary=array($default=>$dictionary[$default]);
                unset($dictionary[$default]);
                
                $dictionary=$nDictionary+$dictionary;
            }
        }
        
        if(count($dictionary))
            return(array_combine(array_values($dictionary),array_keys($dictionary)));
        
        return(array());
    }
    
    /**************************************************************************/
    
    function removeScript()
    {
        
    }
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/