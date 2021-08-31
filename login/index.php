<?php 
require_once 'usuarios.php'; //chamando o arquivo com a classe Usuario
$usuario = new Usuario; //instanciando a classe Usuario
 ?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta charset="utf-8">
	<title>Tela de Login</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div id= "corpo-form">
		<h1>Entrar</h1>
			<form method="POST">
				<input type="email" name="" placeholder="Usuário" maxlength="30">
				<input type="password" name="" placeholder="Senha"maxlength="32">
				<input type="submit" value="Acessar">
				<a href="cadastrar.php">Ainda não é inscrito? <strong> Cadastrar</strong></a>	
			</form>
	</div>
<?php 
//verificar se clicou no botão	
if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	if (!empty($email) && !empty($senha)) //verificar se os campos Ñ estao vazios
	{
		//fazer a conexão com o banco
		$usuario->conectar("log1in","localhost", "root", "");
		if ($usuario->msgErro == '')//Caso tenha mensagem de erro não conecta 
		{
			if ($usuario->logar($email,$senha)) 
			{
				header("location: areaprivada.php");//true
			}	
			else
			{
			//false
			?>
			<div id="msg-erro">			  
			 Email e/ou senha estão incorretos!
			</div>
			<?php
			}
		}
		else
		{ //Caso não encontre o email/senha
			?>
			<div class="msg-erro">
				<?php echo "Erro: ".$usuario->msgErro;?>
			</div>
			<?php
		}
	}
	else
	{
			?>
	<div id="msg-erro">
		Atenção Preencha todos os campos
	</div>
	<?php
	}
}
	?>
</body>
</html>