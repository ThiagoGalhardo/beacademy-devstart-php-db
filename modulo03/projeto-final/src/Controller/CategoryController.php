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
    if ($_POST) {
      $name = $_POST['name'];
      $description = $_POST['description'];

      $query = "INSERT INTO tb_category (name, description) VALUES ('{$name}', '{$description}')";

      $connection = Connection::getConnection();

      $result = $connection->prepare($query);
      $result->execute();

      echo 'Pronto, categoria inserida com sucesso';

    }
    parent::render('category/add');
  }

  public function removeAction(): void
  {
      $connection = Connection::getConnection();

      $id = $_GET['id'];

      $query = "DELETE FROM tb_category WHERE id='{$id}'";

      $result = $connection->prepare($query);
      $result->execute();

      echo 'Categoria excluída com sucesso!';

  }



  public function editAction(): void
  {
    parent::render('category/edit');
  }
}