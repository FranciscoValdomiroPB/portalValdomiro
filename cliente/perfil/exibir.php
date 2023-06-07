<?php
require('../topo_cliente.php');
require('../../conexao.php');

$select_usuario = mysqli_query($conexao, "SELECT nome_completo_login, email, fotos, contato FROM usuario ORDER BY id_usuario ASC");

if (mysqli_num_rows($select_usuario) > 0) {
	$dados_usuario = mysqli_fetch_assoc($select_usuario);
	?>
	<div class="estil_exibir_perfil">
		<h1>MEU PERFIL</h1>
		<div>
			<label>Nome Completo: </label>
			<span>
				<?php echo $dados_usuario['nome_completo_login']; ?>
			</span>
		</div>
		<div>
			<label>Email: </label>
			<span>
				<?php echo $dados_usuario['email']; ?>
			</span>
		</div>
		<div>
			<label>Foto: </label>
			<img src="data:image/jpeg;base64,<?php echo base64_encode($dados_usuario['fotos']); ?>" alt="Foto do usuário">
		</div>
		<div>
			<label>Contato: </label>
			<span>
				<?php echo $dados_usuario['contato']; ?>
			</span>
		</div>
	
	</div>
	<?php
} else {
	echo "<script> alert ('NÃO EXISTEM USUÁRIOS CADASTRADOS!');</script>";
	echo "<script> window.location.href='$url_admin/pousadas';</script>";
}
?>