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
    <link rel="stylesheet" href="../../css/admin/admin.css">
    <link rel="stylesheet" href="../../css/admin/style.css">

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
                    <li><a class="nav-item" href="admin.php">HOME</a></li>
                    <li><a class="nav-item" href="registrar_carro.php">CADASTRAR CARRO</a></li>
                    <li><a class="nav-item" href="saida_Carro.php">SAIDA DE CARRO</a></li>
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
                    <li><a class="nav-item" href="admin.php">HOME</a></li>
                    <li><a class="nav-item" href="registrar_carro.php">CADASTRAR CARRO</a></li>
                    <li><a class="nav-item" href="saida_carro.php">SAIDA DE CARRO</a></li>
                    <li><a class="nav-item" href="relatorio.php">RELATORIO</a></li>
                </ul>
            </nav>
        </label>
    </header>

    <main class="container" style="min-width: 300px; margin-top: 4%; margin-bottom: 4%;">
        <div class="row">
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <div class="row">
            <h2 class="col l6 offset-l3 black-text">Carros estacionados</h2>
        </div>
        <div class="row">
            <?php
            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //Setar a quantidade de itens por página
            $qnt_result_pg = 20;

            //Calcular o inicio da visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            $query_consulta = "SELECT placa,entrada,numero_vaga FROM carros  INNER JOIN vagas ON fk_vagas = pk_vagas WHERE ocupado LIKE 1 LIMIT $inicio, $qnt_result_pg";
            $consulta = mysqli_query($con, $query_consulta);
            while ($infocarro = mysqli_fetch_assoc($consulta)) { ?>
                <div class="col s12 m6 l3 xl3 ">
                    <div class="card-panel cinza" id="card">
                        <span class="cinza-text">
                            <?php
                            echo "Placa: " . $infocarro['placa'] . "<br>";
                            echo "Entrada: " . $infocarro['entrada'] . "<br>";
                            echo "Vaga: " . $infocarro['numero_vaga'] . "<br>";
                            ?>
                        </span>
                        <button onclick="redireciona()" type="button" id="btn-registra" class="btn waves-effect waves-light btn">
                            Saida
                        </button>
                    </div>
                </div>
            <?php
            } ?>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col s12 m12 l12 xl12">
                    <?
                    $result_pg = "SELECT COUNT(pk_carros) AS num_result FROM carros";
                    $resultado_pg = mysqli_query($con, $result_pg);
                    $row_pg = mysqli_fetch_assoc($resultado_pg);
                    //Quantidade de pagina
                    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                    //Limitar os links antes e depois
                    $max_links = 10;
                    echo "<a  href='admin.php?pagina=1'>Primeira</a>";

                    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                        if ($pag_ant >= 1) {
                            echo "<a href='admin.php?pagina=$pag_ant'> $pag_ant </a>";
                        }
                    }

                    echo " $pagina ";
                    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina = $max_links; $pag_dep++) {
                        if ($pag_dep <= $quantidade_pg) {
                            echo "<a href='admin.php?pagina=$pag_dep'> $pag_dep </a>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="">
        <img src="../../img/logo2.png" alt="">
    </footer>

    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script src="../../js/form-login.js"></script>

    <script>
        function redireciona() {
            window.location.href = "login.php"
        }
    </script>
</body>

</html>