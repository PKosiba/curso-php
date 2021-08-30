
<?php 
	require_once'usuarios.php';

	$u=new Usuario

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Tela de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div id="corpo-form-cad">
		<h1>Cadastro</h1>
		<form method="POST">
			<input type="Nome" name= "nome" placeholder="Nome Completo" maxlength="30">
			<input type="Email" name="email" placeholder="Email" maxlength="40">
			<input type="telefone" name= "telefone" placeholder="Telefone" maxlength="15">
			<input type="password" name ="senha" placeholder="Senha"maxlength="32">
			<input type="password" name="confsenha"placeholder="Confirme o Senha" maxlength="32">
			<input type="Submit" value="Cadastrar">
		</form>
	</div>
	<?php 
	if(isset($_POST['nome']))
	{
		$nome =addslashes($_POST['nome']);
		$email=addslashes($_POST['email']);
		$telefone=addslashes($_POST['telefone']);
		$senha=addslashes($_POST['senha']);
		$confsenha=addslashes($_POST['confsenha']);	
		/*Verificar se todos os campos foram pre-enchidos*/
		if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confsenha))
		{
			$u->conectar("login","localhost", "root", "");
			if($u->msgErro == "")
			{
				if($senha == $confsenha)
				{
					if($u->cadastrar($nome, $email, $telefone, $senha, $confsenha))
					{
						echo "Cadastrado com sucesso! Acesse para entrar";
					}
					else
					{
						echo "Email já cadastrado";
					}
				}
				else{
					echo "senha e confirmar senha devem ser a mesma";
				}
			}
			else
			{
				echo "Erro: ".$u->msgErro;
			}
		}
		else
		{
			echo "Preencha todos os Campos!";
		}
	}
	 ?>
	}
</body>
</html> 	 