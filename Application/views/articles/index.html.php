<h1>All articles here</h1>
<?php if(isset($articles->many)): ?>
	<?php foreach ($articles->many as $article): ?>
	<a href="/articles/<?=$article->id?>">Ver: <?= $article->titulo ?></a>
	</br>	
	<?php endforeach ?>
<?php elseif(isset($articles->id)): ?>
	<a href="/articles/<?=$articles->id?>">Ver: <?= $articles->titulo ?></a>
	</br>	
<?php endif ?>

</br>
<a href="/articles/new">New Article</a>

