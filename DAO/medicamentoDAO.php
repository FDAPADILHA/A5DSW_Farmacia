<?php
class MedicamentoDAO{

public static function getMedicamentos() {
    $query = "SELECT id, nome, formula, preco, quantidade FROM medicamentos";
    $result = Conexao::consultar($query);
    $lista = new ArrayObject();

    while( list($id, $nome, $formula, $preco, $quantidade)
        = mysqli_fetch_row($result)){
            $med = new Medicamento();
            $med->id = $id;
            $med->nome = $nome;
            $med->formula = $formula ;
            $med->preco = $preco;
            $med->quantidade = $quantidade;
            $lista->append($med);
        }
        return $lista;


}
?>