<?php

class Settings{
	
	// This will be the title of all pages.
	// Set it to (for example) your alliance name.
	public $title = 'EVEComm';
	
	// This is an array of AllianceID's that are allowed to register.
	// If you want to ues EVEComm for a single corporation, leave the array empty.
	// To find out your AllianceID, search for it in this list:
	// https://api.eveonline.com/eve/AllianceList.xml.aspx
	public $alliancewhitelist = array('1');
	
	// This is an array of CorporationID's that are allowed to register.
	// Corporations that are in a whitelisted alliance don't need to be added here.
	// To find out your CorporationID, use an account API key to connect to the following URL:
	// https://api.eveonline.com/account/Characters.xml.aspx?keyID=<insert your key id here>&vCode=<insert your verification code here>
	public $corporationwhitelits = array('1');
	
	// Admin character name.
	// This is used in (for example) the request URL's to eve-marketdata.com so they can contact you in case of issues and shown to users for technical support.
	public $adminchar = 'demo';
	
	// MySQL login details.
	// Please set these values to connect to the MySQL database.
	public $db_host = 'localhost';	//hostname
	public $db_user = 'evecomm';	//username
	public $db_pass = 'evecomm';	//user's password (make sure it is not 'evecomm', set it to something secure!)
	public $db_name = 'evecomm';	//database name
	
	// Here you can enable or disable modules - if you write own additions, it is prefered to load them here.
	// Module order also affects the menu order.
	// The default modules are: news, boards, fleettool, lootlog, messaging, wallet (in this order)
	public $enabled_modules = array('news', 'boards', 'fleettool', 'lootlog', 'messaging', 'wallet');
	
	// Here you can enable or disable module widgets to show in the title bar.
	// Module order also affects the widget order - keep in mind that not all modules have widgets.
	// Modules that are not loaded will be ignored.
	// The default widgets are: messaging, wallet (in this order)
	public $enabled_widgets = array('messaging', 'wallet');
	
}