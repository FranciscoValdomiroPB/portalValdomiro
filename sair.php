<?php
session_start();
require_once "conexao.php"; // Inclui o arquivo conexao.php

session_destroy();

header("Location: $url");
exit;
?>