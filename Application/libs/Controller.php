<?php 
namespace Application\libs;
/**
* 
*/
class Controller
{
	public $params;

	public function __construct($params = [])
	{
		$this->params = $params;
	}

	public function render($view, $data = null) {
		include_once 'views/layouts/main_layout.php';
	} 
}