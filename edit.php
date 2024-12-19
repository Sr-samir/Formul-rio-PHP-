<?php
session_start();
require 'config.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include('nav-bar.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            $usuario_id = intval($_GET['id']);

                            // Usar prepared statement para evitar injeção de SQL
                            $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = ?");
                            $stmt->bind_param("i", $usuario_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $usuario = $result->fetch_assoc();
                        ?>
                                <form action="acoes.php" method="POST">
                                    <input type="hidden" name="usuario_id" value="<?= htmlspecialchars($usuario['id']) ?>">
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" class="form-control">

                                        <label>Email</label>
                                        <input type="text" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" class="form-control">

                                        <label>Telefone</label>
                                        <input type="tel" name="telefone" value="<?= htmlspecialchars($usuario['telefone']) ?>" class="form-control">

                                        <label>Data de nascimento</label>
                                        <input type="date" name="data_nascimento" value="<?= htmlspecialchars($usuario['data_nascimento']) ?>" class="form-control">

                                        <label>Endereço</label>
                                        <input type="text" name="endereco" value="<?= htmlspecialchars($usuario['endereco']) ?>" class="form-control">

                                        <label>CRM</label>
                                        <input type="text" name="crm" value="<?= htmlspecialchars($usuario['crm']) ?>" class="form-control">

                                        <label>Especialidade 1</label>
                                        <input type="text" name="especialidade1" value="<?= htmlspecialchars($usuario['especialidade1']) ?>" class="form-control">

                                        <label>Especialidade 2</label>
                                        <input type="text" name="especialidade2" value="<?= htmlspecialchars($usuario['especialidade2']) ?>" class="form-control">

                                        <div class="mb-3">
                                            <button type="submit" name="update_usuario" class="mt-5 btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "<div class='alert alert-warning'>Nenhum registro encontrado para o ID fornecido.</div>";
                            }
                            $stmt->close();
                        } else {
                            echo "<div class='alert alert-danger'>ID inválido ou não fornecido.</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>