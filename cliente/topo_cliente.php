<?php session_start();


if (!isset($_SESSION['nome'])) {

	session_destroy();

	unset($_SESSION['nome']);
	unset($_SESSION['tipo_login']);

	echo "<script> alert ('ERRO: É NECESSÁRIO FAZER LOGIN');</script>";

	echo "<script> window.location.href='$url';</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gruta</title>
	<!-- ARQUIVO DE ESTILOS DO PORTAL -->
	<link rel="stylesheet" type="text/css" href="../../css/estiloCliente.css">

</head>

<body>
	<!--CABEÇALHO DA PAGINA INICIAL-->
	<header>
		<div class="imagem_logo">
			<div><img src="<?php echo $_SESSION['url'] . "/img/logo.png"; ?>">
			</div>
		</div>
		<nav>
			<ul class="menu">
				<li><a href="<?php echo $_SESSION['url_cliente']; ?>">Início</a></li>
				<li><a href="<?php echo $_SESSION['url_cliente'] . "/perfil/exibir.php"; ?>">Perfil</a>

					<!--<ul>
						<li><a href="<?php echo $_SESSION['url_cliente'] . "/perfil/editar.php"; ?>">Editar</a></li>
						<li><a href="<?php echo $_SESSION['url_cliente'] . "/perfil/exibir.php"; ?>">Exibir</a></li>
					</ul>-->

				</li>
				<li><a href="<?php echo $_SESSION['url_cliente'] . "/restaurantes/exibir.php"; ?>">Restaurantes </a>
				</li>
				<li><a href="<?php echo $_SESSION['url'] . "sair.php"; ?>">Sair</a></li>
			</ul>
		</nav>
		<label>
			<?php echo "Seja bem-vindo(a), " . $_SESSION['nome_completo_login'] . " a"; ?>
			<h1>Presidente Figueiredo-AM</h1>
		</label>

	</header>