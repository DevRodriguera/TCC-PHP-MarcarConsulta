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
        <div class="col">
          <h1 class="text-center mb-4">Novo usuario</h1>
          <form action="../controller/sistema.php" method="post" class="row">
            <input type="hidden" name="type" value="regAdmin">
            <div class="form-floating col-sm-12 mb-3">
              <input type="text" class="form-control" name="admName" id="admName" placeholder=".">
              <label for="floatingInput">Full name:</label>
            </div>
            <div class="form-floating col-md-6 mb-3">
              <input type="email" class="form-control" name="admEmail" id="admEmail" placeholder=".">
              <label for="floatingInput">Email:</label>
            </div>
            <div class="form-floating col-md-6 mb-3">
              <input type="password" class="form-control" name="admPassword" id="password" placeholder=".">
              <label for="floatingInput">Password:</label>
            </div>
            <div class="form-floating col-sm-12 mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">Function:</label>
            </div>
            <div class="form-floating col-6 mb-3">
              <select name="admSex" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Open</option>
                <option value="m">masculine</option>
                <option value="f">feminine</option>
              </select>
              <label for="floatingSelect">Sex:</label>
            </div>
            <div class="form-floating col-6 mb-3">
              <input type="date" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">Birthday:</label>
            </div>
            <div class="form-floating col-sm-12 mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">CPF:</label>
            </div>
            <div class="form-floating col-sm-5 col-md-3 mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">CEP:</label>
            </div>
            <div class="form-floating col-sm-7 col-md-4 mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">UF:</label>
            </div>
            <div class="form-floating col-sm-12 mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">City:</label>
            </div>
            <div class="form-floating col-sm-12 mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">District:</label>
            </div>
            <div class="form-floating col-sm-12 mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">Street:</label>
            </div>
            <div class="form-floating col-sm-3 mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">Number:</label>
            </div>
            <div class="form-floating col mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">Complement:</label>
            </div>
            <div class="form-floating col mb-3">
              <input type="text" class="form-control" name="admFunction" id="function" placeholder=".">
              <label for="floatingInput">Phone:</label>
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
        </div>
        <div class="col">
          <h1 class="text-center mb-4">Nova funcao</h1>
          <form action="../controller/sistema.php" method="post">
            <input type="hidden" name="type" value="regFunction">
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
        </div>
      </div>
      <div class="row">
        <div class="col">
          <?php echo $adm->admShow();?>
        </div>
        <div class="col">
          <?php echo $adm->admFunctionShow();?>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>