<?php require('../topo_admin.php'); ?>



<form id="form_pousada" name="form_pousada" method="post" action="salvar.php" class="form_pousada">

	<div>
		<h1>CADASTRAR POUSADA</h1>
	</div>

	<div class="agrupamento_pousada">

		<div>
			<div><label>Nome da pousada</label></div>
			<div><input type="text" id="nome_pousada" name="nome_pousada" required autofocus></div>
		</div>

		<div>
			<div><label>Foto</label></div>
			<div><input type="file" id="foto" name="foto" accept="image/*" required></div>
		</div>

		<div>
			<div><label>Número do celular</label></div>
			<div><input type="text" id="celular" name="celular" required></div>
		</div>

		<div>
			<div><label>Endereço</label></div>
			<div><textarea id="endereco" name="endereco" required></textarea></div>
		</div>

		<div>
			<div><label>Descrição</label></div>
			<div><textarea id="descricao" name="descricao" required></textarea></div>
		</div>

	</div>

	<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Salvar"></div>

</form>

</body>

</html>