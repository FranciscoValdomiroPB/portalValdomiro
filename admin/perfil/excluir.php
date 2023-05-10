<?php require('../topo_admin.php');

	require('../../conexao.php');


	$codigo_curso = $_GET['codigo_curso'];

	$delete_curso = "DELETE FROM curso WHERE codigo_curso = $codigo_curso";
	
	
		if (mysqli_query($conexao,$delete_curso)) {

				mysqli_close($conexao);

				echo "<script> alert ('CURSO EXCLUÍDO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/curso/exibir.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";

				echo "<script> window.location.href='$url_admin/curso';</script>";
				
				mysqli_close($conexao);
			}
	

?>