<?php
/**
 * PDO Database wrapper
 *
 * @author     Jaap-Willem Dooge <Jaap-Willem.Dooge@outlook.com>
 * @copyright  2013 Jaap-Willem Dooge
 * @license    http://creativecommons.org/licenses/by-sa/3.0/   Creative Commons Attribution-ShareAlike 3.0 Unported License
 * @link       https://github.com/DoogeJ/evecomm
 */

class Database extends Controller{
	public $pagetitle = "Database";
	private $db_conn;
	
	function __construct($base, $hostname, $database, $username, $password){
		$this->base = $base;
		$this->db_conn = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
	}
	
	// method for select queries
	public function request($query, $vars){
		$stmt = $this->db_conn->prepare($query);
		$stmt->execute($vars);
		//return query result
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	// method for DM (Data Manipulation) statements
	public function change($query, $vars){
		$stmt = $this->db_conn->prepare($query);
		$stmt->execute($vars);
		//return affected rows
		return $stmt->rowCount();
	}
	
}