<?php
include_once("conexao.php");

$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];

$sql = "SELECT r.id, r.cpf_proprietario, v.modelo, r.servico, r.valor, r.data_revisao FROM marcos.revisao r INNER JOIN marcos.veiculos v ON v.id=r.veiculo_id WHERE LEFT(dataInicial,10) BETWEEN $dataInicial AND $dataFinal ORDER BY cpf_proprietario";

$result = pg_prepare($cn, "revisoes", $sql); // Prepara a consulta

$dados = array();
$result = pg_execute($cn, "revisoes", $dados); // Executa a consulta preparada
 

if ($result && pg_num_rows($result) > 0) {
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
}
