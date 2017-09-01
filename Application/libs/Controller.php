<?php 
namespace Application\libs;

class Controller
{
	public function render($view, $data = null) 
	{
		if(is_array($data)){
			extract($data);
		}
		include_once 'Application/views/main_layout.html.php';
	} 

	public function redirect($uri)
	{
		$host = $_SERVER['HTTP_HOST'];
		header("Location:http://$host/$uri");
		exit();
	}
}