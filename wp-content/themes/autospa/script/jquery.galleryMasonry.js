/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var GalleryMasonry=function(object,option)
	{
		/**********************************************************************/
		
		var $self=this;
		var $this=$(object);
        var $option=option;
        
		/**********************************************************************/

		this.build=function() 
		{
			var i=0;
			var imageList=$this.find('img');
			var imageListCount=imageList.length;
			
			imageList.each(function() 
			{
				$(this).one('load',function()
				{
					if((++i)===imageListCount)
					{
                        $self.createCategoryList();
						$self.createIsotope(true);
                        $this.css('opacity','1');
					}
				}).each(function() 
				{
					if(this.complete) $(this).load();
				});
			});
		};
		
		/**********************************************************************/
		
		this.setSelected=function(object)
		{
			$this.find('.theme-component-gallery-masonry-filter-list>li>a').removeClass('theme-state-selected');
			$(object).addClass('theme-state-selected');
		};

		/**********************************************************************/
		
        this.createIsotope=function(bind)
        {
            var glutter=60;
            var marginBottom=60;
            
            var columnCount=3;
            var columnWidth=350;

            var imageList=$this.children('ul.theme-component-gallery-masonry-image-list');
            var imageListWidth=imageList.actual('width');

            if(typeof(bind)==='undefined') bind=true;

            if(imageListWidth<=300) 
            {
                glutter=0;
                columnCount=1;
                marginBottom=30;
            }
            else if(imageListWidth<=460) 
            {
                glutter=30;
                columnCount=2;
                marginBottom=30;
            }
            else if(imageListWidth<=760)
            {
                glutter=30;
                columnCount=2;
                marginBottom=30;
            }
       
            columnWidth=(imageListWidth-((columnCount-1)*glutter))/columnCount;

            imageList.children('li').css('margin-bottom',marginBottom+'px').each(function() 
            {
                var widthCount=parseInt($(this).data('width-count'),10);
                
                if(widthCount===1) $(this).css('width',columnWidth);
                else
                {
                    $(this).css('width',(columnWidth*widthCount)+(glutter*(widthCount-1)));
                }
            });
            
            $self.setFilter();
            
			var itemReveal=Isotope.Item.prototype.reveal;
			Isotope.Item.prototype.reveal=function()
			{
				itemReveal.apply(this,arguments);

				var link=$(this.element).find('a');
				link.attr('data-fancybox-group',link.attr('data-fancybox-group-temp')).removeAttr('data-fancybox-group-temp');
			};

			var itemHide=Isotope.Item.prototype.hide;
			Isotope.Item.prototype.hide=function() 
			{
				itemHide.apply(this,arguments);
				var link=$(this.element).find('a');
				link.attr('data-fancybox-group-temp',link.attr('data-fancybox-group')).removeAttr('data-fancybox-group');
			};
            
            if(marginBottom==30)
                $this.css('padding-bottom','30px');

            imageList.isotope(
            {
                filter                                                          :   '.theme-state-filter',
                masonry: 
                {
                    gutter                                                      :	glutter
                }
            });	
            
            if(bind)
            {
                $(window).resize(function()
                {
                    $self.createIsotope(false);
                });
            }
        };
        
        /**********************************************************************/
        
        this.setFilter=function()
        {
            var imageList=$this.children('ul.theme-component-gallery-masonry-image-list');
            var imageListItem=imageList.children('li');
            
            imageListItem.removeClass('theme-state-filter');   
            
            var filterList=$this.children('.theme-component-gallery-masonry-filter-list');
            if(filterList.length!==1)
            {
                imageListItem.addClass('theme-state-filter'); 
                return;
            }
                
            var categoryIdSelected=parseInt(filterList.find('a.theme-state-selected').attr('data-category-id'),10);
            if(parseInt(categoryIdSelected,10)===-1)
            {
                imageListItem.addClass('theme-state-filter');
                imageListItem.first().children('a').addClass('theme-state-selected');
                return;               
            }

            imageList.children('li').each(function() 
            {
                if(String($(this).attr('data-category'))!=='undefined')
                {
                    var c=JSON.parse($(this).attr('data-category'));
                    for(var i in c) 
                    {
                        if(parseInt(c[i].id,10)===categoryIdSelected)
                            $(this).addClass('theme-state-filter');
                    }    
                }                        
            });
        };
		
		/**********************************************************************/
        
        this.createCategoryList=function()
        {
            if(!$this.hasClass('theme-component-gallery-masonry-with-filter'))  return;
            
            var html='';
            var category=[];
            var imageList=$this.children('ul.theme-component-gallery-masonry-image-list');
            var imageListItem=imageList.children('li');
            
            imageListItem.each(function() 
            {
                if(String($(this).attr('data-category'))!=='undefined')
                {
                    var c=JSON.parse($(this).attr('data-category'));
                    for(var i in c) category[c[i].id]=c[i].name;
                }
            });
            
            if(!category.length) return;
            
            html+='<li><a href="#" data-category-id="-1">'+themeOption.config.text.all+'</a></li>';
            
            for(var i in category) html+='<li><a href="#" data-category-id="'+i+'">'+category[i]+'</li>';

            $this.prepend('<ul class="theme-component-gallery-masonry-filter-list">'+html+'</ul>');
            
            var filterList=$this.children('.theme-component-gallery-masonry-filter-list');
            filterList.find('>li>a').on('click',function(e)
			{
				e.preventDefault();
				$self.setSelected(this);
				$self.createIsotope();
			});
            
            filterList.children('li:not(:first)').sort(function(a,b) { return(($(b).text())<($(a).text()) ? 1 : -1); }).appendTo(filterList);
            
            filterList.find('>li:first>a').addClass('theme-state-selected');
        };
        
        /**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.galleryMasonry=function(option) 
	{
		return this.each(function() 
		{
			var object=new GalleryMasonry(this,option);
			object.build();
			return(object);
		});
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/