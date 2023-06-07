<?php require('../topo_admin.php');

	require('../../conexao.php');


	$id_usuario = $_GET['id_usuario'];

	$delete_usuario = "DELETE FROM `usuario` WHERE id_usuario = $id_usuario";
	
	
		if (mysqli_query($conexao,$delete_usuario)) {

				mysqli_close($conexao);

				echo "<script> alert ('USUÁRIO EXCLUÍDO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/usuario/exibir.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";

				echo "<script> window.location.href='$url_admin/usuario';</script>";
				
				mysqli_close($conexao);
			}
	

?>