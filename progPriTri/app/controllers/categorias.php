<?php

/*controllers/categorias.php

AÇÃO PRINCIPAL - LISTAR TODAS AS CATEGORIAS

 */

require_once '../modelo/CRUDCategoria.php';

if (isset ($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){
    case 'index':
        $crud = new CRUDCategoria();
        $categorias = $crud->getCategorias();
        echo ('<pre>');
        include '../views/templates/cabecalho.php';
        include '../views/principal/index.php';
        include '../views/templates/rodape.php';

        //percorrer array, exibindo os dados

        break;

    case 'exibir':
        $id = $_GET['id'];
        $crud = new CRUDCategoria();
        $categoria = $crud->getCategoria($id);
        include '../views/templates/cabecalho.php';
        include '../views/categorias/exibir.php';
        include '../views/templates/rodape.php';


    case 'inserir':
        if (!isset($_POST['gravar'])) {
            include '../views/templates/cabecalho.php';
            include '../views/categorias/inserir.php';
            include '../views/templates/rodape.php';
        }else {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $novaCat = new Categoria (null, $nome, $descricao);
            $crud = new CRUDCategoria();
            $nome -> insertCategoria['$novaCat'];
            header('location: categorias.php');
        }

    case 'alterar':

        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];

            include '../views/templates/cabecalho.php';
            include '../views/categorias/inserir.php';
            include '../views/templates/rodape.php';
        }

    default:
        echo "acao invalida";
}