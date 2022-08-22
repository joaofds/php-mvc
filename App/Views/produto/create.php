<div class="jumbotron jumbotron-fluid mt-5">
  <div class="container">
    <h1 class="display-3">Produtos</h1>
    <p class="lead">Cadastro de produtos</p>
    <hr class="my-2">

    <div class="row mt-5">
      <div class="col-md-6">
        <form id="form-produto">
          <div class="form-group">
            <label for="nome">Produto</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto..." required>
          </div>

          <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" class="form-control moeda" id="preco" name="preco" value="" required>
          </div>

          <div class="form-group">
            <label for="cor">Cor</label>
            <select class="form-control" name="cor" id="cor" required>
              <?php foreach ($data as $cor) { ?>
                <option value="<?php echo $cor; ?>"><?php echo $cor; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="row text-right">
            <div class="col">
              <button id="salvar" class="btn btn-success btn-md" type="submit">Salvar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>