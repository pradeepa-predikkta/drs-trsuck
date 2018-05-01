<?php
		$Post=new Autospa_ThemePost();
		
		$query=$Post->getPostRecent($this->data['instance']);
		
		if($query)
		{
			$id='widget_theme_widget_post_most_recent_'.Autospa_ThemeHelper::createId();
			
			echo $this->data['html']['start']; 
?>
			<div class="widget_theme_widget_post_recent theme-clear-fix" id="<?php echo esc_attr($id); ?>">
				
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
						<span><span class="theme-icon-meta-time"></span><?php echo get_the_date(); ?></span>
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