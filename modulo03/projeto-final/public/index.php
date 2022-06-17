<?php

ini_set('display_errors', 1);

include '../vendor/autoload.php';

$database = 'db_store';
$username = 'thiago';
$password = 'livre';

$connection = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);

var_dump($connection);

$query = 'SELECT * FROM tb_category;';

$preparacao = $connection->prepare($query);
$preparacao->execute();


// var_dump($preparacao->fetch());



while ($registro = $preparacao->fetch()) {
var_dump($registro);
}

// use App\Controller\IndexController;
// use App\Controller\ProductController;
// use App\Controller\ErrorController;

// $url = explode('?', $_SERVER['REQUEST_URI'])[0];

// echo $url;

// function createRoute(string $controllerName, string $methodName)
// {
//   return [
//     'controller' => $controllerName,
//     'method' => $methodName
//   ];

// }

// $routes = [
    // simplificando utilizando lógica
  // '/' => createRoute(IndexController::class, 'indexAction'),
  // '/produtos' => createRoute(ProductController::class, 'listAction'),
  // '/produtos/novo' => createRoute(ProductController::class, 'addAction'),
  // '/produtos/editar' => createRoute(ProductController::class, 'editAction')


  // '/' => [
  //   'controller' => IndexController::class,
  //   'method' => 'indexAction'
  // ],
  // '/produtos' =>[
  //   'controller' => ProductController::class,
  //   'method' => 'listAction'
  
// ];

// if (isset($routes[$url]) === false) {
  // $error = new ErrorController();
  // $error->notFoundAction();

  // pra não precisar instanciar e chamar o método como acima
  // cria o objeto somente para ser usado no momento
//   (new ErrorController())->notFoundAction();
//   exit;
// }

// $controllerName = $routes[$url]['controller'];
// $methodName = $routes[$url]['method'];

// (new $controllerName())->$methodName();

// var_dump($routes[$url]);


// $c= new IndexController();
// $c->indexAction();

// $c->loginAction();

// $product = new ProductController();
// $product->listAction();
// $product->addAction();
// $product->editAction();