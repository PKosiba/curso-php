<?php
function defineCategoriaCompetidor(string $nome, string $idade) : ?string 
{
    $categorias = [];
    $categorias[] = 'infantil';
    $categorias[] = 'adolescente';
    $categorias[] = 'adulto';
    $categorias[] = 'idoso';
    
    //Se validaNome e validaIdade for true executa o codigo
    if (validaNome ($nome)&& validaIdade($idade))
    {
        removerMensagemErro();
        if ($idade >= 6 && $idade <= 12)
        {
            for($i = 0; $i <= count($categorias);$i++)
            {
                if ($categorias[$i] == 'infantil') 
                {   /*função antes de setar a mensagem de sucesso em 'servicoMensagemSessao.php'
                    *$_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome."  compete na categoria ".$categorias[$i]; 
                    */
                    setarMensagemSucesso("O nadador ".$nome."  compete na categoria ".$categorias[$i]);
                    return null;
                }
            }
        }
        else if ($idade >= 13 && $idade <= 18) 
        {
            for ($i = 0; $i <= count($categorias); $i++)
            { 
                if ($categorias[$i] == 'adolescente') 
                {
                    /*função antes de setar a mensagem de sucesso em 'servicoMensagemSessao.php'
                     *$_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome."  compete na categoria ".$categorias[$i]; 
                     */
                    setarMensagemSucesso("O nadador ".$nome."  compete na categoria ".$categorias[$i]);
                    return null;        
                }
            }
        }
        else
        {
            for ($i=0; $i <= count($categorias); $i++)
            { 
                if ($categorias[$i] == 'adulto') 
                {
                    /*função antes de setar a mensagem de sucesso em 'servicoMensagemSessao.php'
                     *$_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome."  compete na categoria ".$categorias[$i]; 
                     */
                    setarMensagemSucesso("O nadador ".$nome."  compete na categoria ".$categorias[$i]);
                    return null;
                }
            }
        }
    }
    else 
        {
            //Se validaNome e/ou validaIdade for false exibe codigo erro
            removerMensagemSucesso();
            return obterMensagemErro();
        }
}