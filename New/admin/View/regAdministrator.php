<?php
  include_once '../Model/Administrator.php';
  $adm = new Administrator();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saude</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php include_once 'nav.php';?>
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-5 position-absolute top-50 start-50 translate-middle">
          <h1 class="text-center mb-4">Register Administrator</h1>
          <form action="../controller/sistema.php" method="post">
            <input type="hidden" name="type" value="regAdmin">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="admUsername" id="username" placeholder=".">
              <label for="floatingInput">Username:</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="admPassword" id="password" placeholder=".">
              <label for="floatingInput">Password:</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">Function:</label>
            </div>

            <!--<div class="form-floating mb-3">
              <select class="form-select" name="admHealthCenter" id="admHealthCenter" aria-label=".">
                <option value="1">Santa Maria</option>
                <option value="2">Boava</option>
                <option value="3">Centro</option>
              </select>
              <label for="floatingInput">Posto de saúde:</label>
            </div>-->

            <div class="d-grid gap-2">
              <button class="btn btn-success" type="submit" value="admLogin">Entrar</button>
            </div>
          </form>
          <?php
            echo $adm->admShow();
          ?>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>