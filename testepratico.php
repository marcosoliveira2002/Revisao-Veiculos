<?php
include_once('conexao.php');
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: sair.php');
}

$logado = $_SESSION['login'];




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
    <header>
        <a href="testepratico.php"><img class="logo" src="imgs/subaru-sem-fundo.png" alt="TestePratico"></a>

        <a class="sair" href="sair.php">SAIR</a>
    </header>

    <div class="shadow-lg p-1 mb-1 rounded">
        <h2 class="text-white" style="font-weight: bold;">Cadastro de Proprietario</h2>
        <form id="form" action="enviar-form.php" method="POST" name="tecnicos">
            <label for="campo1"></label>
            <select style="border: 1px solid #000000;" name="campo1" id="campo1" class="form-select mb-3" aria-label="Default select example" required>
                <option value="">Selecione o genero : </option>
                <?php
                $sql = "SELECT id,genero FROM marcos.genero ORDER BY id";
                $result = pg_query($cn, $sql);
                $rows = pg_fetch_all($result);
                foreach ($rows as $option) {
                ?>
                    <option value="<?php echo $option['id'] ?>"><?php echo $option['genero'] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="campo2">Nome :</label>
            <input type="text" id="campo2" name="campo2">
            <label for="cpfProprietario">CPF:</label>
            <input placeholder="Exemplo: xxx-xxx-xxx-xx" maxlength="14" type="text" id="cpfProprietario" 
             name="cpfProprietario" 
            required onkeypress="return validarNumero(event)" oninput="formatarCPF()" onchange="verificarCPF()">
            <label for="telefone">Telefone :</label>
            <input placeholder="Exemplo : xx xxxxx xxxx" type="text" id="telefone"  name="telefone" required oninput="formatarTelefone()" onkeypress="return validarNumero(event)">


            <label for="campo5">Data de Nascimento :</label>
            <input type="date" id="campo5" name="campo5" required>



            <input id="enviar" type="submit" value="Enviar">

            <div class="botoesFuncoes">
                <a class="sair" href="cadastro_veiculo.php">Veiculos</a>
                <a class="sair" href="cadastro-revisao.php">Revisao</a>
                <a class="sair" href="cadastro_tecnico.php">Proprietarios</a>

            </div>





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