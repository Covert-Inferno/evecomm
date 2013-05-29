<?php

class Base{
	private $base;
	private $settings;
	
	public $database;
	
	private $pagetitle = "Home";

	function __construct($settings){
		if(session_id() == ''){
			session_name('evecomm');
			session_start();
		}
		$this->base = $this;
		$this->settings = $settings;
		$this->base->loadController('system/database');
		$this->database = new Database($this->base);
		$this->database->db_host = $settings->db_host;
		$this->database->db_user = $settings->db_user;
		$this->database->db_pass = $settings->db_pass;
		$this->database->db_name = $settings->db_name;
		$this->database->connect();
	}
	
	public function loadController($controller){
		$path = "controllers/" . $controller . ".php";
		if(file_exists($path)){
			require_once($path);
			$c = explode("/", $controller);
			$controller = end($c);
			$classname = ucfirst($controller);
			$class = new $classname($this->base);
			$this->pagetitle = $class->pagetitle;
			return $class;
		}else{
			return false;
		}
	}
	
	public function loadView($view, $fullpage = true){
		$path = "views/" . $view . ".php";
		if(file_exists($path)){
			if($fullpage){
				include("views/system/header.php");
				include($path);
				include("views/system/footer.php");
			}else{
				include($path);
			}
			return true;
		}else{
			return false;
		}
	}
	
	public function index(){
		$this->base->loadView("system/nocontent");
	}
}