<?php
include_once('conexao.php');
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
    <h2 class="text-white" style="font-weight: bold;">Cadastro de Veiculos</h2>
        <form id="form" action="enviar-veiculo.php" method="POST" name="veiculos">
            <label for="campo1"></label>
            <select name="campo1" id="campo1" class="form-select mb-3" aria-label="Default select example" required>
                <option value="">Selecione o Proprietário: </option>
                <?php
                $sql = "SELECT cpf, nome FROM marcos.propietario ORDER BY nome";
                $result = pg_query($cn, $sql);

                if ($result && pg_num_rows($result) > 0) {
                    while ($row = pg_fetch_assoc($result)) {
                ?>
                        <option value="<?php echo $row['cpf']; ?>"><?php echo $row['nome']; ?></option>
                    <?php
                    }
                } else {
                    ?>
                    <option value="">Nenhum proprietário encontrado</option>
                <?php
                }
                ?>
            </select>


            <select name="campo2" id="campo2" class="form-select mb-3" aria-label="Default select example" required>
                <option value="">Selecione a Marca do Carro: </option>
                <?php
                $sql = "SELECT id, nome FROM marcos.marca_carros ORDER BY nome";
                $result = pg_query($cn, $sql);

                if ($result && pg_num_rows($result) > 0) {
                    while ($row = pg_fetch_assoc($result)) {
                ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
                    <?php
                    }
                } else {
                    ?>
                    <option value="">Nenhuma marca de carro encontrada</option>
                <?php
                }
                ?>
            </select>



            <label for="campo3">Modelo :</label>
            <input placeholder="Exemplo : Corolla" type="text" id="campo3"  name="campo3" required >

            <label for="campo4">Placa :</label>
            <input type="text" id="campo4" pattern="^([A-Z]{3}-\d{4}|[A-Z]{3}\d[A-Z]\d{2})$" name="campo4" required >



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
</body>

</html>