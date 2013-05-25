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
			margin-bottom: 10px;
			color: #fff;
			background-color: #000;
		}
		
		.content{
			width: 100%;
			padding: 2px;
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
	</style>
</head>
<body>
<div class="topbar"><?php echo($this->settings->title); ?> :: <?php echo($this->pagetitle); ?></div>
<div class="content">