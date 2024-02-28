<?php
include_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_marca = $_POST['campo2'];
    $placa = $_POST['campo4'];
    $proprietario_cpf = $_POST['campo1'];
    $modelo = $_POST['campo3'];

    $sql = "INSERT INTO marcos.veiculos (id_marca, placa, proprietario_cpf, modelo) 
            VALUES ('$id_marca', '$placa', '$proprietario_cpf', '$modelo')";

    $result = pg_query($cn, $sql);

    if ($result) {
        header('Location: cadastro_veiculo.php?status=success');
        exit();
    } else {
        echo "Erro na consulta: " . pg_last_error();
        header('Location: cadastro_veiculo.php?status=error');
        exit();
    }
} else {
    echo "Método inválido para acessar esta página.";
}
?>
