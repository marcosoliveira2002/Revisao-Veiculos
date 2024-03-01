<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
include_once('conexao.php');

print_r($_POST);


$sql = "INSERT INTO marcos.propietario(cpf, nome, genero, nascimento,telefone,criacao) VALUES ('" . $_POST['cpfProprietario'] . "', '" . $_POST['campo2'] . "', '" . $_POST['campo1'] . "', '" . $_POST['campo5'] . "', '" . $_POST['campo4'] . "',NOW())";

$result = pg_query($cn, $sql);

  if ($result) {
    $rows = pg_fetch_all($result);
    
    header('location: testepratico.php?status=success');
  } else {
    echo "Erro na consulta: " . pg_last_error();
    header('location: testepratico.php?status=erro');
  }
  ?>
</body>
</html>

  


