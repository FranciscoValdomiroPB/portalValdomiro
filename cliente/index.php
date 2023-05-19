<?php require('topo_cliente.php'); 
require('../conexao.php');?>

<!-- ARQUIVO DE ESTILO DO PORTAL -->
<link rel="stylesheet" type="text/css" href="http://localhost//portalValdomiro/css/estiloCliente.css">

<!--CONTEÚDO DA PÁGINA INICIAL---->
<main>
	<section>
		<h2>BEM-VINDO Á NOSSA REDE DE POUSADAS</h2>
		<p>Nós oferecemos hospedagem de qualidade em Presidente Figueiredo-AM, com conforto e segurança para você e
			sua família. Todas as nossas pousadas são cuidadosamente selecionadas para garantir a sua satisfação.
		</p>
	</section>
	<section>
		<h2>NOSSAS POUSADAS</h2>
		<div class="pousadas">
			<?php

			// Consulta para obter as informações das pousadas
			$result = mysqli_query($conexao, "SELECT * FROM Pousada");

			// Verifica se há registros
			if (mysqli_num_rows($result) > 0) {
				// Itera sobre os resultados e exibe as pousadas na vitrine
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<div class="pousada">';
					echo '<img src="' . $row['fotos'] . '" alt="' . $row['nome'] . '">';
					echo '<h3>' . $row['nome'] . '</h3>';
					echo '<p>' . $row['descricao'] . '</p>';
					echo '<p>Endereço: ' . $row['endereco'] . '</p>';
					echo '</div>';
				}
			} else {
				echo '<p>Não existem pousadas cadastradas.</p>';
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