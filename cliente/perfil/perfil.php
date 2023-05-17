<?php require('../topo_cliente.php'); ?>

<!-- ARQUIVO DE ESTILO DO PORTAL -->
<link rel="stylesheet" type="text/css" href="http://localhost//portalValdomiro/css/estiloPerfil.css">
<!--CONTEÚDO DA PÁGINA PERFIL---->
<main>
	<div class="container">
		<div class="left box-primary">
			<img class="image" src="../../img/perfil_sem_foto.png" alt="" />
			<div class="username text-center"><?php echo  $_SESSION['nome_completo_login']; ?></div>
			<a href="../../img/perfil_sem_foto.png" class="btn btn-primary btn-block"><b>Editar Perfil</b></a>
		</div>
		<div class="right tab-content">
			<form class="form-horizontal">
				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">Nome:</label>

					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputName" placeholder="exemplo: Fulano de Tal">
					</div>
				</div>

				<div class="form-group">
					<label for="dataNascimento" class="col-sm-2 control-label">Data de Nascimento:</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="dataNascimento" name="dataNascimento">
					</div>
				</div>

				<div class="form-group">
					<label for="celular" class="col-sm-2 control-label">Número de celular:</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="celular" name="celular">
					</div>
				</div>

				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">CPF:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cpf" \ pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \
							placeholder="xxx.xxx.xxx-xx"
							\pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})">
						<input type="submit" value="Verificar">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" class="form-control" id="inputEmail"
							placeholder="Exemplo: Exemplo@exemplo.com">
						<input type="submit" value="Verificar">
					</div>
				</div>

				<div class="form-group">
					<label for="inputSenha" class="col-sm-2 control-label">Senha:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="Senha" \ placeholder="Maaaaaaa9@">
					</div>
				</div>

				<div class="form-group">
					<label for="inputSenha" class="col-sm-2 control-label">Confirmar Senha:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="Senha" \ placeholder="Maaaaaaa9@">
						<input type="submit" value="Verificar">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-danger">Salvar alterações</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</main>
<footer>
	<p>Francisco Valdomiro © 2023</p>
</footer>

</html>