<?php 

function conectar(){ //Conecta com o MySQL usando PDO
    $elo = new PDO('mysql:host=localhost; dbname=ouvidoria; charset=utf8', 'root','');

    ini_set('display_errors', true);
	error_reporting(E_ALL);
 
    return $elo;
}

function criptografar($str){//Cria o hash da senha, usando MD5 e SHA-1
    return sha1(md5($str));
}
 
function logado(){//Verifica se o usuário está logado
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] != true){
        return false;
    }else{
    	return true;
    }  
}

function cadastrado(){//Verifica se o usuário foi cadastrado
    if (!isset($_SESSION['cadastrado']) || $_SESSION['cadastrado'] != true){
        return false;
    }else{
        return true;
    }  
}

function manifestado(){//Verifica se a manifestação foi submetida
    if (!isset($_SESSION['manifestado']) || $_SESSION['manifestado'] != true){
        return false;
    }else{
        return true;
    }  
}

function selecionado(){//Verifica se as informações foram puxadas do BD
    if (!isset($_SESSION['selecionado']) || $_SESSION['selecionado'] != true){
        return false;
    }else{
        return true;
    }  
}

function contabilizado(){//Verifica se as estatísticas foram contabilizadas
    if (!isset($_SESSION['contabilizado']) || $_SESSION['contabilizado'] != true){
        return false;
    }else{
        return true;
    }  
}

function consultado(){//Verifica se as informações foram puxadas do BD
    if (!isset($_SESSION['consultado']) || $_SESSION['consultado'] != true){
        return false;
    }else{
        return true;
    }  
}

function validado(){//Verifica se a seção foi validada
    if (!isset($_SESSION['validado']) || $_SESSION['validado'] != true){
        return false;
    }else{
        return true;
    }  
}

function atualizado(){//Verifica se os dados foram atualizados
    if (!isset($_SESSION['atualizado']) || $_SESSION['atualizado'] != true){
        return false;
    }else{
        return true;
    }  
}

function reportado(){//Verifica se o feedback foi submetido
    if (!isset($_SESSION['reportado']) || $_SESSION['reportado'] != true){
        return false;
    }else{
        return true;
    }  
}

function respondido(){//Verifica se o feedback foi submetido
    if (!isset($_SESSION['respondido']) || $_SESSION['respondido'] != true){
        return false;
    }else{
        return true;
    }  
}

function ouvidor(){//Verifica se o usuário é ouvidor
    if (!isset($_SESSION['ouvidor']) || $_SESSION['ouvidor'] != true){
        return false;
    }else{
        return true;
    }  
}

function administrador(){//Verifica se o usuário é o administrador
    if (!isset($_SESSION['administrador']) || $_SESSION['administrador'] != true){
        return false;
    }else{
        return true;
    }  
}

 ?>