<?php 

$router->add(new Route('/','GET','rato:loco'));
$router->add(new Route('/banana/{:numeric}/cacho/{:numeric}','GET','banana:get'));
$router->add(new Route('/banana/{:numeric}','GET','bananaPadrao:get'));