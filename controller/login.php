<?php

include_once "../model/clsConexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT email, senha FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = Conexao::consultar($query);
    if( mysqli_num_rows($result) > 0 ){
        session_start();

        $usuario = mysqli_fetch_assoc($result);

        $_SESSION["logado"] = TRUE;
        $_SESSION["id_usuario"] = $usuario['id'];
        $_SESSION["nome_usuario"] = $usuario['nome'];

        header("Location: ../loja.php");
    }
?>