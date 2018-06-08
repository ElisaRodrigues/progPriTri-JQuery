<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 16:36
 */
require_once "Conexao.php";
require_once "Categoria.php";

class CRUDCategoria
{

    private $conexao;

    public function getCategorias(){
        $this-> conexao = Conexao::getConexao();
        $sql = 'select * from categoria';

        $resultado = $this -> conexao -> query($sql);
        $categorias = $resultado -> fetchAll(PDO::FETCH_ASSOC);
        $lista_Categoria = [];

        foreach ($categorias as $categoria) {
            $id = $categoria['id_categoria'];
            $nome = $categoria['nome_categoria'];
            $descricao = $categoria['descricao_categoria'];
            $lista_Categoria[] = new Categoria($id, $nome, $descricao);
        }
        return $lista_Categoria;
    }

    public function getCategoria (int $id){
        //recebe um $id inteiro e retorna o objeto categoria correspondente

        $this->conexao = Conexao::getConexao();
        $sql= "select * from categoria where id_categoria=".$id;
        $result = $this->conexao-> query($sql);
        $categoria = $result->fetch(PDO::FETCH_ASSOC);
        $objCat = new Categoria($categoria['id_categoria'], $categoria['nome_categoria'], $categoria['descricao_categoria'] );
        return $objCat;
    }
    
    
    public function insertCategoria (Categoria $categoria){
        //recebe um objeto $cat e insere na tabela categoria do BD
        $sql = "INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES ('".$categoria->getNome()."', '{$categoria->getDescricao()}')";
        try{
            $this -> conexao -> exec($sql);
        }catch (PDOException $e ){
            return $e -> getMessage();
        }



    }

    public function updateCategoria (Categoria $categoria){
        //recebe um inteiro e apaga o registro correspondente no BD
        $sql = "UPDATE categoria set Nome_Categoria = 'MOVEIS', descricao_categoria['MOVEIS']   where id_categoria = $categoria->getCategoria  ";
        try{
            $this -> conexao -> exec($sql);
        }catch (PDOException $e ){
            return $e -> getMessage();
        }
    }

    public function deleteCategoria(int $id){
        //recebe um inteiro e apaga o registro correspondente no BD
        $sql = "DELET from categoria where id_categoria = $id";
        try{
            $this -> conexao -> exec($sql);
        }catch (PDOException $e ){
            return $e -> getMessage();
        }
    }
}

//$croods  = new CRUDCategoria();
//$cats = $croods->getCategorias();
//
//var_dump($cats);