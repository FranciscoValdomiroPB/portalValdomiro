<?php
session_start();
session_destroy();

require_once "conexao.php"; // Inclui o arquivo conexao.php

header("Location: $url");
exit;
?>
