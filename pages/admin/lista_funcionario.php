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
    <title>Login</title>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.css" media="screen,projection" />
    <!-- Link CSS -->
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/menu-hamburguer.css">
    <link rel="stylesheet" href="../../css/funcionario/style.css">

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
                    <li><a class="nav-item" href="saida_Carro.php">SAIDA DE CARRO</a></li>
                    <li><a class="nav-item" href="relatorio.php">RELATORIO</a></li>
                </ul>
            </nav>
        </label>
    </header>
    <main class="container" style="min-width: 300px; margin-top: 4%; margin-bottom: 4%;">
        <div class="row">
            <div class="col l7 offset-l3 black-text">
                <h3>Funcionarios Cadastrados</h3>
            </div>
        </div>

        <div class="row">
            <?php
            $query_consulta = "SELECT pk_usuarios, usuario, email, cargo FROM usuarios";
            $consulta = mysqli_query($con, $query_consulta);
            while ($infofuncionario = mysqli_fetch_assoc($consulta)) {
            ?>
                <div class="col s12 m6">
                    <div class="card-panel cinza" id="card">
                        <div class="card-content">
                            <span class="cinza-text">
                                <?php
                                echo "ID: " . $infofuncionario['pk_usuarios'] . "<br>";
                                echo "Nome: " . $infofuncionario['usuario'] . "<br>";
                                echo "Email: " . $infofuncionario['email'] . "<br>";
                                echo "Cargo: " . $infofuncionario['cargo'] . "<br>";
                                ?>
                            </span>
                        </div>
                        <div class="card-action">
                            <button onclick="redireciona('edit')" type="button" id="btn" class="btn waves-effect waves-light btn">
                                Editar
                            </button>
                            <button onclick="redireciona('delete')" type="button" id="btn" class="btn waves-effect waves-light btn">
                                Excluir
                            </button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
    <footer class="">
        <img src="../../img/logo2.png" alt="">
    </footer>

    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script src="../../js/form-login.js"></script>

    <script>
        function redireciona(type) {
            if (type == 'edit') {
                window.location = `edit_funcionario.php?${$infofuncionario['pk_usuario']}`
            } else if (type == 'delete') {
                window.location = '../../php/controller/apagar_funcionario.php'
            }
        }
    </script>
</body>

</html>