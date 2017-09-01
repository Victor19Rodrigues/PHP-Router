<?php 
use Application\libs\Route;
use Application\controllers\Home;
use Application\controllers\Articles;

$router->add(new Route('/', 'GET', Home::class.':index'));

/*
 * REST Articles
 */

$router->add(new Route('/articles', 'GET', Articles::class.':index'));
$router->add(new Route('/articles/{:numeric}', 'GET', Articles::class.':show'));
$router->add(new Route('/articles/{:numeric}', 'DELETE', Articles::class.':destroy'));
$router->add(new Route('/articles/new', 'GET', Articles::class.':new'));
$router->add(new Route('/articles', 'POST', Articles::class.':create'));
$router->add(new Route('/articles/{:numeric}/edit', 'GET', Articles::class.':edit'));
$router->add(new Route('/articles/{:numeric}', 'PUT', Articles::class.':update'));