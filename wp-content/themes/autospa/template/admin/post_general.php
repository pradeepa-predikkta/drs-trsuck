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