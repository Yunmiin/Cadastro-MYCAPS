<?php

$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'formulario-mycaps';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//Teste de Conexão
// if ($conexao->connect_errno)
// { 
//     echo "Erro";
// }
// else 
// {
//     echo "Conexão Efetuada com Sucesso";
// }
?>