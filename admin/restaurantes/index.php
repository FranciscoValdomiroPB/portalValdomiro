<?php require('../topo_admin.php'); ?>



<form id="form_restaurante" name="form_restaurante" method="POST" enctype="multipart/form-data" action="salvarRestaurante.php"
	class="form_login_restaurante">

	<div>
		<h1>CADASTRAR RESTAURANTES</h1>
	</div>

	<div class="agrupamento_editar_restaurante">

		<div>
			<div><label>Nome do restaurante</label></div>
			<div><input type="text" id="nome" name="nome" required autofocus></div>
		</div>

		<div>
			<div><label>Foto</label></div>
			<div><input type="file" id="fotos" name="fotos" required></div>
		</div>

		<div>
			<div><label>Preço dos Pratos Mínimo</label></div>
			<div><input type="number" placeholder="0.00" required name="valor_minimo" min="0" value="0" step="0.01"
					title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
" id="valor_minimo"></div>
		</div>
		<div>
			<div><label>Preço dos Pratos Máximo</label></div>
			<div><input type="number" placeholder="0.00" required name="valor_maximo" min="0" value="0" step="0.01"
					title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
" id="valor_maximo"></div>
		</div>

		<div>
			<div><label>Contato</label></div>
			<div>
				<input type="tel" id="contato" name="contato" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" required>
				<small>Formato exigido: (XX) XXXXX-XXXX</small>
			</div>
		</div>

		<div>
			<div><label>Endereço</label></div>
			<div><textarea id="endereco" name="endereco" required></textarea></div>
		</div>
		<div>
			<div><label>Endereço Por Link</label></div>
			<div><input type="url" id="endereco_link" name="endereco_link" required></div>
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