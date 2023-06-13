<?php
require('topo_admin.php');
require('../conexao.php');
?>

<!-- ARQUIVO DE ESTILO DO PORTAL -->
<link rel="stylesheet" type="text/css" href="../css/estiloCliente.css">

<!--CONTEÚDO DA PÁGINA INICIAL---->
<main>
    <section>
        <h2>BEM-VINDO À NOSSA REDE DE POUSADAS</h2>
        <p>Nós oferecemos hospedagem de qualidade em Presidente Figueiredo-AM, com conforto e segurança para você e sua família. Todas as nossas pousadas são cuidadosamente selecionadas para garantir a sua satisfação.</p>
    </section>
    <section>
        <h2>NOSSAS POUSADAS</h2>
        <div class="pousadas">
            <?php
            // Consulta para obter as informações das pousadas
            $result_pousada = mysqli_query($conexao, "SELECT * FROM pousada");

            // Verifica se há registros
            if (mysqli_num_rows($result_pousada) > 0) {
                // Itera sobre os resultados e exibe as pousadas na vitrine
                while ($row = mysqli_fetch_assoc($result_pousada)) {
                    echo '<div class="pousada">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['fotos']) . '" alt="' . $row['nome'] . '">';
                    echo '<h3>' . $row['nome'] . '</h3>';
                    echo '<p>' . $row['descricao'] . '</p>';
                    echo '<p>Endereço: ' . $row['endereco'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Não existem pousadas cadastradas.</p>';
            }
            ?>
        </div>
    </section>
    <section>
        <h2>NOSSOS RESTAURANTES</h2>
        <div class="pousadas">
            <?php
            // Consulta para obter as informações dos restaurantes
            $result_restaurante = mysqli_query($conexao, "SELECT * FROM restaurante");

            // Verifica se há registros
            if (mysqli_num_rows($result_restaurante) > 0) {
                // Itera sobre os resultados e exibe os restaurantes na vitrine
                while ($row = mysqli_fetch_assoc($result_restaurante)) {
                    echo '<div class="pousada">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['fotos']) . '" alt="' . $row['nome'] . '">';
                    echo '<h3>' . $row['nome'] . '</h3>';
                    echo '<p>' . $row['descricao'] . '</p>';
					echo '<p><a href="' . $row['endereco_link'] . '">Contato: ' . $row['contato'] .'</a></p>';
					echo '<p><a href="' . $row['endereco_link'] . '">Endereço: ' . $row['endereco'] .'</a></p>';
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
