<?php //session_start();

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db_name = "db_pousadas";


$conexao = mysqli_connect($servidor, $usuario, $senha, $db_name) or die('Banco de dados indisponível.');

date_default_timezone_set("America/Manaus");

$host_ip = $_SERVER['HTTP_HOST'];

$url = "http://" . $host_ip . "/pousadas";

$url_admin = "http://" . $host_ip . "/po/admin";

$url_cliente = "http://" . $host_ip . "/portal/cliente";

?>