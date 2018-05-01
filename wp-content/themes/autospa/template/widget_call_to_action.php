<?php
        $Validation=new Autospa_ThemeValidation();

        $id='widget_theme_widget_call_to_action_'.Autospa_ThemeHelper::createId();
			
        echo $this->data['html']['start']; 
?>
			<div class="widget_theme_widget_call_to_action theme-clear-fix" id="<?php echo esc_attr($id); ?>">
<?php
        echo do_shortcode('[vc_autospa_theme_header_subheader header="'.$this->data['instance']['header'].'" header_importance="3" underline_enable="0" subheader="'.$this->data['instance']['subheader'].'" align="aligncenter"]');
 
        if($Validation->isNotEmpty($this->data['instance']['content']))
        {
?>
                <p><?php echo esc_html($this->data['instance']['content']); ?></p>
<?php
        } 
        if(($Validation->isNotEmpty($this->data['instance']['button_label'])) && ($Validation->isNotEmpty($this->data['instance']['button_url'])))
        {
            echo do_shortcode('[vc_autospa_theme_button label="'.$this->data['instance']['button_label'].'" url="'.$this->data['instance']['button_url'].'" style="1" align="aligncenter"]');
        }
?>
			</div>
<?php
		echo $this->data['html']['stop']; 