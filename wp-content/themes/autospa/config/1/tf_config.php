<?php

/******************************************************************************/
/******************************************************************************/

TFElement::add
(
	'F01',
	array
	(
		'label'																	=>	__('<i>[01]</i>Base','autospa'),
		'description'															=>	__('Base font.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(15,15,15,15,15),
		'font_style'															=>	'normal',
		'font_weight'															=>	'400',
		'line_height'															=>	'186%',
		'letter_spacing'														=>	'0px'
	),
	array
	(
        'a',
		'body',
		'input',
        'select',
		'textarea',
        '.ui-accordion-content.ui-helper-reset',
        'html .woocommerce ul.products li.product .price',
        'html .woocommerce label.inline',
        '.theme-page-header .theme-page-header-top .theme-page-header-top-social-list>a.theme-icon-meta-cart>span'
	)
);

TFElement::add
(
	'F02',
	array
	(
		'label'																	=>	__('<i>[02]</i>Breadcrumb','autospa'),
		'description'															=>	__('Use:<br/>- breadcrumb in bottom part of header.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(14,14,14,14,14),
		'font_style'															=>	'normal',
		'font_weight'															=>	'400',
		'line_height'															=>	'28px',
		'letter_spacing'														=>	'1px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
		'.theme-page-header .theme-page-header-bottom .breadcrumbs',
        '.theme-page-header .theme-page-header-bottom .breadcrumbs a'
	)
);

TFElement::add
(
	'F03',
	array
	(
		'label'																	=>	__('<i>[03]</i>Default menu item','autospa'),
		'description'															=>	__('Use:<br/>- Default menu item.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_size'																=>	array(15,15,15,15,15),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'400',
		'line_height'                                                           =>  '28px',
		'letter_spacing'														=>	'1px',
        'text_transform'														=>	'uppercase'
	),
	array
	(
		'.theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul>li>a'
	)
);

TFElement::add
(
	'F04',
	array
	(
		'label'																	=>	__('<i>[04]</i>Default menu subitem','autospa'),
		'description'															=>	__('Use:<br/>- Default menu subitem.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_size'																=>	array(15,15,15,15,15),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'400',
		'line_height'                                                           =>  '28px',
		'letter_spacing'														=>	'0px',
        'text_transform'														=>	'none'
	),
	array
	(
		'.theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-default>ul ul>li>a'
	)
);

TFElement::add
(
	'F05',
	array
	(
		'label'																	=>	__('<i>[05]</i>Field label','autospa'),
		'description'															=>	__('Use:<br/>- field label.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_size'																=>	array(14,14,14,14,14),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'400'
	),
	array
	(
        'label'
	)
);

TFElement::add
(
	'F06',
	array
	(
		'label'																	=>	__('<i>[06]</i>Fullscreen search form','autospa'),
		'description'															=>	__('Use:<br/>- text in search field of fullscreen search form.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(29,29,29,29,22),
        'font_style'															=>	'normal',
		'font_weight'															=>	'400',
		'line_height'															=>	'40px',
		'letter_spacing'														=>	'2px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
        '#theme-search-form>form>div>input[type="search"]'
	)
);

TFElement::add
(
	'F07',
	array
	(
		'label'																	=>	__('<i>[07]</i>H1 header','autospa'),
		'description'															=>	__('Use:<br/>- H1 header.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(48,48,43,43,29),
		'font_style'															=>	'normal',
		'font_weight'															=>	'900',
		'line_height'															=>	'60px',
		'letter_spacing'														=>	'2px'
	),
	array
	(
		'h1',
		'h1 a'
	)
);

TFElement::add
(
	'F08',
	array
	(
		'label'																	=>	__('<i>[08]</i>H2 header','autospa'),
		'description'															=>	__('Use:<br/>- H2 header.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(29,29,29,29,22),
        'font_style'															=>	'normal',
		'font_weight'															=>	'700',
		'line_height'															=>	'40px',
		'letter_spacing'														=>	'2px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
		'h2',
		'h2 a'
	)
);

TFElement::add
(
	'F09',
	array
	(
		'label'																	=>	__('<i>[09]</i>H3 header','autospa'),
		'description'															=>	__('Use:<br/>- H3 header.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(21,21,21,21,21),
		'font_style'															=>	'normal',
		'font_weight'															=>	'700',
		'line_height'															=>	'32px',
		'letter_spacing'														=>	'2px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
		'h3',
		'h3 a',
        'body .cbs-main .cbs-main-list>li.cbs-main-list-item>div.cbs-main-list-item-section-header>.cbs-main-list-item-section-header-header>span'
	)
);

TFElement::add
(
	'F10',
	array
	(
		'label'																	=>	__('<i>[10]</i>H4 header','autospa'),
		'description'															=>	__('Use:<br/>- H4 header.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(18,18,18,18,18),
		'font_style'															=>	'normal',
		'font_weight'															=>	'700',
		'line_height'															=>	'30px',
		'letter_spacing'														=>	'2px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
		'h4',
		'h4 a',
        'body .cbs-package-list>li>.cbs-package-name'
	)
);

TFElement::add
(
	'F11',
	array
	(
		'label'																	=>	__('<i>[11]</i>H5 header','autospa'),
		'description'															=>	__('Use:<br/>- H5 header.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(17,17,17,17,17),
		'font_style'															=>	'normal',
		'font_weight'															=>	'700',
		'line_height'															=>	'32px',
		'letter_spacing'														=>	'2px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
		'h5',
		'h5 a'
	)
);

TFElement::add
(
	'F12',
	array
	(
		'label'																	=>	__('<i>[12]</i>H6 header','autospa'),
		'description'															=>	__('Use:<br/>- H6 header.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(15,15,15,15,15),
		'font_style'															=>	'normal',
		'font_weight'															=>	'900',
		'line_height'															=>	'27px',
		'letter_spacing'														=>	'2px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
		'h6',
		'h6 a'
	)
);

TFElement::add
(
	'F13',
	array
	(
		'label'																	=>	__('<i>[13]</i>Image header','autospa'),
		'description'															=>	__('Use:<br/>- header of image.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(14,14,14,14,14),
		'font_style'															=>	'normal',
		'font_weight'															=>	'900',
		'line_height'															=>	'27px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
		'.theme-page-content .theme-image.theme-image-hover .theme-image-hover-layer>span>span>span:first-child'
	)
);

TFElement::add
(
	'F14',
	array
	(
		'label'																	=>	__('<i>[14]</i>Page 404: header','autospa'),
		'description'															=>	__('Use:<br/>- header of page 404.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(160,160,160,160,160),
		'font_style'															=>	'normal',
		'font_weight'															=>	'300',
		'line_height'															=>	'160px',
		'letter_spacing'														=>	'0px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
        '.theme-page-404-header'
	)
);

TFElement::add
(
	'F15',
	array
	(
		'label'																	=>	__('<i>[15]</i>Page 404 and Maintenance mode: content','autospa'),
		'description'															=>	__('Use:<br/>- content of page 404<br/>- content of Maintenance mode page.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(21,21,21,21,21),
		'font_style'															=>	'normal',
		'font_weight'															=>	'300',
		'line_height'															=>	'36px',
	),
	array
	(
        '.theme-page-404-content',
        '.theme-page-404-content a',
        '.theme-page-maintenance-content',
        '.theme-page-maintenance-content a'
	)
);

TFElement::add
(
	'F16',
	array
	(
		'label'																	=>	__('<i>[16]</i>Page header','autospa'),
		'description'															=>	__('Use:<br/>- Page header.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_size'																=>	array(48,48,43,43,29),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'900',
		'line_height'                                                           =>  '1.4em',
		'letter_spacing'														=>	'2px',
        'text_transform'														=>	'uppercase'
	),
	array
	(
		'.theme-page-header .theme-page-header-bottom h1'
	)
);

TFElement::add
(
	'F17',
	array
	(
		'label'																	=>	__('<i>[17]</i>Post date I','autospa'),
		'description'															=>	__('Use:<br/>- Post date: month and year.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_size'																=>	array(13,13,13,13,13),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'400',
        'text_transform'														=>	'uppercase'
	),
	array
	(
		'.theme-post>.theme-post-header .theme-post-header-date>span:first-child a',
        '.theme-post>.theme-post-header .theme-post-header-date>span:first-child+span+span a'
	)
);

TFElement::add
(
	'F18',
	array
	(
		'label'																	=>	__('<i>[18]</i>Post date II','autospa'),
		'description'															=>	__('Use:<br/>- Post date: day number,<br/>- woocommerce: product price in single template.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_size'																=>	array(21,21,21,21,21),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'700',
        'text_transform'														=>	'uppercase',
        'letter_spacing'														=>	'2px'
	),
	array
	(
        '.theme-post>.theme-post-header .theme-post-header-date>span:first-child+span a',
        'html .woocommerce div.product div.summary .price'
	)
);

TFElement::add
(
	'F19',
	array
	(
		'label'																	=>	__('<i>[19]</i>Post title','autospa'),
		'description'															=>	__('Use:<br/>- Post title,<br/>- woocommerce: product title on products list/single template.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_size'																=>	array(21,21,21,21,21),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'700',
        'line_height'                                                           =>  '32px',
		'letter_spacing'														=>	'2px',
        'text_transform'														=>	'uppercase'
	),
	array
	(
		'.theme-post>.theme-post-header .theme-post-header-title h3',
        '.theme-post>.theme-post-header .theme-post-header-title h3 a',
        'html .woocommerce ul.products li.product h3',
        'html .woocommerce-page ul.products li.product h3',
        'html .woocommerce div.product div.summary>.product_title'
	)
);

TFElement::add
(
	'F20',
	array
	(
		'label'																	=>	__('<i>[20]</i>Responsive menu item','autospa'),
		'description'															=>	__('Use:<br/>- Responsive menu item.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_size'																=>	array(15,15,15,15,15),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'400',
		'line_height'                                                           =>  '28px',
		'letter_spacing'														=>	'0px',
        'text_transform'														=>	'uppercase'
	),
	array
	(
		'.theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-responsive ul>li>a'
	)
);

TFElement::add
(
	'F21',
	array
	(
		'label'																	=>	__('<i>[21]</i>Responsive menu subitem','autospa'),
		'description'															=>	__('Use:<br/>- Responsive menu subitem.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_size'																=>	array(15,15,15,15,15),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'400',
		'line_height'                                                           =>  '28px',
		'letter_spacing'														=>	'0px',
        'text_transform'														=>	'none'
	),
	array
	(
		'.theme-page-header .theme-page-header-top .theme-page-header-top-menu.theme-page-header-top-menu-responsive>ul ul>li>a'
	)
);

TFElement::add
(
	'F22',
	array
	(
		'label'																	=>	__('<i>[22]</i>Widget header','autospa'),
		'description'															=>	__('Use:<br/>- widget header.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
        'font_family_system'													=>  '',
		'font_size'																=>	array(14,14,14,14,14),
        'font_style'                                                            =>  'normal',
		'font_weight'															=>	'900',
        'line_height'                                                           =>  '27px',
        'text_transform'														=>	'uppercase',
        'letter_spacing'														=>	'2px'
	),
	array
	(
        '.theme-widget>.theme-widget-header',
        '.theme-widget>.theme-widget-header>a'
	)
);

TFElement::add
(
	'F23',
	array
	(
		'label'																	=>	__('<i>[23]</i>Component<br/>"Blockquote": content','autospa'),
		'description'															=>	__('Use:<br/>- content of "Blockquote" component.','autospa')
	),
	array
	(
		'font_family_google'													=>	'PT Serif',
		'font_family_system'													=>  '',
		'font_size'																=>	array(18,18,18,18,18),
		'font_style'															=>	'italic',
		'font_weight'															=>	'400',
		'line_height'															=>	'30px'
	),
	array
	(
        'blockquote',
		'.theme-component-blockquote'
	)
);

TFElement::add
(
	'F24',
	array
	(
		'label'																	=>	__('<i>[24]</i>Component<br/>"Counter box": value','autospa'),
		'description'															=>	__('Use:<br/>- value of counter in component "Counter box".','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(64,64,64,64,64),
		'font_style'															=>	'normal',
		'font_weight'															=>	'300',
		'line_height'															=>	'64px'
	),
	array
	(
		'.theme-component-counter-box .theme-component-counter-box-item>span:first-child'
	)
);

TFElement::add
(
	'F25',
	array
	(
		'label'																	=>	__('<i>[25]</i>Component<br/>"Header & subheader": subheader','autospa'),
		'description'															=>	__('Use:<br/>- subheader of "Header & subheader" component.','autospa')
	),
	array
	(
		'font_family_google'													=>	'PT Serif',
		'font_family_system'													=>  '',
		'font_size'																=>	array(16,16,16,16,16),
		'font_style'															=>	'italic',
		'font_weight'															=>	'400',
		'line_height'															=>	'28px',
		'letter_spacing'														=>	'0px'
	),
	array
	(
		'.theme-component-header-subheader>.theme-component-header-subheader-subheader'
	)
);

TFElement::add
(
	'F26',
	array
	(
		'label'																	=>	__('<i>[26]</i>Component<br/>"Italic text": content','autospa'),
		'description'															=>	__('Use:<br/>- italic text in component "Italic text"','autospa')
	),
	array
	(
		'font_family_google'													=>	'PT Serif',
		'font_family_system'													=>  '',
		'font_size'																=>	array(18,18,18,18,18),
		'font_style'															=>	'italic',
		'font_weight'															=>	'400',
		'line_height'															=>	'30px',
		'letter_spacing'														=>	'0px',
        'text_transform'                                                        =>  'none'
	),
	array
	(
		'.theme-component-italic-text'
	)
);

TFElement::add
(
	'F27',
	array
	(
		'label'																	=>	__('<i>[27]</i>Component<br/>"Recent posts": post date','autospa'),
		'description'															=>	__('Use:<br/>- post date in component "Recent posts".','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(14,14,14,14,14),
		'font_style'															=>	'normal',
		'font_weight'															=>	'700',
		'line_height'															=>	'28px',
        'letter_spacing'                                                        =>  '1px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
		'.theme-component-recent-post>ul>li>a>span:first-child+span'
	)
);

TFElement::add
(
	'F28',
	array
	(
		'label'																	=>	__('<i>[28]</i>Component<br/>"Recent posts": post title','autospa'),
		'description'															=>	__('Use:<br/>- post title in component "Recent posts".','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(17,17,17,17,17),
		'font_style'															=>	'normal',
		'font_weight'															=>	'700',
		'line_height'															=>	'32px',
        'letter_spacing'                                                        =>  '2px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
		'.theme-component-recent-post>ul>li>a>span:first-child'
	)
);

TFElement::add
(
	'F29',
	array
	(
		'label'																	=>	__('<i>[29]</i>Component<br/>"Testimonials list item": author','autospa'),
		'description'															=>	__('Use:<br/>- author of testimonial in "Testimonials list item" component.','autospa')
	),
	array
	(
		'font_family_google'													=>	'PT Serif',
		'font_family_system'													=>  '',
		'font_size'																=>	array(16,16,16,16,16),
		'font_style'															=>	'italic',
		'font_weight'															=>	'400',
		'line_height'															=>	'28px'
	),
	array
	(
		'.theme-component-testimonial-list ul>li>span'
	)
);

TFElement::add
(
	'F30',
	array
	(
		'label'																	=>	__('<i>[30]</i>Component<br/>"Testimonial list item": content','autospa'),
		'description'															=>	__('Use:<br/>- content of testimonial in "Testimonials list item" component.','autospa')
	),
	array
	(
		'font_family_google'													=>	'PT Serif',
		'font_family_system'													=>  '',
		'font_size'																=>	array(18,18,18,18,18),
		'font_style'															=>	'italic',
		'font_weight'															=>	'400',
		'line_height'															=>	'30px'
	),
	array
	(
		'.theme-component-testimonial-list ul>li>p'
	)
);

TFElement::add
(
	'F31',
	array
	(
		'label'																	=>	__('<i>[31]</i>Plugin<br/>"Car Wash Booking System": subheader section','autospa'),
		'description'															=>	__('Use:<br/>- text of subheader section in "Car Wash Booking System" plugin.','autospa')
	),
	array
	(
		'font_family_google'													=>	'PT Serif',
		'font_family_system'													=>  '',
		'font_size'																=>	array(16,16,16,16,16),
		'font_style'															=>	'italic',
		'font_weight'															=>	'400',
		'line_height'															=>	'28px',
		'letter_spacing'														=>	'0px',
        'text_transform'                                                        =>  'none'
	),
	array
	(
        'body .cbs-main .cbs-main-list>li.cbs-main-list-item>div.cbs-main-list-item-section-header>.cbs-main-list-item-section-header-subheader>span'
	)
);

TFElement::add
(
	'F32',
	array
	(
		'label'																	=>	__('<i>[32]</i>Plugin<br/>"Revolution Slider": header','autospa'),
		'description'															=>	__('Use:<br/>- header in Revolution Slider.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(62,55,43,29,22),
		'font_style'															=>	'normal',
		'font_weight'															=>	'900',
		'line_height'															=>	'62px',
        'letter_spacing'                                                        =>  '4px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
        '.theme-page-header-bottom-type-revslider .theme-revolution-slider-header'
	)
);


TFElement::add
(
	'F33',
	array
	(
		'label'																	=>	__('<i>[33]</i>Plugin<br/>"Revolution Slider": subheader','autospa'),
		'description'															=>	__('Use:<br/>- subheader in Revolution Slider.','autospa')
	),
	array
	(
		'font_family_google'													=>	'Lato',
		'font_family_system'													=>  '',
		'font_size'																=>	array(17,17,17,15,14),
		'font_style'															=>	'normal',
		'font_weight'															=>	'700',
		'line_height'															=>	'17px',
        'letter_spacing'                                                        =>  '2px',
        'text_transform'                                                        =>  'uppercase'
	),
	array
	(
        '.theme-page-header-bottom-type-revslider .theme-revolution-slider-subheader'
	)
);