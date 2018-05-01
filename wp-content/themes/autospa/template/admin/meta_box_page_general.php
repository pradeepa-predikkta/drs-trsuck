        <?php echo $this->data['nonce']; ?>
        <div class="to">
            <div class="ui-tabs">
                <ul>
                    <li><a href="#meta-box-general-1"><u><?php esc_html_e('General','autospa'); ?></u></a></li>
                </ul>
                <div id="meta-box-general-1">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Widget area in sidebar','autospa'); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Select widget area and widget area location.','autospa'); ?></span>
                            <div class="to-clear-fix">
                                <span class="to-legend-field"><?php esc_html_e('Widget area:','autospa'); ?></span>
                                <select name="<?php Autospa_ThemeHelper::getFormName('page_widget_area_sidebar'); ?>" id="<?php Autospa_ThemeHelper::getFormName('page_widget_area_sidebar'); ?>">
<?php
							foreach($this->data['dictionary']['widgetArea'] as $index=>$value)
                            {
                   				echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['page_widget_area_sidebar'],$index,false)).'>'.esc_html($value[0]).'</option>';
                            }
?>
                                </select>
                            </div>
                            <div class="to-clear-fix">
                                <span class="to-legend-field"><?php esc_html_e('Location:','autospa'); ?></span>
                                <select name="<?php Autospa_ThemeHelper::getFormName('page_widget_area_sidebar_location'); ?>" id="<?php Autospa_ThemeHelper::getFormName('page_widget_area_sidebar_location'); ?>">
<?php
							foreach($this->data['dictionary']['widgetAreaLocation'] as $index=>$value)
                            {
                                echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['page_widget_area_sidebar_location'],$index,false)).'>'.esc_html($value[0]).'</option>';
                            }
?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <h5><?php esc_html_e('Margin','autospa'); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Set top and bottom margin for a page content (in px).','autospa'); ?><br/></span>
                            <div class="to-clear-fix">
                                <span class="to-legend-field"><?php esc_html_e('Top margin:','autospa'); ?></span>
                                <input type="text" name="<?php Autospa_ThemeHelper::getFormName('page_content_margin_top'); ?>" id="<?php Autospa_ThemeHelper::getFormName('page_content_margin_top'); ?>" value="<?php echo esc_attr($this->data['option']['page_content_margin_top']); ?>"  maxlength="4"/>
                            </div>	
                            <div class="to-clear-fix">
                                <span class="to-legend-field"><?php esc_html_e('Bottom margin:','autospa'); ?></span>
                                <input type="text" name="<?php Autospa_ThemeHelper::getFormName('page_content_margin_bottom'); ?>" id="<?php Autospa_ThemeHelper::getFormName('page_content_margin_bottom'); ?>" value="<?php echo esc_attr($this->data['option']['page_content_margin_bottom']); ?>"  maxlength="4"/>
                            </div>	
                        </li>	
                        
                        
                        
                    </ul>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function($) 
            {
                $('.to').themeOption();
				var element=$('.to').themeOptionElement({init:true});
                element.bindBrowseMedia('.to-button-browse');
            });
        </script>