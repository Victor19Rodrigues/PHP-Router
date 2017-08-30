<?php
namespace Application\libs;

use Application\libs\Route;
use Application\controllers\Errors;
use Exception;

class Router
{
	private $routes = null;
	private $requestRoute = null;

	public function __construct()
	{
		$request_uri = $_SERVER['REQUEST_URI'];
		$request_method = $_SERVER['REQUEST_METHOD'];
		$this->requestRoute = new Route($request_uri, $request_method);
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
		$params = [];
		$action = [ Errors::class,'notFound'];
		foreach ($this->routes as $route) {
			if($route->match($this->requestRoute)) {
				$params = array_diff($this->requestRoute->uri, $route->uri);
				$params = array_values($params);
				$action = explode(':', $route->action);
				break;
			}
		}

		return ['controller' => $action[0],
				'method' => $action[1], 
				'params' => $params];
	}
}