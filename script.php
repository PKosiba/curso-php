<?php

session_start();

$categorias = [];
$categorias[] = 'infantil';
$categorias[] = 'adolescente';
$categorias[] = 'adulto';
$categorias[] = 'idoso';


$nome = $_POST['nome'];
$idade = $_POST['idade'];

if(empty($nome)){
	$_SESSION['mensagem-de-erro'] = 'O nome não pode estar vazio. Por favor preencha-o novamente';
	//para voltar para o index.php
	header('location: /index.php');
	return;
}
//verifica se o campo nome tem pelo menos 3 caracteres
else if (strlen($nome) < 3){
	$_SESSION['mensagem-de-erro'] = 'O nome não pode ter menos de 3 caracteres. Por favor preencha-o novamente';
	//para voltar para o index.php
	header('location: /index.php');
	return;
}
//Verifica se o campo nome não exceda 40 caracteres
else if (strlen($nome) > 40){
	$_SESSION['mensagem-de-erro'] = 'O nome não pode ser tão estenço. Por favor preencha-o novamente';
	//para voltar para o index.php
	header('location: /index.php');
	return;
}
//Permite somente números no campo idade
else if (!is_numeric($idade)){
	$_SESSION['mensagem-de-erro'] = 'Informe um número para a idade. Por favor preencha-o novamente';
	//para voltar para o index.php
	header('location: /index.php');
	return;
}

if ($idade >= 6 && $idade <= 12){
	for($i = 0; $i <=count($categorias);$i++){
            if ($categorias[$i] == 'infantil') 
            {
                $_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome."  compete na categoria ".$categorias[$i];
                header('location: /index.php');
                return;
            }
    }
}
else if ($idade >= 13 && $idade <=18) 
{
	for ($i=0; $i <= count($categorias); $i++)
        { 
            if ($categorias[$i] == 'adolescente') 
            {
                    $_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome."  compete na categoria ".$categorias[$i];
                    header('location: /index.php');
                    return;        
            }
    }
}
else{
	for ($i=0; $i <= count($categorias); $i++)
	{ 
            if ($categorias[$i] == 'adulto') 
            {
                    $_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome."  compete na categoria ".$categorias[$i];
                    header('location: /index.php');
                    return;
            }
	}
}