<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 09:01
 *
 * CRIAR INSTANCIA DE PRODUTO
 *
 * TESTAR FUNCOES DE GET E SET
 *
 * var_dump();
 */
require "../modelo/Produtinho.php";

$choco = new Produtinho();
$choco -> setId(24);
$choco ->setNome = "Chocolateeeee";
$choco ->setDescricao('É a melhor coisa quando esta na tpm!!! Deveria estar incluso nas 7 maravilhas do mundo!!!!!!!!');
$choco ->setPreco(4.00);
$choco ->setIdCategoria(1);
var_dump($choco);

$coxinha = new Produtinho(05, "Coxinha", "É de flango","fotinho", 2.00, 1);
var_dump($coxinha);