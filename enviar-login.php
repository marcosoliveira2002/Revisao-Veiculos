<?php
session_start();
if (isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['senha'])) {
    include_once('conexao.php');
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM marcos.usuarios WHERE login = '$login' and senha = '$senha' ";

    $result = pg_query($cn, $sql);

    if ($result) {
        $rows = pg_fetch_all($result);
        if ($rows) {
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            header('location: testepratico.php');
        } else {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location: index.php');
        }
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        echo "Erro na consulta SQL: " . pg_last_error($cn);
    }
    pg_close($cn);
} else {
    header('Location: index.php');
}
