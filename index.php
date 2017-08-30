<?php
set_include_path(__DIR__.'/Application/');

spl_autoload_register(function ($classname) {
	require_once str_replace('\\', '/', __DIR__ . '/' . $classname . '.php');	
}); 

use Application\libs\Router;
$router = new Router;

$router->doAction();
?>
<a href="/banana/1">1</a>
<a href="/banana/2">2</a>
<a href="/banana/3">3</a>
<a href="/banana/4">4</a>
<a href="/banana/1/cacho/1">caho</a>
<a href="/banana/1/cacho/2">1ad</a>
<pre>
	<?= var_export($action)?>
</pre>