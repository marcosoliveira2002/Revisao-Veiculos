<nav class="navbar  navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark shadow" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="imgs/mjr.jpg" width="50" height="50" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="testepratico.php">Inicio</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="testepratico.php">Cadastro De Proprietário</a></li>
            <li><a class="dropdown-item" href="cadastro_veiculo.php">Cadastro De veiculos</a></li>
            <!--<li><hr class="dropdown-divider"></li>-->
            <li><a class="dropdown-item" href="cadastro-revisao.php">Cadastro de Revisão</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Relatórios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cadastro_tecnico.php">Relatório De Proprietário</a></li>
            <li><a class="dropdown-item" href="relatorio-veiculos.php">Relatório De veiculos</a></li>
            <!--<li><hr class="dropdown-divider"></li>-->
            <li><a class="dropdown-item" href="relatorio-revisao.php">Relatório de Revisão</a></li>
          </ul>
        </li>
      </ul>
    
        <button type="button" class="btn btn-info"><a style="text-decoration: none; color: white; font-weight: bold;" href="sair.php">Sair</a></button>
      
    </div>
  </div>
</nav>