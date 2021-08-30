<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta charset="utf-8">
	<title>Tela de Login</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div id= "corpo-form">
	<h1>Entrar</h1>
	<form method="POST" action="processa.php">
		<input type="email" name="" placeholder="Usuário" maxlength="30">
		<input type="password" name="" placeholder="Senha"maxlength="32">
		<input type="submit" value="Acessar">
		<a href="cadastrar.php">Ainda não é inscrito? <strong> Cadastrar</strong></a>	
	</form>
</div>
<?php 
//verificar se clicou no botão	
isset($_POST['nome']){
	$nome;
	$email;
	$senha
} ?>
</body>
</html>