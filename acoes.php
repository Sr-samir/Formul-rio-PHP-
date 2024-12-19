<?php
session_start();
require 'config.php';

if (isset($_POST['create_usuario'])) {

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));

    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));

    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));

    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));

    $endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));

    $crm = mysqli_real_escape_string($conexao, trim($_POST['crm']));

    $especialidade1 = mysqli_real_escape_string($conexao, trim($_POST['especialidade1']));

    $especialidade2 = mysqli_real_escape_string($conexao, trim($_POST['especialidade2']));

    $sql = "INSERT INTO usuarios (nome, email, telefone, data_nascimento, endereco, crm, especialidade1, especialidade2) VALUES ('$nome', '$email','$telefone','$data_nascimento','$endereco','$crm','$especialidade1', '$especialidade2')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {

        $_SESSION['messagem'] = 'Usuário criado com sucesso!';
        header('location:index.php');
        exit;
    } else {
        $_SESSION['messagem'] = 'Usuário não cadastrado';
        header('location:index.php');
    }
}

if (isset($_POST['update_usuario'])) {


    // Sanitize inputs
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
    $crm = mysqli_real_escape_string($conexao, trim($_POST['crm']));
    $especialidade1 = mysqli_real_escape_string($conexao, trim($_POST['especialidade1']));
    $especialidade2 = mysqli_real_escape_string($conexao, trim($_POST['especialidade2']));


    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', telefone = '$telefone',
    endereco = '$endereco', crm = '$crm', especialidade1 = '$especialidade1', especialidade2 = '$especialidade2', data_nascimento = '$data_nascimento' 
             
    WHERE id = '$usuario_id'";         
                 
                 
      
      
          if (mysqli_query($conexao, $sql)) {
              if (mysqli_affected_rows($conexao) > 0) {
                  $_SESSION['messagem'] = 'Usuário atualizado com sucesso!';
                  header('location:index.php');
                  exit;
              } else {
                  $_SESSION['messagem'] = 'Nenhuma alteração foi feita.';
                  header('location:index.php');
                  exit;
              }
          } else {
              $_SESSION['messagem'] = 'Erro ao atualizar usuário.';
              header('location:index.php');
              exit;
          }
      }
                
                
                 
                
      if (isset($_POST['delete_usuario'])) {
        // Sanitiza o ID do usuário passado pelo formulário
        $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);
    
        // Cria a consulta SQL para deletar o usuário
        $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";
    
        // Executa a consulta
        $resultado = mysqli_query($conexao, $sql);
    
        // Verifica se a exclusão foi bem-sucedida
        if ($resultado && mysqli_affected_rows($conexao) > 0) {
            $_SESSION['message'] = 'Usuário deletado com sucesso'; 
        } else {
            $_SESSION['message'] = 'Erro ao deletar o usuário ou usuário não encontrado';
        }
    
        // Redireciona para a página de índice
        header('Location: index.php');
        exit;
    }
    