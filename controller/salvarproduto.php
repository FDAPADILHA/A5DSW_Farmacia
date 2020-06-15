<?php
include_once "../model/clsConexao.php";

$nome = $_POST['nome'];
$formula = $_POST['formula'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$query = "INSERT INTO medicamentos (nome, formula, preco, quantidade) VALUES ('$nome', '$formula', '$preco', '$quantidade')";
    
    $result = Conexao::executar($query);
    header("Location: ../loja.php");
?>