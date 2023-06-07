<?php
require('../../conexao.php');

if (isset($_POST['id_usuario'])) {
    // Edição de um usuário existente

    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $nome_completo_login = $_POST['nome_completo_login'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $codigo_login = $_POST['codigo_login'];
    $senha_login = md5($_POST['senha_login']); // Converter a senha para MD5

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
        // Manter o valor atual da imagem no banco de dados ou definir uma imagem padrão
        $select_imagem = mysqli_query($conexao, "SELECT fotos FROM usuario WHERE id_usuario = $id_usuario");
        $dados_imagem = mysqli_fetch_assoc($select_imagem);
        if (!empty($dados_imagem['fotos'])) {
            $conteudo = $dados_imagem['fotos'];
        } else {
            // Caminho da imagem padrão
            $imagem_padrao = '..\..\img\perfil_sem_foto.png';

            // Ler o conteúdo da imagem padrão
            $fp = fopen($imagem_padrao, 'rb');
            $conteudo = fread($fp, filesize($imagem_padrao));
            fclose($fp);

            // Preparar o conteúdo para ser salvo no banco de dados
            $conteudo = mysqli_real_escape_string($conexao, $conteudo);
        }
    }

    // Atualizar os dados do usuário na tabela "usuario", incluindo a imagem
    $update_usuario = "UPDATE `usuario` SET `nome` = '$nome', `nome_completo_login` = '$nome_completo_login', `contato` = '$contato', `email` = '$email', `codigo_login` = '$codigo_login'";
    if (!empty($conteudo)) {
        $update_usuario .= ", `fotos` = '$conteudo'";
    }
    $update_usuario .= " WHERE id_usuario = $id_usuario";

    if (mysqli_query($conexao, $update_usuario)) {
        // Atualizar os dados do usuário na tabela "login"
        $update_login = "UPDATE `login` SET `nome` = '$nome', `nome_completo_login` = '$nome_completo_login', `senha_login` = '$senha_login' WHERE codigo_login = '$codigo_login'";

        if (mysqli_query($conexao, $update_login)) {
            mysqli_close($conexao);
            echo "<script> alert('USUÁRIO ATUALIZADO COM SUCESSO!'); </script>";
            echo "<script> window.location.href='$url_admin/usuario/exibir.php'; </script>";
        } else {
            echo "<script> alert('ERRO: NÃO FOI POSSÍVEL ATUALIZAR NA TABELA LOGIN.');</script>";
            mysqli_close($conexao);
        }
    } else {
        echo "<script> alert('ERRO: NÃO FOI POSSÍVEL ATUALIZAR NA TABELA USUÁRIO.');</script>";
        mysqli_close($conexao);
    }
} else if (isset($_POST['nome'])) {
    // Cadastro de um novo usuário

    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $nome_completo_login = $_POST['nome_completo_login'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $codigo_login = $_POST['codigo_login'];
    $senha_login = md5($_POST['senha_login']); // Converter a senha para MD5
    $tipo = $_POST['tipo_login'];

    // Verificar se um arquivo de imagem foi enviado
    if (!empty($_FILES['fotos']['tmp_name']) && $_FILES['fotos']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['fotos']['tmp_name'];

        // Ler o conteúdo do arquivo de imagem
        $fp = fopen($file_tmp, 'rb');
        $conteudo = fread($fp, filesize($file_tmp));
        fclose($fp);
    } else {
        // Caminho da imagem padrão
        $imagem_padrao = '..\..\img\perfil_sem_foto.png';

        // Ler o conteúdo da imagem padrão
        $fp = fopen($imagem_padrao, 'rb');
        $conteudo = fread($fp, filesize($imagem_padrao));
        fclose($fp);
    }

    // Preparar o conteúdo para ser salvo no banco de dados
    $conteudo = mysqli_real_escape_string($conexao, $conteudo);

    // Inserir os dados do usuário na tabela "usuario", incluindo a imagem
    $insert_usuario = "INSERT INTO usuario (`id_usuario`, `nome`, `nome_completo_login`, `contato`, `email`, `codigo_login`, `fotos`) VALUES ('$id_usuario', '$nome', '$nome_completo_login', '$contato', '$email', '$codigo_login', '$conteudo')";

    if (mysqli_query($conexao, $insert_usuario)) {
        // Inserir os dados do usuário na tabela "login"
        $insert_login = "INSERT INTO login (`nome`, `nome_completo_login`, `senha_login`, `tipo_login`, `codigo_login`) VALUES ('$nome', '$nome_completo_login', '$senha_login', '$tipo', '$codigo_login')";

        if (mysqli_query($conexao, $insert_login)) {
            mysqli_close($conexao);
            echo "<script> alert('USUÁRIO CADASTRADO COM SUCESSO!'); </script>";
            echo "<script> window.location.href='$url_admin/usuario/exibir.php'; </script>";
        } else {
            echo "<script> alert('ERRO: NÃO FOI POSSÍVEL INSERIR NA TABELA LOGIN.');</script>";
            echo "<script> window.location.href='$url_admin'; </script>";
            mysqli_close($conexao);
        }
    } else {
        echo "<script> alert('ERRO: NÃO FOI POSSÍVEL INSERIR NA TABELA USUÁRIO.');</script>";
        echo "<script> window.location.href='$url_admin'; </script>";
        mysqli_close($conexao);
    }
}
?>