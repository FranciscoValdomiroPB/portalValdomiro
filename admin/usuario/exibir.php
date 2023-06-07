<?php
require('../topo_admin.php');
require('../../conexao.php');

$select_usuario = mysqli_query($conexao, "SELECT * FROM usuario JOIN login ON usuario.codigo_login = login.codigo_login ORDER BY usuario.id_usuario ASC");

if (mysqli_num_rows($select_usuario) > 0) {
    // Recuperar os dados de cada usuário
    while ($dados_usuario = mysqli_fetch_assoc($select_usuario)) {
        // Aqui você pode exibir os dados do usuário ou realizar outras operações
        $id_usuario = $dados_usuario['id_usuario'];
        $nome = $dados_usuario['nome'];

        // Exemplo de exibição dos dados
        echo "<p>ID do usuário: $id_usuario</p>";
        echo "<p>Nome: $nome</p>";
    }
} else {
    echo "<script> alert ('NÃO EXISTEM USUÁRIOS CADASTRADOS!');</script>";
    echo "<script> window.location.href='$url_admin/usuario';</script>";
}
?>

<div class="estila_tabela">
    <h1>USUÁRIOS CADASTRADOS</h1>
    <table>
        <tr class="tabela_cabecalho">
            <td>CÓDIGO</td>
            <td>NOME</td>
            <td colspan="2">Ação</td>
        </tr>
        <?php
        mysqli_data_seek($select_usuario, 0); // Voltar o ponteiro para o início dos resultados
        while ($dados_usuario = mysqli_fetch_assoc($select_usuario)) {
            $id_usuario = $dados_usuario['id_usuario'];
            $nome = $dados_usuario['nome'];
        ?>
            <tr>
                <td><?php echo $id_usuario; ?></td>
                <td><?php echo $nome; ?></td>
                <td>
                    <a href="editar.php?id_usuario=<?php echo $id_usuario; ?>">
                        <img src="../../img/editar.png" class="botao_acao" title="Editar">
                    </a>
                </td>
                <td>
                    <a href="javascript:func()" onclick="confirmar_exclusao('<?php echo $id_usuario; ?>')">
                        <img src="../../img/lixeira.png" class="botao_acao" title="Excluir">
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
