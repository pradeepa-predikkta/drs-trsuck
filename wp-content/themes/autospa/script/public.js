/* global themeOption */

"use strict";
/******************************************************************************/
/******************************************************************************/

jQuery(document).ready(function($) 
{	
	/**************************************************************************/
	
	function wcUpdateCartCount()
	{
		var data={'action':'cart_count_get'};
		
		$.ajax(
		{
			url				:	themeOption.config.ajax_url,
			data			:	data,
			type			:	'GET',
			success			:	function(response)
			{
				$('.theme-icon-meta-cart>span:first-child').html(response.count);
			},
			dataType		:	'json'
		});			
	};    
    
	/**************************************************************************/

	try
	{
		$.fn.qtip.zindex=10;
	}
	catch(e) {}    
 
	/**************************************************************************/
	
	var clickEventType=((document.ontouchstart!==null) ? 'click' : 'touchstart');

    /**************************************************************************/
    
    if(parseInt(themeOption.rightClick.enable,10)!==1)
    {
        document.oncontextmenu=function() {return false;};
        jQuery(document).mousedown(function(e)
        { 
            if(parseInt(e.button)===2) return false; 
            return true; 
        });
    };
    
    /**************************************************************************/
    
    if(parseInt(themeOption.selection.enable,10)!==1)
    {
        jQuery('body').attr('unselectable','on').css('user-select','none').on('selectstart',false);
    };

    /**************************************************************************/
    
	$('.widget_archive ul>li').each(function() 
	{
		var link=$(this).children('a').remove();
		var span='<span>'+$(this).text()+'</span>';
		
		link.html(link.text()+span);
		$(this).html(link);
	});
    
    /**************************************************************************/
    
	$('.widget_categories ul>li').each(function() 
	{
		var link=$(this).children('a').remove();
        
        var list='';
        if($(this).children('ul').length)
            list=$(this).children('ul').remove();
        
		var span='<span>'+$(this).text()+'</span>';
        
		link.html(link.text()+span);
		$(this).html('').append(link).append(list);
	});
	
	$('.widget_archive,.widget_categories').css('display','block');
    
    $('.widget_archive select,.widget_categories select').dropkick();
    
     /**************************************************************************/
    
	$('.widget_recent_comments>ul>li').each(function() 
	{
		var link=$(this).children('a')[0];
        var author=$(this).children('span')[0];
                 
		$(this).html('').append(link).append(author);
        
        $(this).children('span').prepend('<span class="theme-icon-meta-user"></span>');
	});
	
	$('.widget_recent_comments').css('display','block');
    
      /**************************************************************************/
    
	$('.widget_recent_entries>ul>li').each(function() 
	{
		var link=$(this).children('a')[0];
        var date=$(this).children('span')[0];
                 
		$(this).html('').append(link).append(date);
        
        $(this).children('span').prepend('<span class="theme-icon-meta-time"></span>');
	});
	
	$('.widget_recent_entries').css('display','block');
    
    /**************************************************************************/
    
	$('.widget_rss>ul>li').each(function() 
	{
		var author=$(this).children('cite').clone(true,true);
		var date=$(this).children('.rss-date').clone(true,true);
			
        author.prepend('<span class="theme-icon-meta-user"></span>');
        date.prepend('<span class="theme-icon-meta-time"></span>');
        
		$(this).children('cite').remove();
		$(this).children('.rss-date').remove();
		
		if(date.length===1) $(this).children('a').after(date);
		if(author.length===1) $(this).children('a').after(author);
	});
    
    $('.widget_rss').css({display:'block'});
    
	/**************************************************************************/
	
	$('.widget_search').each(function() 
	{
        $(this).find('input[type="submit"]').parent().prepend('<span class="theme-icon-meta-search"></span>');
		$(this).find('input[type="submit"]').val('');
	});
    
    /**************************************************************************/
	
    //$('select').selectmenu();
    
    /**************************************************************************/
    
    $('.widget_calendar').each(function()
    {
        $(this).find('#prev>a').html('<span class="theme-icon-meta-arrow-large-rl"></span>');
        $(this).find('#next>a').html('<span class="theme-icon-meta-arrow-large-rl"></span>');
        $(this).css('display','block');
    });
    
    /**************************************************************************/
    
	$().header(themeOption);
    
	/**************************************************************************/
	
	if(parseInt(themeOption.goToPageTop.enable,10)===1)
	{
		$('.theme-page-footer').waypoint(function(direction)
		{
			if(direction==='down')
				$('#theme-go-to-top').animate({opacity:1},{duration:1000});
			else $('#theme-go-to-top').animate({opacity:0},{duration:250});
		},
		{
			offset	:	'100%'
		});
		
		$(window).bind('hashchange',function(e) 
		{
			e.preventDefault();
			
			var hash=window.location.hash.substring(1);
			if($.trim(hash)===$.trim(themeOption.goToPageTop.hash))
			{
				var options={};
				
				if(parseInt(themeOption.goToPageTop.animation_enable,10)===1)
					options={duration:parseInt(themeOption.goToPageTop.animation_duration),easing:themeOption.goToPageTop.animation_easing};
				
				options.onAfter=function() { window.location.hash='#'; };
				
				$.scrollTo(0,options);
			}
		});
	};
    
    /**************************************************************************/
    
	$('.theme-comment-content-read-more-link').live(clickEventType,function(e)
	{
		e.preventDefault();
		var parent=$(this).parent('p');
		
		parent.children('.theme-comment-content-excerpt,.theme-comment-content-read-more-link').css('display','none');
		parent.children('.theme-comment-content-content,.theme-comment-content-read-less-link').css('display','inline');
	});
	
	$('.theme-comment-content-read-less-link').live(clickEventType,function(e)
	{
		e.preventDefault();
		var parent=$(this).parent('p');
		
		parent.children('.theme-comment-content-excerpt,.theme-comment-content-read-more-link').css('display','inline');
		parent.children('.theme-comment-content-content,.theme-comment-content-read-less-link').css('display','none');
	});
    
    /**************************************************************************/
    
 	if($('#comment-form').length===1)
	{
        $('#comments>h4').addClass('theme-header-underline');
		$('#reply-title').replaceWith('<h4 class="theme-header-underline" id="reply-title">'+$('#reply-title').html()+'</h4>');
		
		$().ThemeComment({'requestURL':themeOption.config.ajax_url,'page':$('#comments').data('cpage')});
		
		$('#comment-form').css('display','block');
	}
    
    /**************************************************************************/ 
    
    $('.theme-component-tab').each(function() 
    {
        var Helper=new Autospa_ThemeHelper();
        
        if($(this).children('ul').length==0)
        {
            var navigation=$('<ul></ul>').append($(this).find('>a'));
            var content=$(this).find('>div');

            $(this).html('').append(navigation).append(content);

            $(this).find('ul>a').wrap('<li></li>');
        }
        
        $(this).css('display','block');
        
        var option=
        {
            'active'                                                            :   (parseInt($(this).data('close_start'),10)===1 ? false : parseInt($(this).data('active'),10)),
            'collapsible'                                                       :   Helper.parseBool($(this).data('collapsible')),
            'heightStyle'                                                       :   $(this).data('height_style')                  
        };
        
        if(parseInt($(this).data('animation_open_enable'),10)===1)
        {
            option.show=
            {
                delay                                                           :   parseInt($(this).data('animation_open_delay'),10),
                easing                                                          :   $(this).data('animation_open_easing'),
                duration                                                        :   parseInt($(this).data('animation_open_duration'),10)
            };
        };
        
        if(parseInt($(this).data('animation_close_enable'),10)===1)
        {
            option.hide=
            {
                delay                                                           :   parseInt($(this).data('animation_close_delay'),10),
                easing                                                          :   $(this).data('animation_close_easing'),
                duration                                                        :   parseInt($(this).data('animation_close_duration'),10)
            };
        };
        
        $(this).tabs(option);
    });
    
    /**************************************************************************/

    $('.theme-component-accordion').each(function() 
    {
        var Helper=new Autospa_ThemeHelper();

        $(this).css('display','block');
        
        var option=
        {
            'active'                                                            :   (parseInt($(this).data('close_start'),10)===1 ? false : parseInt($(this).data('active'),10)),
            'collapsible'                                                       :   Helper.parseBool($(this).data('collapsible')),
            'heightStyle'                                                       :   $(this).data('height_style'),
            'header'                                                            :   'h6',
            'animate'                                                           :   false,
            'icons'                                                             :   false
        };
        
        if(parseInt($(this).data('animation_enable'),10)===1)
            option.animate={duration:parseInt($(this).data('animation_duration'),10),easing:$(this).data('animation_easing')};
        
        $(this).accordion(option);
    });
    
    /**************************************************************************/
    
    $('.theme-component-google-map').each(function() 
    {
        var $this=$(this);
        
        $.getScript('//maps.google.com/maps/api/js?key='+$(this).data('google_map_api_key'),function()
        {
            var map=$this.children('.theme-component-google-map-map');
			var button=$this.children('.theme-component-google-map-button');
            
			if(button.length===1)
			{
				button.on('click',function(e)
				{
					e.preventDefault();
					if(!$this.hasClass('theme-state-open'))
					{
						map.animate({'height':$this.data('height')},{duration:500,complete:function()
						{
							$this.addClass('theme-state-open');
						}});
					}
					else
					{
						map.animate({'height':0},{duration:500,complete:function()
						{
							$this.removeClass('theme-state-open');
						}});						
					}
				});
			}
			else
			{
                $this.parent('.wpb_wrapper').css('height','100%');
                $this.css({height:$this.data('height'),width:$this.data('width')});
                map.css({height:$this.data('height'),width:$this.data('width')});
			}
            
            var $option=
            {
                map                                                             :
                {	
                    draggable                                                   :	$this.data('draggable_enable'),
                    scrollwheel                                                 :	$this.data('scrollwheel_enable'),
                    mapTypeId                                                   :	google.maps.MapTypeId[$this.data('map_type_id')],
                    mapTypeControl                                              :	$this.data('map_type_control_enable'),
                    mapTypeControlOptions                                       :	
                    {
                        style                                                   :	google.maps.MapTypeControlStyle[$this.data('map_type_control_style')],
                        position                                                :	google.maps.ControlPosition[$this.data('map_type_control_position')],
                    },
                    zoom                                                        :	$this.data('zoom_level'),
                    zoomControl                                                 :	$this.data('zoom_control_enable'),
                    zoomControloptions                                          :	
                    {
                        style                                                   :	google.maps.ZoomControlStyle[$this.data('zoom_control_style')],
                        position                                                :	google.maps.ControlPosition[$this.data('zoom_position')]
                    }
                }
            };
            
            var mapInner=map.children('div');
            mapInner.css({width:$this.data('width'),height:$this.data('height')});
            
  			var coordinate=new google.maps.LatLng($this.data('coordinate_lat'),$this.data('coordinate_lng'));
			$option.map.center=coordinate;
            
			var googleMap=new google.maps.Map(document.getElementById(mapInner.attr('id')),$option.map);
            
            if(new String(typeof(googleMapStyle))!=='undefined')
                googleMap.setOptions({styles:googleMapStyle[mapInner.attr('id')]});
            
            new google.maps.Marker({map:googleMap,position:coordinate,icon:$this.data('marker_url')});

            $(window).resize(function() 
			{
				var currCenter=googleMap.getCenter();
				google.maps.event.trigger(googleMap,'resize');
				googleMap.setCenter(currCenter);
			});
        });
    });

    /**************************************************************************/
    
    $('.theme-component-progress-bar').each(function() 
    {
        var progressBar=$(this);
        
        var maxValue=0;
        progressBar.find('.theme-component-progress-bar-item').each(function() 
		{
			var value=parseInt($(this).data('value'),10);
			if(maxValue<value) maxValue=value;
		});      
        
        progressBar.find('.theme-component-progress-bar-item').each(function() 
        {
            $(this).find('>span').html($(this).data('character_before')+'0'+$(this).data('character_after'));
            
			new Waypoint(
			{
				offset                                                          :	'90%',
				element                                                         :	this,
				handler                                                         :	function() 
				{
                    var progressBarItem=$(this.element);
                                      
                    if(progressBarItem.hasClass('theme-state-complete')) return;
					progressBarItem.addClass('theme-state-complete');

                    var progressBarItemBar=progressBarItem.find('>div>div');
                    var progressBarItemValue=progressBarItem.children('span');

					var i=0;
					var portion=(progressBarItem.data('value')/maxValue);

					progressBarItemBar.animate({width:(portion*100)+'%'},{duration:progressBar.data('animation_duration'),easing:progressBar.data('animation_easing_type'),step:function(now,fx) 
					{
						i++;
						progressBarItemValue.html(progressBarItem.data('character_before')+Math.round(((now/100)*maxValue))+progressBarItem.data('character_after'));
					}});    
				}
			});            
        });
    });
    
     /**************************************************************************/
    
    $('.theme-component-counter-box').each(function() 
    {
        var counterBox=$(this);
        
        var maxValue=0;
        counterBox.find('.theme-component-counter-box-item').each(function() 
		{
			var value=parseInt($(this).data('value'),10);
			if(maxValue<value) maxValue=value;
		});      
        
        counterBox.find('.theme-component-counter-box-item').each(function() 
        {
			new Waypoint(
			{
				offset                                                          :	'90%',
				element                                                         :	this,
				handler                                                         :	function() 
				{
                    var counterBoxItem=$(this.element);
                                      
                    if(counterBoxItem.hasClass('theme-state-complete')) return;
					counterBoxItem.addClass('theme-state-complete');

                    var progressBarItemValue=counterBoxItem.children('span:first');
                    var interval=counterBox.data('animation_duration')/counterBoxItem.data('value');

					for(var i=0;i<=counterBoxItem.data('value');i++)
					{
						window.setTimeout(function() 
						{
							progressBarItemValue.html(parseInt(progressBarItemValue.text(),10)+1);
						},interval*i,i);
					}
				}
			});            
        });
    });
    
    /**************************************************************************/
    
    $('.theme-component-testimonial-list').each(function() 
    {    
        var $self=$(this);
        
        $self.children('ul:first').carouFredSel(
        {
            circular                                                            :	$self.data('carousel_circular_enable'),
            inifinite                                                           :	$self.data('carousel_inifite_enable'),
            direction                                                           :	$self.data('carousel_direction'),
            responsive                                                          :	true,
            items                                                               :
            {
                start                                                           :	0,
                height                                                          :	'variable',
                visible                                                         :	1,
                minimum                                                         :	1
            },
            scroll                                                              :
            {
                fx                                                              :	$self.data('carousel_scroll_fx'),
                items                                                           :	1,
                easing                                                          :	$self.data('carousel_scroll_easing'),
                duration                                                        :	$self.data('carousel_scroll_duration'),
                pauseOnHover                                                    :	$self.data('carousel_scroll_pause_hover_enable')
            },
            auto                                                                :
            {
                play                                                            :	$self.data('carousel_auto_play_enable'),
                timeoutDuration                                                 :	$self.data('carousel_auto_play_timeout'),
            },
            swipe                                                               :
            {
                onTouch                                                         :	true,
                onMouse                                                         :	true
            },
            prev                                                                :
            {
                button                                                          :	$self.find('.theme-component-testimonial-list-navigation-left')
            },
            next                                                                :
            {
                button                                                          :	$self.find('.theme-component-testimonial-list-navigation-right')
            },
            onCreate                                                            :   function()
            {
                $().windowDimensionListener({change:function(width,height)
                {
                    if(width || height)
                    {
                        var maxHeight=0;
                        $self.find('ul>li').each(function()
                        {
                            $(this).css('height','auto');
                            var height=$(this).actual('height');
                            if(height>maxHeight) maxHeight=height;
                        });
                    
                        $.each([$self.find('ul>li'),$self.find('ul'),$self.find('>div.caroufredsel_wrapper'),$self],function()
                        {
                            $(this).height(maxHeight);
                        });
                    }
                }});
            }
        });
	});
    
    /**************************************************************************/
    
    $('.theme-component-preformatted-text').each(function()
    {
		$(this).find('>div>a').on('click',function(e) 
		{
            e.preventDefault();
              
            var parent=$(this).parents('.theme-component-preformatted-text');
            if(parent.hasClass('theme-state-open'))
            {
                parent.addClass('theme-state-close').removeClass('theme-state-open');
            }
            else
            {
                parent.addClass('theme-state-open').removeClass('theme-state-close');
            }
        });
    });
    
    /**************************************************************************/
    
    $('ul.theme-component-list li').each(function()
    {
        $(this).prepend('<span></span>');
    });
    
    $('a.prettyphoto,a.vc_single_image-wrapper').addClass('theme-image').addClass('theme-image-preloader').addClass('theme-image-hover');
    
    /**************************************************************************/
    
    $('.theme-image').each(function() 
    {
        if(!$(this).parents('.theme-component-gallery-masonry').length)
        {
            if(!$(this).hasClass('theme-image-hover').length) 
            {
                var object=$(this).find('a').length===1 ? $(this).find('a') : $(this);
                object.prepend('<span class="theme-image-hover-layer"></span>');
            }
            if(!$(this).hasClass('theme-image-preloader').length) 
            {
                $(this).addClass('theme-image-preloader');
            }
        }
    });
    
    /**************************************************************************/
    
    $('.theme-image.theme-image-preloader').each(function() 
    {
		var $self=$(this);
		var $image=$self.find('img');

		if($image.length===1)
		{
			$($image).one('load',function()
			{
				$self.css({'background-image':'none'});
							
				var object=$self.children('a').length===1 ? $self.children('a') : $image;
							
				object.animate({'opacity':1},1000,function() 
				{			

				}); 
			}).each(function() 
			{
				if(this.complete) $(this).load();
			});
		}
	});
    
    /**************************************************************************/
    
	$('a.prettyphoto,a.theme-image-fancybox,.woocommerce-product-gallery__image>a').fancyBoxLaunch();
    
    /**************************************************************************/
        
    $('.theme-component-gallery-masonry').each(function() 
    {
        $(this).galleryMasonry();
    });
    
    /**************************************************************************/
    
	$('.theme-page-header-top-social-list .theme-icon-meta-search').on('click',function(e)
    {
		e.preventDefault();
				
		var searchForm=$('#theme-search-form');
		if(searchForm.length!==1) return;
				
        searchForm.css({display:'table'}).animate({opacity:0.95},{duration:200,complete:function()
        {
            searchForm.addClass('template-state-open');
            searchForm.find('input[type="search"]').focus();
        }});
			
        searchForm.children('div:first').on('click',function(e)
        {
            searchForm.animate({opacity:0},{duration:0,complete:function()
            {
                searchForm.css({display:'none'}).removeClass('template-state-open');
            }});
        });
    });
    
    /**************************************************************************/
    
    $('.wpcf7 .wpcf7-submit').addClass('theme-button theme-button-1');
    
    $('.wpcf7 .theme-form-field').on('click',function()
    {
        $(this).find(':input').focus();
    });
    
    $('.wpcf7').on('wpcf7:submit',function()
    {
        var $this=$(this);
        
        $this.find('*').qtip('destroy');
     
        $this.find('.theme-form-field').each(function() 
        {
            var alert=$(this).find('*[role="alert"]');
            
            if(!alert.length) return(true);
            
            $(this).find('label:first').qtip(
            {
                show		:	
                { 
                    target	:	$(this) 
                },
                style		:	
                { 
                    classes	:	(alert.hasClass('wpcf7-not-valid-tip') ? 'theme-qtip theme-qtip-error' : 'theme-qtip theme-qtip-success')
                },
                content		: 	
                { 
                    text	:	alert.text()
                },
                position	: 	
                { 
                    my		:	'left center',
                    at		:	'right center' 
                }
            }).qtip('show');	            
        });
        
        var formResponseInterval=setInterval(function() 
        {
            var response=$this.find('.wpcf7-response-output');
            if(parseInt(response.length)===1)
            {
                var responseText=response.text();
                if($.trim(responseText).length===0) return;
                
                clearInterval(formResponseInterval);
                
                $this.find('input[type="submit"]').qtip(
                {
                    show		:	
                    { 
                        target	:	$(this) 
                    },
                    style		:	
                    { 
                        classes	:	(response.hasClass('wpcf7-validation-errors') ? 'theme-qtip theme-qtip-error' : 'theme-qtip theme-qtip-success')
                    },
                    content		: 	
                    { 
                        text	:	responseText
                    },
                    position	: 	
                    { 
                        my		:	'right center',
                        at		:	'left center' 
                    }
                }).qtip('show');   
            }
            else clearInterval(formResponseInterval);
        },500);
    });
    
    $('.wpcf7').css('display','block');

    /**************************************************************************/
 
    $('.theme-component-notice').each(function() 
    {        
        var $this=$(this);
        
        var time=parseInt($(this).data('time_to_close'),10);
        var closeButton=$(this).find('.theme-component-notice-content-close-button');
        var progressBar=$(this).find('.theme-component-notice-content-progress-bar>div');
        
        closeButton.bind('click',function(e) 
        {
            e.preventDefault();
            $this.fadeOut(300,function()
            {
                
            });
        });
        
        if(time<=0) return;
        if((closeButton.length===0) && (progressBar.length===0)) return;

        var timer=closeButton.find('span');

        $(timer).countdown(
        {
            until		:	time,
            format		:	'S',
            layout		:	' {sn} ',
            onExpiry	:	function()
            {
                $(this).hide(600,function()
                {
                    $this.remove();
                });
            },
            onTick		:	function(period)
            {	
                timer.html(period[6]);
            }
        }); 

        if(progressBar.length===1)
            progressBar.animate({width:'100%'},{duration:time*1000,easing:'linear'});
    });
    
    /**************************************************************************/
    
	var mailChimpWidget=$('.widget_mc4wp_form_widget');
	
	if(mailChimpWidget.length===1)
	{
		mailChimpWidget.find('form').attr('novalidate','novalidate');
		
        if(mailChimpWidget.parents('.theme-page-footer'))
            mailChimpWidget.find('input[type="submit"]').addClass('theme-button theme-button-3');
        else mailChimpWidget.find('input[type="submit"]').addClass('theme-button theme-button-1');
        
		mailChimpWidget.find(':input').each(function() 
		{	
			$(this).removeAttr('placeholder').removeAttr('required').attr('id',$(this).attr('name'));
			
			var label=$(this).prev('label');
			if(label.length===1) label.attr('for',$(this).attr('id'));
		});
		
		var notice=mailChimpWidget.find('.mc4wp-response');

		if((notice.children('.mc4wp-success').length) || (notice.children('.mc4wp-error').length))
		{
			if(notice.length)
			{
				mailChimpWidget.find('p:first').qtip(
				{
					style			:      
					{
						classes		:	(notice.children('.mc4wp-success').length===1 ? 'qtip theme-qtip theme-qtip-success' : 'qtip theme-qtip theme-qtip-error')
					},
					content			: 	
					{
						text		:	notice.find('>.mc4wp-alert>p').text()
					},
					position		: 	
					{
						my			:	'bottom center',
						at			:	'top center'
					}
				}).qtip('show');

				notice.css('display','none');
			}
		}
	}
    
    /**************************************************************************/
    
   	$().windowDimensionListener({change:function(width,height)
	{
        if(width)
        {
            $('[data-responsive-mode="1"]').each(function()
            {
                var width=0;
                var object=this;
                
                while(1)
                {
                    var children=$(object).children('*');
                    if(children.length>1) break;
                    else object=children;
                }
 
                children.each(function() 
                {
                    width+=$(this).children('div').actual('outerWidth',{'includeMargin':true});
                });
 
                if(width>$(this).actual('innerWidth'))
                    $(this).addClass('theme-responsive-mode');
                else $(this).removeClass('theme-responsive-mode');
            });
            
            $('.wpcf7').each(function()
            {
                var width=$(this).actual('outerWidth',{'includeMargin':true});
                if(width<=768) $(this).addClass('theme-responsive-mode');
                else $(this).removeClass('theme-responsive-mode');
            });
        }
	}});
    
    /**************************************************************************/
    
	if(themeOption.config.woocommerce.enable===1)
	{
		/***/
        
        $('.theme-page-footer .widget_price_filter .price_slider_amount .button').addClass('theme-button theme-button-3');
        
        /***/
        
        $('.theme-page-footer .widget_shopping_cart .buttons .button').addClass('theme-button theme-button-3');
        
        /***/
        
        $('.widget_product_categories ul>li').each(function() 
        {
            var link=$(this).children('a').remove();

            var list='';
            if($(this).children('ul').length)
                list=$(this).children('ul').remove();

            var span='<span>'+$(this).text()+'</span>';

            link.html(link.text()+span);
            $(this).html('').append(link).append(list);
        });
        
        /***/
         
        $('.widget_product_search').each(function() 
        {
            $(this).find('button').parent().append('<span class="theme-icon-meta-search"></span>');
            $(this).find('button').html('');
        });
        
        /***/
        
        $('.woocommerce .woocommerce-ordering select,.woocommerce .widget_product_categories select').dropkick();
        
        /***/
        
		$('.woocommerce .quantity .plus').live('click',function()
		{
			var input=$(this).prev();
			input.val(parseInt(input.val(),10)+1);
            $('input[name="update_cart"]').removeAttr('disabled');
		});
		
		$('.woocommerce .quantity .minus').live('click',function()
		{
			var input=$(this).next();
			input.val((parseInt(input.val(),10)-1>0 ? parseInt(input.val(),10)-1 : 1));
            $('input[name="update_cart"]').removeAttr('disabled');
		});
        
        /***/
        
        $('.theme-wc-add-to-cart-notice').each(function() 
        {
            var link=$(this).children('a').remove();
            var span='<span>'+$(this).text()+'</span>';
		
            $(this).html(span).append(link);
            
            $(this).parents('.theme-component-notice-content').find('.theme-component-notice-content-close-button').parent('div').css('display','none');
        });
        
        /***/  
        
		$('body').on('updated_cart_totals',function()
		{
			wcUpdateCartCount();
		});
		
		$('body').on('added_to_cart',function() 
		{
			wcUpdateCartCount();			
		});
		
		$('body').on('updated_wc_div',function() 
		{
			wcUpdateCartCount();
		});
        
        /***/  
        
        $('#reply-title').replaceWith('<h4 class="theme-header-underline" id="reply-title">'+$('#reply-title').html()+'</h4>');
        
        /***/
    };
    
    $('.theme-table-responsive-on').responsiveTable();
    
    /**************************************************************************/
});

/******************************************************************************/
/******************************************************************************/