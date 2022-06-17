<h1>Editar Produto</h1>


<form action="" method="post">
  <?php 
        extract($data);    
    ?>

  <label for="name">Nome</label>
  <input value="<?php echo $product ['name']; ?>" id="name" name="name" type="text" class="form-control mb-3">

  <label for="description">Descrição</label>
  <textarea id="description" name="description"
    class="form-control mb-3"><?php echo $product ['description']; ?></textarea>

  <label for="price">Preço</label>
  <input value="<?php echo $product ['price']; ?>" id="price" name="price" type="text" class="form-control mb-3">

  <label for="quantity">Quantidade</label>
  <input value="<?php echo $product ['quantity']; ?>" id="quantity" name="quantity" type="text"
    class="form-control mb-3">

  <label for="photo">Foto</label>
  <input value="<?php echo $product ['photo']; ?>" id="photo" name="photo" type="text" class="form-control mb-3">


  <button class="btn btn-primary mb-3">Atualizar</button>


</form>