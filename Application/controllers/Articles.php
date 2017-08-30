<?php
namespace Application\controllers;
use Application\libs\Controller;
use Application\models\Article;

class Articles extends Controller
{
	#GET /articles
	public function index()
	{
		$article = new Article;
		$article->db->find('articles');
		$this->render('articles/index');
	}

	#GET /articles/new
	public function new()
	{
		$this->render('articles/new');
	}

	#POST /articles
	public function create() 
	{
		$article = new Article();
		$article->setParams($_POST['article']);
		
		echo '<pre>';
		echo var_export($article);
		echo '</pre>';
	}

	#DELETE /articles/{:numeric}
	public function destroy($id)
	{
		$this->redirect('articles');
		exit();
	}
}