/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	/**************************************************************************/
	
	var CBSPlugin=function(object,option)
	{
		/**********************************************************************/
		
		var $self=this;
		var $this=$(object);
		var $option=option;
		
		var prevWidth=0;
		
		/**********************************************************************/

		this.build=function() 
		{
			$this.find('.cbs-form-field').bind('click',function()
			{
				$(this).children(':input').focus();
			});
			
			$self.prepare();
		};
		
		/**********************************************************************/
		/**********************************************************************/
		
		this.prepare=function()
		{
			$self.setWidthClass();
			
			$self.toogleServiceHeader(0);
			
			$this.on('click','.cbs-vehicle-list>li',function(e) 
			{
				e.preventDefault();
				
				$self.setButtonSelected(this,null,false,false);
				
				var vehicleId=$self.getSelectedVehicleList();
				
				$self.createPackage(vehicleId);
				$self.createCalendar();
			});	
			
			$this.on('click','.cbs-package-list>li>.cbs-button-box>.cbs-button',function(e) 
			{
                if($(this).attr('href')=='#')
                {
                    e.preventDefault();

                    $self.setButtonSelected($(this).parents('li:first'),null,true,false);

                    var vehicleId=$self.getSelectedVehicleList();
                    var packageId=$self.getSelectedPackageList();

                    $self.toogleServiceHeader(packageId);

                    $self.createService(vehicleId,packageId);
                    $self.createCalendar();
                }
			});	
			
			$this.on('click','.cbs-service-list>li>.cbs-button-box>.cbs-button',function(e) 
			{
				e.preventDefault();
				
				$self.setButtonSelected($(this).parents('li:first'),null,true,true);
				
				var i=0;
				var serviceId=[];
				
				$(this).parents('.cbs-service-list').children('li.cbs-state-selected').each(function()
				{			
					serviceId.push($self.getValueFromClass($(this),'cbs-service-id-'));
				});
				
				var vehicleId=$self.getSelectedVehicleList();
				var packageId=$self.getSelectedPackageList();
				
				$self.createCost(vehicleId,packageId,serviceId);
				$self.createCalendar();
			});	
			
			$this.on('click','.cbs-button-service-more',function(e) 
			{
				e.preventDefault();
				$(this).prev('ul').toggleClass('cbs-state-to-hidden');
				$(this).children('span').toggleClass('cbs-state-hidden');
			});
			
			$this.on('click','.cbs-more-link',function(e) 
			{
				e.preventDefault();
				$(this).next().toggle();
				$(this).children('span').toggleClass('cbs-state-hidden');
			});
			
			$this.on('click','table.cbs-calendar .cbs-calendar-data a:not(.cbs-calendar-data-button-more)',function(e) 
			{
				e.preventDefault();
				$self.setButtonSelected($(this).parent('li'),$(this).parents('.cbs-calendar-data').find('li'),true,false);
				
				var selected=$this.find('table.cbs-calendar .cbs-calendar-data li.cbs-state-selected');
				
				if(selected.length===1)
				{
					var index=selected.parents('td:first').index();
					var date=$this.find('.cbs-calendar-subheader th:eq('+index+')').attr('data-date-full');

					$this.find('.cbs-booking-summary-date h5 span:first').html(date);
					$this.find('.cbs-booking-summary-time h5 span:first').html(selected.text());
					
					$this.find('.cbs-booking-summary-date h5 span+span').css({'display':'none'});
					$this.find('.cbs-booking-summary-time h5 span+span').css({'display':'none'});
				}
				else
				{
					$this.find('.cbs-booking-summary-date h5 span:first').html('');
					$this.find('.cbs-booking-summary-time h5 span:first').html('');	
					
					$this.find('.cbs-booking-summary-date h5 span+span').css({'display':'inline'});
					$this.find('.cbs-booking-summary-time h5 span+span').css({'display':'inline'});
				}
			});	
			
			$this.on('click','table.cbs-calendar .cbs-calendar-data a.cbs-calendar-data-button-more',function(e) 
			{
				e.preventDefault();
				$(this).parent('li').parent('ul').toggleClass('cbs-state-to-hidden');
				$(this).children('span').toggleClass('cbs-state-hidden');
			});
		
			$this.children('form').bind('submit',function()
			{
				var data={};
				
				data.action='cbs_create_booking';
				
				data.locationId=$option.locationId;
				
				data.dateId=$self.getSelectedDateTime();
				data.vehicleId=$self.getSelectedVehicleList();
				data.packageId=$self.getSelectedPackageList();
				data.serviceId=$self.getSelectedServiceList();
				data.couponCode=$self.getCouponCode();
				
				data.clientFirstName=$('.cbs-main-list-item-booking input[name="client_first_name"]').val();
				data.clientSecondName=$('.cbs-main-list-item-booking input[name="client_second_name"]').val();
				data.clientCompanyName=$('.cbs-main-list-item-booking input[name="client_company_name"]').val();
				data.clientVehicle=$('.cbs-main-list-item-booking input[name="client_vehicle"]').val();
				data.clientEmailAddress=$('.cbs-main-list-item-booking input[name="client_email_address"]').val();
				data.clientPhoneNumber=$('.cbs-main-list-item-booking input[name="client_phone_number"]').val();
				data.clientMessage=$('.cbs-main-list-item-booking textarea[name="client_message"]').val();
				
				data.clientAddressStreet=$('.cbs-main-list-item-booking input[name="client_address_street"]').val();
				data.clientAddressPostCode=$('.cbs-main-list-item-booking input[name="client_address_post_code"]').val();
				data.clientAddressCity=$('.cbs-main-list-item-booking input[name="client_address_city"]').val();
				data.clientAddressState=$('.cbs-main-list-item-booking input[name="client_address_state"]').val();
				data.clientAddressCountry=$('.cbs-main-list-item-booking input[name="client_address_country"]').val();
				
				data.registerUser=($('.cbs-register input[name="register_user"]').prop('checked') ? $('.cbs-register input[name="register_user"]').val() : 0);
				data.username=$('.cbs-main-list-item-booking input[name="register_username"]').val();
				data.password=$('.cbs-main-list-item-booking input[name="register_password"]').val();
				data.passwordCheck=$('.cbs-main-list-item-booking input[name="register_password_check"]').val();
				
                data.gratuity=$('.cbs-main-list-item-booking input[name="gratuity"]').val();
                
				$self.post(data,$self.createBookingResponse);
				
				return(false);
			});
			
			$this.on('click','.cbs-calendar-header-arrow-left',function(e)
			{
				$self.moveCalendar(e,-1);
			});
			
			$this.on('click','.cbs-calendar-header-arrow-right',function(e)
			{
				$self.moveCalendar(e,1);
			});
			
			$this.on('click','.cbs-register input[name="register_user"]',function(e)
			{
				$('.cbs-main-list-item-booking .cbs-form-field-username').toggleClass('cbs-state-hidden');
				$('.cbs-main-list-item-booking .cbs-form-field-password').toggleClass('cbs-state-hidden');
				$('.cbs-main-list-item-booking .cbs-form-field-password-check').toggleClass('cbs-state-hidden');
			});
			
			$this.on('click','.cbs-log-in',function(e)
			{
				e.preventDefault();
				
				var usernameOrEmail=$('.cbs-main-list-item-booking input[name="username_or_email"]').val();
				var password=$('.cbs-main-list-item-booking input[name="password"]').val();
				var vehicleId=$self.getSelectedVehicleList();
				var packageId=$self.getSelectedPackageList();
				
				$self.createUserContactDetails(usernameOrEmail,password,vehicleId,packageId);
			});
			
			$this.on('click','.cbs-create-login-form',function(e)
			{
				e.preventDefault();
				
				var notice=$('.cbs-notice-contact-details');
				notice.css('display','none');
				
				if($('.cbs-main-list-item-contact-details .cbs-login-form').length)
					return(false);
				
				$self.createLoginForm();
			});
			
			$this.on('click','.cbs-create-contact-details-form',function(e)
			{
				e.preventDefault();
				
				var notice=$('.cbs-notice-contact-details');
				notice.css('display','none');
				
				var vehicleId=$self.getSelectedVehicleList();
				var packageId=$self.getSelectedPackageList();
				
				if($('.cbs-main-list-item-client-details .cbs-order-form').length)
					return(false);
				
				$self.createContactDetailsForm(vehicleId,packageId);
				
			});
			
			$this.on('click', '.cbs-update-user-contact-details',function(e)
			{
				e.preventDefault();
				
				$self.updateUserContactDetails();
			})
			
			$this.find('.cbs-to-tab').tabs({
				beforeActivate: function(e,ui)
				{
					if($(ui.newTab).find('a[href*="user-log-out"]').length)
					{
						e.preventDefault();
						$self.userLogOut();
					}
					
				}
			});
			
			$this.on('click','.cbs-coupon-code a.cbs-show-coupon',function(e)
			{
				e.preventDefault();
				$this.find('input[type="text"],a.cbs-button-apply-coupon').css('display', 'inline-block');
			});
			
			$this.on('click','.cbs-main-list-item-booking .cbs-coupon-code a.cbs-button-apply-coupon',function(e)
			{
				e.preventDefault();
				$this.find('.cbs-main-list-item-booking .cbs-coupon-code div').hide();
				
				var serviceId=[];
				
				$('.cbs-service-list').children('li.cbs-state-selected').each(function()
				{			
					serviceId.push($self.getValueFromClass($(this),'cbs-service-id-'));
				});
				
				var vehicleId=$self.getSelectedVehicleList();
				var packageId=$self.getSelectedPackageList();	
				var couponCode=$self.getCouponCode();
				
				$self.applyCoupon(vehicleId,packageId,serviceId,couponCode);
			});
			
		};
		
		/**********************************************************************/
		
		this.toogleServiceHeader=function(packageId)
		{			
			if($this.hasClass('cbs-location-content-type-3'))
			{
				var header=$this.find('.cbs-main-list-item-service-list .cbs-main-list-item-section-header-header');
				var subheader=$this.find('.cbs-main-list-item-service-list .cbs-main-list-item-section-header-subheader');
					
				var element=[header.find('span:eq(0)'),header.find('span:eq(1)'),subheader.find('span:eq(0)'),subheader.find('span:eq(1)')];
					
				if(packageId===0)
				{
					element[0].removeClass('cbs-state-hidden');
					element[2].removeClass('cbs-state-hidden');
					
					element[1].addClass('cbs-state-hidden');
					element[3].addClass('cbs-state-hidden');
				}
				else
				{
					element[1].removeClass('cbs-state-hidden');
					element[3].removeClass('cbs-state-hidden');
					
					element[0].addClass('cbs-state-hidden');
					element[2].addClass('cbs-state-hidden');				
				}
			}	
		};
		
		/**********************************************************************/
		
		this.createBookingResponse=function(response)
		{
			var notice=$('.cbs-notice-main');
			var noticeIcon=notice.children('.cbs-notice-icon');
			
			notice.removeClass('cbs-notice-error cbs-notice-success');
			noticeIcon.removeClass('cbs-meta-icon-error cbs-meta-icon-success');
			
			if(response.error===0) 
			{	
				notice.addClass('cbs-notice-success');
				noticeIcon.addClass('cbs-meta-icon-success');
			}
			else 
			{	
				notice.addClass('cbs-notice-error');
				noticeIcon.addClass('cbs-meta-icon-error');
			}

			notice.find('.cbs-notice-text').html(response.notice.text);
			notice.find('.cbs-notice-header').html(response.notice.header);
			
			notice.css('display','block');
			
			if((parseInt(response.error)===0) && (parseInt(response.reset)===1)) 
			{
				if($('#cbs-user-details').length)
				{
					$this.find('.cbs-main-list-item-booking #cbs-current-order input[name="client_first_name"]').val($this.find('.cbs-main-list-item-booking #cbs-user-details input[name="update_client_first_name"]').val());
					$this.find('.cbs-main-list-item-booking #cbs-current-order input[name="client_second_name"]').val($this.find('.cbs-main-list-item-booking #cbs-user-details input[name="update_client_second_name"]').val());
					$this.find('.cbs-main-list-item-booking #cbs-current-order input[name="client_company_name"]').val($this.find('.cbs-main-list-item-booking #cbs-user-details input[name="update_client_company_name"]').val());
					$this.find('.cbs-main-list-item-booking #cbs-current-order input[name="client_vehicle"]').val($this.find('.cbs-main-list-item-booking #cbs-user-details input[name="update_client_vehicle"]').val());
					$this.find('.cbs-main-list-item-booking #cbs-current-order input[name="client_email_address"]').val($this.find('.cbs-main-list-item-booking #cbs-user-details input[name="update_client_email_address"]').val());
					$this.find('.cbs-main-list-item-booking #cbs-current-order input[name="client_phone_number"]').val($this.find('.cbs-main-list-item-booking #cbs-user-details input[name="update_client_phone_number"]').val());
					$this.find('.cbs-main-list-item-booking #cbs-current-order textarea[name="client_message"]').val('');
				}
				else
				{
					$this.find('.cbs-main-list-item-booking').find('input[type="password"],input[type="text"],textarea').val('') 
					$this.find('.cbs-main-list-item-booking').find('input[type="checkbox"]').prop('checked',false);
				}
				
				$this.find('.cbs-vehicle-list>li:first-child').trigger('click');
				$self.createCalendar(0);
				$self.toogleServiceHeader();
			}
			
			if(typeof(response.form)!=='undefined')
			{
				$('#cbs-paypal-form').remove();
				$('#cbs-stripe-form').remove();
				
				$('body').append(response.form);
				
				$this.find('.cbs-paypal-link').on('click',function(e)
				{
					e.preventDefault();
					
					$self.selectPayment(response.bookingId,'paypal');
					$('#cbs-paypal-form').submit();
				});
				
				$this.find('.cbs-stripe-link').on('click',function(e)
				{
					e.preventDefault();
					
					$self.selectPayment(response.bookingId,'stripe');
					$('#cbs-stripe-form button.stripe-button-el')[0].click();
				});
				
			}
			
			$.scrollTo($this,{offset:-120});
		};
		
		/**********************************************************************/
		
		this.selectPayment=function(bookingId,paymentType)
		{
			var data={};
				
			data.action='cbs_select_payment';
				
			data.bookingId=bookingId;
			data.paymentType=paymentType;

			$self.post(data,$self.selectPaymentResponse);
				
			return(false);			
		};
		
		/**********************************************************************/
		
		this.selectPaymentResponse=function(response)
		{
			
		};
		
		/**********************************************************************/
		
		this.moveCalendar=function(event,step)
		{
			event.preventDefault();
			
			var calendarBox=$this.find('.cbs-calendar-table-wrapper');
			var calendar=calendarBox.find('.cbs-calendar');
				
			var columnActive=Math.abs($('th.cbs-active').index());
			
			if(step===1)
			{
				if($self.isVisibleColumn('last'))
				{
					$self.createCalendar(1);
					return;
				}
			}
			else
			{
				if($self.isVisibleColumn('first'))
				{
					$self.createCalendar(-1);
					return;
				}
			}
					
			if((columnActive===6) && (step===1)) return;
			if((columnActive===0) && (step===-1)) return;
				
			columnActive+=step;
			
			calendar.find('th').removeClass('cbs-active');
			calendar.find('th:eq('+columnActive+')').addClass('cbs-active');
			
			$self.hideCalendarColumn();
		};
		
		/**********************************************************************/
		
		this.hideCalendarColumn=function()
		{
			var j=0,tag=['th','td'];
			var calendarBox=$this.find('.cbs-calendar-table-wrapper');
			var calendar=calendarBox.find('.cbs-calendar');
			
			var columnActive=calendar.find('th.cbs-active').index();
			var columnCount=parseInt($this.find('input[name="cbs-calendar-column-count"]').val());
			
			$(tag).each(function(i)
			{
				calendar.find(tag[i]).css('display','none');
				
				for(j=columnActive;j<(columnActive+columnCount);j++)
					calendar.find(tag[i]+':eq('+j+')').css('display','table-cell');
			});
			
			$self.manageCalendarHeader();
		};
		
		/**********************************************************************/
		
		this.isVisibleColumn=function(number)
		{
			var calendarBox=$this.find('.cbs-calendar-table-wrapper');
			var calendar=calendarBox.find('.cbs-calendar');
			
			if((calendar.find('th:first').css('display')!=='none') && (number==='first')) return(true);
			if((calendar.find('th:last').css('display')!=='none') && (number==='last')) return(true);
			
			return(false);
		};
		
		/**********************************************************************/
		/**********************************************************************/
		
		this.getSelectedVehicleList=function()
		{
			var list=$this.find('.cbs-vehicle-list>li.cbs-state-selected');
			
			if(list.length!==1) return(0);
			
			return($self.getValueFromClass(list[0],'cbs-vehicle-id-'));
		};
		
		/**********************************************************************/
		
		this.getSelectedPackageList=function()
		{
			var list=$this.find('.cbs-package-list>li.cbs-state-selected');
			
			if(list.length!==1) return(0);
			
			return($self.getValueFromClass(list[0],'cbs-package-id-'));
		};
		
		/**********************************************************************/
		
		this.getSelectedServiceList=function()
		{
			var data=[];
			
			var list=$this.find('.cbs-service-list>li.cbs-state-selected');
			
			list.each(function()
			{
				data.push($self.getValueFromClass($(this),'cbs-service-id-'));
			});
			
			return(data);
		};	
		
		/**********************************************************************/
		
		this.getSelectedDateTime=function()
		{
			var list=$this.find('.cbs-date-list>li.cbs-state-selected');
			
			if(list.length!==1) return('');
			
			return($self.getValueFromClass(list[0],'cbs-date-id-'));			
		};
		
		/**********************************************************************/
		
		this.getCouponCode=function()
		{
			var coupon=$('.cbs-main-list-item-booking input[name="coupon_code"]');
			
			if(coupon.length)
				return(coupon.val());
			else
				return('');			
		};

		/**********************************************************************/
		/**********************************************************************/
		
		this.createPackage=function(vehicleId)
		{
			var data={};
			
			data.action=$this.hasClass('cbs-template-public') ? 'cbs_create_package' : 'cbs_create_vehicle_package';
			
			data.vehicleId=vehicleId;
			data.locationId=$option.locationId;
			
            data.packageButtonURL=$this.data('package-button-url');
            
			$self.post(data,function(response)
			{
				$self.createPackageResponse(response);
			});
		};
		
		/**********************************************************************/
		
		this.createPackageResponse=function(response)
		{
			var serviceListItem=$this.find('.cbs-main-list-item-service-list');
			var packageListItem=$this.find('.cbs-main-list-item-package-list');
			
			serviceListItem.removeClass('cbs-state-disable');
			if(!response.serviceCount) serviceListItem.addClass('cbs-state-disable');
			
			packageListItem.removeClass('cbs-state-disable');
			if(!response.packageCount) packageListItem.addClass('cbs-state-disable');
			
			packageListItem.children('.cbs-main-list-item-section-content').html(response.package);
			serviceListItem.children('.cbs-main-list-item-section-content').html(response.service);
			
			$this.find('.cbs-booking-summary-date h5 span:first').html('');
			$this.find('.cbs-booking-summary-date h5 span+span').css({'display':'block'});
			$this.find('.cbs-booking-summary-time h5 span:first').html('');
			$this.find('.cbs-booking-summary-time h5 span+span').css({'display':'block'});
			$this.find('.cbs-booking-summary-duration>h5>span:eq(0)').html('0');
			$this.find('.cbs-booking-summary-duration>h5>span:eq(2)').html('0');
			$this.find('.cbs-booking-summary-price>h5>span.cbs-booking-summary-price-value').html('0.00');
			$('.cbs-main-list-item-booking input[name="coupon_code"]').val('').trigger('blur');
		};
		
		/**********************************************************************/
		/**********************************************************************/
		
		this.createCalendar=function(step)
		{
            if($this.find('.cbs-main-list-item-calendar').length!==1) return;
            
			var data={};
			
			data.action='cbs_create_calendar';
			
			data.step=step;
			data.locationId=$option.locationId;

			data.packageId=$self.getSelectedPackageList();
			data.serviceId=$self.getSelectedServiceList();
			data.vehicleId=$self.getSelectedVehicleList();
			
			data.startDate=$self.getValueFromClass($this.find('.cbs-calendar .cbs-calendar-subheader th.cbs-active'),'cbs-date-id-');
			
			$self.post(data,function(response)
			{
				$self.createCalendarResponse(response);
			});					
		};
		
		/**********************************************************************/
		
		this.createCalendarResponse=function(response)
		{
			if(response.error===1) return; 
			
			$this.find('.cbs-booking-summary-date h5 span:first').html('');
			$this.find('.cbs-booking-summary-time h5 span:first').html('');
					
			$this.find('.cbs-booking-summary-date h5 span+span').css({'display':'block'});
			$this.find('.cbs-booking-summary-time h5 span+span').css({'display':'block'});
			
			$this.find('.cbs-main-list-item-calendar .cbs-main-list-item-section-content').html(response.calendar);
			$self.calculateCalendarColumnWidth();
		};
		
		/**********************************************************************/
		/**********************************************************************/		
		
		this.createCost=function(vehicleId,packageId,serviceId)
		{
			var data={};
			
			data.action='cbs_create_cost';
			
			data.vehicleId=vehicleId;
			data.packageId=packageId;
			data.serviceId=serviceId.join('.');
			data.locationId=$option.locationId;
			
			$self.post(data,function(response)
			{
				$self.createCostResponse(response);
			});		
		};
		
		/**********************************************************************/
		
		this.createCostResponse=function(response)
		{
			$this.find('.cbs-booking-summary-duration>h5>span:eq(0)').html(response.cost.duration.hour);
			$this.find('.cbs-booking-summary-duration>h5>span:eq(2)').html(response.cost.duration.minute);
			
			$this.find('.cbs-booking-summary-price>h5>span.cbs-booking-summary-price-value').html(response.cost.price.unit+'.'+response.cost.price.decimal);
			
			$('.cbs-main-list-item-booking input[name="coupon_code"]').val('').trigger('blur');
		};
		
		/**********************************************************************/
		/**********************************************************************/
		
		this.createUserContactDetails=function(usernameOrEmail,password,vehicleId,packageId)
		{
			var data={};
			
			data.action='cbs_create_user_contact_details';
			
			data.usernameOrEmail=usernameOrEmail;
			data.password=password;
			data.vehicleId=vehicleId;
			data.packageId=packageId;
			data.locationId=$option.locationId;
			
			$self.post(data,function(response)
			{
				$self.createUserContactDetailsResponse(response);
			});
		};
		
		/**********************************************************************/
		
		this.createUserContactDetailsResponse=function(response)
		{
			var notice=$('.cbs-notice-contact-details');
			var noticeIcon=notice.children('.cbs-notice-icon');
			
			notice.removeClass('cbs-notice-error cbs-notice-success');
			noticeIcon.removeClass('cbs-meta-icon-error cbs-meta-icon-success');
			
			if(response.error===0)
			{
				$('.cbs-main-list-item-contact-details').html(response.client_details);
				
				$('.cbs-main-list-item-contact-details .cbs-to-tab').tabs({
				beforeActivate: function(e,ui)
				{
					if($(ui.newTab).find('a[href*="user-log-out"]').length)
					{
						e.preventDefault();
						$self.userLogOut();
					}
				}
			});
				
				$('.cbs-create-login-form').parent().addClass('cbs-state-hidden');
				notice.addClass('cbs-notice-success');
				noticeIcon.addClass('cbs-meta-icon-success');
			}
			else
			{
				notice.addClass('cbs-notice-error');
				noticeIcon.addClass('cbs-meta-icon-error');
			}
			
			notice.find('.cbs-notice-header').html(response.header);
			notice.find('.cbs-notice-text').html(response.message);
			
			notice.css('display','block');
		};
		
		/**********************************************************************/
		
		this.userLogOut=function()
		{
			var data={};
			data.action='cbs_user_log_out';
			$self.post(data,function(response)
			{
				$self.userLogOutResponse(response);
			});
		};
		
		/**********************************************************************/
		
		this.userLogOutResponse=function(response)
		{
			var notice=$('.cbs-notice-contact-details');
			var noticeIcon=notice.children('.cbs-notice-icon');
			
			notice.removeClass('cbs-notice-error cbs-notice-success');
			noticeIcon.removeClass('cbs-meta-icon-error cbs-meta-icon-success');
			
			notice.addClass('cbs-notice-success');
			noticeIcon.addClass('cbs-meta-icon-success');
			
			notice.find('.cbs-notice-header').html(response.header);
			notice.find('.cbs-notice-text').html(response.message);
			
			$('.cbs-main-list-item-contact-details').html('');
			$('.cbs-create-login-form').parent().removeClass('cbs-state-hidden');
		};
		
		/**********************************************************************/
		
		this.createLoginForm=function()
		{
			var data={};
			
			data.action='cbs_create_login_form';
			
			$self.post(data,function(response)
			{
				$self.createLoginFormResponse(response);
			});
		};
		
		/**********************************************************************/
		
		this.createLoginFormResponse=function(response)
		{
			if(response.error===0)
			{
				$('.cbs-main-list-item-contact-details').html(response.login_form);
			}
		};
		
		/**********************************************************************/
		
		this.createContactDetailsForm=function(vehicleId,packageId)
		{
			var data={};
			
			data.action='cbs_create_contact_details_form';
			
			data.vehicleId=vehicleId;
			data.packageId=packageId;
			data.locationId=$option.locationId;
			
			$self.post(data,function(response)
			{
				$self.createContactDetailsFormResponse(response);
			});
		};
		
		/**********************************************************************/
		
		this.createContactDetailsFormResponse=function(response)
		{
			if(response.error===0)
			{
				$('.cbs-main-list-item-contact-details').html(response.order_form);
			}
		};
		
		/**********************************************************************/
		
		this.updateUserContactDetails=function()
		{
			var data={};
			
			data.action='cbs_update_user_contact_details';
			
			data.updateClientFirstName=$('.cbs-main-list-item-booking input[name="update_client_first_name"]').val();
			data.updateClientSecondName=$('.cbs-main-list-item-booking input[name="update_client_second_name"]').val();
			data.updateClientCompanyName=$('.cbs-main-list-item-booking input[name="update_client_company_name"]').val();
			data.updateClientVehicle=$('.cbs-main-list-item-booking input[name="update_client_vehicle"]').val();
			data.updateClientEmailAddress=$('.cbs-main-list-item-booking input[name="update_client_email_address"]').val();
			data.updateClientPhoneNumber=$('.cbs-main-list-item-booking input[name="update_client_phone_number"]').val();
			data.updateClientMessage=$('.cbs-main-list-item-booking textarea[name="update_client_message"]').val();

			data.updateClientAddressStreet=$('.cbs-main-list-item-booking input[name="update_client_address_street"]').val();
			data.updateClientAddressPostCode=$('.cbs-main-list-item-booking input[name="update_client_address_post_code"]').val();
			data.updateClientAddressCity=$('.cbs-main-list-item-booking input[name="update_client_address_city"]').val();
			data.updateClientAddressState=$('.cbs-main-list-item-booking input[name="update_client_address_state"]').val();
			data.updateClientAddressCountry=$('.cbs-main-list-item-booking input[name="update_client_address_country"]').val();
			
			$self.post(data,function(response)
			{
				$self.updateUserContactDetailsResponse(response);
			});
			
		}
		
		/**********************************************************************/
		
		this.updateUserContactDetailsResponse=function(response)
		{
			var notice=$('.cbs-notice-contact-details');
			var noticeIcon=notice.children('.cbs-notice-icon');
			
			notice.removeClass('cbs-notice-error cbs-notice-success');
			noticeIcon.removeClass('cbs-meta-icon-error cbs-meta-icon-success');
			
			if(response.error===0)
			{
				notice.addClass('cbs-notice-success');
				noticeIcon.addClass('cbs-meta-icon-success');
			}
			else
			{
				notice.addClass('cbs-notice-error');	
				noticeIcon.addClass('cbs-meta-icon-error');
			}
			
			notice.find('.cbs-notice-header').html(response.header);
			notice.find('.cbs-notice-text').html(response.message);
			
			notice.css('display','block');
		};
		
		/**********************************************************************/
		/**********************************************************************/
		
		this.applyCoupon=function(vehicleId,packageId,serviceId,couponCode)
		{
			var data={};
			
			data.action='cbs_create_cost';
			
			data.vehicleId=vehicleId;
			data.packageId=packageId;
			data.serviceId=serviceId.join('.');
			data.couponCode=couponCode;
			data.locationId=$option.locationId;
			
			$self.post(data,function(response)
			{
				$self.applyCouponResponse(response,couponCode);
			});		
		};
		
		/**********************************************************************/
		
		this.applyCouponResponse=function(response,couponCode)
		{
			$this.find('.cbs-booking-summary-duration>h5>span:eq(0)').html(response.cost.duration.hour);
			$this.find('.cbs-booking-summary-duration>h5>span:eq(2)').html(response.cost.duration.minute);
			
			$this.find('.cbs-booking-summary-price>h5>span.cbs-booking-summary-price-value').html(response.cost.price.unit+'.'+response.cost.price.decimal);
			
			if(couponCode.length)
			{
				if(response.cost.coupon_active)
					$this.find('.cbs-main-list-item-booking .cbs-coupon-code .cbs-coupon-code-success').show();
				else
					$this.find('.cbs-main-list-item-booking .cbs-coupon-code .cbs-coupon-code-failure').show();
			}
		};
		
		/**********************************************************************/
		/**********************************************************************/
		
		this.createService=function(vehicleId,packageId)
		{
			var data={};
			
			data.action='cbs_create_service';
			
			data.vehicleId=vehicleId;
			data.packageId=packageId;
			data.locationId=$option.locationId;
			
			$self.post(data,function(response)
			{
				$self.createServiceResponse(response);
			});		
		};
		
		/**********************************************************************/
		
		this.createServiceResponse=function(response)
		{
			var serviceListItem=$this.find('.cbs-main-list-item-service-list');
			
			serviceListItem.removeClass('cbs-state-disable');
			
			if(!response.serviceCount) serviceListItem.addClass('cbs-state-disable');
			
			serviceListItem.children('.cbs-main-list-item-section-content').html(response.service);
			
			$this.find('.cbs-booking-summary-duration>h5>span:eq(0)').html(response.cost.duration.hour);
			$this.find('.cbs-booking-summary-duration>h5>span:eq(2)').html(response.cost.duration.minute);
			
			$this.find('.cbs-booking-summary-price>h5>span.cbs-booking-summary-price-value').html(response.cost.price.unit+response.cost.price.separator+response.cost.price.decimal);
			
			$('.cbs-main-list-item-booking input[name="coupon_code"]').val('').trigger('blur');
		};
		
		/**********************************************************************/
		/**********************************************************************/
		
		this.setButtonSelected=function(object,group,unchecked,multiple)
		{
			object=$(object);
			
			if(!unchecked)
			{
				if(object.hasClass('cbs-state-selected')) return;
			}
			
			if(!multiple)
			{
				if(group===null) group=object.siblings();
				group.removeClass('cbs-state-selected');
			}
			
			object.toggleClass('cbs-state-selected');
		};
		
		/**********************************************************************/
		
		this.getValueFromClass=function(object,pattern)
		{
			try
			{
				var reg=new RegExp(pattern);
				var className=$(object).attr('class').split(' ');

				for(var i in className)
				{
					if(reg.test(className[i]))
						return(className[i].substring(pattern.length));
				}
			}
			catch(e) {}

			return(false);		
		};	
		
		/**********************************************************************/
		
		this.post=function(data,callback)
		{
			$self.preloader();
			
			data.pageId=$option.pageId;
			
			$.post(pluginOption.config.ajaxurl,data,function(response)
			{ 
				callback(response); 
				$self.preloader();
			},'json');
		};
		
		/**********************************************************************/
		
		this.preloader=function()
		{
			var preloader=$('#cbs-preloader');
			
			if(preloader.length!==1) return;
			
			preloader.toggleClass('cbs-state-enable');
		};
		
		/**********************************************************************/
		
		this.setWidthClass=function()
		{
			var width=$this.parent().width();
			
			var className=null;
			var classPrefix='cbs-width-';
			
			if(width>=1170) className='1170';
			else if(width>=960) className='960';
			else if(width>=768) className='768';
			else if(width>=480) className='480';
			else if(width>=300) className='300';
			else if(width>=0) className='0';
			
			var oldClassName=$self.getValueFromClass($this,classPrefix);
			if(oldClassName!==false) $this.removeClass(classPrefix+oldClassName);
			
			$this.addClass(classPrefix+className);
			
			if($self.prevWidth!==width)
			{
				$self.prevWidth=width;
				$self.calculateCalendarColumnWidth();
			}
			
			setTimeout($self.setWidthClass,500);
		};
		
		/**********************************************************************/
		
		this.calculateCalendarColumnWidth=function()
		{
			var calendarBox=$this.find('.cbs-calendar-table-wrapper');
			var calendar=calendarBox.find('table');
			
			calendarBox.width('');
			calendar.width('');
			
			var calendarWidth=calendarBox.width();
			
			var columnCount=parseInt(calendarBox.find('input[name="cbs-calendar-column-count"]').val());
			var columnWidth=140;
			
			columnCount=Math.floor(calendarWidth/columnWidth);
			if(columnCount===0) columnCount=1;
			
			var calendarHeader=$this.find('.cbs-calendar-table-wrapper table th');

			calendarHeader.first().addClass('cbs-active');
			
			calendarBox.width(calendarBox.parent().width()+1);
			calendarBox.find('input[name="cbs-calendar-column-count"]').val(columnCount);
			
			$self.hideCalendarColumn();
		};
		
		/**********************************************************************/
		
		this.manageCalendarHeader=function()
		{
			var calendar=$this.find('.cbs-calendar-table-wrapper .cbs-calendar');
			var calendarHeaderCaption=$this.find('.cbs-calendar-header-caption');
		
			var columnActive=calendar.find('th.cbs-active').index();
			var columnCount=parseInt($this.find('input[name="cbs-calendar-column-count"]').val());
		
			var monthNumber=[];
		
			for(var i=columnActive;i<(columnActive+columnCount);i++)
			{
				var date=$self.getValueFromClass(calendar.find('th:eq('+i+')'),'cbs-date-id-');
				if(date===false) continue;
				var month=date.substring(2,4);
				monthNumber.push(month);
			}
			
			monthNumber=jQuery.unique(monthNumber);
		
			calendarHeaderCaption.children('span').css('display','none');
		
			if(monthNumber.length>1)
				calendarHeaderCaption.children('span.cbs-calendar-month-number-0').css('display','inline');
			
			for(var i in monthNumber)
				calendarHeaderCaption.children('span.cbs-calendar-month-number-'+monthNumber[i]).css('display','inline');
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.CBSPlugin=function(option) 
	{
		var plugin=new CBSPlugin(this,option);
		plugin.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/