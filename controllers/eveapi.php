<?php

class Eveapi{
	private $keyid = "";
	private $vcode = "";
	private $base;
	
	function __construct($base){
		$this->base = $base;
	}
	
	function setAPI($keyid, $vcode){
		if(isset($keyid) && isset($vcode)){
			$this->keyid = $keyid;
			$this->vcode = $vcode;
			return true;
		}else{
			return false;
		}
	}
	
	public function index(){
		$this->base->loadView("nocontent");
	}
	
}