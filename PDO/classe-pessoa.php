<?php 

//Criando a classe Pessoa
class Pessoa{
	private $pdo;
	//------------------------------CONEXÃO-------------------------------- 
	//Construtor é o ponto de partida nada mais justo que fazer a conexão
	public function __construct($dbname,$host,$user,$senha){
		try 
		{
			$this->pdo = new PDO("mysql:dbname=".$dbname. ";$host= ".$host, $user ,$senha);
		} 
		//--------------------Pegar mensagens de ero-------------------------
		catch (PDOException $e) 
		{
			echo "PROBLEMAS COM DB".$e->getMessage();
			exit();			
		}
		catch(Exception $e)
		{
			echo "ERRO GENERICO ".$e->getMessage();
			exit();
		}	
	}
	//-------------------------------SELECT EXIBIDO A DIREITA------------------------------
		//Criando a função de Busca ao lado direito da tela
	public function buscarDados()
	{
		$res = array();	//Criando uma variavel com array vazia 	
		$sql =("SELECT * FROM pessoa ORDER BY id");
		$cmd =$this->pdo->query($sql);	// Recebe o pdo (private), faz o select do banco e passa para a variavel cmd
		$res =$cmd->fetchAll(PDO::FETCH_ASSOC); //Função para excluir duplicatas (FETCHALL trabalha com arrays tipo matriz)
		return $res;
	}
	//-------------------------------INSERT EXIBIDO A ESQUERDA----------------------------
		//Função de verificar cadastro e caso nao tenha criar
	public function cadastrarDados($nome, $telefone, $email)
	{
		//Antes de cadastrar verificar se ja tem o email
		//Selecionar o id onde o email for igual ao passado
		$cmd = $this->pdo->prepare('SELECT id FROM pessoa WHERE email = :email');
		$cmd -> bindValue(":email", $email); //bindValue
		//prepare é necessario executar
		$cmd->execute();
		if($cmd->rowCount()> 0){ //verifica se a variavel cmd tem 
			return false;//Caso haja registro 
		}
		else 
		{
			$cmd = $this->pdo->prepare("INSERT INTO pessoa(nome, telefone, email) VALUES (:nome, :email, :telefone)");
			$cmd->bindValue(":nome",$nome);
			$cmd->bindValue(":email", $email);
			$cmd->bindValue(":telefone",$telefone);
			$cmd->execute();//prepare é necessario executar
			return true;		
		}
	}
	//--------------------------------EXCLUIR DADOS---------------------------------------
	public function excluirDados($id)
	{
		$cmd = $this->pdo->prepare("DELETE FROM pessoa WHERE id = :id");
		$cmd->bindValue(":id", $id);
		$cmd->execute();//prepare é necessario executar
	}
	//----------------------------SELECIONAR UMA PESSOA EM ESPECIFICA---------------------
	public function buscarDadosPessoa($id){
		$result = array();
		$cmd=$this->pdo->prepare("SELECT * FROM pessoa WHERE id =:id");
		$cmd->bindValue(":id", $id);
		$cmd->execute();
		$result = $cmd -> fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	//----------------------------ATUALIZAR DADOS ---------------------------------------
	public function atualizarDados($id,$nome,$email,$telefone)
	{
		$cmd =$this->pdo->prepare("UPDATE pessoa SET nome = :nome, email =:email, telefone =:telefone WHERE id = :id");
		$cmd->bindValue(":nome", $nome);
		$cmd->bindValue(":email", $email);
		$cmd->bindValue(":telefone", $telefone);
		$cmd->bindValue(":id", $id);
		$cmd->execute();
	}
}
?>