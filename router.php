<?php

// :  _

require_once 'libs/router.php';
require_once 'app/controllers/productAPIController.php';
require_once 'app/controllers/categoryAPIController.php'; 

$router = new Router();

//                    URL-ENDPOINT/VERBO/CONTROLLER/MÉTODO
$router -> addRoute ('products','GET','productAPIController','getAll');
$router -> addRoute ('categories','GET', 'categoryAPIController','getAll');
$router -> addRoute ('products/:ID', 'PUT','productAPIController','updateProduct');
$router -> addRoute ('categories/:ID', 'PUT','categoryAPIController','updateCategory');
$router -> addRoute ('api/products/:ID/price/','GET','productAPIController','orderByPrice'); //hacer metodo

$router -> route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
