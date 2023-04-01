<?php
session_start();
include_once('../../php/conexao.php'); //link ao arquivo de conexão ao banco de dados
$id = filter_input(INPUT_GET, 'pk_usuario', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM funcionario WHERE pk_usuario = '$id'";
$resultado_usuario = mysqli_query($con, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>teste</h1>
</body>
</html>