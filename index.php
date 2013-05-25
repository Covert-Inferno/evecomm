<?php
include("settings.php");
include("controllers/base.php");
$base = new Base();
$eveapi = $base->loadController("eveapi");
if(isset($_GET["controller"])){
	$controller = $base->loadController($_GET["controller"]);
	if(isset($_GET["page"])){
		$controller->$_GET["page"]();
	}else{
		$controller->index();
	}
}


?>