<?php
session_start();
require_once "conexao.php"; 

session_destroy();

echo "<script>window.location.href = '$url';</script>";
exit;
?>