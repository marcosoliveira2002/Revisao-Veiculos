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

<div class="shadow-lg p-1 mb-1 rounded">
    <form id="form" action="get-revisao.php" method="GET" name="tecnicos" onsubmit="return validarFormulario()">
        <h3><?php echo "Bem vindo(a) ao Relatório de Revisões, $logado!" ?></h3>
        <h2>Digite a data:</h2>
        <div class="row">
            <div class="col">
                <input type="date" class="form-control" placeholder="Data inicial" id="dataIncial" name="dataInicial" aria-label="Data inicial">
            </div>
            <h5 style="margin: 0.7em;">Até</h5>
            <div class="col">
                <input type="date" class="form-control" placeholder="Data final" id="dataFinal" name="dataFinal" aria-label="Data final">
            </div>
        </div>
        <button id="botaoModal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="modalRevisao()">
            Pesquisar !!!
        </button>
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REVISÕES</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="shadow-lg p-1 mb-1 rounded">
                        <!-- Aqui você pode adicionar o conteúdo do modal -->
                        <h1>MODAL COMEÇA AQUI!!!!!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>