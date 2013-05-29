<?php
include("settings.php");
$settings = new Settings();
include("controllers/system/base.php");
include("controllers/system/controller.php");
$base = new Base($settings);
$eveapi = $base->loadController("system/eveapi");
if(isset($_SESSION["login"])){
	if(isset($_GET["controller"])){
		$controller = $base->loadController($_GET["controller"]);
		if(isset($_GET["page"])){
			$controller->$_GET["page"]();
		}else{
			$controller->index();
		}
	}
}else{
	$login = $base->loadController("system/login");
	if(isset($_GET["page"])){
		$login->$_GET["page"]();
	}else{
		$login->index();
	}
}
?>