<?php
require_once("conectDB.php");

$sql_arquivos = $ligaBD->query("SELECT * FROM arquivosPriv") or die($ligaBD->error);

function listarArquivosPriv($sql_arquivos) {
    $lista = '';
    while($arquivo = $sql_arquivos->fetch_assoc()) {
        $lista .= '<tr>';
        $lista .= '<td><a target="_blank" href="' . $arquivo['path'] . '">' . $arquivo['nome'] . '</a></td>';
        $lista .= '<td>' . date("d/m/Y H:i", strtotime($arquivo['data_upload'])) . '</td>';
        
        $lista .= '<td>
                      <form action="download_priv.php" method="POST">
                          <input type="hidden" name="file" value="' . urlencode($arquivo['path']) . '">
                          <input type="password" name="senha" placeholder="Digite a senha">
                          <input type="submit" value="Baixar">
                      </form>
                   </td>';
        $lista .= '</tr>';
    }
    return $lista;
}

$listaArquivosPriv = listarArquivosPriv($sql_arquivos);
?>