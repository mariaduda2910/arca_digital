<?php
require_once("conectDB.php");

$sql_arquivos = $ligaBD->query("SELECT * FROM arquivos") or die($ligaBD->error);

function listarArquivos($sql_arquivos) {
    $lista = '';
    while($arquivo = $sql_arquivos->fetch_assoc()) {
        $lista .= '<tr>';
        $lista .= '<td><a target="_blank" href="' . $arquivo['path'] . '">' . $arquivo['nome'] . '</a></td>';
        $lista .= '<td>' . date("d/m/Y H:i", strtotime($arquivo['data_upload'])) . '</td>';
        $lista .= '<td><a href="download.php?file=' . urlencode($arquivo['path']) . '">Baixar</a></td>';
        $lista .= '</tr>';
    }
    return $lista;
}

$listaArquivos = listarArquivos($sql_arquivos);
?>
