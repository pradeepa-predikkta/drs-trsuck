<?php

/******************************************************************************/
/******************************************************************************/

class CBSCurrency
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->currency=array
		(
			'AFN'			=>	array
			(
				'name'		=>	__('Afghan afghani',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'AFN'
			),
			'ALL'			=>	array
			(
				'name'		=>	__('Albanian lek',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'ALL'
			),
			'DZD'			=>	array
			(
				'name'		=>	__('Algerian dinar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'DZD'
			),
			'AOA'			=>	array
			(
				'name'		=>	__('Angolan kwanza',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'AOA'
			),
			'ARS'			=>	array
			(
				'name'		=>	__('Argentine peso',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'ARS'
			),
			'AMD'			=>	array
			(
				'name'		=>	__('Armenian dram',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'AMD'
			),
			'AWG'			=>	array
			(
				'name'		=>	__('Aruban florin',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'AWG'
			),
			'AUD'			=>	array
			(
				'name'		=>	__('Australian dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#36;',
				'separator'	=>	'.'
			),
			'AZN'			=>	array
			(
				'name'		=>	__('Azerbaijani manat',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'AZN'
			),
			'BSD'			=>	array
			(
				'name'		=>	__('Bahamian dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BSD'
			),
			'BHD'			=>	array
			(
				'name'		=>	__('Bahraini dinar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BHD',
				'separator'	=>	'&#1643;'
			),
			'BDT'			=>	array
			(
				'name'		=>	__('Bangladeshi taka',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BDT'
			),
			'BBD'			=>	array
			(
				'name'		=>	__('Barbadian dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BBD'
			),
			'BYR'			=>	array
			(
				'name'		=>	__('Belarusian ruble',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BYR'
			),
			'BZD'			=>	array
			(
				'name'		=>	__('Belize dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BZD'
			),
			'BTN'			=>	array
			(
				'name'		=>	__('Bhutanese ngultrum',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BTN'
			),
			'BOB'			=>	array
			(
				'name'		=>	__('Bolivian boliviano',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BOB'
			),
			'BAM'			=>	array
			(
				'name'		=>	__('Bosnia and Herzegovina konvertibilna marka',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BAM'
			),
			'BWP'			=>	array
			(
				'name'		=>	__('Botswana pula',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BWP',
				'separator'	=>	'.'
			),
			'BRL'			=>	array
			(
				'name'		=>	__('Brazilian real',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#82;&#36;'
			),
			'GBP'			=>	array
			(
				'name'		=>	__('British pound',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&pound;',
				'position'	=>	'left',
				'separator'	=>	'.',
			),
			'BND'			=>	array
			(
				'name'		=>	__('Brunei dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BND',
				'separator'	=>	'.'
			),
			'BGN'			=>	array
			(
				'name'		=>	__('Bulgarian lev',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BGN'
			),
			'BIF'			=>	array
			(
				'name'		=>	__('Burundi franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'BIF'
			),
			'KYD'			=>	array
			(
				'name'		=>	__('Cayman Islands dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'KYD'
			),
			'KHR'			=>	array
			(
				'name'		=>	__('Cambodian riel',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'KHR'
			),
			'CAD'			=>	array
			(
				'name'		=>	__('Canadian dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'CAD',
				'separator'	=>	'.'
			),
			'CVE'			=>	array
			(
				'name'		=>	__('Cape Verdean escudo',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'CVE'
			),
			'XAF'			=>	array
			(
				'name'		=>	__('Central African CFA franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'XAF'
			),
			'GQE'			=>	array
			(
				'name'		=>	__('Central African CFA franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'GQE'
			),
			'XPF'			=>	array
			(
				'name'		=>	__('CFP franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'XPF'
			),
			'CLP'			=>	array
			(
				'name'		=>	__('Chilean peso',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'CLP'
			),
			'CNY'			=>	array
			(
				'name'		=>	__('Chinese renminbi',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&yen;'
			),
			'COP'			=>	array
			(
				'name'		=>	__('Colombian peso',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'COP'
			),
			'KMF'			=>	array
			(
				'name'		=>	__('Comorian franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'KMF'
			),
			'CDF'			=>	array
			(
				'name'		=>	__('Congolese franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'CDF'
			),
			'CRC'			=>	array
			(
				'name'		=>	__('Costa Rican colon',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'CRC'
			),
			'HRK'			=>	array
			(
				'name'		=>	__('Croatian kuna',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'HRK'
			),
			'CUC'			=>	array
			(
				'name'		=>	__('Cuban peso',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'CUC'
			),
			'CZK'			=>	array
			(
				'name'		=>	__('Czech koruna',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#75;&#269;'
			),
			'DKK'			=>	array
			(
				'name'		=>	__('Danish krone',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#107;&#114;'
			),
			'DJF'			=>	array
			(
				'name'		=>	__('Djiboutian franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'DJF'
			),
			'DOP'			=>	array
			(
				'name'		=>	__('Dominican peso',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'DOP',
				'separator'	=>	'.'
			),
			'XCD'			=>	array
			(
				'name'		=>	__('East Caribbean dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'XCD'
			),
			'EGP'	=>	array
			(
				'name'		=>	__('Egyptian pound',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'EGP'
			),
			'ERN'			=>	array
			(
				'name'		=>	__('Eritrean nakfa',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'ERN'
			),
			'EEK'			=>	array
			(
				'name'		=>	__('Estonian kroon',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'EEK'
			),
			'ETB'			=>	array
			(
				'name'		=>	__('Ethiopian birr',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'ETB'
			),
			'EUR'			=>	array
			(
				'name'		=>	__('European euro',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&euro;'
			),
			'FKP'			=>	array
			(
				'name'		=>	__('Falkland Islands pound',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'FKP'
			),
			'FJD'			=>	array
			(
				'name'		=>	__('Fijian dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'FJD',
				'separator'	=>	'.'
			),
			'GMD'			=>	array
			(
				'name'		=>	__('Gambian dalasi',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'GMD'
			),
			'GEL'			=>	array
			(
				'name'		=>	__('Georgian lari',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'GEL'
			),
			'GHS'			=>	array
			(
				'name'		=>	__('Ghanaian cedi',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'GHS'
			),
			'GIP'			=>	array
			(
				'name'		=>	__('Gibraltar pound',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'GIP'
			),
			'GTQ'			=>	array
			(
				'name'		=>	__('Guatemalan quetzal',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'GTQ',
				'separator'	=>	'.'
			),
			'GNF'			=>	array
			(
				'name'		=>	__('Guinean franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'GNF'
			),
			'GYD'			=>	array
			(
				'name'		=>	__('Guyanese dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'GYD'
			),
			'HTG'			=>	array
			(
				'name'		=>	__('Haitian gourde',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'HTG'
			),
			'HNL'			=>	array
			(
				'name'		=>	__('Honduran lempira',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'HNL',
				'separator'	=>	'.'
			),
			'HKD'			=>	array
			(
				'name'		=>	__('Hong Kong dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#36;',
				'separator'	=>	'.'
			),
			'HUF'			=>	array
			(
				'name'		=>	__('Hungarian forint',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#70;&#116;'
			),
			'ISK'			=>	array
			(
				'name'		=>	__('Icelandic krona',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'ISK'
			),
			'INR'			=>	array
			(
				'name'		=>	__('Indian rupee',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#8377;',
				'separator'	=>	'.'
			),
			'IDR'			=>	array
			(
				'name'		=>	__('Indonesian rupiah',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'Rp',
				'position'	=>	'left'
			),
			'IRR'			=>	array
			(
				'name'		=>	__('Iranian rial',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'IRR',
				'separator'	=>	'&#1643;'
			),
			'IQD'			=>	array
			(
				'name'		=>	__('Iraqi dinar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'IQD',
				'separator'	=>	'&#1643;'
			),
			'ILS'			=>	array
			(
				'name'		=>	__('Israeli new sheqel',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#8362;',
				'separator'	=>	'.'
			),
			'YER'			=>	array
			(
				'name'		=>	__('Yemeni rial',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'YER'
			),
			'JMD'			=>	array
			(
				'name'		=>	__('Jamaican dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'JMD'
			),
			'JPY'			=>	array
			(
				'name'		=>	__('Japanese yen',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&yen;',
				'separator'	=>	'.'
			),
			'JOD'			=>	array
			(
				'name'		=>	__('Jordanian dinar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'JOD'
			),
			'KZT'			=>	array
			(
				'name'		=>	__('Kazakhstani tenge',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'KZT'
			),
			'KES'			=>	array
			(
				'name'		=>	__('Kenyan shilling',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'KES'
			),
			'KGS'			=>	array
			(
				'name'		=>	__('Kyrgyzstani som',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'KGS'
			),
			'KWD'			=>	array
			(
				'name'		=>	__('Kuwaiti dinar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'KWD',
				'separator'	=>	'&#1643;'
			),
			'LAK'			=>	array
			(
				'name'		=>	__('Lao kip',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'LAK'
			),
			'LVL'			=>	array
			(
				'name'		=>	__('Latvian lats',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'LVL'
			),
			'LBP'			=>	array
			(
				'name'		=>	__('Lebanese lira',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'LBP'
			),
			'LSL'			=>	array
			(
				'name'		=>	__('Lesotho loti',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'LSL'
			),
			'LRD'			=>	array
			(
				'name'		=>	__('Liberian dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'LRD'
			),
			'LYD'			=>	array
			(
				'name'		=>	__('Libyan dinar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'LYD'
			),
			'LTL'			=>	array
			(
				'name'		=>	__('Lithuanian litas',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'LTL'
			),
			'MOP'			=>	array
			(
				'name'		=>	__('Macanese pataca',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MOP'
			),
			'MKD'			=>	array
			(
				'name'		=>	__('Macedonian denar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MKD'
			),
			'MGA'			=>	array
			(
				'name'		=>	__('Malagasy ariary',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MGA'
			),
			'MYR'			=>	array
			(
				'name'		=>	__('Malaysian ringgit',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#82;&#77;',
				'separator'	=>	'.'
			),
			'MWK'			=>	array
			(
				'name'		=>	__('Malawian kwacha',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MWK'
			),
			'MVR'			=>	array
			(
				'name'		=>	__('Maldivian rufiyaa',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MVR'
			),
			'MRO'			=>	array
			(
				'name'		=>	__('Mauritanian ouguiya',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MRO'
			),
			'MUR'			=>	array
			(
				'name'		=>	__('Mauritian rupee',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MUR'
			),
			'MXN'			=>	array
			(
				'name'		=>	__('Mexican peso',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#36;',
				'separator'	=>	'.'
			),
			'MMK'			=>	array
			(
				'name'		=>	__('Myanma kyat',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MMK'
			),
			'MDL'			=>	array
			(
				'name'		=>	__('Moldovan leu',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MDL'
			),
			'MNT'			=>	array
			(
				'name'		=>	__('Mongolian tugrik',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MNT'
			),
			'MAD'			=>	array
			(
				'name'		=>	__('Moroccan dirham',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MAD'
			),
			'MZM'			=>	array
			(
				'name'		=>	__('Mozambican metical',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'MZM'
			),
			'NAD'			=>	array
			(
				'name'		=>	__('Namibian dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'NAD'
			),
			'NPR'			=>	array
			(
				'name'		=>	__('Nepalese rupee',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'NPR'
			),
			'ANG'			=>	array
			(
				'name'		=>	__('Netherlands Antillean gulden',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'ANG'
			),
			'TWD'			=>	array
			(
				'name'		=>	__('New Taiwan dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#78;&#84;&#36;',
				'separator'	=>	'.'
			),
			'NZD'			=>	array
			(
				'name'		=>	__('New Zealand dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#36;',
				'separator'	=>	'.'
			),
			'NIO'			=>	array
			(
				'name'		=>	__('Nicaraguan cordoba',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'NIO',
				'separator'	=>	'.'
			),
			'NGN'			=>	array
			(
				'name'		=>	__('Nigerian naira',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'NGN',
				'separator'	=>	'.'
			),
			'KPW'			=>	array
			(
				'name'		=>	__('North Korean won',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'KPW',
				'separator'	=>	'.'
			),
			'NOK'			=>	array
			(
				'name'		=>	__('Norwegian krone',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#107;&#114;'
			),
			'OMR'			=>	array
			(
				'name'		=>	__('Omani rial',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'OMR',
				'separator'	=>	'&#1643;'
			),
			'TOP'			=>	array
			(
				'name'		=>	__('Paanga',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'TOP'
			),
			'PKR'			=>	array
			(
				'name'		=>	__('Pakistani rupee',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'PKR',
				'separator'	=>	'.'
			),
			'PAB'			=>	array
			(
				'name'		=>	__('Panamanian balboa',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'PAB',
				'separator'	=>	'.'
			),
			'PGK'			=>	array
			(
				'name'		=>	__('Papua New Guinean kina',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'PGK'
			),
			'PYG'			=>	array
			(
				'name'		=>	__('Paraguayan guarani',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'PYG'
			),
			'PEN'			=>	array
			(
				'name'		=>	__('Peruvian nuevo sol',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'PEN'
			),
			'PHP'			=>	array
			(
				'name'		=>	__('Philippine peso',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#8369;'
			),
			'PLN'			=>	array
			(
				'name'		=>	__('Polish zloty',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#122;&#322;'
			),
			'QAR'			=>	array
			(
				'name'		=>	__('Qatari riyal',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'QAR',
				'separator'	=>	'&#1643;'
			),
			'RON'			=>	array
			(
				'name'		=>	__('Romanian leu',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'lei'
			),
			'RUB'			=>	array
			(
				'name'		=>	__('Russian ruble',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'RUB'
			),
			'RWF'			=>	array
			(
				'name'		=>	__('Rwandan franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'RWF'
			),
			'SHP'			=>	array
			(
				'name'		=>	__('Saint Helena pound',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SHP'
			),
			'WST'			=>	array
			(
				'name'		=>	__('Samoan tala',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'WST'
			),
			'STD'			=>	array
			(
				'name'		=>	__('Sao Tome and Principe dobra',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'STD'
			),
			'SAR'			=>	array
			(
				'name'		=>	__('Saudi riyal',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SAR',
				'separator'	=>	'&#1643;'
			),
			'SCR'			=>	array
			(
				'name'		=>	__('Seychellois rupee',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SCR'
			),
			'RSD'			=>	array
			(
				'name'		=>	__('Serbian dinar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'RSD'
			),
			'SLL'			=>	array
			(
				'name'		=>	__('Sierra Leonean leone',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SLL'
			),
			'SGD'			=>	array
			(
				'name'		=>	__('Singapore dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#36;',
				'separator'	=>	'.'
			),
			'SYP'			=>	array
			(
				'name'		=>	__('Syrian pound',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SYP',
				'separator'	=>	'&#1643;'
			),
			'SKK'			=>	array
			(
				'name'		=>	__('Slovak koruna',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SKK'
			),
			'SBD'			=>	array
			(
				'name'		=>	__('Solomon Islands dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SBD'
			),
			'SOS'			=>	array
			(
				'name'		=>	__('Somali shilling',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SOS'
			),
			'ZAR'			=>	array
			(
				'name'		=>	__('South African rand',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#82;'
			),
			'KRW'			=>	array
			(
				'name'		=>	__('South Korean won',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#8361;',
				'separator'	=>	'.'
			),
			'XDR'			=>	array
			(
				'name'		=>	__('Special Drawing Rights',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'XDR'
			),
			'LKR'			=>	array
			(
				'name'		=>	__('Sri Lankan rupee',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'LKR',
				'separator'	=>	'.'
			),
			'SDG'			=>	array
			(
				'name'		=>	__('Sudanese pound',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SDG'
			),
			'SRD'			=>	array
			(
				'name'		=>	__('Surinamese dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SRD'
			),
			'SZL'			=>	array
			(
				'name'		=>	__('Swazi lilangeni',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'SZL'
			),
			'SEK'			=>	array
			(
				'name'		=>	__('Swedish krona',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#107;&#114;'
			),
			'CHF'			=>	array
			(
				'name'		=>	__('Swiss franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#67;&#72;&#70;',
				'separator'	=>	'.'
			),
			'TJS'			=>	array
			(
				'name'		=>	__('Tajikistani somoni',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'TJS'
			),
			'TZS'			=>	array
			(
				'name'		=>	__('Tanzanian shilling',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'TZS'
			),
			'THB'			=>	array
			(
				'name'		=>	__('Thai baht',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#3647;'
			),
			'TTD'			=>	array
			(
				'name'		=>	__('Trinidad and Tobago dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'TTD'
			),
			'TND'			=>	array
			(
				'name'		=>	__('Tunisian dinar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'TND'
			),
			'TRY'			=>	array
			(
				'name'		=>	__('Turkish new lira',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#84;&#76;'
			),
			'TMM'			=>	array
			(
				'name'		=>	__('Turkmen manat',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'TMM'
			),
			'AED'			=>	array
			(
				'name'		=>	__('UAE dirham',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'AED'
			),
			'UGX'			=>	array
			(
				'name'		=>	__('Ugandan shilling',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'UGX'
			),
			'UAH'			=>	array
			(
				'name'		=>	__('Ukrainian hryvnia',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'UAH'
			),
			'USD'			=>	array
			(
				'name'		=>	__('United States dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&#36;',
				'position'	=>	'left',
				'separator'	=>	'.'
			),
			'UYU'			=>	array
			(
				'name'		=>	__('Uruguayan peso',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'UYU'
			),
			'UZS'			=>	array
			(
				'name'		=>	__('Uzbekistani som',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'UZS'
			),
			'VUV'			=>	array
			(
				'name'		=>	__('Vanuatu vatu',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'VUV'
			),
			'VEF'			=>	array
			(
				'name'		=>	__('Venezuelan bolivar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'VEF'
			),
			'VND'			=>	array
			(
				'name'		=>	__('Vietnamese dong',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'VND'
			),
			'XOF'			=>	array
			(
				'name'		=>	__('West African CFA franc',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'XOF'
			),
			'ZMK'			=>	array
			(
				'name'		=>	__('Zambian kwacha',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'ZMK'
			),
			'ZWD'			=>	array
			(
				'name'		=>	__('Zimbabwean dollar',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'ZWD'
			),
			'RMB'			=>	array
			(
				'name'		=>	__('Chinese Yuan',PLUGIN_CBS_DOMAIN),
				'symbol'	=>	'&yen;',
				'separator'	=>	'.'
			)
		);
	}
	
	/**************************************************************************/
	
	function getCurrency()
	{
		return($this->currency);
	}
	
	/**************************************************************************/
	
	function getSymbol($currency)
	{
		return($this->currency[$currency]['symbol']);
	}
	
	/**************************************************************************/
	
	function getSymbolPosition($currency)
	{
		return(isset($this->currency[$currency]['position']) ? $this->currency[$currency]['position'] : 'right');
	}
	
	/**************************************************************************/
	
	function getSeparator($currency)
	{
		return(isset($this->currency[$currency]['separator']) ? $this->currency[$currency]['separator'] : ',');
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/