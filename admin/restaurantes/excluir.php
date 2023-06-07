<?php require('../topo_admin.php');

	require('../../conexao.php');


	$id_restaurante = $_GET['id_restaurante'];

	$delete_restaurante = "DELETE FROM `restaurante` WHERE id_restaurante = $id_restaurante";
	
	
		if (mysqli_query($conexao,$delete_restaurante)) {

				mysqli_close($conexao);

				echo "<script> alert ('RESTAURANTE EXCLUÍDO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/restaurantes/exibir.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";

				echo "<script> window.location.href='$url_admin/restaurantes';</script>";
				
				mysqli_close($conexao);
			}
	

?>