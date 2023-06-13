<?php
require('../../conexao.php');

if (isset($_POST['id_pousada'])) {
    // Edição de uma pousada existente

    $id_pousada = $_POST['id_pousada'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $endereco = $_POST['endereco'];
    $numero_quartos = $_POST['numero_quartos'];
    $preco_noite = $_POST['preco_noite'];

    // Verificar se um novo arquivo de imagem foi enviado
    if (!empty($_FILES['fotos']['tmp_name']) && $_FILES['fotos']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['fotos']['tmp_name'];

        // Ler o conteúdo do novo arquivo de imagem
        $conteudo = file_get_contents($file_tmp);

        // Preparar o conteúdo para ser salvo no banco de dados
        $conteudo = mysqli_real_escape_string($conexao, $conteudo);

        // Atualizar os dados da pousada no banco de dados, incluindo a imagem
        $update_pousada = "UPDATE `pousada` SET `nome` = '$nome', `descricao` = '$descricao', `endereco` = '$endereco', `numero_quartos` = '$numero_quartos', `preco_noite` = '$preco_noite', `fotos` = '$conteudo' WHERE id_pousada = $id_pousada";
    } else {
        // Atualizar os dados da pousada no banco de dados sem a imagem
        $update_pousada = "UPDATE `pousada` SET `nome` = '$nome', `descricao` = '$descricao', `endereco` = '$endereco', `numero_quartos` = '$numero_quartos', `preco_noite` = '$preco_noite' WHERE id_pousada = $id_pousada";
    }

    if (mysqli_query($conexao, $update_pousada)) {
        mysqli_close($conexao);
        echo "<script> alert('POUSADA ATUALIZADA COM SUCESSO!'); </script>";
        echo "<script> window.location.href='$url_admin/pousadas/exibir.php'; </script>";
    } else {
        echo "<script> alert('ERRO: NÃO FOI POSSÍVEL ATUALIZAR.');</script>";
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        mysqli_close($conexao);
    }
} else if (isset($_POST['nome'])) {
    // Cadastro de uma nova pousada

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $endereco = $_POST['endereco'];
    $numero_quartos = $_POST['numero_quartos'];
    $preco_noite = $_POST['preco_noite'];

    // Verificar se um arquivo de imagem foi enviado
    if (!empty($_FILES['fotos']['tmp_name']) && $_FILES['fotos']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['fotos']['tmp_name'];

        // Ler o conteúdo do arquivo de imagem
        $conteudo = file_get_contents($file_tmp);

        // Preparar o conteúdo para ser salvo no banco de dados
        $conteudo = mysqli_real_escape_string($conexao, $conteudo);

        // Inserir os dados da pousada no banco de dados, incluindo a imagem
        $insert_pousada = "INSERT INTO pousada (`nome`, `descricao`, `endereco`, `numero_quartos`, `fotos`, `preco_noite`) VALUES ('$nome', '$descricao', '$endereco', '$numero_quartos', '$conteudo', '$preco_noite')";
    } else {
        // Inserir os dados da pousada no banco de dados sem a imagem
        $insert_pousada = "INSERT INTO pousada (`nome`, `descricao`, `endereco`, `numero_quartos`, `preco_noite`) VALUES ('$nome', '$descricao', '$endereco', '$numero_quartos', '$preco_noite')";
    }

    if (mysqli_query($conexao, $insert_pousada)) {
        mysqli_close($conexao);
        echo "<script> alert('POUSADA CADASTRADA COM SUCESSO!'); </script>";
        echo "<script> window.location.href='$url_admin/pousadas/exibir.php'; </script>";
    } else {
        echo "<script> alert('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";
        echo "<script> window.location.href='$url_admin'; </script>";
        mysqli_close($conexao);
    }
}
