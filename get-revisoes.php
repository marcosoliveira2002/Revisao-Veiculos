<?php
include_once("conexao.php");

$proprietario_cpf = $_GET['proprietario_cpf'];

// Consulta SQL corrigida
$sql = "SELECT id, modelo FROM marcos.veiculos WHERE proprietario_cpf='$proprietario_cpf' ORDER BY modelo ASC";
$result = pg_prepare($cn, "marcos.veiculos", $sql); // Prepara a consulta

$dados = array();
$result = pg_execute($cn, "marcos.veiculos", $dados); // Executa a consulta preparada

if ($result && pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['modelo']; ?> </option>
    <?php
    }
} else {
    pg_last_error($cn);
    ?>
    <option value="">Nenhum veículo encontrado</option>
    
<?php
}
?>
