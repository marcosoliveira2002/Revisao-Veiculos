<?php 
if (!empty($_GET['id'])) {
    include_once('conexao.php');

    $id = $_GET["id"];

    $sql = "SELECT * FROM marcos.veiculos WHERE id='$id'";
    $result = pg_query($cn, $sql);

    if ($result) {
        if (pg_num_rows($result) > 0) {
            $sqlDelete = "DELETE FROM marcos.veiculos WHERE id='$id'";
            $resultDelete = pg_query($cn, $sqlDelete);

            if ($resultDelete) {
                header('Location: relatorio-veiculos.php');
                exit();
            } else {
                echo "Erro ao excluir o registro.";
                header('Location: relatorio-veiculos.php');
                exit();
            }
        } else { 
            header('Location: relatorio-veiculos.php');
            exit(); 
        }
    } else {
        echo "Erro ao executar a consulta.";
    }
}
?>
