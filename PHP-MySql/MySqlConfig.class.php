<?php 
class MySqlConfig{
	private $host;
	private $username;
	private $password;
	private $database;
	private $charset;

 	// Define here the default config for the connection 
	function __construct($host = "", $username = "", $password = "", 
		$database = "", $charset = "") {
		$this->host 		= $host;
		$this->username 	= $username;
		$this->password 	= $password;
		$this->database 	= $database;
		$this->charset 		= $charset;
	}

	function getHost() {
		return $this->host;
	}

	function getUsername() {
		return $this->username;
	}

	function getPassword() {
		return $this->password;
	}

	function getDatabase() {
		return $this->database;
	}

	function getCharset() {
		return $this->charset;
	}				
}
?>		