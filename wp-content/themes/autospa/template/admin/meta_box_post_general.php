        <?php echo $this->data['nonce']; ?>
        <div class="to">
            <div class="ui-tabs">
                <ul>
                    <li><a href="#meta-box-general-1"><?php esc_html_e('General','autospa'); ?></a></li>
                    <li><a href="#meta-box-general-2"><?php esc_html_e('Elements','autospa'); ?></a></li>
                </ul>
                <div id="meta-box-general-1">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Widget area in sidebar','autospa'); ?></h5>
                            <span class="to-legend"><?php esc_html_e('Select widget area and widget area location.','autospa'); ?></span>
                            <div class="to-clear-fix">
                                <span class="to-legend-field"><?php esc_html_e('Widget area:','autospa'); ?></span>
                                <select name="<?php Autospa_ThemeHelper::getFormName('post_widget_area_sidebar'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_widget_area_sidebar'); ?>">
<?php
							foreach($this->data['dictionary']['widgetArea'] as $index=>$value)
                            {
                   				echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_widget_area_sidebar'],$index,false)).'>'.esc_html($value[0]).'</option>';
                            }
?>
                                </select>
                            </div>
                            <div class="to-clear-fix">
                                <span class="to-legend-field"><?php esc_html_e('Location:','autospa'); ?></span>
                                <select name="<?php Autospa_ThemeHelper::getFormName('post_widget_area_sidebar_location'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_widget_area_sidebar_location'); ?>">
<?php
							foreach($this->data['dictionary']['widgetAreaLocation'] as $index=>$value)
                            {
                                echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['post_widget_area_sidebar_location'],$index,false)).'>'.esc_html($value[0]).'</option>';
                            }
?>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="meta-box-general-2">       
                    <ul class="to-form-field-list">
<?php
        foreach($this->data['dictionary']['postElement'] as $index=>$value)
        {
?>
                        <li>
                            <h5><?php echo esc_html($value[0]); ?></h5>
                            <span class="to-legend"><?php echo sprintf(esc_html('Enable or disable visbility of %s.','autospa'),$value[1]); ?></span>
                            <div class="to-radio-button">   
                                <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_'.$index.'_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_'.$index.'_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_'.$index.'_enable'],1); ?>/>
                                <label for="<?php Autospa_ThemeHelper::getFormName('post_'.$index.'_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
                                <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_'.$index.'_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_'.$index.'_enable_0'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_'.$index.'_enable'],0); ?>/>
                                <label for="<?php Autospa_ThemeHelper::getFormName('post_'.$index.'_enable_0'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
                                <input type="radio" name="<?php Autospa_ThemeHelper::getFormName('post_'.$index.'_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('post_'.$index.'_enable_2'); ?>" value="-1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['post_'.$index.'_enable'],-1); ?>/>
                                <label for="<?php Autospa_ThemeHelper::getFormName('post_'.$index.'_enable_2'); ?>"><?php esc_html_e('- Use global settings -','autospa'); ?></label>
                            </div>
                        </li>
<?php
        }
?>
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