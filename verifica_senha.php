<?php
session_start();
require_once("conectDB.php");

$senhaCorreta = $_SESSION['senha'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'] ?? '';

    if ($senha === $senhaCorreta) {
    
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Senha incorreta']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido']);
}
?>
