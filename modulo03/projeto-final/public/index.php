<?php

ini_set('display_errors', 1);

include '../vendor/autoload.php';


use App\Controller\ErrorController;

// $connection = Connection::getConnection();


// $query = 'SELECT * FROM tb_category;';

// $preparacao = $connection->prepare($query);
// $preparacao->execute();


// var_dump($preparacao->fetch());



// while ($registro = $preparacao->fetch()) {
// var_dump($registro);
// }



$url = explode('?', $_SERVER['REQUEST_URI'])[0];

$routes = include '../config/routes.php';

if (isset($routes[$url]) === false) {
  // cria o objeto somente para ser usado no momento
  (new ErrorController())->notFoundAction();
  exit;
}

$controllerName = $routes[$url]['controller'];
$methodName = $routes[$url]['method'];

(new $controllerName())->$methodName();