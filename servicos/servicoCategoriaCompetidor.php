<?php
function defineCategoriaCompetidor(string $nome, string $idade, string $sexo) : ?string 
{
    $categorias = [];
    $categorias[] = 'infantil';
    $categorias[] = 'adolescente';
    $categorias[] = 'adulto';
    $categorias[] = 'idoso';
    
    //Se validaNome e validaIdade for true executa o codigo
    if (validaNome ($nome)&& validaIdade($idade)&& validaSexo($sexo))//ok
    {//ok
        removerMensagemErro();
        if ($idade >= 6 && $idade <= 12)//ok
        {//ok
            for($i = 0; $i <= count($categorias);$i++)//ok
            {//ok
                if ($categorias[$i] == 'infantil') //ok
                {   /*função antes de setar a mensagem de sucesso em 'servicoMensagemSessao.php'
                    *$_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome."  compete na categoria ".$categorias[$i]; 
                    */
                    setarMensagemSucesso("O nadador ".$nome."  compete na categoria ".$categorias[$i].' '.$sexo);//ok
                    return null;//ok
                }//ok
            }//ok
        }//ok
        else if ($idade >= 13 && $idade <= 18) //ok
        {//ok
            for ($i = 0; $i <= count($categorias); $i++)//ok
            { //ok
                if ($categorias[$i] == 'adolescente')
                { //ok
                //ok
                    /*função antes de setar a mensagem de sucesso em 'servicoMensagemSessao.php'
                     *$_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome."  compete na categoria ".$categorias[$i]; 
                     */
                    setarMensagemSucesso("O nadador ".$nome."  compete na categoria ".$categorias[$i].' '.$sexo);//ok
                    return null;//ok   
                }     
            }
        }
        else
        {//ok
            for ($i=0; $i <= count($categorias); $i++)//ok
            { //ok
                if ($categorias[$i] == 'adulto') //ok
                {//ok
                    /*função antes de setar a mensagem de sucesso em 'servicoMensagemSessao.php'
                     *$_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome."  compete na categoria ".$categorias[$i]; 
                     */
                    setarMensagemSucesso("O nadador ".$nome."  compete na categoria ".$categorias[$i].' '.$sexo);//ok
                    return null;//ok
                }//ok
            }//ok
        }//ok
    }//ok
        else //ok
        {//ok
            //Se validaNome e/ou validaIdade for false exibe codigo erro
            removerMensagemSucesso();
            return obterMensagemErro();//ok
        }//ok*/
}//ok