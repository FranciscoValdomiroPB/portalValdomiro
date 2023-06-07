<?php 
// Inclui os arquivos necessários
require('../topo_admin.php');
require('../../conexao.php');

// Obtém o ID do restaurante da URL
$id_restaurante = $_GET['id_restaurante'];

// Consulta o banco de dados para obter os dados do restaurante com base no ID
$select_restaurante = mysqli_query($conexao, "SELECT * FROM `restaurante` WHERE id_restaurante = $id_restaurante");

// Verifica se o restaurante foi encontrado
if (mysqli_num_rows($select_restaurante) > 0) {
	// Extrai os dados do restaurante
	$dados_restaurante = mysqli_fetch_assoc($select_restaurante);
} else {
	// Se o restaurante não for encontrado, exibe uma mensagem de alerta e redireciona para a página de restaurantes
	echo "<script> alert ('NÃO EXISTEM CURSOS CADASTRADOS!');</script>";
	echo "<script> window.location.href='$url_admin/restaurantes';</script>";
}
?>

<form id="form_restaurante" name="form_restaurante" method="POST" class="form_login_restaurante" action="salvarRestaurante.php" enctype="multipart/form-data">
	<div>
		<h1>ATUALIZAR RESTAURANTE</h1>
	</div>

	<div class="agrupamento_editar_restaurante">
		<div>
			<div><label>Código</label></div>
			<div><input type="text" id="id_restaurante" name="id_restaurante" value="<?php echo $dados_restaurante['id_restaurante']; ?>" readonly></div>
		</div>

		<div>
			<div><label>Foto</label></div>
			<div>
				<!-- Exibição da imagem atual -->
				<?php
				if (!empty($dados_restaurante['fotos'])) {
					echo '<img src="data:image/jpeg;base64,' . base64_encode($dados_restaurante['fotos']) . '" alt="Imagem do restaurante">';
				}
				?>
				<!-- Campo para selecionar uma nova imagem -->
				<input type="file" id="fotos" name="fotos">
			</div>
		</div>

		<div>
			<div><label>Nome do restaurante</label></div>
			<div><input type="text" id="nome" name="nome" value="<?php echo $dados_restaurante['nome']; ?>" required autofocus></div>
		</div>

		<div>
			<div><label>Preço dos Pratos Mínimo</label></div>
			<div><input type="number" placeholder="0.00" required name="valor_minimo" min="0" value="<?php echo $dados_restaurante['valor_minimo']; ?>" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"></div>
		</div>

		<div>
			<div><label>Preço dos Pratos Máximo</label></div>
			<div><input type="number" placeholder="0.00" required name="valor_maximo" min="0" value="<?php echo $dados_restaurante['valor_maximo']; ?>" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"></div>
		</div>

		<div>
			<div><label>Endereço</label></div>
			<div><input type="text" id="endereco" name="endereco" value="<?php echo $dados_restaurante['endereco']; ?>"></div>
		</div>

		<div>
			<div><label>Descrição</label></div>
			<div><input type="text" id="descricao" name="descricao" value="<?php echo $dados_restaurante['descricao']; ?>"></div>
		</div>

		<div>
			<div><label>Contato</label></div>
			<div>
				<input type="tel" id="contato" name="contato" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" value="<?php echo $dados_restaurante['contato']; ?>">
				<small>Formato exigido: (XX) XXXXX-XXXX</small>
			</div>
		</div>

	</div>

	<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Salvar"></div>
</form>

</body>
</html>
