<?php require('../topo_admin.php');

require('../../conexao.php');

$id_pousada = $_POST['id_pousada'];

$select_pousada = mysqli_query($conexao, "SELECT * FROM `pousada` WHERE id_pousada = $id_pousada");


if (mysqli_num_rows($select_pousada) > 0) {

	$dados_pousada = mysqli_fetch_assoc($select_pousada);

} else {

	echo "<script> alert ('NÃO EXISTEM CURSOS CADASTRADOS!');</script>";

	echo "<script> window.location.href='$url_admin/pousadas';</script>";


}


?>


<form id="form_pousada" name="form_pousada" method="post" action="salvar.php" class="form_pousada">

	<div>
		<h1>ATUALIZAR POUSADA</h1>
	</div>

	<div class="agrupamento_pousada">

		<div>
			<div><label>Código</label></div>

			<div><input type="text" id="id_pousada" name="id_pousada" value="<?php echo $dados_pousada['id_pousada']; ?>"
					readonly></div>

		</div>

		<div>
			<div><label>Nome</label></div>

			<div><input type="text" id="nome" name="nome" value="<?php echo $dados_pousada['nome']; ?>" required autofocus>
			</div>

		</div>

	</div>

	<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Salvar"></div>

</form>

</body>

</html>