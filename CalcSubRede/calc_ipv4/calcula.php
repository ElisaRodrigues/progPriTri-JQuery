<?php include 'classes/Calc_ipv4.php'; ?>

<html>
   <head>
       <style>
           body {
               font-family: sans-serif;
               font-size: 14px;
               line-height: 1.5;
               background: #F8BCDB;
           }
           .resultado b {
               width: 400px;
               display: inline-block;
           }
           pre {
               font-family: Consolas, monospace;
               display: block;
               clear: both;
               padding: 20px;
               background: lightpink;
               border: 2px dashed deeppink;
           }

           </style>
   </head>
</html>

<?php


if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {
    $ip = new calc_ipv4( $_POST['ip'] );

    if( $ip->valida_endereco() ) {
        echo '<h2>Configurações de rede para <span style="color: deeppink;">' . $_POST['ip'] . '</span> </h2>';
        echo "<pre class='resultado'>";

        echo "<b>Quantidade de Sub-redes: </b>" . $ip->qtd_sub()  . '<br>';
        echo "<b>Quantidade de endereços por sub-rede: </b>" . $ip->total_ips() . '<br>';
        echo "<b>Primeiro Endereço de Host: </b>" . $ip->primeiro_ip() . '<br>';
        echo "<b>Último Endereço de Host: </b>" . $ip->ultimo_ip() . '<br>';
        echo "<b>Broadcast da Rede: </b>" . $ip->broadcast() . '<br>';
        echo "<b>Quantidade de Endereços de Hosts em cada Sub-rede: </b>" . $ip->ips_rede() . '<br>';
        echo "<b>Máscara de sub-rede, em formato decimal: </b>" . $ip->mascara() . '<br>';
        echo "<b>Classe que o IP Pertence: </b>" . $ip->classe() . '<br>'; //FAZEER
        echo "<b>IP Público ou Privado: </b>" . $ip->private_public() . '<br>';  //FAZEER

        echo "</pre>";

    } else {
        echo 'Endereço IPv4 inválido!';
    }


}
?>

<html>
   <head></head>

   <body>

   <br>

   <a href="index.php">
   <button id="button"
           style="border:1px solid deeppink; background: deeppink; color: #fff; font-weight: 700; cursor: pointer; line-height: 2; padding: 0 5px;"
   >Calcular Novamente Outro IP
   </button>
   </a>

   </body>
</html>
