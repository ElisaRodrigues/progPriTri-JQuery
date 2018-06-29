    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>EXE5</title>
        <meta charset="UTF-8">
        <link href="exe5.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>

            $(document).ready(function(){

                //verifica se esta funcionando
               // alert('Jquery funcionando');

                $("#abas ul li").addClass("selecionado");

                //ao clicar em qualquer li
                $("#abas ul li").click(function(){

                    //remove a class de todos li
                    $(this).toggleClass("selecionado");

                    //descobrir o id de quem eu cliquei
                    var meuId =  $(this).attr("id");

                    //alterna a exibição conteudo correspondente
                    $("."+meuId).toggle();
                });

            });

        </script>


    </head>
    <body>

     <div id = "abas">
         <ul>

        <?= foreach ($categorias as $categoria):?>

        <li id="aba<?=$categoria->getId(); ?> "> <?= $categoria->getNome() ?></li>

        <?= endforeach;?>

        </ul>
    </div>

    <div id="conteudos">

       <?= foreach ($produtos as $produto): ?>

        <div class="conteudo aba1">
            <?= $produto->getIdCategoria(); ?>
            <?= $produto->getNome() ?>
            <br>
            <?= $produto->getdescricao() ?>
        </div>

    <?= endforeach; ?>

    </div>

    </body>
    </html>