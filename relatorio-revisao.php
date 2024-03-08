<?php
include_once('conexao.php');
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: sair.php');
}

$logado = $_SESSION['login'];

$sql = "SELECT r.id, r.cpf_proprietario, v.modelo, r.servico, r.valor, r.data_revisao FROM marcos.revisao r INNER JOIN marcos.veiculos v ON v.id=r.veiculo_id ORDER BY cpf_proprietario";
$result = pg_query($cn, $sql);

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
        <form id="form" action="get-revisao.php" method="POST" name="tecnicos" onsubmit="return validarFormulario()">


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

            

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Pesquisar
            </button>

            <!-- Modal -->
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
                <table class="table table-striped table-hover" class="tabelaResponsiva">
                    <tr>
                        <th>ID</th>
                        <th>Propietario</th>
                        <th>Veiculo</th>
                        <th>marca</th>
                        <th>Placa</th>
                        <th>Data</th>
                        <th>Editar</th>
                        <th>Exclusao</th>
                    </tr>
                    <?php
                    while ($row = pg_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['cpf_proprietario'] . "</td>";
                        echo "<td>" . $row['modelo'] . "</td>";
                        echo "<td>" . $row['servico'] . "</td>";
                        echo "<td>" . $row['valor'] . "</td>";
                        echo "<td>" . $row['data_revisao'] . "</td>";
                        echo "<td><a class= 'btn btn-sm btn-primary' href='editarrevisao.php?id=$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                        <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z'/>
                      </svg></a></td>";
                        echo "<td><a class= 'btn btn-sm btn-danger'  href='exclusao-revisao.php?id=$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
              </svg></a></td>";
                        echo "</tr>";
                    }
                    ?>


                </table>

            </div>
        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>


</body>

</html>