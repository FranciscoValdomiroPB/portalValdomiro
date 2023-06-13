<?php session_start();



if (!isset($_SESSION['nome'])) {

	session_destroy();

	unset($_SESSION['nome']);
	unset($_SESSION['tipo_login']);

	echo "<script> alert ('ERRO: É NECESSÁRIO FAZER LOGIN');</script>";

	echo "<script> window.location.href='$url';</script>";
}

if ($_SESSION['tipo_login'] <> 0) {

	echo "<script> alert('ERRO: VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA!');</script>";
	session_destroy();

	unset($_SESSION['nome_completo_login']);
	unset($_SESSION['nome']);
	unset($_SESSION['tipo_login']);

	unset($_SESSION['url']);
	unset($_SESSION['url_admin']);
	unset($_SESSION['url_cliente']);

	echo "<script> window.location.href='$url';</script>";
}


?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gruta</title>

	<!-- ARQUIVO DE ESTILOS DO PORTAL -->
	<link rel="stylesheet" type="text/css" href="../css/estiloCliente.css"; ?>">

	<script>

		function confirmar_exclusao(id_pousada) {

			var resposta = confirm("Deseja continuar com a exclusão?");

			if (resposta == true) {

				window.location.href = "excluir.php?id_pousada=" + id_pousada;
			}
		}
	</script>

</head>


<body>

	<header>
		<div class="imagem_logo">
			<div><img src="<?php echo $_SESSION['url'] . "/img/logo.png"; ?>"></div>
		</div>
		<nav>

			<ul class="menu">


				<li><a href="<?php echo $_SESSION['url_admin']; ?>">Início</a>

					<!--<li><a href="#">Perfil</a>
					<ul>
						<li><a href="<?php echo $_SESSION['url_admin'] . "/usuario"; ?>">Cadastrar</a></li>
						<li><a href="<?php echo $_SESSION['url_admin'] . "/usuario/exibir.php"; ?>">Exibir</a></li>
					</ul>

				</li>-->

				<li><a href="#">Pousadas</a>
					<ul>
						<li><a href="<?php echo $_SESSION['url_admin'] . "/pousadas"; ?>">Cadastrar</a></li>
						<li><a href="<?php echo $_SESSION['url_admin'] . "/pousadas/exibir.php"; ?>">Exibir</a></li>
					</ul>

				</li>

				<li><a href="#">Restaurantes</a>
					<ul>
						<li><a href="<?php echo $_SESSION['url_admin'] . "/restaurantes"; ?>">Cadastrar</a></li>
						<li><a href="<?php echo $_SESSION['url_admin'] . "/restaurantes/exibir.php"; ?>">Exibir</a></li>
					</ul>
				</li>

				<li><a href="<?php echo $_SESSION['url'] . "/sair.php"; ?>">Sair</a></li>
			</ul>

		</nav>
		<label>
			<?php echo "Seja bem-vindo, " . $_SESSION['nome_completo_login']; ?>
			<h1>Presidente Figueiredo-AM</h1>
		</label>

	</header>
</body>