<?php
		global $post,$autospaParentPost,$autospaBlogAutomaticExcerptLength;

		$Blog=new Autospa_ThemeBlog();
        $Page=new Autospa_ThemePage();
        $Post=new Autospa_ThemePost();

		$query=$Blog->getPost();
        
		if(count($query->posts))
		{
?>
		<div class="theme-blog theme-clear-fix">
			
			<ul class="theme-reset-list theme-clear-fix">
<?php
            while($query->have_posts())
			{
                $query->the_post();
                
                if(get_post_type()=='post')
                {
                    $class='theme-post-large-image';
                
                    $autospaBlogAutomaticExcerptLength=1;
                
                    if(($Post->hasPostImage($post)) && ($Page->getCurrentTemplate()=='blog-small-image.php'))
                    {
                        $class='theme-post-small-image';
                        $autospaBlogAutomaticExcerptLength=2;
                    }
                
                    $class='theme-post theme-clear-fix '.$class;
                
                    if(is_sticky()) $class.=' sticky';
?>
				<li id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
<?php
                    echo $Post->createPostHeader($post);
?>
                    <div class="theme-clear-fix">
<?php
                    echo $Post->createPostImage($post);
                    echo $Post->createPostExcerpt($post);
                    echo $Post->createPostReadMoreButton($post);
?>
                    </div>
<?php
                    echo $Post->createPostDivider($post);
?>
				</li>
<?php
                }
                else
                {
?>
                <li id="post-<?php the_ID(); ?>" <?php post_class('theme-post theme-clear-fix theme-post-large-image'); ?>>
                    <?php echo $Post->createPostHeader($post); ?>
                    <div class="theme-clear-fix"></div>
                    <?php echo $Post->createPostDivider($post); ?>
                </li>
<?php
                }
			}
?>
			</ul>
<?php 
            echo $Blog->createPagination($query);
?>
		</div>
<?php
		}
		else
		{
			if(is_search())
			{
                $Validation=new Autospa_ThemeValidation();
                
                $html=Autospa_ThemePlugin::doShortcode('Vc_Manager','[vc_autospa_theme_notice icon="alarm" header_text="'.__('Information','autospa').'" subheader_text="'.__('Sorry, no posts where found. Try searching for something else.','autospa').'"]');
                
                if($Validation->isNotEmpty($html)) echo $html;
                else esc_html_e('Sorry, no posts where found. Try searching for something else.','autospa');
			}
		}