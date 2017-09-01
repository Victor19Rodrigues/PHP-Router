<?php
namespace Application\controllers;
use Application\libs\Controller;
use Application\models\Article;

class Articles extends Controller
{
	public function __construct()
	{
		$this->article = new Article;
		if(isset($_REQUEST['article'])) {
			$params = $_REQUEST['article'];
			$this->article->setParams($params, ['titulo','texto']);
		}
	}

	#GET /articles
	public function index()
	{
		$this->article->find('articles');
		$this->render('articles/index', ['articles'=>$this->article]);
	}

	#GET /articles/{:numeric}
	public function show($id) 
	{
		$this->article->id = $id;
		$this->article->find('articles');
		$this->render('articles/show', ['article'=>$this->article]);
	}

	#GET /articles/new
	public function new()
	{
		$this->render('articles/new');
	}

	#GET /articles/{:numeric}/edit
	public function edit($id)
	{
		$this->article->id = $id;
		$this->article->find('articles');
		$this->render('articles/edit', ['article'=>$this->article]);
	}

	#POST /articles
	public function create() 
	{
		$this->article->save('articles');
		//$this->redirect('/');	
	}

	#PATCH,PUT /articles/{:numeric}
	public function update($id) 
	{
		$this->article->id = $id;
		$this->article->update('articles');
		//$this->redirect("articles/$id");
	}

	#DELETE /articles/{:numeric}
	public function destroy($id)
	{
		$this->article->id = $id;
		$this->article->destroy('articles');
		$this->redirect('articles');
	}
}






