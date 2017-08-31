<?php 
namespace Application\libs;
use mysqli;
use Exception;

class DAO
{
	private $conn;
	private $sql;
	private $result;

	public function __construct()
	{
		$host = 'localhost'; 
		$user = 'root';
		$pass = 'root';
		$db = 'COM222';
		$this->conn = new mysqli($host, $user, $pass, $db);
		$this->conn->set_charset('utf8');
		$this->sql = '';
	}

	public function select(String $table, Array $attrs = null) 
	{
		$this->sql = 'SELECT ' . ($attrs == null? '*' : implode(',', $attrs)) . " FROM $table";
		return $this;
	}

	public function insert(String $table, Array $values)
	{
		$this->sql = "INSERT INTO $table(";
		$p1 = '';
		$p2 = '';
		foreach ($values as $key => $value) {
			$p1 .= "$key,";
			$p2 .= "'$value',";
		}
		$p1 = substr($p1, 0, -1);
		$p2 = substr($p2, 0, -1);

		$this->sql .= "$p1) VALUES ($p2)";
		return $this;
	}

	public function update(String $table, Array $set)
	{
		$this->sql = "UPDATE $table SET ";
		foreach ($set as $key => $value) {
			$this->sql .="$key='$value', ";
		}
		$this->sql = substr($this->sql, 0, -1);
		return $this;
	}

	public function delete(String $table) 
	{
		$this->sql = "DELETE FROM $table";
		return $this;
	}

	public function where(String $condition, Array $values = null) 
	{	
		if($values !== null) {
			$this->sql .= ' WHERE ' . str_replace(array_keys($values), array_values($values), $condition);
		} else {
			$this->sql .=  " WHERE $condition";
		}

		return $this;
	}
		
	public function run()
	{
		//$this->result = $this->conn->query($this->query);
		echo $this->sql;
		//return $this->result;
	}

	public function escapeParams(&$params)
	{
		if(is_array($params)) 
		{
			foreach ($params as $key => $param) {
				$params[$key] = $this->conn->escape_string($param);
			}
		} else {
			$param = $this->conn->escape_string($params);
		} 
	}
}










