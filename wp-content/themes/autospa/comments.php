<?php
		if(!post_password_required())
		{	
			$count=get_comments_number($post->ID);
			if($count>0)
			{
?>
		<h4><?php esc_html_e('Comments','autospa'); ?></h4>

		<div id="comments_list" class="theme-clear-fix">

			<ul class="theme-reset-list theme-clear-fix">
<?php
				$Comment=new Autospa_ThemeComment();
				$Validation=new Autospa_ThemeValidation();

				wp_list_comments(array('avatar_size'=>70,'page'=>$Comment->page,'type'=>'all','callback'=>array($Comment,'createComment')));

				$pagination=paginate_comments_links(array
				(  
					'base'				=>	'#cpage-%#%',  
					'format'			=>	'',
					'add_fragment'		=>	'',
					'current'			=>	$Comment->page,
					'next_text'			=>	'',
					'prev_text'			=>	'',
					'echo'				=>	false
				));  
?>
			</ul>
<?php
				if($Validation->isNotEmpty($pagination))
				{
?>
			<div class="theme-pagination theme-clear-fix"><?php echo $pagination; ?></div>
<?php
				}
?>
		</div>
<?php
			}
		}