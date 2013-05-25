<?php

class Eveapi extends Controller{
	private $keyid = "";
	private $vcode = "";
		
	function setAPI($keyid, $vcode){
		if(isset($keyid) && isset($vcode)){
			$this->keyid = $keyid;
			$this->vcode = $vcode;
			return true;
		}else{
			return false;
		}
	}
	
}