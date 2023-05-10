<?php require('../topo_admin.php');

	require('../../conexao.php');


	$select_curso = mysqli_query($conexao, "SELECT * FROM curso ORDER BY codigo_curso ASC");
				
	
		if (mysqli_num_rows($select_curso) > 0) {
			
			$dados_curso = mysqli_fetch_assoc($select_curso);
			
		} else {
			
			echo "<script> alert ('NÃO EXISTEM CURSOS CADASTRADOS!');</script>";
				
			echo "<script> window.location.href='$url_admin/curso';</script>";
			
			
		}


?>



		<div class="estila_tabela">

			<div><h1>CURSOS CADASTRADOS</h1></div>

				<table>
					
					<tr class="tabela_cabecalho">

						<td>CÓDIGO</td>
						<td>NOME</td>
						<td colspan="2">Ação</td>

					</tr>



				<?php do{


					?>
					
					<tr>

						<td><?php echo $dados_curso['codigo_curso'];?></td>
						<td><?php echo $dados_curso['nome_curso'];?></td>
						<td>

							<a href="editar.php?codigo_curso=<?php echo $dados_curso['codigo_curso'];?>">
								<img src="../../img/editar.png" class="botao_acao" title="Editar">
							</a>
						</td>

						<td>

							<a href="javascript:func()" onclick="confirmar_exclusao('<?php echo $dados_curso['codigo_curso'];?>')">
								<img src="../../img/excluir.png" class="botao_acao" title="Excluir">
							</a>
						</td>
						
					</tr>

				<?php }while ($dados_curso = mysqli_fetch_assoc($select_curso));?>

				</table>

		</div>

</body>

</html>