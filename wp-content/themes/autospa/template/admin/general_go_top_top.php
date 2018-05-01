		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Enable "Go to page top"','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable hash "Go to page top".','autospa'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['go_to_page_top_enable'],1); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_enable_2'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['go_to_page_top_enable'],0); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_enable_2'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
				</div>			
			</li>
			<li>
				<h5><?php esc_html_e('Hash','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Hash','autospa'); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_hash'); ?>" id="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_hash'); ?>" value="<?php echo esc_attr($this->data['option']['go_to_page_top_hash']); ?>" />
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Animation','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable animation during scrolling.','autospa'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_enable_1'); ?>" value="1" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['go_to_page_top_animation_enable'],1); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_enable_1'); ?>"><?php esc_html_e('Enable','autospa'); ?></label>
					<input type="radio" name="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_enable'); ?>" id="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_enable_2'); ?>" value="0" <?php Autospa_ThemeHelper::checkedIf($this->data['option']['go_to_page_top_animation_enable'],0); ?>/>
					<label for="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_enable_2'); ?>"><?php esc_html_e('Disable','autospa'); ?></label>
				</div>			
			</li>			
			<li>
				<h5><?php esc_html_e('Duration','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Duration of animation in miliseconds','autospa'); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_duration'); ?>" id="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_duration'); ?>" value="<?php echo esc_attr($this->data['option']['go_to_page_top_animation_duration']); ?>" maxlength="5"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Easing','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Easing method of animation.','autospa'); ?></span>
				<div class="to-clear-fix">
					<select name="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_easing'); ?>" id="<?php Autospa_ThemeHelper::getFormName('go_to_page_top_animation_easing'); ?>">
<?php
						foreach($this->data['dictionary']['easingType'] as $index=>$value)
							echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['go_to_page_top_animation_easing'],$index,false)).'>'.esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
		</ul>