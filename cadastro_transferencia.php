<?php
include 'conexao.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qtd = $_POST['qtd'];
    $nome_material = $_POST['nome_material'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $bmp = $_POST['bmp'];
    $setor_origem = $_POST['setor_origem'];
    $setor_destino = $_POST['setor_destino'];
    $militar_responsavel = $_POST['militar_responsavel'];
    $militar_de_destino = $_POST['militar_de_destino'];
    $data_transferencia = $_POST['data_transferencia'];

    $sql = "INSERT INTO transferencia (qtd, nome_material, modelo, numero_serie, bmp, setor_origem, setor_destino, militar_responsavel, militar_de_destino, data_transferencia) 
            VALUES (:qtd, :nome_material, :modelo, :numero_serie, :bmp, :setor_origem, :setor_destino, :militar_responsavel, :militar_de_destino, :data_transferencia)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':qtd' => $qtd,
        ':nome_material' => $nome_material,
        ':modelo' => $modelo,
        ':numero_serie' => $numero_serie,
        ':bmp' => $bmp,
        ':setor_origem' => $setor_origem,
        ':setor_destino' => $setor_destino,
        ':militar_responsavel' => $militar_responsavel,
        ':militar_de_destino' => $militar_de_destino,
        ':data_transferencia' => $data_transferencia,
    ]);

    echo "<div class='alert alert-success' role='alert'>Transferência cadastrada com sucesso!</div>";

    // Limpa o formulário após o cadastro (opcional)
    $_POST = array();

    // Redireciona para outra página após o cadastro (opcional)
    // header("Location: cadastro_material.php"); 
    // exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Transferência</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ADD8E6;
            /* Azul aeronáutico */
        }

        .container {
            margin-top: 50px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007BFF;
            border-color: #007BFF;
        }

        .alert {
            margin-top: 20px;
        }

        #cadastrar {
            margin-top: 15px;
            color: white;
            border-radius: 4px;
            padding: 10px;
            transition: background-color 0.3s;
            background-color: #007BFF;
            cursor: pointer;
            display: block;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Cadastro de Transferência</h2>
        <form method="POST">
            <div class="form-group">
                <label for="qtd">Quantidade:</label>
                <input type="number" class="form-control" name="qtd" id="qtd">
            </div>
            <div class="form-group">
                <label for="nome_material">Nome do Material:</label>
                <input type="text" class="form-control" name="nome_material" id="nome_material" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" id="modelo" required>
            </div>
            <div class="form-group">
                <label for="numero_serie">Número de Série:</label>
                <input type="text" class="form-control" name="numero_serie" id="numero_serie">
            </div>
            <div class="form-group">
                <label for="bmp">BMP:</label>
                <input type="text" class="form-control" name="bmp" id="bmp">
            </div>
            <div class="form-group">
                <label for="setor_origem">Setor de Origem:</label>
                <input type="text" class="form-control" name="setor_origem" id="setor_origem" required>
            </div>
            <div class="form-group">
                <label for="setor_destino">Setor de Destino:</label>
                <input type="text" class="form-control" name="setor_destino" id="setor_destino" required>
            </div>
            <div class="form-group">
                <label for="militar_responsavel">Militar Responsável:</label>
                <input type="text" class="form-control" name="militar_responsavel" id="militar_responsavel">
            </div>
            <div class="form-group">
                <label for="militar_de_destino">Militar de Destino:</label>
                <input type="text" class="form-control" name="militar_de_destino" id="militar_de_destino">
            </div>
            <div class="form-group">
                <label for="data_transferencia">Data de Transferência:</label>
                <input type="date" class="form-control" name="data_transferencia" id="data_transferencia" required>
            </div>
            <button type="submit" class="btn btn-primary" id="cadastrar">Cadastrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>