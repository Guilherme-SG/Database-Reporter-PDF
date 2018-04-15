<?php 
class MySqlExecuter {
	const MYSQL_DUPLICATE_KEY_ENTRY = 1062;
	private $connection;

	function __construct(MySqlConfig $config = null){
		// Given null, instantiate a new configuration object with default parameters
		$config = $config ? $config : new MySqlConfig();

		$this->connection = MySqlConnection::generate($config);
	}
	
	function __destruct() {	
		// Close the connection when the object is destroyed
		$this->connection->close();
	}

	public function execute($query) {
		$result = $this->connection->query($query); 

		if(!$result) {
			// Define the exception type error when query fails
			$this->error_handler($this->connection->errno);
		}
		
		// In success case, return the result
		return $result;
	}

	protected function error_handler($errno) {
		switch ($errno) {
			case self::MYSQL_DUPLICATE_KEY_ENTRY:
				throw new MySQLDuplicateKeyException($this->connection->error, $this->connection->errno);
				break;
			
			default:
				throw new MySQLException($this->connection->error, $this->connection->errno);
				break;
		}
	}
	
	
}
?>