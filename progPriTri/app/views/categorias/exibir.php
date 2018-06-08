<html>
<head>
    <base href="http://localhost/progPriTri/">

<body>

        <h1> Detalhes Da Categoria - <?= $categoria->getNome(); ?> </h1>
        <p>Descricao: <?= $categoria->getDescricao();?> </p>

        <a href="categorias.php?acao=editar">Editar</a>
        <a href="categorias.php?acao=excluir">excluir</a>

</body>

</head>

</html>