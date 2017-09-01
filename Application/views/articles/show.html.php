<h1><?= $article->titulo ?></h1>
<p><?= $article->texto ?></p><br><br>
<a href="/articles/<?=$article->id?>/edit">edit</a> 
<a href="/articles/<?=$article->id?>?_method=DELETE">delete</a>
<a href="/articles">go back.</a>