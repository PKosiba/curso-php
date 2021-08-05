<?php
/*Não mais necessario pois vem de servico
 * session_start();
 */
include 'servicos/servicoMensagemSessao.php';
include 'servicos/servicoCategoriaCompetidor.php';
include 'servicos/servicoValidacao.php';

$nome = $_POST['nome'];                             //ok
$idade = $_POST['idade']; 
$sexo = $_POST['sexo'];

defineCategoriaCompetidor($nome, $idade,$sexo);           //ok

header('location: /index.php');                     //ok