        <ul class="to-form-field-list">
            <li>
                <h5><?php esc_html_e('Bottom header','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Enable or disable bottom header.','autospa'); ?></span>
                <div class="to-radio-button">
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_bottom_enable'],1); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_enable_0'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_bottom_enable'],0); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_enable_0'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
                 </div>			
            </li> 
            <li>
                <h5><?php esc_html_e('Breadcrumb','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Enable or disable breadcrumbs (requires plugin Breadcrumb NavXT).','autospa'); ?></span>
                <div class="to-radio-button">
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_breadcrumb_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_breadcrumb_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_bottom_breadcrumb_enable'],1); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_breadcrumb_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_breadcrumb_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_breadcrumb_enable_0'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_bottom_breadcrumb_enable'],0); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_breadcrumb_enable_0'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
                 </div>			
            </li> 
            <li>
                <h5><?php esc_html_e('Background type','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Select background type.','autospa'); ?></span>
                <div class="to-clear-fix">
                    <select name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type'); ?>">
<?php
                        foreach($this->data['dictionary']['backgroundType'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_header_bottom_background_type'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>
            </li>
<?php
if(Autospa_ThemePlugin::isActive('RevSlider'))
{
?>
            <li>
                <h5><?php esc_html_e('Revolution slider','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Select revolution slider in background.','autospa'); ?></span>
                <div class="to-clear-fix">
                    <select name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_revslider_alias'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_revslider_alias'); ?>">
<?php
                        foreach($this->data['dictionary']['revolutionSlider'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_header_bottom_background_type_revslider_alias'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>
            </li>
<?php
}
?>
            <li>
                <h5><?php esc_html_e('Image','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Select attributes for image.','autospa'); ?></span>
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php esc_html_e('URL address:','autospa'); ?></span>
                    <input type="text" name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_src'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_src'); ?>" class="to-float-left" value="<?php echo esc_attr($this->data['option']['post_header_bottom_background_type_image_src']); ?>" />
                    <input type="button" name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_src_browse'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_src_browse'); ?>" class="to-button-browse to-button" value="<?php esc_attr_e('Browse','autospa'); ?>"/>
                </div>	
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php echo sprintf(__('Background repeat <a href="%s" target="_blank">[more info]</a>:','autospa'),'https://www.w3schools.com/cssref/pr_background-repeat.asp'); ?></span>
                    <select name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_repeat'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_repeat'); ?>">
<?php
                        foreach($this->data['dictionary']['backgroundRepeat'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_header_bottom_background_type_image_repeat'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php echo sprintf(__('Background position - <a href="%s" target="_blank">[more info]</a>:','autospa'),'https://www.w3schools.com/cssref/pr_background-position.asp'); ?></span>
                    <input type="text" name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_position'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_position'); ?>" value="<?php echo  esc_attr($this->data['option']['post_header_bottom_background_type_image_position']); ?>" maxlength="255"/>
                </div>		
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php echo sprintf(__('Background size <a href="%s" target="_blank">[more info]</a>:','autospa'),'https://www.w3schools.com/cssref/css3_pr_background-size.asp'); ?></span>
                    <select name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_size_1'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_size_1'); ?>">
<?php
                        foreach($this->data['dictionary']['backgroundSize'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_header_bottom_background_type_image_size_1'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>   
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php echo sprintf(__('Background size <a href="%s" target="_blank">[more info]</a>:','autospa'),'https://www.w3schools.com/cssref/css3_pr_background-size.asp'); ?></span>
                    <input type="text" name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_size_2'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_size_2'); ?>" value="<?php echo  esc_attr($this->data['option']['post_header_bottom_background_type_image_size_2']); ?>" maxlength="255"/>
                </div>
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php echo sprintf(__('Background origin <a href="%s" target="_blank">[more info]</a>:','autospa'),'https://www.w3schools.com/cssref/css3_pr_background-origin.asp'); ?></span>
                    <select name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_origin'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_origin'); ?>">
<?php
                        foreach($this->data['dictionary']['backgroundOrigin'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_header_bottom_background_type_image_origin'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>	
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php echo sprintf(__('Background clip <a href="%s" target="_blank">[more info]</a>:','autospa'),'https://www.w3schools.com/cssref/css3_pr_background-clip.asp'); ?></span>
                    <select name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_clip'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_clip'); ?>">
<?php
                        foreach($this->data['dictionary']['backgroundClip'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_header_bottom_background_type_image_clip'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>		
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php echo sprintf(__('Background attachment <a href="%s" target="_blank">[more info]</a>:','autospa'),'https://www.w3schools.com/cssref/pr_background-attachment.asp'); ?></span>
                    <select name="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_attachment'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_bottom_background_type_image_attachment'); ?>">
<?php
                        foreach($this->data['dictionary']['backgroundAttachment'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_header_bottom_background_type_image_attachment'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>	
            </li>			                 
         </ul>