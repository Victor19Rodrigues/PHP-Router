<?php
namespace Application\libs;
use Application\libs\DAO;

abstract class Model 
{

	private function dbConnect() 
	{
		return new DAO;
	}
	
	public function setParams(Array $params, Array $filter) 
	{
		$params = array_filter( $params, function ($key) use ($filter) {
        	return in_array($key, $filter);
    	}, ARRAY_FILTER_USE_KEY);

		foreach ($params as $key => $value) 
		{
			$this->$key = $value;
		}

		if(!$this->validateParams()) {
			exit();
		}		
	}

	abstract public function validateParams();
	
	public function save(String $table)
	{
		$db = $this->dbConnect();
		$params = get_object_vars($this);
		$db->escapeParams($params);
		$db->insert($table, $params)
		   ->run();
	}

	public function find(String $table, Array $attrs = null)
	{
		$db = $this->dbConnect();
		$params = get_object_vars($this);
		$db->escapeParams($params);
		$db->select($table,$attrs);
		if(isset($this->id)) {
			$db->where("id = ':id'", [':id' => $this->id]);
		}
		$db->run();
	}

	public function update(String $table)
	{
		$db = $this->dbConnect();
		$params = get_object_vars($this);
		$db->escapeParams($params);
		$db->update($table, $params)
		   ->where("id = '{$params['id']}'")
		   ->run();
	}

	public function destroy(String $table)
	{
		$db = $this->dbConnect();
		$id = get_object_vars($this)['id'];
		$db->escapeParams($id);
		$db->delete($table)
		   ->where("id='$id'")
		   ->run();
	}
}




