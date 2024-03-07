<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="imgs/estilos/estilo.css">
  <title>TestePratico</title>
</head>

<body>
  <!--<header>
  <a href="#"><img class="logo" src="imgs/subaru-sem-fundo.png" alt="TestePratico" ></a>

  </header> -->
 

  <div class="container" >
    <form class="tela-login" style="margin-top: 5em;" action="enviar-login.php" method="POST">
      <h2 class="login"> Login </h2>
      <div class="row mt-5">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="login">
          <label for="floatingInput">email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="senha">
          <label for="floatingPassword">Senha</label>
          <input type="submit" name="submit" value="Entrar"></input>
        </div>
      </div>
    </form>
  </div>
  </div>
</body>

</html>