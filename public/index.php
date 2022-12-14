<!doctype html>
<html lang="en">
  <head>
    <title>PHP MVC</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/app.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/home">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#appNavBar" aria-controls="appNavBar" 
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="appNavBar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Produtos
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/produto">Listar</a>
              <a class="dropdown-item" href="/produto/create">Cadastrar</a>
            </div>
          </li>
        </ul>
      </div>
      </nav>
    </header>
    
    <div class="php-content">
      <?php require __DIR__ . '/../App/Core/bootstrap.php'; ?>
    </div>
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.inputmask.bundle.min.js"></script>
    <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/app.js"></script>
  </body>
</html>