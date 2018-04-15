<?php 
class MySqlProcedure {
	private $executer;

	public function __construct(MySqlConfig $config = null) {
		$this->executer = new MySqlExecuter($config);
	}

	/**
	 * Execute a procedure. If sucess return true, else false.
	 * 
	 * @param string $procedure
	 * @return boolean
	 */
	public function callProcedureWithBooleanResult($procedure) {
		return $this->executer->execute("call $procedure");
	}

	/**
	 * Execute a procedure and return data in associative array
	 * 
	 * @param string $procedure
	 * @return array
	 */
	public function callProcedure($procedure) {
		$dataSet = $this->executer->execute("call $procedure");
		return MySqlOrganizer::organizeInAssociativeArray($dataSet);
	}
}
?>