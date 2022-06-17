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

  public function editAction(): void
  {
    parent::render('product/edit');
  }
}