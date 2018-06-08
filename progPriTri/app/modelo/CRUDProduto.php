<?php

require_once "Conexao.php";
require_once "Produtinho.php";

class CRUDProduto{
    private $conexao;

    public function getProdutos(){
        $this->conexao = Conexao::getConexao();
        $sql = 'select * from produto';

        $resultado = $this->conexao->query($sql);
        $produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $lista_Produto = [];

        foreach ($produtos as $produto) {
            $id = $produto['id_produto'];
            $nome = $produto['nome_produto'];
            $descricao = $produto['descricao_produto'];
            $foto = $produto['foto_produto'];
            $preco = $produto['preco_produto'];
            $id_categoria = $produto['id_categoria'];
            $lista_Produto[] = new Produtinho($id, $nome, $descricao, $foto, $preco, $id_categoria);
        }
        return $lista_Produto;
    }
    public function getProduto($id){
        //recebe um $id inteiro e retorna o objeto categoria correspondente
        $this->conexao = Conexao::getConexao();
        $sql = "select * from produto where id_produto=" . $id;
        $result = $this->conexao->query($sql);
        $produto = $result->fetch(PDO::FETCH_ASSOC);
        $objCat = new Produtinho($produto['id_produto'], $produto['nome_produto'], $produto['descricao_produto'], $produto['foto_produto'],
            $produto['preco_produto'], $produto['id_categoria']);
        return $objCat;
    }
}