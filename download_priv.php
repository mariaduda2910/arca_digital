<?php
session_start();

$senha_correta = ($_SESSION['senha']);

if (isset($_POST['file']) && isset($_POST['senha'])) {
    $file = urldecode($_POST['file']);
    $senha = $_POST['senha'];

    if ($senha === $senha_correta) {
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        } else {
            echo "Arquivo não encontrado.";
        }
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Nenhum arquivo especificado ou senha não fornecida.";
}
?>
