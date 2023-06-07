<?php
require('../../conexao.php');

if (isset($_POST['id_restaurante'])) {
    // Edição de um restaurante existente

    $id_restaurante = $_POST['id_restaurante'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $endereco = $_POST['endereco'];
    $contato = $_POST['contato'];
    $valor_maximo = $_POST['valor_maximo'];
    $valor_minimo = $_POST['valor_minimo'];

    // Verificar se a chave "endereco_link" existe no array $_POST
    $endereco_link = isset($_POST['endereco_link']) ? $_POST['endereco_link'] : '';

    // Verificar se um novo arquivo de imagem foi enviado
    if (!empty($_FILES['fotos']['tmp_name']) && $_FILES['fotos']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['fotos']['tmp_name'];

        // Ler o conteúdo do novo arquivo de imagem
        $fp = fopen($file_tmp, 'rb');
        $conteudo = fread($fp, filesize($file_tmp));
        fclose($fp);

        // Preparar o conteúdo para ser salvo no banco de dados
        $conteudo = mysqli_real_escape_string($conexao, $conteudo);
    } else {
        // Manter o valor atual da imagem no banco de dados
        $select_imagem = mysqli_query($conexao, "SELECT fotos FROM restaurante WHERE id_restaurante = $id_restaurante");
        $dados_imagem = mysqli_fetch_assoc($select_imagem);
        $conteudo = $dados_imagem['fotos'];
    }

    // Atualizar os dados do restaurante no banco de dados, incluindo a imagem
    $update_restaurante = "UPDATE `restaurante` SET `nome` = '$nome', `descricao` = '$descricao', `endereco` = '$endereco', `endereco_link` = '$endereco_link', `contato` = '$contato', `valor_maximo` = '$valor_maximo', `valor_minimo` = '$valor_minimo'";
    if (!empty($conteudo)) {
        $update_restaurante .= ", `fotos` = '$conteudo'";
    }
    $update_restaurante .= " WHERE id_restaurante = $id_restaurante";

    if (mysqli_query($conexao, $update_restaurante)) {
        mysqli_close($conexao);
        echo "<script> alert('RESTAURANTE ATUALIZADO COM SUCESSO!'); </script>";
        echo "<script> window.location.href='$url_admin/restaurantes/exibir.php'; </script>";
    } else {
        echo "<script> alert('ERRO: NÃO FOI POSSÍVEL ATUALIZAR. " . mysqli_error($conexao) . "');</script>";
        echo "<script> console.log('Erro MySQL: " . mysqli_error($conexao) . "');</script>";
        mysqli_close($conexao);
    }
} else if (isset($_POST['nome'])) {
    // Cadastro de um novo restaurante

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $endereco = $_POST['endereco'];
    $endereco_link = $_POST['endereco_link'];
    $contato = $_POST['contato'];
    $valor_minimo = $_POST['valor_minimo'];
    $valor_maximo = $_POST['valor_maximo'];

    // Verificar se um arquivo de imagem foi enviado
    $conteudo = ''; // Definir um valor padrão para a imagem

    if (!empty($_FILES['fotos']['tmp_name']) && $_FILES['fotos']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['fotos']['tmp_name'];

        // Ler o conteúdo do arquivo de imagem
        $fp = fopen($file_tmp, 'rb');
        $conteudo = fread($fp, filesize($file_tmp));
        fclose($fp);

        // Preparar o conteúdo para ser salvo no banco de dados
        $conteudo = mysqli_real_escape_string($conexao, $conteudo);
    }

    // Inserir os dados do restaurante no banco de dados, incluindo a imagem
    $insert_restaurante = "INSERT INTO restaurante (`nome`, `descricao`, `endereco`, `endereco_link`, `contato`, `valor_minimo`, `valor_maximo`, `fotos`) VALUES ('$nome', '$descricao', '$endereco', '$endereco_link', '$contato', '$valor_minimo', '$valor_maximo', '$conteudo')";

    if (mysqli_query($conexao, $insert_restaurante)) {
        mysqli_close($conexao);
        echo "<script> alert('RESTAURANTE CADASTRADO COM SUCESSO!'); </script>";
        echo "<script> window.location.href='$url_admin/restaurantes/exibir.php'; </script>";
    } else {
        echo "<script> alert('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";
        echo "<script> console.log('Erro MySQL: " . mysqli_error($conexao) . "');</script>";
        mysqli_close($conexao);
    }
}
?>
