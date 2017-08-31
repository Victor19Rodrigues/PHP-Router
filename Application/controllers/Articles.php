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
		$article->find('articles');
		$this->render('articles/index');
	}

	#GET /articles/{:numeric}
	public function show($id) 
	{
		$article = new Article;
		$article->setParams(['id' => (int)$id], ['id']);
		$article->find('articles');
		$this->render('articles/show');
	}

	#GET /articles/new
	public function new()
	{
		$this->render('articles/new');
	}

	#GET /articles/{:numeric}/edit
	public function edit($id)
	{
		$article = new Article;
		$article->setParams(['id' => (int)$id], ['id']);
		$article->find('articles');
		$this->render('articles/edit', ['article'=>$article]);
	}

	#POST /articles
	public function create() 
	{
		$article = new Article;
		$article->setParams($_POST['article'], ['texto','titulo']);
		$article->save('articles');
		$this->redirect('/');	
	}

	#PATCH,PUT /articles/{:numeric}
	public function update($id) 
	{
		$article = new Article;
		$params = $_POST['article'];
		$params['id'] = (int)$id;
		$article->setParams($params, ['id', 'titulo', 'texto']);
		$article->update('articles');
		$this->redirect("articles/$id");
	}

	#DELETE /articles/{:numeric}
	public function destroy($id)
	{
		$article = new Article;
		$article->setParams(['id' => (int)$id], ['id']);
		$article->destroy('articles');
		$this->redirect("articles");
	}
}






