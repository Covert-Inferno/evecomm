<?php

class Login extends Controller{
	public $pagetitle = "Login";
	
	public function index(){
		$this->base->loadView("login/loginform");
		
	}
}