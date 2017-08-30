<!DOCTYPE html>
<html>
<head>
	<title><?= isset($title)? $title : 'Meu Site' ?></title>
</head>
<body>
	<h1>Main Layout</h1>
	<?php include_once 'views/' . $view . '.php'; ?>
</body>
</html>