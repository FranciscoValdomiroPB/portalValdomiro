<?php require('../topo_admin.php');

require('../../conexao.php');


$select_restaurante = mysqli_query($conexao, "SELECT * FROM `restaurante` ORDER BY id_restaurante ASC");


if (mysqli_num_rows($select_restaurante) > 0) {

	$dados_restaurante = mysqli_fetch_assoc($select_restaurante);

} else {

	echo "<script> alert ('NÃO EXISTEM RESTAURANTES CADASTRADOS!');</script>";

	echo "<script> window.location.href='$url_admin/restaurantes';</script>";


}


?>



<div class="estila_tabela">

	<h1>RESTAURANTES CADASTRADOS</h1>
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
					<?php echo $dados_restaurante['id_restaurante']; ?>
				</td>
				<td>
					<?php echo $dados_restaurante['nome']; ?>
				</td>
				<td>

					<a href="editar.php?id_restaurante=<?php echo $dados_restaurante['id_restaurante']; ?>">
						<img src="../../img/editar.png" class="botao_acao" title="Editar">
					</a>
				</td>

				<td>

					<a href="javascript:func()" onclick="confirmar_exclusao('<?php echo $dados_restaurante['id_restaurante']; ?>')">
						<img src="../../img/lixeira.png" class="botao_acao" title="Excluir">
					</a>
				</td>

			</tr>

		<?php } while ($dados_restaurante = mysqli_fetch_assoc($select_restaurante)); ?>

	</table>

</div>

</body>

</html>