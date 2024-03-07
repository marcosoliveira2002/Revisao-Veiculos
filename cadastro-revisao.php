<?php

include_once('conexao.php');

$sql = "SELECT cpf, nome FROM marcos.propietario ORDER BY nome";
$resultadoCliente = pg_query($cn, $sql);

session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: sair.php');
}

$logado = $_SESSION['login'];

include_once('menu.php');


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RJ</title>
    <link rel="stylesheet" type="text/css" href="imgs/estilos/estilo.css">
</head>

<body>
    <!--<header>
    <a href="testepratico.php"><img class="logo" src="imgs/subaru-sem-fundo.png" alt="TestePratico" ></a>
        <a class="sair" href="sair.php">SAIR</a>
    </header> -->

    <div class="shadow-lg p-1 mb-1 rounded">
        <h2 class="text-white" style="font-weight: bold;">Cadastro de Revisões por Proprietário</h2><
        <form id="form" action="enviar-revisao.php" method="POST" name="veiculos">
            <label for="campo1"></label>
            <select name="proprietarioRevisao" id="proprietarioRevisao" class="form-select mb-3" aria-label="Default select example" required onchange="getVeiculos()">
                <option value="">Selecione o Proprietário: </option>
                <?php
                $sql = "SELECT cpf, nome FROM marcos.propietario ORDER BY nome";
                $result = pg_query($cn, $sql);

                if ($result && pg_num_rows($result) > 0) {
                    while ($row = pg_fetch_assoc($result)) {
                ?>
                        <option value="<?php echo $row['cpf']; ?>"><?php echo $row['nome']; ?> </option>
                    <?php
                    }
                } else {
                    ?>
                    <option value="">Nenhum proprietário encontrado</option>
                <?php
                }
                ?>
            </select>


            <select name="veiculoPropietario" id="veiculoPropietario" class="form-select mb-3" aria-label="Default select example" required>
                <option value="">Selecione o Veiculo : </option>

            </select>



            <label for="campo3">Serviço :</label>
            <input placeholder="Ex : troca de óleo" type="text" id="campo3" name="campo3" required>

            <label for="precoRevisao">Preço :</label>
            <input type="text" id="precoRevisao" name="precoRevisao" required onkeypress="return validarNumero(event)" onkeyup="formatarMoeda(this)">



            <input type="submit" value="Enviar">




    </div>

    </form>

    <script src="imgs/JS/script.js"></script>
    <script>
        // Verifica se há um parâmetro 'status' na URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        window.history.replaceState({}, document.title, window.location.pathname)

        // Exibe um alerta com base no status
        if (status === 'success') {
            alert('Cadastro realizado com sucesso!');
        } else if (status === 'error') {
            alert('Erro ao cadastrar. Por favor, tente novamente.');
            window.history.replaceState({}, document.title, window.location.pathname)

        }
    </script>


    </script>
</body>

</html>