<?php require('../topo_admin.php');

	require('../../conexao.php');


	$id_pousada = $_GET['id_pousada'];

	$delete_pousada = "DELETE FROM `pousada` WHERE id_pousada = $id_pousada";
	
	
		if (mysqli_query($conexao,$delete_pousada)) {

				mysqli_close($conexao);

				echo "<script> alert ('POUSADA EXCLUÍDO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/pousadas/exibir.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";

				echo "<script> window.location.href='$url_admin/pousadas';</script>";
				
				mysqli_close($conexao);
			}
	

?>