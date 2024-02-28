<?php
include_once('conexao.php');
session_start();
if (!empty($_GET['cpf'])) {
    $cpf = $_GET["cpf"];
    $sql = "SELECT * FROM marcos.propietario WHERE cpf='$cpf'";
    $result = pg_query($cn, $sql);

    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            $genero = $row['genero'];
            $cpf = $row['cpf'];
            $nome = $row['nome'];
            $nascimento = $row['nascimento'];
            $telefone = $row['telefone'];
        }
        
   } else { 
        header('Location: cadastro_tecnico.php');
        exit(); 
   }
}

 






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
    <a href="testepratico.php"><img class="logo" src="imgs/subaru-sem-fundo.png" alt="TestePratico" ></a>

        <a class="sair" href="sair.php">SAIR</a>
    </header>

    <div class="shadow-lg p-1 mb-1 rounded">
        <form id="form" action="salvarEdit.php" method="POST" name="tecnicos">
            <label for="campo1"></label>
            <select name="campo1" id="campo1" class="form-select mb-3" aria-label="Default select example" required>
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
            <input type="text" id="campo2" name="campo2" value="<?php echo $nome ?>">

            <label for="campo3">Cpf :</label>
            <input placeholder="Exemplo : xxx xxx xxx xx" type="text" id="campo3" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" name="campo3" value="<?php echo $cpf ?>" required onkeypress="return validarNumero(event)">

            <label for="campo4">Telefone :</label>
            <input placeholder="Exemplo : xx xxxxx xxxx" type="text" id="campo4" pattern="[0-9]{11}" name="campo4" value="<?php echo $telefone ?>" required onkeypress="return validarNumero(event)">


            <label for="campo5">Data de Nascimento :</label>
            <input type="date" id="campo5" name="campo5" value="<?php echo $nascimento ?>" required>

            
                
            <input type="submit" value="Salvar">

            <div class="botoesFuncoes">
           
            <a class="sair" href="cadastro_tecnico.php" >Voltar</a>
            </div>
            
        
        
            
        
    </div>

    </form>

    <script src="imgs/JS/script.js"></script>
    
</body>

</html>