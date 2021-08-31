<?php 
class Usuario
{
	private $banco;
	public $msgErro="";

	public function conectar($nome, $host, $usuario, $senha)
	{
		global $banco;
		global $msgErro;
		try 
		{
			$banco = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);	
		} catch (PDOException $e) 
		{
			$msgErro = $e->getMessage();
			echo "Erro banco de dados";
		} 
	}
	public function cadastrar($nome, $telefone, $email, $senha)
	{
		global $banco;
		global $msgErro;
		/* Verificar se o email já existe*/
		$sql =$banco->prepare("SELECT ID FROM usuarios WHERE email = :email");
		$sql->bindValue(":email",$email	); //substituir usando o bindValue
		$sql->execute(); //metodo prepare necessario executar
		if ($sql->rowCount() > 0)  //Se a variavel sql retornar algo significa que o email ja consta no BD
		{
			return false; //impede o cadastro
		}
		else //se rowCount for = 0 significa que não ha cadastro
		{
			//cadastrar usuarios com nome, telefone, email e senha
			$sql = $banco->prepare("INSERT INTO usuarios(nome, telefone, email, senha) VALUES(:nome,:telefone,:email, :senha)");
			 //substituir usando o bindValue
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':telefone', $telefone);
			$sql->bindValue(':email', $email);
			$sql->bindValue(':senha',md5($senha));
			$sql->execute(); //execute sempre que tiver prepare
			return true;
		}
	}
	public function logar($email, $senha)
	{
		global $banco;
		global $msgErro;

		$sql = $banco->prepare("SELECT ID FROM usuarios WHERE email = :email AND senha =:senha");
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', md5($senha));
		$sql->execute();
		if($sql->rowCount() >0)
		{
			//entra no sistema
			$dados=$sql->fetch();//FETCH pq é um usuário só
			session_start();
			$_SESSION['ID'] = $dados['ID'];
			return true;	//logado com sucesso
		}
		else{
			return false; //não foi possivel logar
		}
	}
}
?>