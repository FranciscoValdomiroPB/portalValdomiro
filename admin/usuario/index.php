<?php require('../topo_admin.php'); ?>



<form id="form_usuario" name="form_usuario" method="POST" enctype="multipart/form-data" action="salvar.php"
	class="form_login_usuario">

	<div>
		<h1>CADASTRAR USUÁRIO</h1>
	</div>

	<div class="agrupamento_editar_usuario">

		<div>
			<div><label>Tipo de Login</label></div>
			<div><input type="number" id="tipo_login" name="tipo_login" required></div>
		</div>

		<div>
			<div><label>Nome da Usuário</label></div>
			<div><input type="text" id="nome" name="nome" required autofocus></div>
		</div>

		<div>
			<div><label>Nome da Usuário Completo </label></div>
			<div><input type="text" id="nome_completo_login" name="nome_completo_login" required></div>
		</div>

		<div>
			<div><label>Foto</label></div>
			<div><input type="file" id="fotos" name="fotos"></div>
		</div>

		<div>
			<div><label>Contato</label></div>
			<div>
				<input type="tel" id="contato" name="contato">
				<small>Formato exigido: (XX) XXXXX-XXXX</small>
			</div>
		</div>

		<div>
			<div><label>Email</label></div>
			<div><input type="email" id="email" name="email"></div>
		</div>

		<div>
			<div><label>Senha</label></div>
			<div><input type="text" id="senha_login" name="senha_login" required></div>
		</div>



		<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Salvar"></div>
</form>

</body>

</html>