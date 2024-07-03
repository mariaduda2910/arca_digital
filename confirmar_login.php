<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['nome'];
    $pass = $_POST['senha'];

    include("conectDB.php");

    // Usar prepared statements para evitar SQL Injection
    $stmt = $ligaBD->prepare("SELECT * FROM usuarios WHERE nome = ? AND senha = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_registos = $result->num_rows;

    if ($num_registos > 0) {
        $registos = $result->fetch_assoc();
        $_SESSION['nome'] = $registos['nome'];
        $_SESSION['senha'] = $registos['senha'];
        header('Location: index.php');
    } else {
        header('Location: log_in.html');
    }

    $stmt->close();
    $ligaBD->close();
} else {
    header('Location: log_in.html');
}
?>
