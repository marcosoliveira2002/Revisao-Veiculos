<?php
if (!empty($_GET['cpf'])) {
    include_once('conexao.php');

    $cpf = $_GET["cpf"];

    $sqlProprietario = "SELECT * FROM marcos.propietario WHERE cpf='$cpf'";
    $resultProprietario = pg_query($cn, $sqlProprietario);

    if (pg_num_rows($resultProprietario) > 0) {
        $sqlDeleteProprietario = "DELETE FROM marcos.propietario WHERE cpf='$cpf'";
        $resultDeleteProprietario = pg_query($cn, $sqlDeleteProprietario);

        $sqlDeleteVeiculos = "DELETE FROM marcos.veiculos WHERE proprietario_cpf= '$cpf'";
        $resultDeleteVeiculos = pg_query($cn, $sqlDeleteVeiculos);

        if ($resultDeleteProprietario && $resultDeleteVeiculos) {
            header('Location: cadastro_tecnico.php');
            exit();
        } else {
            echo "Erro ao excluir o registro.";
        }
    } else {
        header('Location: cadastro_tecnico.php');
        exit();
    }
} else {
    header('Location: cadastro_tecnico.php');
    exit();
}
?>
