<?php
declare (strict_types=1); //Ativar tipagem forte por arquivo
function validaNome(string $nome) : bool
{
    if(empty($nome))
    {
        setarMensagemErro('O nome não pode estar vazio. Por favor preencha-o novamente');
        return false;
    }
    //verifica se o campo nome tem pelo menos 3 caracteres
    else if (strlen($nome) < 3)
    {
        setarMensagemErro('O nome não pode ter menos de 3 caracteres. Por favor preencha-o novamente');
        return false;
    }
    //Verifica se o campo nome não exceda 40 caracteres
    else if (strlen($nome) > 40)
    {
        setarMensagemErro('O nome não pode ser tão estenço. Por favor preencha-o novamente');
        return false;
    }
    return true;// true para continuar com a verificação
}
function validaIdade(string $idade): bool
{
    //Permite somente números no campo idade
    if (!is_numeric($idade))
    {
        setarMensagemErro('Informe um número para a idade. Por favor preencha-o novamente');
        return false;
    }
    return true;// true para continuar com o codigo
}
