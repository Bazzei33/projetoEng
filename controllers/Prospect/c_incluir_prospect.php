<?php
session_start();

require_once('ControllerProspect.php');
use controllers\ControllerProspect;

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$ctrlProspect = new ControllerProspect();

try{
    $ctrlProspect->salvarProspect($nome, $email, $login, $senha);
    unset($ctrlProspect);
    $_SESSION['erroLogin'] = "Faça o Login para entrar no sistema";
    header("Location: ../../index.php");
}catch(Exception $e){
    $_SESSION['erroProspectNovo'] = $e->getMessage();
    unset($ctrlProspect);
    header("Location: ../../views/Prospect/v_incluir_prospect.php");
}
?>