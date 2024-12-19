<?php
define('HOST','127.0.0.1');
define('USUARIO','root');
define('SENHA','75051985');
define('DB','cadastro_medic');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível connectar');
?>