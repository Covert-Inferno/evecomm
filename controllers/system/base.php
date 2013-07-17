<?php

class Base{
	private $base;

	public $settings;
	public $database;
	public $language;
	
	private $pagetitle = "Home";

	function __construct($settings){
		if(session_id() == ''){
			session_name('evecomm');
			session_start();
		}
		$this->base = $this;
		$this->settings = $settings;
		
		//database controller can not be loaded using the loadController method since there are extra parameters
		require_once('controllers/system/database.php');
		$this->database = new Database($this->base, $settings->db_host, $settings->db_name, $settings->db_user, $settings->db_pass);
		
		//load multilanguage support
		$this->language = $this->base->loadController("system/language");
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
				$this->pagetitle = $this->base->language->getString($this->pagetitle);
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
	
	public function loadModel($model){
		$path = "models/" . $model . ".php";
		if(file_exists($path)){
			require_once($path);
			$c = explode("/", $model);
			$model = end($c);
			$classname = ucfirst($model);
			$class = new $classname($this->base);
			return $class;
		}else{
			return false;
		}
	}
	
	public function index(){
		$this->base->loadView("system/nocontent");
	}
}