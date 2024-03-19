<?php
include_once("conexao.php");

$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];

$sql = "SELECT r.id, r.cpf_proprietario, v.modelo, r.servico, r.valor, r.data_revisao FROM marcos.revisao r INNER JOIN marcos.veiculos v ON v.id=r.veiculo_id WHERE LEFT(r.data_revisao,10) BETWEEN $dataInicial AND $dataFinal ORDER BY cpf_proprietario";

$result = pg_prepare($cn, "revisoes", $sql); 

$dados = array();
$result = pg_execute($cn, "revisoes", $dados); 
 

?>
