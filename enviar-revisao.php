<?php
include_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $proprietario_cpf  = $_POST['proprietarioRevisao'];
    $modelo = $_POST['veiculoPropietario'];
    $servico = $_POST['campo3'];
    $preco = $_POST['campo4'];

    $sql = "INSERT INTO marcos.revisao (cpf_proprietario, veiculo_id, servico, valotr) 
            VALUES ('$ $proprietario_cpf', '$veiculoPropietario', '$servico', '$preco')";

    $result = pg_query($cn, $sql);

    if ($result) {
        header('Location: cadastro-revisao.php?status=success');
        exit();
    } else {
        echo "Erro na consulta: " . pg_last_error();
        header('Location: cadastro-revisao.php?status=error');
        exit();
    }
} else {
    echo "Método inválido para acessar esta página.";
}
?>
