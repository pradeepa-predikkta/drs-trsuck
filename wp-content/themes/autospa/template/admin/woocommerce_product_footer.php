        <ul class="to-form-field-list">
            <li>
                <h5><?php esc_html_e('Widget area in top footer','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Select widget area.','autospa'); ?></span>
                <div class="to-clear-fix">
                    <select name="<?php Autospa_ThemeHelper::getFormName('woocommerce_product_footer_widget_area_1'); ?>" id="<?php Autospa_ThemeHelper::getFormName('woocommerce_product_footer_widget_area_1'); ?>">
<?php
                        foreach($this->data['dictionary']['widgetArea'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['woocommerce_product_footer_widget_area_1'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>
            </li>			
            <li>
                <h5><?php esc_html_e('Widget area in middle footer','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Select widget area.','autospa'); ?></span>
                <div class="to-clear-fix">
                    <select name="<?php Autospa_ThemeHelper::getFormName('woocommerce_product_footer_widget_area_2'); ?>" id="<?php Autospa_ThemeHelper::getFormName('woocommerce_product_footer_widget_area_2'); ?>">
<?php
                        foreach($this->data['dictionary']['widgetArea'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['woocommerce_product_footer_widget_area_2'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>
            </li>				
            <li>
                <h5><?php esc_html_e('Widget area in bottom footer','autospa'); ?></h5>
                <span class="to-legend"><?php esc_html_e('Select widget area.','autospa'); ?></span>
                <div class="to-clear-fix">
                    <select name="<?php Autospa_ThemeHelper::getFormName('woocommerce_product_footer_widget_area_3'); ?>" id="<?php Autospa_ThemeHelper::getFormName('woocommerce_product_footer_widget_area_3'); ?>">
<?php
                        foreach($this->data['dictionary']['widgetArea'] as $index=>$value)
                        {
                            echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['woocommerce_product_footer_widget_area_3'],$index,false)).'>'.esc_html($value[0]).'</option>';
                        }
?>
                    </select>
                </div>
            </li>
        </ul>