<?php
session_start();
include_once('../../php/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estacionei - Admin</title>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.css" media="screen,projection" />
    <!-- Link CSS -->
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/menu-hamburguer.css">
    <link rel="stylesheet" href="../../css/relatorio/style.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Fonte Google-Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- FavIcon -->
    <!-- <link rel="icon" type="image/x-icon" href="/img/estacionei.svg"> -->
</head>

<body style="font-family: 'Roboto', sans-serif; color: white;">
    <header>
        <img src="../../img/logo.png" alt="" />
        <div>
            <nav class="nav-content">
                <ul class="black">
                    <li><a class="nav-item" href="vagas.php">VISUALIZAR VAGAS</a></li>
                    <li><a class="nav-item" href="lista_funcionario.php">VISUALIAR FUNCIONARIOS</a></li>
                    <li><a class="nav-item" href="admin.php">VISUALIZAR CARROS</a></li>
                    <li><a class="nav-item" href="registrar_carro.php">CADASTRAR CARRO</a></li>
                    <li><a class="nav-item" href="relatorio.php">RELATORIO</a></li>

                </ul>
            </nav>
        </div>
        <button id="login" class="btn waves-effect waves-light btn">LOGOFF</button>

        <input id="menu-hamburguer" type="checkbox">
        <label for="menu-hamburguer">
            <img id="icon-menu" src="../../img/menu.png" alt="">
        </label>
        <label class="menu-hamburguer">
            <nav class="nav-content2">
                <ul class="black">
                    <li><a class="nav-item" href="vagas.php">VISUALIZAR VAGAS</a></li>
                    <li><a class="nav-item" href="lista_funcionario.php">VISUALIAR FUNCIONARIOS</a></li>
                    <li><a class="nav-item" href="admin.php">VISUALIZAR CARROS</a></li>
                    <li><a class="nav-item" href="registrar_carro.php">CADASTRAR CARRO</a></li>

                    <li><a class="nav-item" href="relatorio.php">RELATORIO</a></li>
                </ul>
            </nav>
        </label>
    </header>

    <main class="container">
        <div class="row">
            <div class="col">
                <a href="">
                    <button>Gerar Relatorio</button>
                </a>
            </div>
        </div>
    </main>

    <footer class="">
        <img src="../../img/logo2.png" alt="">
    </footer>

    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script src="../../js/form-login.js"></script>

</body>

</html>