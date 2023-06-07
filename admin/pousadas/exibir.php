<?php require('../topo_admin.php');

require('../../conexao.php');


$select_pousada = mysqli_query($conexao, "SELECT * FROM pousada ORDER BY id_pousada ASC");


if (mysqli_num_rows($select_pousada) > 0) {

	$dados_pousada = mysqli_fetch_assoc($select_pousada);

} else {

	echo "<script> alert ('NÃO EXISTEM POUSADAS CADASTRADOS!');</script>";

	echo "<script> window.location.href='$url_admin/pousadas';</script>";


}


?>



<div class="estila_tabela">

	<h1>POUSADAS CADASTRADAS</h1>
	<table>

		<tr class="tabela_cabecalho">

			<td>CÓDIGO</td>
			<td>NOME</td>
			<td colspan="2">Ação</td>

		</tr>



		<?php do {


			?>

			<tr>

				<td>
					<?php echo $dados_pousada['id_pousada']; ?>
				</td>
				<td>
					<?php echo $dados_pousada['nome']; ?>
				</td>
				<td>

					<a href="editar.php?id_pousada=<?php echo $dados_pousada['id_pousada']; ?>">
						<img src="../../img/editar.png" class="botao_acao" title="Editar">
					</a>
				</td>

				<td>

					<a href="javascript:func()" onclick="confirmar_exclusao('<?php echo $dados_pousada['id_pousada']; ?>')">
						<img src="../../img/lixeira.png" class="botao_acao" title="Excluir">
					</a>
				</td>

			</tr>

		<?php } while ($dados_pousada = mysqli_fetch_assoc($select_pousada)); ?>

	</table>

</div>

</body>

</html>