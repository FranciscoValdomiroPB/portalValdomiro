<?php require('../topo_cliente.php');
require('../../conexao.php'); ?>
<!-- ARQUIVO DE ESTILO DO PORTAL -->
<link rel="stylesheet" type="text/css" href="http://localhost//portalValdomiro/css/estiloCliente.css">

<!--CONTEÚDO DA PÁGINA DELIVERY---->
<main>
	<section>
		<div class="pousadas">
			<?php

			// Consulta para obter as informações das pousadas
			$result = mysqli_query($conexao, "SELECT * FROM restaurante");

			// Verifica se há registros
			if (mysqli_num_rows($result) > 0) {
				// Itera sobre os resultados e exibe as pousadas na vitrine
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<div class="pousada">';
					echo '<img src="' . $row['fotos'] . '" alt="' . $row['nome'] . '">';
					echo '<h3>' . $row['nome'] . '</h3>';
					echo '<p>' . $row['descricao'] . '</p>';
					echo '<p><a href="' . $row['endereço_link'] . '">Contato: ' . $row['contato'] .'</a></p>';
					echo '<p><a href="' . $row['endereço_link'] . '">Endereço: ' . $row['endereco'] .'</a></p>';
					echo '</div>';
				}
			} else {
				echo '<p>Não existem restaurantes cadastrados.</p>';
			}

			// Fecha a conexão com o banco de dados
			mysqli_close($conexao);
			?>
		</div>
	</section>
</main>
<footer>
	<p>GRUTA © 2023</p>
</footer>
</body>

</html>