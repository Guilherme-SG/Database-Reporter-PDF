<?php 
class MySqlCRUD {
	private $executer;
	private $protector;

	public function __construct(MySqlConfig $config = null) {
		$this->executer = new MySqlExecuter($config);
		$this->protector = new MySqlProtector(MySqlConnection::generate($config ? $config : new MySqlConfig()));
	}

	/**
	 * Execute a insert in a table.
	 * 
	 * Parameter $data should be a associative array that each key
	 * represents a field in the table.
	 * 
	 * This method protects data against SQL Injection
	 * 
	 * @param string $table
	 * @param array $data
	 * @param string $where
	 * @return boolean
	*/
	public function insert($table, array $data){
		$data = $this->protector->arraySQLProtection($data);

		// Separate fields from the values
		$fields = implode(', ', array_keys($data));
		$values = "'" . implode("', '", $data) . "'";

		// Build and execute the query
		$query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
		return $this->executer->execute($query);	
	}
	
	/**
	 * Execute a select in a table.
	 * 
	 * Selected data will be returned as a matrix. Each row contains
	 * a associative array that represents the columns.
	 * 
	 * Access data by $dataset[row][column]
	 * Ex: $dataset[0]["id"]
	 * 
	 * Columns name are equal to fields param  
	 * 
	 * This method protects data against SQL Injection
	 * 
	 * @param string $table
	 * @param string $params
	 * @param array||boolean $fields 
	 * @return boolean||array
	*/
	public function read($table, $params = null, $fields = "*"){
		$fields = ($fields == "*") ? $fields : implode(', ', $fields);
		$params = ($params) ? " {$params}" : null;		

		// Build and execute the query
		$query = "SELECT {$fields} FROM {$table}{$params}";	
		$result = $this->executer->execute($query);

		// Return false if not found
		if(!$result || mysqli_num_rows($result) <= 0) {
			return false;
		}	
		
		return MySqlOrganizer::organizeInAssociativeArray($result);
	}	

	/**
	 * Execute a update in a table. Be careful with update without where.
	 * 
	 * Parameter $data should be a associative array that each key
	 * represents a field in the table.
	 * 
	 * This method protects data against SQL Injection
	 * 
	 * @param string $table
	 * @param array $data
	 * @param string $where
	 * @return boolean
	*/
	public function update($table, array $data, $where = null) {
		$data = $this->protector->arraySQLProtection($data);

		foreach ($data as $key => $value) {
			$fields[] = "{$key} = '{$value}'";
		}

		// Transforms fields in an string separated by comma
		$fields = implode(', ', $fields);		

		$where = ($where) ? " {$where}" : null;		

		// Build and execute the query
		$query = "UPDATE {$table} SET {$fields}{$where}";
		return $this->executer->execute($query);
	}

	/**
	 * Execute a delete in a table. Be careful with delete without where
	 * 
	 * This method protects data against SQL Injection
	 * 
	 * @param string $table
	 * @param string $where
	 * @return boolean
	*/
	public function delete($table, $where = null) {
		// Build and execute the query
		$query = "DELETE {$table} {$where}";
		return $this->executer->execute($query);
	}
}
?>