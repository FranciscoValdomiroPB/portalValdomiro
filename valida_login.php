<?php session_start();

require('conexao.php');


if (isset($_POST['nome'])) {

	$nome = $_POST['nome'];
	$senha_login = md5($_POST['senha_login']);

	$sql_valida_login = mysqli_query($conexao, "SELECT * FROM login WHERE nome = '" .
		$nome . "' AND senha_login = '" . $senha_login . "'");

	if (mysqli_num_rows($sql_valida_login) > 0) {

		$registros_login = mysqli_fetch_assoc($sql_valida_login);

		$_SESSION['nome_completo_login'] = $registros_login['nome_completo_login'];
		$_SESSION['nome'] = $registros_login['nome'];
		$_SESSION['tipo_login'] = $registros_login['tipo_login'];


		$_SESSION['url'] = $url;
		$_SESSION['url_admin'] = $url_admin;
		$_SESSION['url_cliente'] = $url_cliente;


		if ($_SESSION['tipo_login'] == 0) {

			/*echo "<script> alert('Administrador [LOGADO]');</script>";*/

			echo "<script> window.location.href='$url_admin';</script>";




		} else {

			/*echo "<script> alert('Cliente [LOGADO]');</script>";*/

			echo "<script> window.location.href='$url_cliente';</script>";

		}

	} else {

		echo "<script> alert('Erro ao fazer login. Tente novamente ou faça um novo login.');</script>";

		echo "<script> window.location.href='$url';</script>";

	}

}

?>