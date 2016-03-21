<?php
class Connect
{
	private $dbname;
	private $dbhost;
	private $db_pass;
	private $db_user;
	public function __construct() {
		$connect_info = require_once( './config/connect-config.php' );
		$this->dbhost=$connect_info['db_host'];
		$this->dbname=$connect_info['db_name'];
		$this->db_pass=$connect_info['db_password'];
		$this->db_user=$connect_info['db_user'];
	}
	public function getConnect() {
		$mysqli = new mysqli($this->dbhost, $this->db_user, $this->db_pass, $this->dbname)
		or die('No connect to db');
		$mysqli->set_charset('utf8');
		return $mysqli;
	}
}