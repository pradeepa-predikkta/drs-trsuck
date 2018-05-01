<?php
		$Post=new Autospa_ThemePost();
		
		$query=$Post->getPostMostComment($this->data['instance']);
		
		if($query)
		{
			$id='widget_theme_widget_post_most_comment_'.Autospa_ThemeHelper::createId();
			
			echo $this->data['html']['start']; 
?>
			<div class="widget_theme_widget_post_most_comment theme-clear-fix" id="<?php echo esc_attr($id); ?>">
				
				<ul class="theme-reset-list">
<?php
			global $post;
			$bPost=$post;

			while($query->have_posts())
			{
				$query->the_post();
?>
					<li class="theme-clear-fix">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('View post "%s".','autospa'),get_the_title())); ?>">
							<?php the_post_thumbnail('thumbnail'); ?>
						</a>
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('View post "%s".','autospa'),get_the_title())); ?>">
							<?php the_title(); ?>
						</a>
						<span><span class="theme-icon-meta-comment"></span><?php comments_number(); ?></span>
					</li>
<?php
			}
		
			$post=$bPost;
?>
				</ul>
				
			</div>
<?php
			echo $this->data['html']['stop']; 
		}