<?php require('../../conexao.php');

	
	//VERIFICANDO DADOS PARA ATUALIZAR
	if (isset($_POST['codigo_curso'])) {

		$codigo_curso = $_POST['codigo_curso'];      
	
		$nome_curso = $_POST['nome_curso'];


		$update_curso = "UPDATE curso SET nome_curso = '".$nome_curso."' WHERE codigo_curso = $codigo_curso";
	
	
		if (mysqli_query($conexao,$update_curso)) {

				mysqli_close($conexao);

				echo "<script> alert ('CURSO ATUALIZADO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/curso/exibir.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL ATUALIZAR.');</script>";

				echo "<script> window.location.href='$url_admin/curso';</script>";
				
				mysqli_close($conexao);
			}

	}else if (isset($_POST['nome_curso'])) {      
	
		$nome_curso = $_POST['nome_curso'];


		$insert_curso = "INSERT INTO curso (nome_curso) VALUES ('".$nome_curso."')";
	
	
		if (mysqli_query($conexao,$insert_curso)) {

				mysqli_close($conexao);

				echo "<script> alert ('CURSO CADASTRADO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/curso/exibir.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";

				echo "<script> window.location.href='$url_admin/curso';</script>";
				
				mysqli_close($conexao);
			}

	} 

?>