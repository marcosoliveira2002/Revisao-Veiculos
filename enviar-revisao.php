<?php
  include_once('conexao.php');

  function limparPreco($preco)
  {
    return str_replace(array(')',' ','-','R$',), '', $preco); 
  }

  function limparCPF($cpf)
  {
    return str_replace(array(')','(','-','.'), '', $cpf); // Remove os pontos e traços
  }


  if (isset($_POST['precoRevisao'])) {
    $precoLimpo = limparPreco($_POST['precoRevisao']);
    $cpfLimpo = limparCPF($_POST['proprietarioRevisao']);
    $sql = "INSERT INTO marcos.revisao(cpf_proprietario, veiculo_id, servico, valor, data_revisao) VALUES ('" . $cpfLimpo . "', '" . $_POST['veiculoPropietario'] . "','" . $_POST['campo3']  . "' , '" . $precoLimpo . "', '" . "',NOW())";

    print_r($_POST);

    $result = pg_query($cn, $sql);

    if ($result) {
      $rows = pg_fetch_all($result);

      //header('location: cadastro-revisao.php?status=success');
    } else {
      echo "Erro na consulta: " . pg_last_error();
     //header('location: cadastro-revisao.php?status=erro');
    }
  } else {
    //header('location: cadastro-revisao.php?status=erro');
    //exit;
  }
  
?>


