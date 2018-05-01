<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeIcon
{
	/**************************************************************************/
	
	function __construct()
	{	
        $this->icon=array
        (
            'feature'                                                           =>  array
            (        
                'air-conditioning'												=>	__('Air conditioning','autospa'),
                'alarm'                                                         =>	__('Alarm','autospa'),
                'camper'                                                        =>	__('Camper','autospa'),
                'car-2'                                                         =>	__('Car 2','autospa'),
                'car-3'                                                         =>	__('Car 3','autospa'),
                'car-audio'                                                     =>	__('Car audio','autospa'),
                'car-battery'													=>	__('Car battery','autospa'),
                'car-check'                                                     =>	__('Car check','autospa'),
                'car-checklist'													=>	__('Car checklist','autospa'),
                'car-fix'                                                       =>	__('Car fix','autospa'),
                'car-key'                                                       =>	__('Car key','autospa'),
                'car-lock'                                                      =>	__('Car lock','autospa'),
                'car-music'                                                     =>	__('Car music','autospa'),
                'car-oil'                                                       =>	__('Car oil','autospa'),
                'car-setting'													=>	__('Car setting','autospa'),
                'car'                                                           =>	__('Car','autospa'),
                'caution-fence'													=>	__('Caution fence','autospa'),
                'certificate'													=>	__('Certificate','autospa'),
                'check-2'                                                       =>	__('Check 2','autospa'),
                'check-shield'													=>	__('Check shield','autospa'),
                'check'                                                         =>	__('Check','autospa'),
                'checklist'                                                     =>	__('Checklist','autospa'),
                'clock'                                                         =>	__('Clock','autospa'),
                'coffee'                                                        =>	__('Coffee','autospa'),
                'cog-double'													=>	__('Cog double','autospa'),
                'eco-car'                                                       =>	__('Eco car','autospa'),
                'eco-fuel-barrel'												=>	__('Eco fuel barrel','autospa'),
                'eco-fuel'                                                      =>	__('Eco fuel','autospa'),
                'eco-globe'                                                     =>	__('Eco globe','autospa'),
                'eco-nature'													=>	__('Eco nature','autospa'),
                'electric-wrench'												=>	__('Electric wrench','autospa'),
                'email'                                                         =>	__('Email','autospa'),
                'engine-belt-2'													=>	__('Engine belt 2','autospa'),
                'engine-belt'													=>	__('Engine belt','autospa'),
                'facebook'                                                      =>	__('Facebook','autospa'),
                'faq'                                                           =>	__('Faq','autospa'),
                'fax'                                                           =>	__('Fax','autospa'),
                'fax-2'                                                         =>	__('Fax 2','autospa'),
                'garage'                                                        =>	__('Garage','autospa'),
                'gauge'                                                         =>	__('Gauge','autospa'),
                'gearbox'                                                       =>	__('Gearbox','autospa'),
                'google-plus'													=>	__('Google plus','autospa'),
                'gps'                                                           =>	__('Gps','autospa'),
                'headlight'                                                     =>	__('Headlight','autospa'),
                'heating'                                                       =>	__('Heating','autospa'),
                'hose-nozzle'													=>	__('Hose nozzle','autospa'),
                'image'                                                         =>	__('Image','autospa'),
                'images'                                                        =>	__('Images','autospa'),
                'inflator-pump'													=>	__('Inflator pump','autospa'),
                'lightbulb'                                                     =>	__('Lightbulb','autospa'),
                'location-map'													=>	__('Location map','autospa'),
                'oil-can'                                                       =>	__('Oil can','autospa'),
                'oil-gauge'                                                     =>	__('Oil gauge','autospa'),
                'oil-station'													=>	__('Oil station','autospa'),
                'parking-sensor'												=>	__('Parking sensor','autospa'),
                'payment'                                                       =>	__('Payment','autospa'),
                'pen'                                                           =>	__('Pen','autospa'),
                'percent'                                                       =>	__('Percent','autospa'),
                'person'                                                        =>	__('Person','autospa'),
                'phone-call-24h'                                                =>	__('Phone call 24h','autospa'),
                'phone-call'													=>	__('Phone call','autospa'),
                'phone-circle'													=>	__('Phone circle','autospa'),
                'phone'                                                         =>	__('Phone','autospa'),
                'piggy-bank'													=>	__('Piggy bank','autospa'),
                'quote'                                                         =>	__('Quote','autospa'),
                'road'                                                          =>	__('Road','autospa'),
                'screwdriver'													=>	__('Screwdriver','autospa'),
                'seatbelt-lock'													=>	__('Seatbelt lock','autospa'),
                'service-24h'													=>	__('Service 24h','autospa'),
                'share-time'													=>	__('Share time','autospa'),
                'shopping-cart'													=>	__('Shopping cart','autospa'),
                'signal-warning'												=>	__('Signal warning','autospa'),
                'snow-crystal'													=>	__('Snow crystal','autospa'),
                'speed-gauge'													=>	__('Speed gauge','autospa'),
                'spray-bottle'													=>	__('Spray bottle','autospa'),
                'steering-wheel'												=>	__('Steering wheel','autospa'),
                'team'                                                          =>	__('Team','autospa'),
                'testimonials'													=>	__('Testimonials','autospa'),
                'toolbox-2'                                                     =>	__('Toolbox 2','autospa'),
                'toolbox'                                                       =>	__('Toolbox','autospa'),
                'truck-tow'                                                     =>	__('Truck tow','autospa'),
                'truck'                                                         =>	__('Truck','autospa'),
                'tunning'                                                       =>	__('Tunning','autospa'),
                'twitter'                                                       =>	__('Twitter','autospa'),
                'user-chat'                                                     =>	__('User chat','autospa'),
                'vacuum-cleaner'												=>	__('Vacuum cleaner','autospa'),
                'video'                                                         =>	__('Video','autospa'),
                'wallet'                                                        =>	__('Wallet','autospa'),
                'water-drop'													=>	__('Water drop','autospa'),
                'windshield'													=>	__('Windshield','autospa'),
                'wrench-double'													=>	__('Wrench double','autospa'),
                'wrench-screwdriver'											=>	__('Wrench screwdriver','autospa'),
                'wrench'                                                        =>	__('Wrench','autospa'),
                'youtube'                                                       =>	__('Youtube','autospa')
            )
        );
	}
    
    /**************************************************************************/
    
    function getFeatureIcon()
    {
        return($this->icon['feature']);
    }
    
    /**************************************************************************/
    
    function getSocialIcon()
    {
        $Social=new Autospa_ThemeSocialProfile();
        
        $icon=array();
        foreach($Social->socialProfile as $index=>$value)
            $icon[$index]=$value[0];
        
        return($icon);
    }

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/