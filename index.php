<?php require 'config.php'; ?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include('nav-bar.php'); ?>

    <div class="container mt-4 w-140" >
        <?php include('messagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Usuários
                            <a href="usuarios.php" class="btn btn-primary float-end"> Adicionar usuarios</a>
                        </h4>


                        <form action="acoes.php" method="POST" class="d-inline">


                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>email</th>
                                    <th>Telefone</th>
                                    <th>data nascimento</th>
                                    <th>Endereço</th>
                                    <th>Crm</th>
                                    <th>Especialidade1</th>
                                    <th>Especialidade2</th>
                                </tr>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM usuarios';
                                $usuarios = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($usuarios) > 0) {
                                    foreach ($usuarios as $usuario) {
                                ?>



                                        <tr>
                                            <td><?= $usuario['id'] ?></td>
                                            <td><?= $usuario['nome'] ?></td>
                                            <td><?= $usuario['email'] ?></td>
                                            <td><?= $usuario['telefone'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></td>
                                            <td><?= $usuario['endereco'] ?></td>
                                            <td><?= $usuario['crm'] ?>
                                            </td>
                                            <td><?= $usuario['especialidade1'] ?></td>
                                            <td><?= $usuario['especialidade2'] ?></td>
                                            <td>

                                                <a href="edit.php?id=<?= htmlspecialchars($usuario['id']) ?>" class="  btn btn-success btn-sm">Editar</a>


                                                <button type="submit" name="delete_usuario" value="<?= $usuario['id'] ?>" class="mt-2 btn btn-danger btn-sm">Excluir</button>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<h5>Nenhum usuário encontrado</h5>';
                                }
                                ?>
                            </tbody>
                            </thead>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>