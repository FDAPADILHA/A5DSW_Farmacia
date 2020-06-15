<?php
    session_start();
    include_once "DAO/clsMedicamentoDAO.php";
    include_once "model/clsConexao.php";
    include_once "model/clsMedicamento.php";
    $cont=0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>loja</title>
</head>
    <body>
        <div class="header">Pharma Store ✙</div>
            <nav class="navbar navbar-expand-md">
                <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <?php
                                if(!isset($_SESSION['admlogado']) && !isset($_SESSION['logado'])){
                                    echo '<a href="index.php">'
                                        .'<button type="button" id="paginicial" title="Voltar a página Inicial">'
                                            .'<svg class="bi bi-house-fill" width="20px" height="20px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'
                                                .'<path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>'
                                                .'<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>'
                                            .'</svg>'
                                        .'</button>'
                                    .'</a>';
                                }
                            ?>
                            <?php
                                if(isset($_SESSION['admlogado'])){
                                    echo '<a href="cadastro_medicamento.php">'
                                            .'<button type="button" id="voltar" title="Voltar">'
                                            .'<svg class="bi bi-arrow-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg%22%3E">'
                                            .'<path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>'
                                            .'<path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>'
                                            .'</svg>'
                                        .'</button>'
                                    .'</a>';
                                }
                            ?>
                        </li>
                    </ul>
                </div>
                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button type="button" id="cart">
                                <svg class="bi bi-cart3" width="20px" height="20px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                            </button>
                            <a href="controller/logout.php">
                                <button type="button" id="logout" title="Logout">
                                    <svg class="bi bi-person-dash-fill" width="20px" height="20px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5-.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content" id="divloja">
                <?php
                    $Lista = MedicamentoDAO::getMedicamentos();
                        foreach($Lista as $med){
                            $cont++;
                            echo '<div id="divmed">';
                            echo '<img src="imagem/imagem.jpg"></img><br>';
                            echo '<label>Nome: '.$med->nome.'</label><br>';
                            echo '<label>Fórmula: '.$med->formula.'</label><br>';
                            echo '<label>Preço: '.$med->preco.'</label><br>';
                            echo '<label>Quantidade: '.$med->quantidade.'</label><br>';
                            echo '</div>';
                                if($cont == 4){
                                    echo "<br>";
                                    $cont == 0;
                                }
                        }
                ?>
            </div>
        <div class="footer"></div>
    </body>
</html>