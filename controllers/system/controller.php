<?php

class Controller{
	protected $base;
	public $pagetitle = "Home";
	
	function __construct($base){
		$this->base = $base;
	}
	
	public function index(){
		$this->base->loadView("system/nocontent");
	}
	
}