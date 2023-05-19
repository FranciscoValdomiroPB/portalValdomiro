<?php session_start();

if (!isset($_SESSION['nome_login'])) {

	session_destroy();

	unset($_SESSION['nome_login']);
	unset($_SESSION['tipo_login']);

	echo "<script> alert ('ERRO: É NECESSÁRIO FAZER LOGIN');</script>";

	echo "<script> window.location.href='http://localhost/portalValdomiro';</script>";

}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gruta</title>


</head>

<body>
	<!--CABEÇALHO DA PAGINA INICIAL-->
	<header>
		<div class="imagem_logo">
			<div><img src="http://localhost//portalValdomiro/img/logo.png"></div>
		</div>
		<nav>
			<ul class="menu">
				<li><a href="<?php echo $_SESSION['url_cliente']; ?>">Início</a></li>
				<li><a href="#">Perfil</a>

					<ul>
						<li><a href="<?php echo $_SESSION['url_cliente'] . "/perfil/perfil.php"; ?>">Cadastrar</a></li>
						<li><a href="<?php echo $_SESSION['url_cliente'] . "/perfil/editar.php"; ?>">Editar</a></li>
						<li><a href="<?php echo $_SESSION['url_cliente'] . "/perfil/excluir.php"; ?>">Excluir</a></li>
						<li><a href="<?php echo $_SESSION['url_cliente'] . "/perfil/exibir.php"; ?>">Exibir</a></li>
					</ul>

				</li>
				<li><a href="<?php echo $_SESSION['url_cliente'] . "/pousadas/pousadas.php"; ?>">Pousadas</a></li>
				<li><a href="<?php echo $_SESSION['url_cliente'] . "/deliverys/deliverys.php"; ?>">Deliverys </a></li>
				<li><a href="<?php echo $_SESSION['url'] . "/sair.php"; ?>">Sair</a></li>
			</ul>
		</nav>
		<label>
			<?php echo "Seja bem-vindo(a), " . $_SESSION['nome_completo_login'] . " a"; ?>
			<h1>Presidente Figueiredo-AM</h1>
		</label>

	</header>
</body>