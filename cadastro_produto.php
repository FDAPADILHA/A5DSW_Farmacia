<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title> Cadastro </title>
</head>
    <body>
        <center>
                <br> <br> <br> <h1>Cadastro de Medicamento</h1>
            <form method="POST" action=".php">
                    <label><b>Nome:</b></label>
                    <input type="text" name="nome" placeholder="Nome do medicamento"><br><br>
                    <label><b>Fórmula:</b></label>
                <select id="sformula">
                    <option value=""> Selecione </option>
                    <option value="Original"> Original </option>
                    <option value="Generico"> Genérico </option>
                </select><br><br>
                    <label><b>Preço:</b></label>
                    <input type="number" name="preco" placeholder="Preço do medicamento"><br><br>
                    <label><b>Quantidade:</b></label>
                    <input type="number" name="quant" placeholder="Quantidade de medicamentos"><br><br>
                    <label><b>Código:</b></label>
                    <input type="number" name="cod" placeholder="Código do medicamento"><br><br>
                    <input type="submit" value="Cadastrar medicamento"><br>
            </form>
        </center>
    </body>
</html>