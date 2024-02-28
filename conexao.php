<?php 
    $cn = pg_connect("host=localhost port=5433 dbname=marcos user=postgres password=rego2017");

        if ($cn) {
            
        } else {
            echo "Erro: Não foi possivel conectar ao banco de dados";
            echo "Debugging information: " . pg_last_error();
        }
    
?>