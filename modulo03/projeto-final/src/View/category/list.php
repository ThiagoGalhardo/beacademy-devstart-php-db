<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<h2>List Category</h2>

<table class="table table-hover table-striped">
  <thead class="table-dark">
    <tr>
      <th>#ID</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($category = $data->fetch(\PDO::FETCH_ASSOC)) {

      // $id = $category['id'];
      // $name = $category['name'];
      // $description = $category['description'];

      // faz as extrações e cria variáveis com o mesmo nome, como acima
      extract($category);
      
      echo '<tr>';
      echo "<td>{$id}</td>";
      echo "<td>{$name}</td>";
      echo "<td>{$description}</td>";
      echo "<td>
            <a href='/categorias/editar?id={$id}' class='btn btn-warning btn-sm'>Editar</a>
            <a href='/categorias/excluir?id={$id}' class='btn btn-danger btn-sm'>Excluir</a>
           </td>";
      echo '</tr>';
    }
    ?>
  </tbody>
</table>