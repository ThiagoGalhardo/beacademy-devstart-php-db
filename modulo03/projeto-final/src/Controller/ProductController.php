<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
// use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
// use Dompdf\Exception;;
// require dirname(dirname(__DIR__)). '/vendor/autoload.php';

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

  public function reportAction(): void
  {
      $con = Connection::getConnection();

      $result = $con->prepare( 'SELECT prod.id, prod.name, prod.quantity, cat.name as category FROM tb_product prod INNER JOIN tb_category cat ON prod.category_id = cat.id');
      $result->execute();

      $content = '';

      while ($product = $result->fetch(\PDO::FETCH_ASSOC)){

          extract($product);

          $content .="
              <tr>
                  <td>{$id}</td>
                  <td>{$name}</td>
                  <td>{$quantity}</td>
                  <td>{$category}</td>
              </tr>
          ";
      }

      $html = "
      <h1>Relatório de Produtos</h1>
      <table border='1' width= '100%'>
          <thead>
              <tr>
                  <th>#ID</th>
                  <th>Produto</th>
                  <th>Saldo disponível</th>
                  <th>Categoria</th>
              </tr>
          </thead>
          <tbody>
              {$content}
          </tbody>
      </table>
      
      
  ";

  $pdf = new Dompdf();
  $pdf->loadHtml($html);
  $pdf->render();
  $pdf->stream();

    }

}