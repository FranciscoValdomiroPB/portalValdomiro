<?php
// session_start();

$servidor = "us-cdbr-east-06.cleardb.net";
$usuario = "be22deab4b745a";
$senha = "8bbd61db";
$db_name = "heroku_122968a6d6a2529";


$conexao = mysqli_connect($servidor, $usuario, $senha, $db_name) or die('Banco de dados indisponível.');

date_default_timezone_set("America/Manaus");

$host_ip = $_SERVER['HTTP_HOST'];

$url = "http://" . $host_ip . "/";

$url_admin = "http://" . $host_ip . "/admin";

$url_cliente = "http://" . $host_ip . "/cliente";
?>