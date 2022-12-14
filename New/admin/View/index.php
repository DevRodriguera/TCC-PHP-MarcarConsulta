<?php
  include_once '../Model/Administrator.php';
  $adm = new Administrator();
  
  if(isset($_GET['errMessage'])){
    echo "<script>
        window.alert('Você não preencheu usuário e/ou senha!');
        javascript:history.go(-1);
      </script>";
  }
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saude</title>
  .bg-image{
    height: 100%;
    filter: blur(5px);
    -webkit-filter: blur(5px);
    background-image: url("../img/bg_login.png");
    background-repeat: no-repeat;
    background-size: cover;
}

.bg-text {
    background-color: rgb(66,86,116);
    background-color: rgba(66,86,116,0.5);
}

body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}
  <link rel="stylesheet" href="./styles/login.scss">
  <link rel="stylesheet" href="./styles/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<!-- <div class="form__group field">
  <input type="input" class="form__field" placeholder="dsadsa" name="name" id='name' required />
  <label for="name" class="form__label">Last name please</label>
</div> -->
<div class="bg-image"></div>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-5 position-absolute top-50 start-50 translate-middle">
          <div class="bg-text">

          <h1 class="text-center ">Saúde em primeiro lugar.</h1>
          <h5 class="text-center mb-5">Acesse com seu usuário e senha !</h3>
          <form action="../controller/dataControl.php" method="post">
            <input type="hidden" name="typeReq" value="admLogin">

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="admEmail" id="email" placeholder="Informe o email">
              <label for="floatingInput" class="form-check-label">Email:</label>
            </div>
            
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="admPassword" id="Password" placeholder="Informe o usuário">
              <label for="floatingInput">Password:</label>
            </div>
            <!--<div class="form-floating mb-3">
              <select class="form-select" name="admHealthCenter" id="admHealthCenter" aria-label="Informe o usuário">
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
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>