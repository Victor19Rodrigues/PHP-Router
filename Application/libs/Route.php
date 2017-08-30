<?php
namespace Application\libs;
/**
* 
*/

class Route
{

	public $uri;

	public $method;

	public $action;

	public function __construct($uri,$method,$action = null)
	{
		$uri = explode('/', $uri);
		$uri = array_filter($uri);
		$this->uri = array_values($uri);
		unset($uri);
		if(empty($this->uri)) {
			$this->uri[] = '/';
		}
		$this->method = strtoupper($method);
		$this->action = $action;
	}

	public function match(&$other) {
		if(!is_a($other, Route::class)) {
			throw new Exception("Routes can only be compared to other routes.");	
		}

		if (($this->method !== $other->method) || (sizeof($this->uri) !== sizeof($other->uri))) {
			return false;
		}
		foreach ($this->uri as $key => $value) {

			if(($value[0] == '{') && (substr($value, -1) =='}')) {
				$case = substr($value, 1, -1);
				switch ($case) {
					case ':numeric':
						$case = '/[0-9]/';
						break;
					case ':alphanumeric':
						$case = '/[a-z0-9]/i';
						break;

				}
				if(!preg_match($case, $other->uri[$key])) {
					return false;
				}
			} elseif($value !== $other->uri[$key]) {
				return false;
			}
		}
		return true;
	}
}