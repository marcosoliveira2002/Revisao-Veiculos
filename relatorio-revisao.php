<?php
include_once('conexao.php');
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: sair.php');
}

$logado = $_SESSION['login'];

include_once('menu.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RJ</title>
    <link rel="stylesheet" type="text/css" href="imgs/estilos/estilo.css">
</head>

<body>
    <!--<header>
    <a href="testepratico.php"><img class="logo" src="imgs/subaru-sem-fundo.png" alt="TestePratico" ></a>

        <a class="sair" href="sair.php">SAIR</a>
    </header>
-->

    <div class="shadow-lg p-1 mb-1 rounded">
        <form id="form" action="get-revisao.php" method="GET" name="tecnicos" onsubmit="return validarFormulario()">


            <h3><?php echo "Bem vindo(a) ao Relatrorio de Revisões, $logado!" ?></h3>

            <h2>Digite a data : </h2>

            <div class="row">
                <div class="col">
                    <input type="date" class="form-control" placeholder="Data inicial" id="dataIncial" name="dataInicial" aria-label="First name">
                </div>
                <h5 style="margin: 0.7em;">Até </h5>
                <div class="col">

                    <input type="date" class="form-control" placeholder="Data final" id="dataFinal" name="dataFinal" aria-label="Last name">
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">REVISÕES</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="shadow-lg p-1 mb-1 rounded">
                            <form id="form" action="cadastro-revisao.php" method="POST" name="tecnicos" onsubmit="return validarFormulario()">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="modal-table" class="tabelaResponsiva">
                                        <tr>
                                            <th>ID</th>
                                            <th>Propietario</th>
                                            <th>Veiculo</th>
                                            <th>Serviço</th>
                                            <th>valor</th>
                                            <th>Data</th>
                                            <th>Editar</th>
                                            <th>Exclusao</th>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>                       

            

            <!-- Button trigger modal -->
            <button  id="botaoModal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Pesquisar
            </button>       

            <div id="chamaModal">

            </div>

</body>

</html>