<?php

use App\Controller\IndexController;
use App\Controller\CategoryController;
use App\Controller\ProductController;


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
'/produtos/editar' => createRoute(ProductController::class, 'editAction'),
'/categorias' =>createRoute(CategoryController::class, 'listAction')
];

return $routes;