<?php
/**
 * Login controller
 *
 * @author     Jaap-Willem Dooge <Jaap-Willem.Dooge@outlook.com>
 * @copyright  2013 Jaap-Willem Dooge
 * @license    http://creativecommons.org/licenses/by-sa/3.0/   Creative Commons Attribution-ShareAlike 3.0 Unported License
 * @link       https://github.com/DoogeJ/evecomm
 */
 
class Login extends Controller{
	public $pagetitle = "Login";
	
	public function index(){
		$this->base->loadView("login/loginform");
	}
	
	public function check(){
		$this->base->userModel = $this->base->loadModel("user");
		$login = $this->base->userModel->checkLogin($_POST["username"], $_POST["password"]);
		if($login){
			$_SESSION["login"] = true;
			$_SESSION["userid"] = $login["userID"];
			$_SESSION["username"] = $login["username"];
			$_SESSION["rights"] = $login["rights"];
			$_SESSION["language"] = $login["language"];
			$this->base->language->setLanguage($login["language"]);
			$this->base->loadView("dashboard");
		}else{
			$this->base->loadView("login/loginform");
		}
	}
	
	public function logout(){
		$_SESSION = array();
		session_destroy();
		$this->base->loadView("login/loginform");
	}
}