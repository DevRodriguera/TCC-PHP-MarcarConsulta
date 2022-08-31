<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRSaúde</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
  <main>
    <div class="container">
      <form action="../controller/sistema.php" method="post">
        <input type="hidden" name="type" value="admLogin">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="admUsername" id="username" placeholder="Informe o usuário">
          <label for="floatingInput">Username:</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="admPassword" id="Password" placeholder="Informe o usuário">
          <label for="floatingInput">Password:</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" name="admHealthCenter" id="admHealthCenter" aria-label="Informe o usuário">
            <option value="1">Santa Maria</option>
            <option value="2">Boava</option>
            <option value="3">Centro</option>
          </select>
          <label for="floatingInput">Posto de saúde:</label>
        </div>
        <div class="d-grid gap-2 d-lg-block">
          <button class="btn btn-outline-success" type="submit" value="admLogin">Entrar</button>
        </div>
      </form>
      <div>
        teste de commmit
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>