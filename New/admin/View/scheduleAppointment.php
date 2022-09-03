<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRSaúde</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
  <header>
    <?php include_once "nav.php";?>
  </header>
  <main>
    <div class="container">
      <div class="row mt-5 mb-5">
        <div class="col">
          <h1>Agendar Consulta</h1>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <form action="" method="post">
            <div class="form-floating mb-4">
              <input type="text" name="" id="" class="form-control" id="pacienteId" placeholder="name@example.com">
              <label for="Floating label ID">ID/SUS</label>
            </div>
            <div class="form-floating mb-4">
              <select class="form-select" name="" id="" aria-label="Floating label select example">
                <option>Posto 1</option>
                <option>Posto 2</option>
                <option>Posto 3</option>
              </select>
              <label for="floatingSelect">Paciente</label>
            </div>
            <div class="form-floating mb-4">
              <select class="form-select" name="" id="" aria-label="Floating label select example">
                <option>Posto 1</option>
                <option>Posto 2</option>
                <option>Posto 3</option>
              </select>
              <label for="floatingSelect">Area</label>
            </div>
            <div class="form-floating mb-4">
              <select class="form-select" name="" id="" aria-label="Floating label select example">
                <option>Posto 1</option>
                <option>Posto 2</option>
                <option>Posto 3</option>
              </select>
              <label for="floatingSelect">Profissionais disponiveis</label>
            </div>
            <div class="form-floating mb-4">
              <input type="date" name="" id="" class="form-control" placeholder="">
              <label for="">A data</label>
            </div>
            <button type="submit" class="btn btn-outline-primary mx-auto" value="agendarConsulta">Agendar</button>
          </form>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>