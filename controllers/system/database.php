<?php

class Database extends Controller{
	public $pagetitle = "Database";
	
	public $db_host;
	public $db_user;
	public $db_pass;
	public $db_name;
	
	private $db_conn;
	
	public function connect(){
		$this->db_conn = mysql_connect($this->db_host, $this->db_user, $this->db_pass) or die ("Unable to connect to database.");
		mysql_select_db($this->db_name, $this->db_conn);
	}
}