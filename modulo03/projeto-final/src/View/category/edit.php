<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<div class="container mt-3">

  <h1>Editar Categoria</h1>

  <form action="" method="post">
    <label for="name">Nome</label>
    <input value="<?php echo $data['name'] ?>" id="name" name="name" type="text" class="form-control mb-3">
    <label for="description">Descrição</label>
    <textarea id="description" name="description"
      class="form-control mb-3"> <?php echo $data['description'] ?> </textarea>

    <button class="btn btn-primary mb-3">Atualizar</button>

  </form>

</div>