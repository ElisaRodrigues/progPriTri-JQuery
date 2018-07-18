<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">

    <title>Cálculo de máscara de sub-rede IPv4</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>

        $(document).ready(function () {

            $("#button").click(function(){
                $.post("calcula.php",
                    {
                        ip: $("input").val()

                    }, function (dados) {
                        $("#div1").html(dados);

                    });

            });

        });
    </script>

    <style>
    body {
        font-family: sans-serif;
        font-size: 14px;
        line-height: 1.5;
        background: #F8BCDB;
    }
    </style>
</head>
<body>
    <section>
        <h1>Calcular máscara de sub-rede IPv4</h1>

        <div id="div1">


        <b style="color: deeppink">IP/CIDR</b> <small>(Ex.: 192.168.0.1/24)</small> <br>
        <input id="input" style="border:1px solid deeppink; line-height: 2; padding: 0 5px; width: 200px;" type="text" name="ip" value="<?php echo @$_POST['ip'];?>">
        <button id="button"
                style="border:1px solid deeppink; background: deeppink; color: #fff; font-weight: 700; cursor: pointer; line-height: 2; padding: 0 5px;"
        >Calcular</button>


        </div>
   </section>

</body>
</html>

