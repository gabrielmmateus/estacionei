<?php
session_start();
include_once('../conexao.php');
date_default_timezone_set('America/Sao_Paulo');

//Sessão de Coleta das Variáveis
$date=date('h:i:s');
$date = filter_input(INPUT_POST,'entrada');
$vaga = filter_input(INPUT_POST,'vaga');
$placa = filter_input(INPUT_POST,'placa',FILTER_SANITIZE_STRING);

//Sessão de Validação de Placa e Finalização
$pattern = '/^[A-Z]{3}[0-9]{1}[A-Z0-9]{1}[0-9]{2}$/';

if (preg_match_all($pattern,$placa)){
    $_SESSION['msg'] = "<p style='color:#70D44B;'>Placa Válida</p>";

    $query = "INSERT INTO precos VALUES (DEFAULT, NULL)";
    $result = mysqli_query($con, $query);


    $query = "INSERT INTO carros  VALUES (DEFAULT, '$placa', '$date', DEFAULT, '$vaga', DEFAULT)";
    $query_insere = mysqli_query($con,$query);

    $queryatt = "UPDATE vagas SET ocupado = '1' WHERE pk_vagas = '$vaga'";
    $query_att = mysqli_query($con,$queryatt);

    $query = "SELECT * FROM precos";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    echo var_dump($row);
    $preco_id = $row['pk_preco'];

    $queryatt = "UPDATE carros SET fk_preco = '$preco_id' WHERE pk_preco = '$preco_id'";
    $query_att = mysqli_query($con,$queryatt);


    $_SESSION['msg'] = "<p style='color:green;'>Vaga Preenchida com Sucesso</p><br>";
        header("Location: ../../pages/admin/registrar_carro.php"); 


    

}else{
    $_SESSION['msg'] = "<p style='color:red;'>Placa Inválida</p><br>";
    header("Location: ../../pages/admin/registrar_carro.php"); 
}

        



?>