<?php

include_once "../model/clsConexao.php";

$user = $_POST['usuario'];
$senha = $_POST['senha'];

$query = "SELECT nome, senha FROM adm WHERE nome = '$user' AND senha = '$senha'";
$result = Conexao::consultar($query);
    if( mysqli_num_rows($result) > 0 ){
        session_start();

        $usuario = mysqli_fetch_assoc($result);

        $_SESSION["logado"] = TRUE;
        $_SESSION["id_usuario"] = $usuario['id'];
        $_SESSION["nome_usuario"] = $usuario['nome'];

        header("Location: ../cadastro_produto.php");
    }else{
        header("Location: ../admin.php?erro");
    }
?>