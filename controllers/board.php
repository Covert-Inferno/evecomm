<?php

class Board extends Controller{
	public $pagetitle = "Board";
	
	public function index(){
		$this->base->loadView("system/nocontent");
		
	}
}