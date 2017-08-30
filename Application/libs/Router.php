<?php
namespace Application\libs;
use Application\libs\Route;
class Router
{
	private $routes = null;
	private $action = 404;
	private $params = null;

	public function __construct()
	{
		$this->routes = [];
	}

	public function add(Route $newRoute) 
	{
		if(is_a( $newRoute, Route::class)) {
			$this->routes[] = $newRoute;	
		} else {
			throw new Exception('To add new routes use an object of Route class.');
		}
	} 

	public function doAction() {
		$requestRoute = new Route($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);
		foreach ($this->routes as $route) {
			if($route->match($requestRoute)) {
				$this->params = array_diff($requestRoute->uri, $route->uri);
				$this->params = array_values($this->params);
				$this->action = explode(':', $route->action);
				break;
			}
		}

		if($this->action !== 404) {
			$controller = new $action[0];
			$controller->$action[1];
		} else {
			header('HTTP/1.0 404 Not Found.', true ,404);
			$controller = new Controller;
			$controller->render('errors/error404');
			die();
		}
		
	}
}