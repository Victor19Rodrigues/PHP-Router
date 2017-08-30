<?php 
namespace Application\libs;
use mysqli;

class DAO
{
	private $conn;

	public function __construct()
	{
		$host = 'localhost'; 
		$user = 'root';
		$pass = 'root';
		$db = 'COM222';
		$this->conn = new mysqli($host, $user, $pass, $db);
		$this->conn->set_charset('utf8');
	}

	public function find($table,Array $attrs = null, Array $cond = null) {
		$q = 'SELECT ' . ($attrs === null? '*' : implode(',', $attrs)) . " FROM $table ";
		if ($cond !== null) {
			$q .= 'WHERE ';
			foreach ($cond as $key => $value) {
				$q .= "$key='$value' AND ";
			}
			$q = substr($q, 0, -4);
		}	
		echo $q;
		return $this->conn->query($q)->fetch_assoc();
	}
}