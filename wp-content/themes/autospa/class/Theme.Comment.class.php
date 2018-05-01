<?php

/******************************************************************************/
/******************************************************************************/

class Autospa_ThemeComment
{
	
	/**************************************************************************/
	
	function __construct()
	{		
		global $cpage;
		
		if(array_key_exists('cpage',$_GET))
		{
			$this->page=(int)$_GET['cpage']<=0 ? 1 : (int)$_GET['cpage'];
		}
		else $this->page=(int)$cpage<=0 ? 1 : (int)$cpage;
		
		$this->thread_comments=(int)get_option('thread_comments');
		$this->comment_moderation=(int)get_option('comment_moderation') ? 0 : 1;
		$this->comments_per_page=(int)get_option('page_comments')==1 ? (int)get_option('comments_per_page') : -1;
	}
	
	/**************************************************************************/
	
	function addComment()
	{
		global $wpdb;
		$Validation=new Autospa_ThemeValidation();
		
		$response=array('error'=>0,'info'=>null,'changeURL'=>'');
		$data=array('author'=>null,'email'=>null,'url'=>null,'comment'=>null,'comment_post_ID'=>0,'comment_parent'=>0);

		foreach($data as $index=>$value) 
		{
			if(array_key_exists($index,$_POST))
				$data[$index]=$_POST[$index];
		}
		
		if(!is_user_logged_in())
		{
			if(($Validation->isEmpty($data['author'])) && (get_option('require_name_email')==1))
			{
				$response['error']=1;
				$response['info'][]=array('fieldId'=>'author','message'=>esc_html__('Please enter your name.','autospa'));
			}

			if((!$Validation->isEmailAddress($data['email'])) && (get_option('require_name_email')==1))
			{
				$response['error']=1;	
				$response['info'][]=array('fieldId'=>'email','message'=>esc_html__('Please enter valid e-mail address.','autospa'));
			}

			if(!$Validation->isURL($data['url'],true))
			{
				$response['error']=1;	
				$response['info'][]=array('fieldId'=>'url','message'=>esc_html__('Please enter valid URL address.','autospa'));
			}
		}
	
		if($Validation->isEmpty($data['comment']))
		{
			$response['error']=1;
			$response['info'][]=array('fieldId'=>'comment','message'=>esc_html__('Please enter your message.','autospa'));
		}	
	
		if($response['error']==1) $this->createResponse($response);
		$data=Autospa_ThemeHelper::stripslashesPOST($data);
		
		$insertData=array
		(
			'comment_post_ID'		=> (int)$data['comment_post_ID'],
			'comment_content'		=> $data['comment'],
			'comment_parent'		=> (int)$data['comment_parent'],
			'comment_date'			=> current_time('mysql'),
			'comment_approved'		=> $this->comment_moderation
		);

		if(!is_user_logged_in())
		{
			$insertData['comment_author']=$data['author'];
			$insertData['comment_author_url']=Autospa_ThemeHelper::addProtocolName($data['url']);
			$insertData['comment_author_email']=$data['email'];
		}
		else
		{
			$user=wp_get_current_user();
			$insertData['comment_author']=$user->display_name;
			$insertData['comment_author_email']=$user->user_email;
		}

		$commentId=wp_insert_comment($insertData);

		if($commentId)	
		{
			query_posts('p='.(int)$data['comment_post_ID'].'&post_type=any');
			if(have_posts())
			{
				the_post();
				
				if((int)$data['comment_parent']==0 || $this->thread_comments==0)
				{
					$query=$wpdb->prepare('select count(*) as count from '.$wpdb->comments.' where comment_approved=1 and comment_post_ID=%d',(int)get_the_ID()).($this->thread_comments==1 ? " and comment_parent=0" : null);
					$parent=$wpdb->get_row($query);
					
					if($this->comments_per_page>0)
						$_GET['cpage']=ceil($parent->count/$this->comments_per_page);
					else $_GET['cpage']=1;
					
					$response['changeURL']='#cpage-'.$_GET['cpage'];
				}
				else $_GET['cpage']=(int)$_POST['cpage'];
				
				$response['cpage']=(int)$_GET['cpage'];
				$response['commentId']=(int)$commentId;
				
				ob_start();
				comments_template();
				$response['html']=ob_get_contents();
				ob_end_clean();
			}
			
			$response['comment_id']=$commentId;
			
			$response['error']=0;
			$response['info'][]=array('fieldId'=>'submit','message'=>esc_html__('Your comment has been added.','autospa'));
		}
		else
		{
			$response['error']=1;
			$response['info'][]=array('fieldId'=>'submit','message'=>esc_html__('Your comment could not be added.','autospa'));
		}
		
		$this->createResponse($response);
	}
	
	/**************************************************************************/
	
    function isGPC()
    {
        return((bool)ini_get('magic_quotes_gpc'));
    }

	/**************************************************************************/

    function createResponse($response)
    {
		echo json_encode($response);
        exit;
    }
	
	/**************************************************************************/
	
	function createComment($comment,$args,$depth)
	{
		$ret=null;
		$reply=null;
		
		$GLOBALS['comment']=$comment;
		
		if((int)$comment->comment_parent>0)
		{
			$parent=get_comment($comment->comment_parent);
			
			$reply=
			'
				<span class="theme-comment-meta-reply-to">
                    &nbsp;'.esc_html__('to','autospa').'&nbsp;
					<a href="#comment-'.(int)$comment->comment_parent.'">
						'.$parent->comment_author.'
					</a>
				</span>
			';
		}
		
		$ret.=
		'
			<li '.comment_class('theme-clear-fix',$comment->comment_ID,$comment->comment_post_ID,false).' id="comment-'.$comment->comment_ID.'">
				<div class="theme-comment-inner">
					<div class="theme-comment-avatar">
						'.get_avatar($comment->comment_author_email,80).'
					</div>
					<div class="theme-comment-meta theme-clear-fix">
                        <a class="theme-comment-meta-reply-button" href="#comment-'.(int)$comment->comment_ID.'">'.esc_html__('Reply','autospa').'</a>
						<span class="theme-comment-meta-author">
                            <span class="theme-icon-meta-user"></span>
                            '.get_comment_author_link().'
                        </span>
						'.$reply.'
						<span class="theme-comment-meta-date">
                            <span class="theme-icon-meta-time"></span>
                            '.sprintf(esc_html__(' %1$s at %2$s','autospa'),get_comment_date(),get_comment_time()).'
                        </span>
					</div>
					<div class="theme-comment-content theme-clear-fix">
						<p>'.$this->getCommentContent().'</p>
						<div class="theme-comment-divider"></div>
					</div>
				</div>
		';

		echo $ret;
	}
	
	/**************************************************************************/
	
	function getComment()
	{
		$response=array('html'=>'','cpage'=>$this->page);
		
		query_posts('p='.(int)$_GET['comment_form_post_id'].'&post_type=any&orderby=date&order='.get_option('comment_order'));
		if(have_posts())
		{
			the_post();
			ob_start();
			comments_template();
			$response['html']=ob_get_contents();
			ob_end_clean();
		}

		echo @json_encode($response);
		exit;
	}
	
	/**************************************************************************/
	
	function getCommentContent($commentId=0)
	{
		$comment=get_comment($commentId);
		$content=strip_tags($comment->comment_content);
		$contentArray=explode(' ', $content);
	
		if(count($contentArray)>Autospa_ThemeOption::getOption('comment_automatic_excerpt_length'))
		{
			$length=Autospa_ThemeOption::getOption('comment_automatic_excerpt_length');
			$useReadMore=true;
		} 
		else 
		{
			$length=count($contentArray);
			$useReadMore=false;
        }
	
        $excerpt='';
		for($i=0;$i<$length;$i++) 
			$excerpt.=$contentArray[$i].' ';
	
		if($useReadMore)
		{
			$content=
			'
				<span class="theme-comment-content-excerpt">'.trim($excerpt).'&nbsp;[&hellip;]&nbsp;</span><a class="theme-comment-content-read-more-link" href="#">'.esc_html__('More...','autospa').'</a><span class="theme-comment-content-content">'.trim($content).'&nbsp;</span><a class="theme-comment-content-read-less-link" href="#">'.esc_html__('Less...','autospa').'</a>
			';
		}
		else $content='<span>'.$content.'</span>';
		
		return($content);	
	}

	/**************************************************************************/
}
	
/******************************************************************************/
/******************************************************************************/