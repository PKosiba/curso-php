<?php
session_start();

function setarMensagemSucesso(string $mensagem): void//OK
{
    $_SESSION['mensagem-de-sucesso'] = $mensagem;//OK
}

function obterMensagemSucesso(): ?string        //OK
{
    if (isset($_SESSION['mensagem-de-sucesso']))//OK 
        return $_SESSION['mensagem-de-sucesso'];//OK
    return null;                                //OK
}

function setarMensagemErro(string $mensagem): void//Void indica nao ter retorno //ok
{//ok
    $_SESSION['mensagem-de-erro'] = $mensagem;//Setar a mensagem de erro dentro da variavel $mensagem 
}//ok
function obterMensagemErro(): ?string //"?string" pode receber string ou boleano //ok
{//ok
    if (isset($_SESSION['mensagem-de-erro'])) //ok
        return $_SESSION['mensagem-de-erro'];//ok
    
    return null;//ok
}//ok

function removerMensagemSucesso(): void         //OK
{
    if(isset($_SESSION['mensagem-de-sucesso'])) //OK
        //UNSET apaga determinada mensagem
        unset($_SESSION['mensagem-de-sucesso']);// OK
}
function removerMensagemErro() : void           //OK
{
    if (isset($_SESSION['mensagem-de-erro']))   //OK 
        //UNSET apaga determinada mensagem
        unset($_SESSION['mensagem-de-erro']);    // OK
} //OK