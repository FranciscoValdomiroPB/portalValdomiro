<?php require('../../conexao.php');

	
	//VERIFICANDO DADOS PARA ATUALIZAR
	if (isset($_POST['id_pousada'])) {

		$id_pousada = $_POST['id_pousada'];      
	
		$nome = $_POST['nome'];


		$update_pousada = "UPDATE pousada SET nome = '".$nome."' WHERE id_pousada = $id_pousada";
	
	
		if (mysqli_query($conexao,$update_pousada)) {

				mysqli_close($conexao);

				echo "<script> alert ('POUSADA ATUALIZADO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/pousadas/exibir.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL ATUALIZAR.');</script>";

				echo "<script> window.location.href='$url_admin/pousadas';</script>";
				
				mysqli_close($conexao);
			}

	}else if (isset($_POST['nome'])) {      
	
		$nome = $_POST['nome'];


		$insert_pousada = "INSERT INTO pousada (nome) VALUES ('".$nome."')";
	
	
		if (mysqli_query($conexao,$insert_pousada)) {

				mysqli_close($conexao);

				echo "<script> alert ('POUSADA CADASTRADO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/pousadas/exibir.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";

				echo "<script> window.location.href='$url_admin/pousadas';</script>";
				
				mysqli_close($conexao);
			}

	} 

?>