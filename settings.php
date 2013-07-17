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
	
	// Password salt and pepper for increased security in case of stolen database
	// For more information, check https://en.wikipedia.org/wiki/Salt_(cryptography)
	// Used combination is salt + password + pepper
	// Make sure to change those to something unique for your situation
	public $db_salt = 'beforebeforebeforebeforebefore';
	public $db_pepper = 'afterafterafterafterafterafter';
}
