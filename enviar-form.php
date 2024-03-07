  <?php
  include_once('conexao.php');

  function limparCPF($cpf)
  {
    return str_replace(array(')','(','-','.'), '', $cpf); // Remove os pontos e traços
  }

  if (isset($_POST['cpfProprietario'])) {
    $cpfLimpo = limparCPF($_POST['cpfProprietario']);
    $telefoneLimpo = limparCPF($_POST['telefone']);
    $sql = "INSERT INTO marcos.propietario(cpf, nome, genero, nascimento,telefone,criacao) VALUES ('" . $cpfLimpo . "', '" . $_POST['campo2'] . "', '" . $_POST['campo1'] . "', '" . $_POST['campo5'] . "', '" . $telefoneLimpo. "',NOW())";

    print_r($_POST);

    $result = pg_query($cn, $sql);

    if ($result) {
      $rows = pg_fetch_all($result);

      header('location: testepratico.php?status=success');
    } else {
      echo "Erro na consulta: " . pg_last_error();
      header('location: testepratico.php?status=erro');
    }
  } else {
    header('location: testepratico.php?status=erro');
    exit;
  }
  ?>
