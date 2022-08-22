<div class="jumbotron jumbotron-fluid mt-5">
  <div class="container">
    <h1 class="display-3">Produtos</h1>
    <p class="lead">Listagem de produtos.</p>
    <hr class="my-2">

    <div class="row mt-5">
      <div class="col">
        <div class="row">
          <div class="col">
            <div class="form-inline float-right">
              <div class="form-group my-2">
                <input type="text" id="filter-names" class="form-control" placeholder="Filtrar" aria-describedby="helpId">
              </div>
            </div>
          </div>
        </div>
        <table class="table table-striped my-2" id="produtos">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Produto</th>
              <th scope="col">Preço</th>
              <th scope="col">Cor</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($data as $key => $value) { ?>
            <tr data="<?php echo $data[$key]->IDPROD ?>">
              <th scope="row"><?php echo $key + 1?></th>
              <td><?php echo $data[$key]->NOME ?></td>
              <td>R$: <?php echo $data[$key]->PRECO ?></td>
              <td><?php echo $data[$key]->COR ?></td>
              <td style="width: 64px;">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                  <div class="dropdown-menu" id="actions">
                    <a class="dropdown-item" href="#">Editar</a>
                    <a class="dropdown-item" href="#">Deletar</a>
                  </div>
                </div>
              </td>
            </tr>
            <?php }; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>