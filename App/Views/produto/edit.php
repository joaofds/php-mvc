<div class="jumbotron jumbotron-fluid mt-5">
  <div class="container">
    <h1 class="display-3">Produtos</h1>
    <p class="lead">Editando <?php echo $data->NOME ?? "" ?></p>
    <hr class="my-2">

    <div class="row mt-5">
      <div class="col-md-6">
        <form id="edit-produto">
          <div class="form-group">
            <label for="nome">Produto</label>
            <input type="text" class="form-control" id="produto" placeholder="Nome do produto..."
                   value="<?php echo $data->NOME ?? "" ?>" required>
          </div>

          <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" class="form-control moeda" id="preco" name="preco" required
                   value="<?php echo $data->PRECO ?? "" ?>">
          </div>

          <div class="row text-right">
            <div class="col">
              <button id="atualizar" class="btn btn-success btn-md" type="submit">Salvar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>