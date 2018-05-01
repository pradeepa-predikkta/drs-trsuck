<?php
		global $post,$autospaParentPost;
		
		the_post();
		
		$Post=new Autospa_ThemePost();
		
		$postClass=array('theme-post','theme-clear-fix');
?>
		<div class="theme-post-single">

			<div <?php post_class(join(' ',$postClass)); ?> id="post-<?php the_ID(); ?>">
<?php
		echo $Post->createPostHeader($post,false);
				
		echo $Post->createPostImage($post,false);
				
		echo $Post->createPostContent($post);
		
        echo $Post->createPostNavigation($post);
        
        echo $Post->createPostMeta($post);
        
		echo $Post->createPostAuthorInfo($post);
				
		echo $Post->createPostComment($post);
?>			
			</div>
			
		</div>

