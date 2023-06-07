<?php require('../topo_admin.php');

require('../../conexao.php');

$id_pousada = $_GET['id_pousada'];

$select_pousada = mysqli_query($conexao, "SELECT * FROM `pousada` WHERE id_pousada = $id_pousada");

if (mysqli_num_rows($select_pousada) > 0) {
	$dados_pousada = mysqli_fetch_assoc($select_pousada);
} else {
	echo "<script> alert ('NÃO EXISTEM CURSOS CADASTRADOS!');</script>";
	echo "<script> window.location.href='$url_admin/pousadas';</script>";
}

?>

<form id="form_pousada" name="form_pousada" method="POST" class="form_login_pousada" action="salvarPousada.php" enctype="multipart/form-data">

	<div>
		<h1>ATUALIZAR POUSADA</h1>
	</div>

	<div class="agrupamento_editar_pousada">

		<div>
			<div><label>Código</label></div>
			<div><input type="text" id="id_pousada" name="id_pousada" value="<?php echo $dados_pousada['id_pousada']; ?>" readonly></div>
		</div>

		<div>
			<div><label>Foto</label></div>
			<div>
				<!-- Exibição da imagem atual -->
				<?php
				if (!empty($dados_pousada['fotos'])) {
					echo '<img src="data:image/jpeg;base64,'.base64_encode($dados_pousada['fotos']).'" alt="Imagem da pousada">';
				}
				?>
				<!-- Campo para selecionar uma nova imagem -->
				<input type="file" id="fotos" name="fotos">
			</div>
		</div>

		<div>
			<div><label>Nome da pousada</label></div>
			<div><input type="text" id="nome" name="nome" value="<?php echo $dados_pousada['nome']; ?>" required autofocus></div>
		</div>
		
		

		<div>
			<div><label>Número de Quartos Disponíveis</label></div>
			<div><input type="number" id="numero_quartos" name="numero_quartos" value="<?php echo $dados_pousada['numero_quartos']; ?>"></div>
		</div>

		<div>
			<div><label>Preço do Quartos</label></div>
			<div><input type="number" placeholder="0.00" required name="preco_noite" min="0" value="<?php echo $dados_pousada['preco_noite']; ?>" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"></div>
		</div>

		<div>
			<div><label>Endereço</label></div>
			<div><input type="text" id="endereco" name="endereco" value="<?php echo $dados_pousada['endereco']; ?>"></div>
		</div>

		<div>
			<div><label>Descrição</label></div>
			<div><input type="text" id="descricao" name="descricao" value="<?php echo $dados_pousada['descricao']; ?>"></div>
		</div>

	</div>

	<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Salvar"></div>

</form>

</body>

</html>
