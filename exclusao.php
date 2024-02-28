<?php 
if (!empty($_GET['cpf'])) {
    include_once('conexao.php');

    $cpf = $_GET["cpf"];

    $sql = "SELECT * FROM marcos.propietario WHERE cpf='$cpf'";
    $result = pg_query($cn, $sql);

    if (pg_num_rows($result) > 0) {
        $sqlDelete = "DELETE FROM marcos.propietario WHERE cpf='$cpf'";
        $resultDelete = pg_query($cn, $sqlDelete);

        if ($resultDelete) {
            header('Location: cadastro_tecnico.php');
            exit();
        } else {
            echo "Erro ao excluir o registro.";
        }
    } else { 
        header('Location: cadastro_tecnico.php');
        exit(); 
    }
}
?>
