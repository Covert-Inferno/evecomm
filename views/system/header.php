<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo($this->settings->title); ?> :: <?php echo($this->pagetitle); ?></title>
	<meta charset="UTF-16">
	<style>
		*{
			font-family: Tahoma, Verdana, Arial;
			font-size: 12px;
			padding: 0px;
			margin: 0px;
			-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
			-moz-box-sizing: border-box;    /* Firefox, other Gecko */
			box-sizing: border-box;         /* Opera/IE 8+ */
		}
		
		.topbar{
			width: 100%;
			height: 35px;
			font-size: 20px;
			padding: 5px;
			color: #fff;
			background-color: #000;
		}
		
		.content{
			width: 100%;
			padding: 2px;
			padding-top: 6px;
		}
		
		.dialog{
			margin: 0px auto;
			width: 500px;
			border: 1px #000 solid;
		}
		
		.dialogtitle{
			width: 100%;
			background-color: #000;
			color: #fff;
			height: 30px;
			font-size: 16px;
			padding: 5px;
		}
		
		.dialogcontent{
			padding: 5px;
		}
		
		input{
			padding: 2px;
			font-size: 13px;
		}
		
		a{
			text-decoration: none;
			color: #f00;
		}
		
		a:hover{
			color: #f90;
		}
		
		.footer{
			width: 600px;
			margin: 0px auto;
			color: #aaa;
			text-align: center;
			padding: 10px;
		}
		
		.menu{
			background-color: #303030;
			padding: 5px;
			height: 26px;
			color: #fff;
		}
		.menulinks{
			float: left;
		}
		.menuoptions{
			float: right;
		}
	</style>
</head>
<body>
<div class="topbar"><?php echo($this->settings->title); ?> :: <?php echo($this->pagetitle); ?></div>
<?php
if(isset($_SESSION["login"])){
?>
<div class="menu">
<div class="menulinks">
<a href="index.php">Home</a>
</div>
<div class="menuoptions">
<?php
echo($this->base->language->getString("Logged in as") . " <a href=\"index.php?controller=profile&user=" . $_SESSION["userid"] . "\">" . $_SESSION["username"] . "</a> (<a href=\"index.php?controller=system/login&page=logout\">" . $this->base->language->getString("Logout") . "</a>)");
?>
</div>
</div>
<?php
}
?>
<div class="content">