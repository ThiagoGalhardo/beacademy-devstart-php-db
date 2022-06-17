<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;

class ProductController extends AbstractController
{

  public function listAction(): void
  {
      $connection = Connection::getConnection();

      $result = $connection->prepare('SELECT * FROM tb_product');
      $result->execute();

      parent::render('product/list', $result);

  }

  public function addAction(): void
  {
    $connection = Connection::getConnection();

    if ($_POST){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $photo = $_POST['photo'];
        $createdAt = date('Y-m-d H:i:s');
        $category_id = $_POST['category'];

        $query = "INSERT INTO tb_product 
        (name, description, price, photo, quantity, category_id, created_at) 
        VALUES 
        ('{$name}', '{$description}', '{$price}', '{$photo}', '{$quantity}', '{$category_id}', '{$createdAt}')";

        $result = $connection->prepare($query);
        $result->execute();

        echo 'Produto cadastrado com sucesso!';
    };    
    
    $result = $connection->prepare('SELECT * FROM tb_category');
    $result->execute();

    parent::render('product/add', $result);
  }


  public function removeAction(): void
  {
      $id = $_GET['id'];

      $connection = Connection::getConnection();

      $result = $connection->prepare("DELETE FROM tb_product WHERE id='{$id}'");
      $result->execute();

      parent::renderMessage('Produto excluído com sucesso!');

  }

  public function editAction(): void
  {
      $id = $_GET['id'];

      $connection = Connection::getConnection();

      $categories = $connection->prepare('SELECT * FROM tb_category');
      $categories->execute();

      if ($_POST){

          $name = $_POST['name'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $quantity = $_POST['quantity'];
          $photo = $_POST['photo'];

          $query = "
                  UPDATE tb_product SET
                      name = '{$name}',
                      description = '{$description}',
                      price = '{$price}',
                      quantity = '{$quantity}',
                      photo = '{$photo}'
                  WHERE id='{$id}'
                  ";
          $resultUpdate = $connection->prepare($query);
          $resultUpdate->execute();

          parent::renderMessage('Produto atualizado com sucesso!');

      }

      $product = $connection->prepare("SELECT * FROM tb_product WHERE id='{$id}'");
      $product->execute();

      parent::render('product/edit', [
          'product' => $product->fetch(\PDO::FETCH_ASSOC),
      ]);


      
  }
}