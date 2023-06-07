<?php require('../topo_admin.php');

require('../../conexao.php');

$id_usuario = $_GET['id_usuario'];

$select_usuario = mysqli_query($conexao, "SELECT * FROM `usuario` WHERE id_usuario = $id_usuario");

if (mysqli_num_rows($select_usuario) > 0) {
	$dados_usuario = mysqli_fetch_assoc($select_usuario);
} else {
	echo "<script> alert ('NÃO EXISTEM CURSOS CADASTRADOS!');</script>";
	echo "<script> window.location.href='$url_admin/usuario';</script>";
}

?>

<form id="form_usuario" name="form_usuario" method="POST" class="form_login_usuario" action="salvar.php" enctype="multipart/form-data">

	<div>
		<h1>ATUALIZAR USUÁRIO</h1>
	</div>

	<div class="agrupamento_editar_usuario">

		<div>
			<div><label>Código</label></div>
			<div><input type="text" id="id_usuario" name="id_usuario" value="<?php echo $dados_usuario['id_usuario']; ?>" readonly></div>
		</div>

		<div>
			<div><label>Foto</label></div>
			<div>
				<!-- Exibição da imagem atual -->
				<?php
				if (!empty($dados_usuario['fotos'])) {
					echo '<img src="data:image/jpeg;base64,'.base64_encode($dados_usuario['fotos']).'" alt="Imagem da usuario">';
				}
				?>
				<!-- Campo para selecionar uma nova imagem -->
				<input type="file" id="fotos" name="fotos">
			</div>
		</div>

		<div>
			<div><label>Nome da Usuário</label></div>
			<div><input type="text" id="nome" name="nome" value="<?php echo $dados_usuario['nome']; ?>" required autofocus></div>
		</div>
		
		<div>
			<div><label>Nome da Usuário Completo </label></div>
			<div><input type="text" id="nome_completo_login" name="nome_completo_login" value="<?php echo $dados_usuario['nome_completo_login']; ?>"></div>
		</div>

		<div>
			<div><label>Contato</label></div>
			<div>
				<input type="tel" id="contato" name="contato" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" value="<?php echo $dados_usuario['contato']; ?>">
				<small>Formato exigido: (XX) XXXXX-XXXX</small>
			</div>
		</div>

		<div>
			<div><label>Email</label></div>
			<div><input type="email" id="email" name="email" value="<?php echo $dados_usuario['email']; ?>"></div>
		</div>

	</div>

	<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Salvar"></div>

</form>

</body>

</html>
