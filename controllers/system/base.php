<?php

class Base{
	private $base;
	private $settings;

	private $pagetitle = "Home";

	function __construct($settings){
		if(session_id() == ''){
			session_name('evecomm');
			session_start();
		}
		$this->base = $this;
		$this->settings = $settings;
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