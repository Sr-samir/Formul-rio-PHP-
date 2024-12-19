
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <?php include('nav-bar.php');?>

  <div class="container  mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Adicionar usuário
            <a href="index.php" class="btn btn-danger float-end">Voltar</a></h4>
          </div>
          <div class="card-body">
           
            <form  action="acoes.php"method="POST">
              <div class="mb-3">
                <label>Nome</label>
                <input type="text" name=nome class="form-control">

                <label>Email</label>
                <input type="text" name=email class="form-control">

                <label>Telefone</label>
                <input type="tel" name=telefone class="form-control">

                

                <label>Data de nascimento</label>
                <input type="date" name= data_nascimento class="form-control">

                <label>endereço</label>
                <input type="text" name=endereco class="form-control">

                <label>Crm</label>
                <input type="text" name=crm class="form-control">

                <label>Especialidade 1</label>
                <input type="text" name=especialidade1 class="form-control">

                <label>Especialidade 2</label>
                <input type="text" name=especialidade2 class="form-control">

                <div class="mb-3">
                  <button  type="submit" name="create_usuario" class=" mt-5  btn btn-primary">
                    Salvar
                  </button>
                </div>

              </div>
            </form>
          

          </div>
        </div>
      </div>
    </div>
  </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>