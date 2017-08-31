<?php 
var_dump($article);
?>

<form action="/articles/1" method="POST">
	<input type="hidden" name="_method" value="PUT">
	<input type="text" name="article[titulo]" value="<?= $article->titulo ?>">
	<input type="text" name="article[texto]" value="<?= $article->texto ?>">
	<input type="submit" value="Update">
</form>