<?php

ini_set('display_errors', 1);

include '../vendor/autoload.php';

use App\Controller\IndexController;
use App\Controller\ProductController;
use App\Controller\ErrorController;

$url = explode('?', $_SERVER['REQUEST_URI'])[0];

// echo $url;

function createRoute(string $controllerName, string $methodName)
{
  return [
    'controller' => $controllerName,
    'method' => $methodName
  ];

}

$routes = [
    // simplificando utilizando lógica
  '/' => createRoute(IndexController::class, 'indexAction'),
  '/produtos' => createRoute(ProductController::class, 'listAction'),
  '/produtos/novo' => createRoute(ProductController::class, 'addAction'),
  '/produtos/editar' => createRoute(ProductController::class, 'editAction')


  // '/' => [
  //   'controller' => IndexController::class,
  //   'method' => 'indexAction'
  // ],
  // '/produtos' =>[
  //   'controller' => ProductController::class,
  //   'method' => 'listAction'
  
];

if (isset($routes[$url]) === false) {
  // $error = new ErrorController();
  // $error->notFoundAction();

  // pra não precisar instanciar e chamar o método como acima
  // cria o objeto somente para ser usado no momento
  (new ErrorController())->notFoundAction();
  exit;
}

$controllerName = $routes[$url]['controller'];
$methodName = $routes[$url]['method'];

(new $controllerName())->$methodName();

// var_dump($routes[$url]);


// $c= new IndexController();
// $c->indexAction();

// $c->loginAction();

// $product = new ProductController();
// $product->listAction();
// $product->addAction();
// $product->editAction();