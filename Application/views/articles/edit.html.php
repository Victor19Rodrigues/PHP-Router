<h1>Change article content</h1>
<form action="/articles/<?= $article->id ?>" method="POST"><br>
	<input type="hidden" name="_method" value="PUT"><br>
	<input type="text" name="article[titulo]" value="<?= $article->titulo ?>"><br>
	<textarea name="article[texto]">
		<?= $article->texto ?>
	</textarea> <br>
	<input type="submit" value="Update"><br>
</form>
<a href="/articles">go back.</a>