<?php
namespace Application\controllers;
use Application\libs\Controller;

class Home extends Controller
{
	public function index()
	{
		$this->render('home');
	}
}