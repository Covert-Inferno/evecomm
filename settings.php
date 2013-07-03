<?php

class Settings{
	
	// This will be the title of all pages.
	// Set it to (for example) your alliance name.
	public $title = 'EVEComm';
	
	// Request character name.
	// This is used in (for example) the request URL's to eve-marketdata.com so they can contact you in case of issues and shown to users for technical support.
	public $requestchar = 'demo';
	
	// MySQL login details.
	// Please set these values to connect to the MySQL database.
	public $db_host = 'localhost';	//hostname
	public $db_user = 'evecomm';	//username
	public $db_pass = 'evecomm';	//user's password (make sure it is not 'evecomm', set it to something secure!)
	public $db_name = 'evecomm';	//database name
	
}
