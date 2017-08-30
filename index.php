<?php
/**
 * Alterando Metodos não suportados por browsers com campo escondido
 * no formulário
 */

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$_SERVER['REQUEST_METHOD'] = isset($_GET['_method']) ? $_GET['_method'] : 'GET';
	$get_attr = strrpos($_SERVER['REQUEST_URI'], '?');
	if($get_attr) {
		$uri_fix = substr($_SERVER['REQUEST_URI'],0 ,$get_attr);
		$_SERVER['REQUEST_URI'] = $uri_fix;
	}
}

/**
 * A função spl_autoload_register irá registrar callbacks para chamadas de classes
 * Não incluidas ainda no script.
 */

spl_autoload_register(function ($classname) {
	require_once str_replace('\\', '/', __DIR__ . '/' . $classname . '.php');	
}); 

use Application\libs\Router;

$router = new Router;

include_once __DIR__.'/Application/Routes.php';

extract($router->doAction());
unset($router);

$controller = new $controller;

call_user_func_array([$controller, $method], $params);
