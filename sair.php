<?php
// Inicia a sessão
session_start();

// Destrói todos os dados da sessão
$_SESSION = array();

session_destroy();
header("Location: log_in.html");
exit();
?>