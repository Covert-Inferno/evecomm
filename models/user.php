<?php

/**
 * User model
 *
 * @author     Jaap-Willem Dooge <Jaap-Willem.Dooge@outlook.com>
 * @copyright  2013 Jaap-Willem Dooge
 * @license    http://creativecommons.org/licenses/by-sa/3.0/   Creative Commons Attribution-ShareAlike 3.0 Unported License
 * @link       https://github.com/DoogeJ/evecomm
 */
 
 class User extends Model{
	
	public function checkLogin($username, $password){
		$password = hash("sha256", $this->base->settings->db_salt . $password . $this->base->settings->db_pepper);
		$users = $this->base->database->request("SELECT * FROM users WHERE username = ? AND password = ? AND status != 0 LIMIT 1", array($username, $password));
		if(count($users) == 0){
			return false;
		}else{
			return($users[0]);
		}
	}
	
 }