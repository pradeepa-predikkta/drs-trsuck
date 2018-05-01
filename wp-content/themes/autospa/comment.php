<?php
        $Comment=new Autospa_ThemeComment();

		if((comments_open()) && (!post_password_required()))
		{
			$commenter=wp_get_current_commenter();
			$req=get_option('require_name_email');
			$aria_req=($req ? ' aria-required=\'true\'' : '');

			$field=array();

			$field['author']=
			'
				<p class="theme-comment-form-field-left">
					<label for="author">'.esc_html__('Name','autospa').($req ? ' <span class="required">*</span>' : '').'</label>
					<input id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30"'.$aria_req.'/>
				</p>
			';

			$field['email']=
			'
				<p class="theme-comment-form-field-left">
					<label for="email">'.esc_html__('Email','autospa').($req ? ' <span class="required">*</span>' : '').'</label>
					<input id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).'" size="30"'.$aria_req.'/>
				</p>
			';

			$field['url']=
			'
				<p class="theme-comment-form-field-left">
					<label for="url">'.esc_html__('Website','autospa').'</label>
					<input id="url" name="url" type="text" value="'.esc_attr($commenter['comment_author_url']).'" size="30"/>
				</p>
			';

			$commentField=
			'
				<p'.Autospa_ThemeHelper::createClassAttribute(is_user_logged_in() ? array('theme-clear-fix') : array('theme-comment-form-field-right')).'>
					<label for="comment">'.esc_html__('Comment','autospa').' <span class="required">*</span></label>
					<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
				</p>	
			';

			$argument=array
			(
				'id_form'				=>	'comment-form',
				'title_reply'			=>	__('Leave a Comment','autospa'),
				'cancel_reply_link'		=>	__('Cancel Comment','autospa'),
				'comment_field'			=>	$commentField,
				'fields'				=>	apply_filters('comment_form_default_fields',$field),
				'label_submit'			=>	__('Leave a Reply','autospa')
			);

			comment_form($argument); 
        }
?>
			<div id="comments" class="theme-clear-fix" data-cpage="<?php echo (int)$Comment->page; ?>">
				<?php comments_template(); ?>
			</div>