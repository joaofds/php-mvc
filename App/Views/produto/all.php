<div class="jumbotron jumbotron-fluid mt-5">
  <div class="container">
    <h1 class="display-3">Produtos</h1>
    <p class="lead">Listagem de produtos.</p>
    <hr class="my-2">

    <div class="row mt-5">
      <div class="col">
        <table class="table table-striped" id="produtos">
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
            <tr>
              <th scope="row"><?php echo $key + 1?></th>
              <td><?php echo $data[$key]->NOME ?></td>
              <td>R$: <?php echo $data[$key]->PRECO ?></td>
              <td><?php echo $data[$key]->COR ?></td>
              <td style="width: 64px;">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                  <div class="dropdown-menu">
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