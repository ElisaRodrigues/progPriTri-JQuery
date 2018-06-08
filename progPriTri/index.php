<?php

require_once "app/modelo/CRUDCategoria.php";

require_once "app/modelo/CRUDProduto.php";

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
} else{
    $acao = 'index';
}

switch ($acao){
    case 'index';

    $catcrud = new CRUDCategoria();
    $categorias = $catcrud->getCategorias();

    $prodcrud = new CRUDProduto();
    $produtos = $prodcrud->getProdutos();

    include  "app/views/principal/index.php";
    break;
}