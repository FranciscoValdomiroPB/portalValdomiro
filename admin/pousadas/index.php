<?php require('../topo_admin.php'); ?>



<form id="form_pousada" name="form_pousada" method="POST" enctype="multipart/form-data" action="salvarPousada.php"
	class="form_login_pousada">

	<div>
		<h1>CADASTRAR POUSADA</h1>
	</div>

	<div class="agrupamento_editar_pousada">

		<div>
			<div><label>Nome da pousada</label></div>
			<div><input type="text" id="nome" name="nome" required autofocus></div>
		</div>

		<div>
			<div><label>Foto</label></div>
			<div><input type="file" id="fotos" name="fotos"  required ></div>
		</div>

		<div>
			<div><label>Número de Quartos Disponíveis</label></div>
			<div><input type="number" id="numero_quartos" name="numero_quartos" required ></div>
		</div>
		<div>
			<div><label>Preço do Quartos</label></div>
			<div><input type="number" placeholder="0.00" required name="preco_noite" min="0" value="0" step="0.01"
					title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
"id="preco_noite"></div>
		</div>
		<div>
			<div><label>Endereço</label></div>
			<div><textarea id="endereco" name="endereco" required ></textarea></div>
		</div>

		<div>
			<div><label>Descrição</label></div>
			<div><textarea id="descricao" name="descricao" required ></textarea></div>
		</div>

	</div>

	<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Salvar"></div>
</form>

</body>

</html>