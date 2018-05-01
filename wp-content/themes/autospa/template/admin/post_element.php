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
                </div>
            </li>
<?php
        }
?>
        </ul>