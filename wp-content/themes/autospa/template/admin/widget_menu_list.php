        <p>
			<label for="<?php echo esc_attr($this->data['option']['title']['id']); ?>"><?php esc_html_e('Title','autospa'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['title']['id']); ?>" name="<?php echo esc_attr($this->data['option']['title']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['title']['value']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['menu_id']['id']); ?>"><?php esc_html_e('Menu','autospa'); ?>:</label>
            <select class="widefat" id="<?php echo esc_attr($this->data['option']['menu_id']['id']); ?>" name="<?php echo esc_attr($this->data['option']['menu_id']['name']); ?>">
<?php
        $menu=wp_get_nav_menus();

        foreach($menu as $value)
            echo '<option value="'.esc_attr($value->term_id).'" '.($value->term_id==$this->data['option']['menu_id']['value'] ? 'selected=""' : null).'>'.esc_html($value->name).'</option>';
?>
            </select>
		</p>