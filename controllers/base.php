<?php

class Base{
	private $base;

	function __construct(){
		if(session_id() == ''){
			session_start();
		}
		$this->base = $this;
	}
	
	public function loadController($controller){
		$path = "controllers/" . $controller . ".php";
		if(file_exists($path)){
			require_once($path);
			$classname = ucfirst($controller);
			$class = new $classname($this->base);
			return $class;
		}else{
			return false;
		}
	}
	
	public function loadView($view){
		$path = "views/" . $view . ".php";
		if(file_exists($path)){
			include($path);
			return true;
		}else{
			return false;
		}
	}
	
	public function index(){
		$this->base->loadView("nocontent");
	}
}