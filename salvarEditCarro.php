<?php    
include_once('conexao.php');

if(isset($_POST['campo1'], $_POST['campo2'], $_POST['campo3'], $_POST['campo4'], $_POST['id'])) {
    $propietario = $_POST['campo1'];
    $marca = $_POST['campo2'];
    $modelo = $_POST['campo3'];
    $placa = $_POST['campo4'];
    $id = $_POST['id']; // Obtém o ID do veículo

    $sql = "UPDATE marcos.veiculos SET proprietario_cpf='$propietario', id_marca='$marca', modelo='$modelo', placa='$placa' WHERE id='$id'";
    $result = pg_query($cn, $sql);

    if($result) {
        header('Location: relatorio-veiculos.php');
        exit(); 
    } else {
        echo "Erro ao atualizar os dados. Por favor, tente novamente.";
    }
} else {
    echo "Por favor, preencha todos os campos do formulário.";
}

?>
