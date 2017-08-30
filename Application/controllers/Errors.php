<?php
namespace Application\controllers;
use Application\libs\Controller;

class Errors extends Controller
{
	public function notFound() {
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
		$this->render('errors/404',['title' => 'Page Not Found']);
	}
}