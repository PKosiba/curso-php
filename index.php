<?php
/* 
 * SESSION deve sempre estar antes de todo o codigo 
 * utilizado para armazenar dados e/ou para persistir informações
 * session_start(); 
 * Foi incluido o 'servicoMensagemSessao.php' que possui session_start()
 * dispensando o mesmo no arquivo html
 */
//Necessario para poder trazer as mensagens de Erro ou Sucesso
include 'servicos/servicoMensagemSessao.php';
?>
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
                    /*
                     * Função isset verifica se a variavel foi definida
                     * Geralmente a um laço de repetição
                     */
                            /*Mensagem antes de setar em 'servicoValidacao'  
                             *$mensagemDeSucesso = isset($_SESSION['mensagem-de-sucesso']) ?$_SESSION['mensagem-de-sucesso'] : '';
                            */
                        $mensagemDeSucesso= obterMensagemSucesso();
                        if (!empty($mensagemDeSucesso))
                        {
                            echo $mensagemDeSucesso;
                        }
                        /*Mensagem antes de setar em 'servicoValidacao'  
                         *$mensagemDeErro = isset($_SESSION['mensagem-de-erro']) ?$_SESSION['mensagem-de-erro'] : '';
                        */
                        $mensagemDeErro = obterMensagemErro();
                        if (!empty($mensagemDeErro))
                        {
                            echo $mensagemDeErro;
                        }
                     ?>
                    <p>Seu Nome: <input type="text" name="nome" /></p>
                    <p>Sua Idade: <input type="text" name="idade" /></p>
                    <p><input type="submit" value="Salvar" /></p>	
            </form>
	</body>
</html>