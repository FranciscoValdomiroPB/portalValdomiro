<?php require('../topo_admin.php');

	require('../../conexao.php');


	$codigo_curso = $_GET['codigo_curso'];


	$select_curso = mysqli_query($conexao, "SELECT * FROM curso WHERE codigo_curso = $codigo_curso");
				
	
		if (mysqli_num_rows($select_curso) > 0) {
			
			$dados_curso = mysqli_fetch_assoc($select_curso);
			
		} else {
			
			echo "<script> alert ('NÃO EXISTEM CURSOS CADASTRADOS!');</script>";
				
			echo "<script> window.location.href='$url_admin/curso';</script>";
			
			
		}
	

?>


		<form id="form_curso" name="form_curso" method="post" action="salvar.php" class="form_curso">

			<div><h1>ATUALIZAR CURSO</h1></div>

				<div class="agrupamento_curso">

						<div>
							<div><label>Código</label></div>	

							<div><input type="text" id="codigo_curso" name="codigo_curso" value="<?php echo $dados_curso['codigo_curso'];?>" readonly></div>

						</div>

						<div>
							<div><label>Nome</label></div>	

							<div><input type="text" id="nome_curso" name="nome_curso" value="<?php echo $dados_curso['nome_curso'];?>" required autofocus></div>

						</div>	

				</div>

				<div><input type="submit" id="btn_entrar" name="btn_entrar" value="Salvar"></div>

		</form>

</body>

</html>