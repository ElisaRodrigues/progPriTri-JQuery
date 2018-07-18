<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EXERCÍCIO AJAX</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    $(document).ready(function () {

        //exercicio 1
        $("#button1").click(function(){
            $("#div1").load("http://hawkman.fabricadesoftware.ifc.edu.br/~rafael/lojinha/ajax/categorias.php");
        });

        //exercicio 2
        $("#button2").click(function() {
            $.get("http://hawkman.fabricadesoftware.ifc.edu.br/~rafael/lojinha/ajax/produtos.php", function (dados) {
                $("#div1").html(dados)

            });
        });


        //exercicio 3
        $("#button3").click(function(){
            $.get("http://hawkman.fabricadesoftware.ifc.edu.br/~rafael/lojinha/ajax/produtos.php",
                {
                    categoria: $("input").val()

                }, function (dados) {
                $("#div1").html(dados);

            });

        });

        //exercicio4
        $("#button4").click(function () {
            $.get("http://hawkman.fabricadesoftware.ifc.edu.br/~rafael/lojinha/ajax/dados_json.php", function (data) {
                $("#div1").append("<li>"+data.endereco+"</li>");
                $("#div1").append("<li>"+data.campus+"</li>");
                $("#div1").append("<li>"+data.ies+"</li>");
                $("#div1").append("<li>"+data.cursos+"</li>");
                $("#div1").append("<li>"+data.municipio+"</li>");
                $("#div1").append("<li>"+data.uf+"</li>");
            });//fecha o get
        }); //fecha funcao

    });
</script>
</head>

<body>

    <div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

    <button id="button1">EXE1</button>
    <button id="button2">EXE2</button>

    <input type="number" name="">
    <button id="button3">EXE3</button>

    <button id="button4">EXE4</button>

</body>
</html>
