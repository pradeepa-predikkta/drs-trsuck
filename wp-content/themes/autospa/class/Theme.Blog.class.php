<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeBlog
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->sortPostBlogField=array
		(
			'post_id'															=>	array(__('Post ID','autospa')),
			'post_date'															=>	array(__('Post date','autospa')),
			'title'																=>	array(__('Post title','autospa'))
		);

		$this->sortDirection=array
		(
			'asc'																=>	array(__('Ascending','autospa')),
			'desc'																=>	array(__('Descending','autospa'))
		);		
	}
	
	/**************************************************************************/	
	
	function automaticExcerptLength()
	{
		global $post,$autospaBlogAutomaticExcerptLength;
		
		$length=55;
		
		switch($post->post_type)
		{
			case 'post':
				
                $length=Autospa_ThemeOption::getOption('blog_automatic_excerpt_length_'.$autospaBlogAutomaticExcerptLength);
				
			break;
		}
		
		return($length);
	}
	
	/**************************************************************************/
	
	function filterExcerptMore()
	{

	}
	
	/**************************************************************************/
	
	function getPost()
	{
		$Page=new Autospa_ThemePage();
		$Validation=new Autospa_ThemeValidation();
		
		$argument=array();
		
		$s=get_query_var('s');
		$tag=get_query_var('tag');
		$day=(int)get_query_var('day');
		$year=(int)get_query_var('year');
		$month=(int)get_query_var('monthnum');
		$categoryId=(int)get_query_var('cat');
		$authorId=(int)get_query_var('author');
		
        $argument['post_type']='post';
        
		if($Validation->isNotEmpty($s))
        {
			$argument['s']=$s;
            $argument['post_type']=array('post','page');
        }
        if($Validation->isNotEmpty($tag))
			$argument['tag']=$tag;
		if($categoryId>0)
			$argument['cat']=(int)$categoryId;
		if($authorId>0)
			$argument['author']=(int)$authorId;
		if($year>0)
			$argument['year']=$year;
		if($month>0)
			$argument['monthnum']=$month;
		if($day>0)
			$argument['day']=$day;
			
		$default=array
		(
			'post_status'		=>	'publish',
			'posts_per_page'	=>	(int)get_option('posts_per_page'),
			'paged'				=>	(int)Autospa_ThemeHelper::getPageNumber(),
			'orderby'			=>	Autospa_ThemeOption::getOption('blog_sort_field'),
			'order'				=>	Autospa_ThemeOption::getOption('blog_sort_direction')
		);
		
		$query=new WP_Query(array_merge($argument,$default));
		return($query);
	}
	
	/**************************************************************************/
	
	function createPagination($query)
	{
		global $wp_rewrite;  
        
        $Validation=new Autospa_ThemeValidation();
		
		$total=$query->max_num_pages;

		$current=max(1,Autospa_ThemeHelper::getPageNumber()); 
		
		$pagination=array
		(
			'base'			=>	add_query_arg('paged','%#%'),
			'format'		=>	'',
			'current'		=>	$current,  
			'total'			=>	$total,  
			'next_text'		=>	'',
			'prev_text'		=>	''
		);

		if($wp_rewrite->using_permalinks())
			$pagination['base']=user_trailingslashit(trailingslashit(remove_query_arg('s',get_pagenum_link(1))).'page/%#%/','paged');

		if(is_search()) $pagination['add_args']=array('s'=>urlencode(get_query_var('s')));

		$html=paginate_links($pagination);
		
		if($Validation->isNotEmpty($html))
		{
			$html=
			'
				<div class="theme-pagination theme-clear-fix">
					'.$html.'
				</div>
			';
		}
		
		return($html);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/