<?php 
    session_start();

    $idmed = $_GET['idmed'];

    if( isset($_REQUEST['adicionar'])){
        if( isset($_SESSION['cart'][$idmed])){
            $_SESSION['cart'][$idmed] ++;
        }else{
            $_SESSION['cart'][$idmed] = 1;
        }
    }

    if( isset($_REQUEST['excluir'])){
        if( isset($_SESSION['cart'][$idmed])){
        unset( $_SESSION['cart'][$idmed] );
        }
    }

    header("Location: ../cart.php");
?>