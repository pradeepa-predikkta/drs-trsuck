		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('404 error page','autospa'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Get settings for 404 page from selected page.','autospa'); ?></span>
				<div class="to-clear-fix">
					<select name="<?php Autospa_ThemeHelper::getFormName('page_404_page_id'); ?>" id="<?php Autospa_ThemeHelper::getFormName('page_404_page_id'); ?>">
<?php
						foreach($this->data['dictionary']['page'] as $index=>$value)
							echo '<option value="'.esc_attr($index).'" '.(Autospa_ThemeHelper::selectedIf($this->data['option']['page_404_page_id'],$index,false)).'>'.esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
		</ul>