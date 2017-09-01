<?php
namespace Application\models;
use Application\libs\Model;

class Article extends Model
{
	public function validateParams()
	{ 
		$valid = true;
		if(property_exists($this, 'titulo')) {
			$valid = $valid && is_string($this->titulo);
		}
		if(property_exists($this, 'texto')) {
			$valid = $valid && is_string($this->texto);
		}
		return $valid;
	}
}