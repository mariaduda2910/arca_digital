<?php
session_start();
require_once("conectDB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    if (empty($nome) || empty($senha)) {
        echo json_encode(['status' => 'error', 'message' => 'Os campos "usuario" e "senha" são obrigatórios.']);
        exit();
    }

    $registrar = $ligaBD->prepare("INSERT INTO usuarios (nome, senha) VALUES (?, ?)");
    $registrar->bind_param("ss", $nome, $senha);

    if ($registrar->execute()) {
        $registrar->close();
        echo json_encode(['status' => 'success', 'redirect' => 'log_in.html']);
        exit();
     
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir dados: ' . $registrar->error]);
    }

$registrar->close();
}
?>