<?php 
class MySqlConnection {
	public static function generate(MySqlConfig $config) {
		// Open connection
		$connection = new mysqli(
			$config->getHost(), 
			$config->getUsername(), 
			$config->getPassword(), 
			$config->getDatabase()
		) or die('Error connecting to the database');

		// Define charset
		$connection->set_charset($config->getCharset()) 
			or die("Charset wasn's defined as {$config->getCharset()}");

		return $connection;
	}
}
?>