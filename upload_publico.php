<?php

require_once("conectDB.php");

if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error']) {
        die("Falha ao enviar arquivo");
    }

    $pasta = "uploads/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx'];
    if (!in_array($extensao, $extensoesPermitidas)) {
        die("Tipo de arquivo não permitido");
    }

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    if ($deu_certo) {
        $query = $ligaBD->prepare("INSERT INTO arquivos (nome, path, data_upload) VALUES (?, ?, NOW())");
        $query->bind_param("ss", $nomeDoArquivo, $path);
        $query->execute();
        if ($query->error) {
            die("Erro ao salvar informações no banco de dados: " . $query->error);
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<p>Não foi possível enviar o arquivo</p>";
    }
}

?>
