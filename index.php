<!DOCTYPE html>

<html lang="pt-br">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gruta</title>

	<!-- ARQUIVO DE ESTILOS DO PORTAL -->
	<link rel="stylesheet" type="text/css" href="../css/estilologin.css">

</head>


<body>

	<form id="form_login" name="form_login" class="form_login" method="post" action="valida_login.php">

		<div>
			<h1>LOGIN</h1>
		</div>

		<div class="agrupamento_login">

			<div>

				<div><label>Usuário</label></div>

				<div><input type="text" id="nome" name="nome" required autofocus></div>

				<div><label>Senha</label></div>

				<div><input type="password" id="senha_login" name="senha_login" required></div>

				<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Entrar"></div>
				<div style="padding-left: 5rem;">Não tem conta? <a href="cadastro.php" style="color: white">Criar uma
						conta</a></div>
			</div>

			<div>

				<img src="img/logo.png" class="logo_login">

			</div>


		</div>

	</form>
</body>

</html>