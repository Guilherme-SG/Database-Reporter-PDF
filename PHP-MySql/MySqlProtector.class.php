<?php 
class MySqlProtector {
	private $connection;

	public function __construct(Mysqli $connection) {
		$this->connection = $connection;
	}

	public function arraySQLProtection(array &$array) {					
		array_walk_recursive($array, [$this, 'stringSQLProtection']);
		return $array;
	}

	public function stringSQLProtection($value) {
		// Protect strings against sql injection
		return $this->connection->real_escape_string($value);
	}
}
?>