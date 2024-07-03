<?php include_once("upload_privado.php"); ?>
<?php include_once("upload_publico.php"); ?>
<?php include_once("retrieve_files.php"); ?>
<?php include_once("retrieve_files_priv.php"); ?>
<?php include_once("verifica_senha.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arca Digital</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('backgorund1.jpg'); /* Corrigido o nome do arquivo */
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header {
            width: 100%;
            background-color: rgb(41, 111, 223);
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 30px;
        }
        h1{
            color:white;
        }
        form {
            margin-top: 20px;
            width: 50%;
            padding: 40px;
            border-radius: 30px;
            background: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-group {
            width: 100%;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .form-group label {
            margin-right: 10px;
        }
        form input,
        form label {
            padding: 10px;
            width: 80%;
            border-radius: 5px;
        }
        form input[type="file"],
        form input[type="submit"] {
            width: auto;
            cursor: pointer;
        }
        form input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }
        .table-container {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-top: 20px;
        }
        table {
            width: 45%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            margin: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: rgb(41, 111, 223);
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>Arca Digital</header>
    <form action=""  enctype="multipart/form-data" id="uploadForm">
        <div class="form-group">
            <input type="radio" id="publico" name="tipo" value="publico">
            <label for="publico">Público</label>
            <input type="radio" id="privado" name="tipo" value="privado">
            <label for="privado">Privado</label>
        </div>
        <div class="form-group">
            <input type="password" name="senha" id="senha" placeholder="Senha">
        </div>
        <div class="form-group">
            <input type="file" name="arquivo" id="arquivo" required>
        </div>
        <div class="form-group">
            <input type="submit" name="upload" value="Enviar" id="submeter">
        </div>
    </form>
    <div class="table-container">
        <div>
            <h1>Público</h1>
            <table> 
                <thead>
                    <tr>
                        <th>Arquivo</th>
                        <th>Data de Envio</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $listaArquivos; ?>
                </tbody>
            </table>
        </div>
        <div>
            <h1>Privado</h1>
            <table> 
                <thead>
                    <tr>
                        <th>Arquivo</th>
                        <th>Data de Envio</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $listaArquivosPriv; ?>
                </tbody>
            </table>
        </div>
    </div>
    <form action="sair.php" method="POST">
        <button type="submit">Sair</button>
    </form>
    <script src="J Query/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#uploadForm').on('submit', function(event) {
                event.preventDefault();
                var tipo = $('input[name="tipo"]:checked').val();
                var senha = $('#senha').val();
                var formData = new FormData(this);
                if (tipo === 'privado') {
                    $.ajax({
                        type: 'POST',
                        url: 'verifica_senha.php',
                        data: { senha: senha },
                        success: function(response) {
                            var data = JSON.parse(response);
                            if (data.status === 'success') {
                                $.ajax({
                                    type: 'POST',
                                    url: 'upload_privado.php',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        alert('Arquivo enviado com sucesso!');
                                    },
                                    error: function() {
                                        alert('Erro ao enviar o arquivo.');
                                    }
                                });
                            } else {
                                alert('Senha incorreta.');
                            }
                        },
                        error: function() {
                            alert('Erro ao verificar a senha.');
                        }
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: 'upload_publico.php',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            alert('Arquivo enviado com sucesso!');
                        },
                        error: function() {
                            alert('Erro ao enviar o arquivo.');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

