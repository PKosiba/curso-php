<?php
// sessão deve sempre estar antes de todo o codigo
	session_start();
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulario</title>
		<meta name ="author" content="">
		<meta name = "description" content="">
		<meta name = "viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<p>Formulário Para Inscrição de Competidores</p>

			<!--METHOD descreve o tipo de envio do formulario "GET ou POST"
				ACTION qual arquivo/rota/url submeter os dados-->
		<form action="script.php" method="post">
			<?php
				$mensagemDeSucesso = isset($_SESSION['mensagem-de-sucesso']) ?$_SESSION['mensagem-de-sucesso'] : '';
				if (!empty($mensagemDeSucesso)){
					echo $mensagemDeSucesso;
				}
				$mensagemDeErro = isset($_SESSION['mensagem-de-erro'])	? $_SESSION['mensagem-de-erro'] : '';
				if(!empty($mensagemDeErro)){
					echo $mensagemDeErro;
				}

			 ?>
			<p>Seu Nome: <input type="text" name="nome" /></p>
			<p>Sua Idade: <input type="text" name="idade" /></p>
			<p><input type="submit" value="Salvar" /></p>	
		</form>
	</body>
</html>