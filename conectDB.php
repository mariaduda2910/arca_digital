<?php 
$ligaBD = mysqli_connect('localhost', 'root', '', 'arcadigital');


if (!$ligaBD) {
    die("<br>Erro: Não foi possível estabelecer ligação com o MySQL: " . mysqli_connect_error());
}


function formatar_data($data) {
    return implode('/', array_reverse(explode('-', $data)));
}
?>
