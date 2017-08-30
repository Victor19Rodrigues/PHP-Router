<?php
namespace Application\libs;
use Application\libs\DAO;

class Model 
{
	public $db;

	public function __construct()
	{
		$this->db = new DAO;
	}

	public function setParams(Array $params) {
		foreach ($params as $key => $value) {
			$this->$key = $value;
		}
	}
}