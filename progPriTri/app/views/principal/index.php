    <!DOCTYPE html>
    <html lang="br">
    <head>
        <title>INDEX JQUERY 4</title>
        <meta charset="UTF-8">
        <link href="app/views/principal/exe4.css" rel="stylesheet" type="text/css"/>

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

             <?php foreach ($categorias as $categoria ): ?>
                 <li id="aba<?= $categoria->getID()?>" class="selecionado"><?= $categoria->getNome()?></li>
             <?php endforeach ?>

        </ul>
    </div>

    <div id="conteudos">

        <?php foreach ($produtos as $produto): ?>
            <div class="conteudo aba<?= $produto->getIdCategoria()?>">
                <?= $produto->getIdCategoria(); ?>
                <?= $produto->getNome(); ?>
                <br>
                <?= $produto->getDescricao(); ?>
            </div>
        <?php endforeach; ?>

    </div>

    </body>
    </html>