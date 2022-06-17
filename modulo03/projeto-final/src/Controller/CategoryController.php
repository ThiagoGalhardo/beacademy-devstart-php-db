<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;

class CategoryController extends AbstractController
{
  public function listAction(): void
  {
    $connection = Connection::getConnection();

  $result = $connection->prepare('SELECT * FROM tb_category');
  $result->execute();
    
    parent::render('category/list', $result);
  }

  public function addAction(): void
  {
    parent::render('category/add');
  }

  public function editAction(): void
  {
    parent::render('category/edit');
  }
}