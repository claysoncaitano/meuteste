<?php
session_start();

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);


    require_once 'connect.php';

    $connect -> login($usuario, $senha);

?>