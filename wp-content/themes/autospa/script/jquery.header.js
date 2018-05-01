/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var Header=function(object,themeOption)
	{
		/**********************************************************************/
		
		var $self=this;
		var $themeOption=themeOption;

		var $header;
		var $headerTop;
		var $headerBottom;
        
        var $headerTopLogo;
        var $headerTopSocial;
		
        var $headerTopMenuDefaultList;
        
        var $headerTopMenuResponsive;
		
		/**********************************************************************/

		this.create=function() 
		{		
			$header=$('.theme-page-header');
			$headerTop=$header.find('.theme-page-header-top');
			$headerBottom=$header.find('.theme-page-header-bottom');

            $headerTopLogo=$headerTop.find('.theme-page-header-top-logo');
            $headerTopSocial=$headerTop.find('.theme-page-header-top-social-list');
			$headerTopMenuDefaultList=$headerTop.find('.theme-page-header-top-menu-default>ul');
            $headerTopMenuResponsive=$headerTop.find('.theme-page-header-top-menu-responsive');
			
			/***/
            
            if($headerBottom.hasClass('theme-page-header-bottom-type-image'))
            {
                var imageLength=parseInt($headerBottom.find('img').length,10);
                if(imageLength)
                {
                    var imageCounter=0;
                    $headerBottom.find('img').on('load',function() 
                    {
                        imageCounter++;
                        if(imageCounter===imageLength) $self.build();
                    }).each(function() 
                    {
                        if(this.complete) $(this).load();
                    });
                }
                else $self.build();
            }
            else $self.build();
		};
        
        /**********************************************************************/
        
        this.build=function()
        {
            if($headerTopMenuDefaultList.length===1)
            {
                if($headerTopMenuDefaultList.length===1 && parseInt($themeOption.menu.animation_enable,10)===1)
                {
                    $headerTopMenuDefaultList.superfish(
                    { 
                        delay		:	parseInt($themeOption.menu.animation_delay,10), 
                        speed		:	parseInt($themeOption.menu.animation_speed_open,10), 
                        speedOut	:	parseInt($themeOption.menu.animation_speed_close,10),	
                        cssArrows	:	false,
                        animation   :   {opacity:'show'},
                        onInit		:	function()
                        {

                        }
                    });			
                }
            }

            /***/
            
            $(window).windowDimensionListener({change:function(width,height)  
            {
                if(width || height)
                {
                    $self.createHeaderSticky();
                    $self.createHeaderResponsive();
                    $self.setHeaderMinHeight();
                }
            }});

            /***/
            
            if(parseInt($themeOption.header.sticky_enable,10)===1)
            {
                $(window).scroll(function()
                {
                    $self.createHeaderSticky();
                });
            }
            
            /***/
            
            $self.createMenuResponsive();

            /***/

            $header.css({display:'block'});          
        };
        
        /**********************************************************************/
        
        this.createHeaderResponsive=function()
        {
            if($headerTopLogo.actual('outerWidth')+$headerTopSocial.actual('outerWidth')>$header.actual('outerWidth'))
            {
                $header.addClass('theme-mode-responsive theme-mode-responsive-state-2').removeClass('theme-mode-responsive-state-1');
                return;                  
            }
            
            if($headerTopMenuDefaultList.length)
            {
                if($headerTopLogo.actual('outerWidth')>$headerTopMenuDefaultList.offset().left)
                {
                    $header.addClass('theme-mode-responsive theme-mode-responsive-state-1').removeClass('theme-mode-responsive-state-2');
                    return;                  
                }

                if($headerTopMenuDefaultList.offset().left+$headerTopMenuDefaultList.actual('outerWidth')>$headerTopSocial.offset().left)
                {
                    $header.addClass('theme-mode-responsive theme-mode-responsive-state-1').removeClass('theme-mode-responsive-state-2');
                    return;                  
                }
            }
            
            $headerTopMenuResponsive.css({'display':'none'});

            $header.removeClass('theme-mode-responsive').removeClass('theme-mode-responsive-state-1').removeClass('theme-mode-responsive-state-2');
        };
		
		/**********************************************************************/
		
		this.createHeaderSticky=function()
		{
			if(parseInt($themeOption.header.sticky_enable,10)!==1) return;
			
			var offset=(parseInt($('#wpadminbar').length,10)===1 ? $('#wpadminbar').actual('height') : 0);
						
			if($header.hasClass('theme-mode-responsive'))
			{
				$header.removeClass('theme-page-header-sticky');
				return;
			}
			
			if($header.hasClass('theme-page-header-sticky'))
			{
				if($(window).scrollTop()<=$header.position().top-offset)
				{
                    $header.removeClass('theme-page-header-sticky');
				}
			}
			else
			{
				if($(window).scrollTop()>$header.position().top-offset)
				{
                    $header.addClass('theme-page-header-sticky');
				}				
			}
		};
		
		/**********************************************************************/
		
		this.setHeaderResponsive=function()
		{
			var width=$header.parent().actual('width')+17;

			if(width<$themeOption.header.menu_responsive_mode)
			{
				$header.addClass('theme-mode-responsive');
				$header.removeClass('theme-header-menu-sticky');
			}
			else $header.removeClass('theme-mode-responsive');
		};
        
        /**********************************************************************/
        
        this.createMenuResponsive=function()
        {
            $headerTopSocial.children('a:last').on('click',function(e) 
            {
                e.preventDefault();
                $self.openMenuResponsive(); 
            });
            
            $headerTopMenuResponsive.find('>ul').prepend('<li><a href="#"><span></span><span></span><span class="theme-icon-meta-arrow-large-tb"></span></a></li>')
            
            $headerTopMenuResponsive.find('li.menu-item-has-children>a>span:first-child+span+span').addClass('theme-icon-meta-arrow-large-tb');
            
            $headerTopMenuResponsive.find('>ul>li:first-child>a').on('click',function()
            {
                $self.closeMenuResponsive();
            });
            
            $headerTopMenuResponsive.find('span.theme-icon-meta-arrow-large-tb').on('click',function(e)
            {
                e.preventDefault();
                $(this).parent('a').next('ul').slideToggle(200);
            });
        };
        
        /**********************************************************************/
        
        this.openMenuResponsive=function()
        {
            $headerTopMenuResponsive.css({'top':-1*$headerTopMenuResponsive.actual('outerHeight'),'display':'block'});
             
            $headerTopMenuResponsive.animate({top:0},{duration:500,easing:'easeInOutCubic'},function() 
            {
                
            });
        };
        
        /**********************************************************************/
        
        this.closeMenuResponsive=function()
        {
            var height=-1*$headerTopMenuResponsive.actual('outerHeight');
            
            $headerTopMenuResponsive.animate({top:height},{duration:500,easing:'easeInOutCubic'},function() 
            {
                $headerTopMenuResponsive.css('display','none');
            });      
        };
        
        /**********************************************************************/
        
        this.setHeaderMinHeight=function()
        {
            $header.css('min-height',$headerTop.actual('outerHeight'));
        };
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.header=function(themeOption) 
	{
		var header=new Header(this,themeOption);
		header.create();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/