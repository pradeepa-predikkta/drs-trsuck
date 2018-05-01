<?php

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autospa_Theme_Google_Map 
{
    /**************************************************************************/
    
    function __construct() 
    {
        add_action('init',array($this,'vcMapping'));
        add_shortcode('vc_autospa_theme_google_map',array($this,'vcHTML'));
    }
     
    /**************************************************************************/     

    public function vcMapping()
    {
        $GoogleMap=new Autospa_ThemeGoogleMap();
        $VisualComposer=new Autospa_ThemeVisualComposer();
        
        vc_map
        ( 
            array
            (
                'base'                                                          =>  'vc_autospa_theme_google_map',
                'name'                                                          =>  __('Google Maps','autospa'),
                'description'                                                   =>  __('Creates Google Map','autospa'), 
                'category'                                                      =>  __('Content','autospa'),
                'params'                                                        =>  array
                (   
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'google_map_api_key',
                        'heading'                                               =>  __('Google Maps API key','autospa'),
                        'description'                                           =>  sprintf(__('You can generate your own key <a href="%s" target="_blank">here</a>.','autospa'),'https://developers.google.com/maps/documentation/javascript/get-api-key'),
                        'group'                                                 =>  __('General','autospa'),
                    ),                  
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'coordinate_lat',
                        'heading'                                               =>  __('Latitude','autospa'),
                        'description'                                           =>  sprintf(__('You can generate your own coordinates (latitude) <a href="%s" target="_blank">here</a>.','autospa'),'https://www.gps-coordinates.net/'),
                        'group'                                                 =>  __('General','autospa')
                    ),
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'coordinate_lng',
                        'heading'                                               =>  __('Longtitude','autospa'),
                        'description'                                           =>  sprintf(__('You can generate your own coordinates (longtitude) <a href="%s" target="_blank">here</a>.','autospa'),'https://www.gps-coordinates.net/'),
                        'group'                                                 =>  __('General','autospa')
                    ),
                    array
                    (
                        'type'                                                  =>  'attach_image',
                        'param_name'                                            =>  'marker_url',
                        'heading'                                               =>  __('Marker','autospa'),
                        'description'                                           =>  __('Select marker icon.','autospa'),
                        'group'                                                 =>  __('General','autospa')
                    ),                    
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'width',
                        'heading'                                               =>  __('Width','autospa'),
                        'description'                                           =>  __('Width of the map (in % of the parent selector).','autospa'),
                        'group'                                                 =>  __('General','autospa')
                    ),
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'height',
                        'heading'                                               =>  __('Height','autospa'),
                        'description'                                           =>  __('Map height.','autospa'),
                        'group'                                                 =>  __('General','autospa')
                    ),
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'draggable_enable',
                        'heading'                                               =>  __('Draggable','autospa'),
                        'description'                                           =>  __('Enable or disable draggable on the map.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enabled','autospa')                             =>  '1',
                            __('Disabled','autospa')                            =>  '0'
                            
                        ),
                        'std'                                                   =>  '0',
                        'group'                                                 =>  __('General','autospa')
                    ), 
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'scrollwheel_enable',
                        'heading'                                               =>  __('Scrollwheel','autospa'),
                        'description'                                           =>  __('Enable or disable wheel scrolling on the map.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enabled','autospa')                             =>  '1',
                            __('Disabled','autospa')                            =>  '0'
                        ),
                        'std'                                                   =>  '0',
                        'group'                                                 =>  __('General','autospa')
                    ),  
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'toggle_visibility',
                        'heading'                                               =>  __('Toggle visibility','autospa'),
                        'description'                                           =>  __('Enable or disable option which allow toggle visibility of the map on click.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enabled','autospa')                             =>  '1',
                            __('Disabled','autospa')                            =>  '0'
                        ),
                        'std'                                                   =>  '1',
                        'group'                                                 =>  __('General','autospa')
                    ),  
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'css_class',
                        'heading'                                               =>  __('CSS class','autospa'),
                        'description'                                           =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autospa'),
                        'group'                                                 =>  __('General','autospa') 
                    ),
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'map_type_id',
                        'heading'                                               =>  __('Map type','autospa'),
                        'description'                                           =>  __('Select map type. Must be selected also in "Allowed map type" section.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($GoogleMap->getMapTypeId()),
                        'std'                                                   =>  'ROADMAP',
                        'group'                                                 =>  __('Map type','autospa')
                    ),
                    array
                    (
                        'type'                                                  =>  'checkbox',
                        'param_name'                                            =>  'map_type_id_allow',
                        'heading'                                               =>  __('Allowed map types','autospa'),
                        'description'                                           =>  __('Select allowed map types.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($GoogleMap->getMapTypeId()),
                        'group'                                                 =>  __('Map type','autospa')
                    ),
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'map_type_control_enable',
                        'heading'                                               =>  __('Map type control','autospa'),
                        'description'                                           =>  __('Enable or disable map type control.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enabled','autospa')                             =>  '1',
                            __('Disabled','autospa')                            =>  '0'
                        ),
                        'std'                                                   =>  '0',
                        'group'                                                 =>  __('Map type','autospa')
                    ),
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'map_type_control_style',
                        'heading'                                               =>  __('Map type control style','autospa'),
                        'description'                                           =>  __('Select map type control style.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($GoogleMap->getMapTypeControlStyle()),
                        'std'                                                   =>  'DEFAULT',
                        'group'                                                 =>  __('Map type','autospa')
                    ),
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'map_type_control_position',
                        'heading'                                               =>  __('Map type control position','autospa'),
                        'description'                                           =>  __('Select map type control position.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition()),
                        'std'                                                   =>  'TOP_CENTER',
                        'group'                                                 =>  __('Map type','autospa')
                    ),        
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'zoom_control_enable',
                        'heading'                                               =>  __('Zoom control','autospa'),
                        'description'                                           =>  __('Enable or disable zoom control.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enabled','autospa')                             =>  '1',
                            __('Disabled','autospa')                            =>  '0',
                        ),
                        'std'                                                   =>  '1',
                        'group'                                                 =>  __('Zoom','autospa')
                    ),                    
                    array
                    (
                        'type'                                                  =>  'textfield',
                        'param_name'                                            =>  'zoom_level',
                        'heading'                                               =>  __('Zoom level','autospa'),
                        'description'                                           =>  __('Enter level of zoom. Allowed is integer value from range 1 to 21.','autospa'),
                        'group'                                                 =>  __('Zoom','autospa')
                    ),                    
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'zoom_control_style',
                        'heading'                                               =>  __('Zoom control style','autospa'),
                        'description'                                           =>  __('Select zoom control style.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($GoogleMap->getZoomControlStyle()),
                        'std'                                                   =>  'SMALL',
                        'group'                                                 =>  __('Zoom','autospa')
                    ),                   
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'zoom_position',
                        'heading'                                               =>  __('Zoom position','autospa'),
                        'description'                                           =>  __('Select zoom position.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition()),
                        'std'                                                   =>  'RIGHT_TOP',
                        'group'                                                 =>  __('Zoom','autospa')
                    ),                      
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'pan_control_enable',
                        'heading'                                               =>  __('Pan control','autospa'),
                        'description'                                           =>  __('Enable or disable pan control.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enabled','autospa')                             =>  '1',
                            __('Disabled','autospa')                            =>  '0'
                        ),
                        'std'                                                   =>  '0',
                        'group'                                                 =>  __('Pan','autospa')
                    ),                         
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'pan_control_position',
                        'heading'                                               =>  __('Pan control position','autospa'),
                        'description'                                           =>  __('Select pan control position.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition()),
                        'std'                                                   =>  'TOP_CENTER',
                        'group'                                                 =>  __('Pan','autospa')
                    ),                      
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'scale_control_enable',
                        'heading'                                               =>  __('Scale control','autospa'),
                        'description'                                           =>  __('Enable or disable scale control.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enabled','autospa')                             =>  '1',
                            __('Disabled','autospa')                            =>  '0'
                        ),
                        'std'                                                   =>  '0',
                        'group'                                                 =>  __('Scale','autospa')
                    ),                         
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'scale_control_position',
                        'heading'                                               =>  __('Scale control position','autospa'),
                        'description'                                           =>  __('Select scale control position.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition(),'TOP_CENTER'),
                        'std'                                                   =>  'TOP_CENTER',
                        'group'                                                 =>  __('Scale','autospa')
                    ),                     
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'street_view_enable',
                        'heading'                                               =>  __('Street view','autospa'),
                        'description'                                           =>  __('Enable or disable street view.','autospa'),
                        'value'                                                 =>  array
                        (
                            __('Enabled','autospa')                             =>  '1',
                            __('Disabled','autospa')                            =>  '0'
                        ),
                        'std'                                                   =>  '0',
                        'group'                                                 =>  __('Street view','autospa')
                    ),                         
                    array
                    (
                        'type'                                                  =>  'dropdown',
                        'param_name'                                            =>  'street_view_position',
                        'heading'                                               =>  __('Street view position','autospa'),
                        'description'                                           =>  __('Select street view position.','autospa'),
                        'value'                                                 =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition(),'TOP_CENTER'),
                        'std'                                                   =>  'TOP_CENTER',
                        'group'                                                 =>  __('Street view','autospa')
                    ),
                    array
                    (
                        'type'                                                  =>  'textarea_raw_html',
                        'param_name'                                            =>  'style',
                        'heading'                                               =>  __('Styles','autospa'),
                        'description'                                           =>  sprintf(__('JSON value contains Google Maps styles. You can generate it <a href="%s" target="_blank">here</a>.','autospa'),'https://mapstyle.withgoogle.com/'),
                        'group'                                                 =>  __('Styles','autospa')
                    ),  
                )
            )
        );         
    } 
    
    /**************************************************************************/
     
    public function vcHTML($attr) 
    {
        $GoogleMap=new Autospa_ThemeGoogleMap();
        
        $default=array
        (
            'google_map_api_key'                                                =>  '',
            'coordinate_lat'                                                    =>  '',
            'coordinate_lng'                                                    =>  '',
            'marker_url'                                                        =>  '',
            'width'                                                             =>  '100%',
            'height'                                                            =>  '100%',
            'draggable_enable'                                                  =>  '0',
            'scrollwheel_enable'                                                =>  '0',
            'css_class'                                                         =>  '',
            'toggle_visibility'                                                 =>  '1',
            'map_type_id'                                                       =>  'ROADMAP',
            'map_type_id_allow'                                                 =>  'ROADMAP,SATELLITE,HYBRID,TERRAIN',
            'map_type_control_enable'                                           =>  '0',
            'map_type_control_style'                                            =>  'DEFAULT',
            'map_type_control_position'                                         =>  'TOP_CENTER',
            'zoom_control_enable'                                               =>  '1',
            'zoom_level'                                                        =>  '15',
            'zoom_control_style'                                                =>  'SMALL',
            'zoom_position'                                                     =>  'RIGHT_TOP',
            'pan_control_enable'                                                =>  '0',
            'pan_control_position'                                              =>  'TOP_CENTER',
            'scale_control_enable'                                              =>  '0',
            'scale_control_position'                                            =>  'TOP_CENTER',
            'street_view_enable'                                                =>  '0',
            'street_view_position'                                              =>  'TOP_CENTER',
            'style'                                                             =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
              
        $html=null;
        
        $Validation=new Autospa_ThemeValidation();
        
        if($Validation->isEmpty($attribute['coordinate_lat'])) return($html);
        if($Validation->isEmpty($attribute['coordinate_lng'])) return($html);
        if(!$Validation->isNumber($attribute['draggable_enable'],0,1)) 
            $attribute['draggable_enable']=$default['draggable_enable'];     
        if(!$Validation->isNumber($attribute['scrollwheel_enable'],0,1)) 
            $attribute['scrollwheel_enable']=$default['scrollwheel_enable']; 
        
        if(!array_key_exists($attribute['map_type_id'],$GoogleMap->getMapTypeId()))
            $attribute['map_type_id']=$default['map_type_id'];
        $temp=explode(',',$attribute['map_type_id_allow']);
        foreach($temp as$value)
        {
            if($Validation->isNotEmpty($value))
            {
                if(!array_key_exists($value,$GoogleMap->getMapTypeId()))
                {
                    $attribute['map_type_id_allow']=$default['map_type_id_allow'];
                    break;
                }
            }
        }
        if(!array_key_exists($attribute['map_type_control_style'],$GoogleMap->getMapTypeControlStyle()))
            $attribute['map_type_control_style']=$default['map_type_control_style'];
        if(!array_key_exists($attribute['map_type_control_position'],$GoogleMap->getPosition()))
            $attribute['map_type_control_position']=$default['map_type_control_position'];
        
        if(!$Validation->isNumber($attribute['zoom_control_enable'],0,1)) 
            $attribute['zoom_control_enable']=$default['zoom_control_enable']; 
        if(!$Validation->isNumber($attribute['zoom_level'],1,21)) 
            $attribute['zoom_level']=$default['zoom_level'];        
        if(!array_key_exists($attribute['zoom_control_style'],$GoogleMap->getZoomControlStyle()))
            $attribute['zoom_control_style']=$default['zoom_control_style'];       
        if(!array_key_exists($attribute['zoom_position'],$GoogleMap->getPosition()))
            $attribute['zoom_position']=$default['zoom_position'];        
        
        if(!$Validation->isNumber($attribute['pan_control_enable'],0,1)) 
            $attribute['pan_control_enable']=$default['pan_control_enable'];         
        if(!array_key_exists($attribute['pan_control_position'],$GoogleMap->getPosition()))
            $attribute['pan_control_position']=$default['pan_control_position'];     
        
        if(!$Validation->isNumber($attribute['scale_control_enable'],0,1)) 
            $attribute['scale_control_enable']=$default['scale_control_enable'];         
        if(!array_key_exists($attribute['scale_control_position'],$GoogleMap->getPosition()))
            $attribute['scale_control_position']=$default['scale_control_position'];
      
        if(!$Validation->isNumber($attribute['street_view_enable'],0,1)) 
            $attribute['street_view_enable']=$default['street_view_enable'];         
        if(!array_key_exists($attribute['street_view_position'],$GoogleMap->getPosition()))
            $attribute['street_view_position']=$default['street_view_position'];
        
        if((int)$attribute['marker_url'])
        {
            $image=wp_get_attachment_image_src($attribute['marker_url'],'large');
            $attribute['marker_url']=$image===false ? null : $image[0];
        }
        
        $dataAttribute=$attribute;
              
        unset($dataAttribute['css_class']);
        
        $id=Autospa_ThemeHelper::createId('theme_google_map');

        if($attribute['toggle_visibility']==1)
        {
            $html=
            '
                <a href="#" class="theme-component-google-map-button">
					<span class="theme-icon-meta-marker"></span>
					<span class="theme-component-google-map-button-label-show">'.esc_html('Show Map','autospa').'</span>
					<span class="theme-component-google-map-button-label-hide">'.esc_html('Hide Map','autospa').'</span>
				</a>  
            ';
        }
 
        $dataAttribute['style']=rawurldecode( base64_decode($dataAttribute['style']));
        
        $html=
        '
            <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-google-map',$attribute['css_class'])).Autospa_ThemeHelper::createDataAttribute($dataAttribute).'>
                <div'.Autospa_ThemeHelper::createClassAttribute(array('theme-component-google-map-map')).'>
                    <div id="'.esc_attr($id).'"></div>
                </div>
                '.$html.'
                <script type="text/javascript">
                    if(typeof(googleMapStyle)==\'undefined\') var googleMapStyle=[];
                    googleMapStyle[\''.esc_attr($id).'\']='.($Validation->isEmpty($attribute['style']) ? '"";' : rawurldecode(base64_decode($attribute['style']))).';
                </script>
            </div>
        ';
     
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
new WPBakeryShortCode_VC_Autospa_Theme_Google_Map(); 