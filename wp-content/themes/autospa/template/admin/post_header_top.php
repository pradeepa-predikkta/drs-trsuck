        <ul class="to-form-field-list">
            <li>
                <h5><?php esc_html_e('Top header','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Enable or disable top header.','autospa'); ?></span>
                <div class="to-radio-button">
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_top_enable'],1); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_top_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_enable_0'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_top_enable'],0); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_top_enable_0'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
                 </div>			
            </li> 
            <li>
                <h5><?php esc_html_e('Top header sticky','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Enable or disable sticky feature in top header.','autospa'); ?></span>
                <div class="to-radio-button">
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_sticky_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_sticky_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_top_sticky_enable'],1); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_top_sticky_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_sticky_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_sticky_enable_0'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_top_sticky_enable'],0); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_top_sticky_enable_0'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
                </div>			
            </li> 
            <li>
                <h5><?php esc_html_e('Logo','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Enter details of logo (image) in order: URL address, maximum width and height (in pixels).','autospa'); ?><br/></span>
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php esc_html_e('URL address:','autospa'); ?></span>
                    <input type="text" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_src'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_src'); ?>" class="to-float-left" value="<?php echo esc_attr($this->data['option']['post_header_top_logo_normal_src']); ?>" />
                    <input type="button" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_src_browse'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_src_browse'); ?>" class="to-button-browse to-button" value="<?php esc_attr_e('Browse','autospa'); ?>"/>
                </div>
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php esc_html_e('Maximum width:','autospa'); ?></span>
                    <input type="text" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_width'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_width'); ?>" value="<?php echo esc_attr($this->data['option']['post_header_top_logo_normal_width']); ?>" maxlength="4"/>
                </div>	
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php esc_html_e('Maximum height:','autospa'); ?></span>
                    <input type="text" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_height'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_normal_height'); ?>" value="<?php echo esc_attr($this->data['option']['post_header_top_logo_normal_height']); ?>"  maxlength="4"/>
                </div>	
            </li>	
            <li>
                <h5><?php esc_html_e('Logo sticky','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Enter details of logo (image) in sticky header in order: URL address, maximum width and height (in pixels).','autospa'); ?><br/></span>
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php esc_html_e('URL address:','autospa'); ?></span>
                    <input type="text" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_sticky_src'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_sticky_src'); ?>" class="to-float-left" value="<?php echo esc_attr($this->data['option']['post_header_top_logo_sticky_src']); ?>" />
                    <input type="button" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_sticky_src_browse'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_sticky_src_browse'); ?>" class="to-button-browse to-button" value="<?php esc_attr_e('Browse','autospa'); ?>"/>
                </div>
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php esc_html_e('Maximum width:','autospa'); ?></span>
                    <input type="text" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_sticky_width'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_sticky_width'); ?>" value="<?php echo esc_attr($this->data['option']['post_header_top_logo_sticky_width']); ?>"  maxlength="4"/>
                </div>	
                <div class="to-clear-fix">
                    <span class="to-legend-field"><?php esc_html_e('Maximum height:','autospa'); ?></span>
                    <input type="text" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_sticky_height'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_logo_sticky_height'); ?>" value="<?php echo esc_attr($this->data['option']['post_header_top_logo_sticky_height']); ?>"  maxlength="4"/>
                </div>	
            </li>	
            <li>
                <h5><?php esc_html_e('Menu','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Select menu.','autospa'); ?></span>
                <div class="to-clear-fix">
                    <select name="<?php Autospa_ThemeHelper::getFormName('post_header_top_menu_id'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_menu_id'); ?>">
<?php
            foreach($this->data['dictionary']['menu'] as $index=>$value)
            {
                echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_header_top_menu_id'],$index,false)).'>'.esc_html($value[0]).'</option>';
            }
?>
                    </select>
                </div>
            </li>	
            <li>
                <h5><?php esc_html_e('Social icons','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Enable or disable social icons in top header.','autospa'); ?></span>
                <div class="to-radio-button">
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_social_profile_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_social_profile_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_top_social_profile_enable'],1); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_top_social_profile_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
                    <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_header_top_social_profile_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_header_top_social_profile_enable_0'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_header_top_social_profile_enable'],0); ?>/>
                    <label for="<?php Autospa_ThemeHelper::getFormName('post_header_top_social_profile_enable_0'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
                 </div>			
            </li> 
        </ul>