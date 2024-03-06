<?php
  include_once('conexao.php');

  function limparCPF($preco)
  {
    return str_replace(array(')','(','-','R$'), '', $preco); // Remove os pontos e traços
  }

  if (isset($_POST['precoRevisao'])) {
    $cpfLimpo = limparCPF($_POST['precoRevisao']);
    $sql = "INSERT INTO marcos.revisao(cpf_proprietario, veiculo_id, servico, valor,criacao) VALUES ('" . $_POST['proprietarioRevisao']. "', '" . $_POST['veiculoPropietario'] . "', '" . $preco . "', '" . "',NOW())";

    print_r($_POST);

    $result = pg_query($cn, $sql);

    if ($result) {
      $rows = pg_fetch_all($result);

      header('location: cadastro-revisao.php?status=success');
    } else {
      echo "Erro na consulta: " . pg_last_error();
      header('location: cadastro-revisao.php?status=erro');
    }
  } else {
    header('location: cadastro-revisao.php?status=erro');
    exit;
  }
  
?>


