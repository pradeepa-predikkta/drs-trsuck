/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var ThemeComment=function(object,option)
	{
		/**********************************************************************/
		
        var $this=this;
        
		var $option=option;
		
		var $respond=$('#respond');
		var $comment=$('#comments');
		var $commentForm=$('#comment-form');
		
		var $commentFormPostId=$('#comment_post_ID');
		var $commentFormParentCommentId=$('#comment_parent');
	
		var $commentFormCancelReply=$('#cancel-comment-reply-link');
	
		/**********************************************************************/

		this.build=function() 
		{
			var self=this;
			
            $respond.addClass('theme-clear-fix');
            
			$commentForm.find('>.form-submit').append($commentFormCancelReply);
			$commentForm.find('>.form-submit>input[type="submit"]').addClass('theme-button theme-button-1');
            
			$commentFormCancelReply.addClass('theme-button theme-button-1');
		
			$commentForm.submit(function()
			{
				self.addComment();
				return(false);
			});

			this.bindEvent();

			$(window).on('hashchange',function()
			{
				if(location.hash.substr(1,6)==='cpage-')
				{
					var data={};

					data.cpage=parseInt(location.hash.substr(7),10);
					data.comment_form_post_id=parseInt($commentFormPostId.val(),10);

					if(data.cpage===$comment.data('cpage')) return;
					
					data.action='comment_get';

					$('#comments').css('opacity','0.5');

					jQuery.ajax(
					{
						url				:	$option.requestURL,
						data			:	data,
						type			:	'GET',
						success			:	self.getCommentResponse,
						dataType		:	'json',
						contextObject	:	self
					});
				}
			});

			$(window).trigger('hashchange');
		};
		
		/**********************************************************************/
		
		this.getCommentResponse=function(response)
		{
			$comment.html(response.html);
			
			$comment.data('cpage',response.cpage);
			
			this.contextObject.bindEvent();

			$.scrollTo($comment,400,{easing:'easeOutQuint',offset:$this.getScrollOffset()});
			
			$('#comments').css('opacity','1.0');
		};
		
		/**********************************************************************/
		
		this.bindEvent=function()
		{
			var clickEventType=((document.ontouchstart!==null) ? 'click' : 'touchstart');
			
			$('.theme-comment-meta-reply-button').bind(clickEventType,function(e)
			{
				e.preventDefault();

				$commentFormCancelReply.css('display','block');
				$commentFormParentCommentId.val(jQuery(this).attr('href').substr(9));
				
				$.scrollTo($respond,400,{easing:'easeOutQuint',offset:$this.getScrollOffset()});
			});

			$('.comment-in-reply').bind(clickEventType,function(e) 
			{
				e.preventDefault();
				$.scrollTo($($(this).attr('href')),400,{easing:'easeOutQuint',offset:$this.getScrollOffset()});
			});

			$commentFormCancelReply.bind(clickEventType,function(e) 
			{
				e.preventDefault();

				$commentFormParentCommentId.val(0);

				$(this).css('display','none');
				$.scrollTo($comment,400,{easing:'easeOutQuint',offset:$this.getScrollOffset()});
			});	
			
			$comment.find('>#comments_list>.theme-pagination>a').each(function()
			{
				$(this).attr('href',$(this).attr('href').substr($(this).attr('href').indexOf('#')));
			});
		};
		
		/**********************************************************************/
		
		this.addComment=function()
		{			
			var data=$commentForm.serialize()+'&cpage='+$comment.data('cpage')+'&action=comment_add';
			
			this.blockForm('block');
			
			$.ajax(
			{
				url				:	$option.requestURL,
				data			:	data,
				type			:	'POST',
				success			:	this.addCommentResponse,
				dataType		:	'json',
				contextObject	:	this
			});
		};

		/**********************************************************************/
	
		this.addCommentResponse=function(response)
		{
			this.contextObject.blockForm('unblock');

			if(parseInt(response.error)===0) 
			{	
				$comment.html(response.html);
				$comment.data('cpage',response.cpage);
			}
			
			$commentForm.find('p').qtip('destroy');

			if(typeof(response.info)!=='undefined')
			{	
				if(response.info.length)
				{	
					for(var key in response.info)
					{
						$('#'+response.info[key].fieldId).parent('p').children('label').qtip(
						{
							style			:      
							{
								classes		:	(parseInt(response.error,10)===1 ? 'theme-qtip theme-qtip-error' : 'theme-qtip theme-qtip-success')
							},
							content			: 	
							{
								text		:	response.info[key].message
							},
							position		: 	
							{
								my			:	'left center',
								at			:	'right center',
								container	:	$commentForm
							}
						}).qtip('show');				
					}
				}
			}

			if(parseInt(response.error,10)===0) 
			{
				$commentFormParentCommentId.val(0);
				$commentFormCancelReply.css('display','none');

				$.scrollTo('#comment-'+response.commentId,400,{easing:'easeOutQuint',offset:$this.getScrollOffset()});
			
				$('#author,#email,#url,#comment').val('').blur();

				this.contextObject.bindEvent();

				if(response.changeURL.length!==0) location.href=response.changeURL;
			}	
		};
		
		/**********************************************************************/
		
		this.blockForm=function(action)
		{
			if(action==='block') 
			{	
				$commentForm.find('>p:not(".comment-notes"):not(".logged-in-as")').block(
				{
					message		:	false,
					overlayCSS	:	
					{
						opacity	:	'0.3'
					}
				});
			}
			else $commentForm.find('p').unblock();	
		};	
        
        /**********************************************************************/
        
        this.getScrollOffset=function()
        {
            var offset=-20;
            
            var adminBar=$('#wpadminbar');
            if(adminBar.length===1) offset-=adminBar.actual('height')
            
            var header=$('.theme-page-header');
            if(header.length===0) return(offset);
            
            var headerTop=header.children('.theme-page-header-top');
            if(headerTop.length===0) return(offset);
            
            if(header.hasClass('theme-page-header-sticky'))
            {
                return(-1*headerTop.actual('height')+offset);
            }
            
            return(offset);
        };
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.ThemeComment=function(option) 
	{
		var comment=new ThemeComment(this,option);
		comment.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/