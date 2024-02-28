<?php    
include_once('conexao.php');

if(isset($_POST['campo1'], $_POST['campo2'], $_POST['campo3'], $_POST['campo4'], $_POST['campo5'])) {
    $genero = $_POST['campo1'];
    $nome = $_POST['campo2'];
    $cpf = $_POST['campo3'];
    $nascimento = $_POST['campo5'];
    $telefone = $_POST['campo4'];

    $sql = "UPDATE marcos.propietario SET genero='$genero', nome='$nome', nascimento='$nascimento', telefone='$telefone' WHERE cpf='$cpf'";
    $result = pg_query($cn, $sql);


    if($result) {
    
        header('Location: cadastro_tecnico.php');
        exit(); 
    } else {
       
        echo "Erro ao atualizar os dados. Por favor, tente novamente.";
    }
} else {
    
    echo "Por favor, preencha todos os campos do formulário.";
}
?>
