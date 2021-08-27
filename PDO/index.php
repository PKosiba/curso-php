<?php
require_once 'classe-pessoa.php';
$p =new Pessoa("crudpdo", "localhost", "root", ""); //
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro Pessoa</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php 
		if(isset($_POST['nome']))// Clic botão cadastrar/Atualizar
		{//addslasher protege o codigo
			if(isset($_GET['id_up']) && !empty($_GET['id_up']))
			{
				$id_atualizar = addslashes($_GET['id_up']);
				$nome = addslashes($_POST['nome']);
				$email = addslashes($_POST['email']);
				$telefone = addslashes($_POST['telefone']);
				// Verifica se todos os campos foram preenchidos
				if (!empty($nome)&& !empty($email) && !empty($telefone))
				{// se o retorno de p for falso print email cadastrado
						$p->atualizarDados($id_atualizar, $nome,$email,$telefone);
						header("location:index.php");
				}
				else 	
				{
					?>
					<div class = 'aviso'>
						<h4>Preencha os campos</h4>
		<?php
				}
			}
			else
			{
				$nome = addslashes($_POST['nome']);
				$email = addslashes($_POST['email']);
				$telefone = addslashes($_POST['telefone']);
				// Verifica se todos os campos foram preenchidos
				if (!empty($nome)&& !empty($email) && !empty($telefone))
				{// se o retorno de p for falso print email cadastrado
					if(!$p->cadastrarDados($nome,$email,$telefone))
					{
		?>
					<div class = "aviso">
						<h4>'Este email já foi cadastrado!</h4>
					</div>
		<?php
					}
				}
				else 	
				{
		?>			<div class ="aviso">
						<img src="aviso.png" width="50px" float="left" display="block">
						<h4 float="left">Preencha os campos!</h4>
					</div>
		<?php		
				}
			}
		}
			//--------------------Caso a pessoa clique no botão editar cria-se a variavel $res
			if (isset($_GET['id_up'])) {
				$id_up = addslashes($_GET['id_up']);
				$res = $p->buscarDadosPessoa($id_up);
			}
		?>
		<section id ="esquerda">
			<form method="POST">
				<h2>Cadastrar Pessoas</h2>
				<label>Nome</label>
				<input type="text" name="nome" id="nome" value="<?php if (isset($res)){echo $res['nome'];}?>">
				<label>Email</label>
				<input type=Email name="email" id="email" value="<?php if (isset($res)){echo $res['email'];}?>">
				<label>Telefone</label>
				<input type="text" name="telefone" id ="telefone" value="<?php if(isset($res)){echo $res['telefone'];}?>">
				<input type="submit" value=" <?php if(isset($res)){echo "Atualizar";} else {echo "Cadastrar";} ?>">
			</form>
		</section>
		<section id = "direita">
			<table> 
				<tr id="titulo">
					<td>Nome</td>
					<td>Email</td>
					<td colspan="2">Telefone</td><!--colspan 2 assume 2 lugares na linha-->	
				</tr>
				<tr>
					<?php
					//Dentro da classe Pessoa("p" instanciado la em cima) busca o buscarDados
						$dados = $p->buscarDados(); 
						// se dados for maior que 0
						if(count($dados)>0)
						{
							for ($i=0; $i < count($dados); $i++) //Da posição 0 acrescenta i++ até i ser menor que o contador $dados 
							{
							echo "<tr>"; //cria a linha e coloca tudo a baixo dela
							foreach ($dados[$i] as $key => $valor) 
								{//coloca os itens da variavel $dados na sequencia
								if($key !="id")//so entra no bloco de codigo se for diferente de id
									{ 
										echo "<td>".$valor."</td>";//printa o valor em coluna sequencial 
									}
								}
					?>
					<!--HTML-->
										<td><!--colocado dentro da linha para que cada uma tenha um edit excl-->
											<a href="index.php?id_up= <?php echo $dados[$i]['id']?>">Editar</a>
											<a href="index.php?id=<?php echo $dados[$i]['id']?>">Excluir</a>
										</td>
					<!--/HTML-->					 
					<?php
						echo "</tr>";//encerra a linha
							}
						}
						else{
							?>
							<div class="aviso">
								<h4>Ainda não há pessoas cadastradas!</h4>
							</div>
							<?php
						}
					?>
			</table>
		</section>
	</body>
</html>
<?php 
	if (isset($_GET['id'])) 
	{
		$id_pessoa = addslashes($_GET['id']);
		$p->excluirDados($id_pessoa);
		header("location: index.php");
		//echo "<script language='javascript'>window.location.href='index.php';</script>";	
	}
?>