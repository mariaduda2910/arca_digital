<?php 
// Usando variáveis de ambiente para armazenar credenciais de banco de dados
$servername = getenv('DB_SERVER') ?: 'localhost';
$username = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$dbname = getenv('DB_NAME') ?: 'arcadigital';

// Conectar ao banco de dados usando MySQLi
$ligaBD = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($ligaBD->connect_error) {
    // Não exibir detalhes de erro para o usuário final
    error_log("Erro: Não foi possível estabelecer ligação com o MySQL: " . $ligaBD->connect_error);
    die("<br>Erro: Não foi possível estabelecer ligação com o MySQL.");
}

// Função para formatar a data
function formatar_data($data) {
    return implode('/', array_reverse(explode('-', $data)));
}
?>

