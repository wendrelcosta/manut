<?php
include 'conexao.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastrar"])) {
    $qtd = $_POST["qtd"];
    $bmp = $_POST['bmp'];
    $nome_carga = $_POST['nome_carga'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $setor = $_POST['setor'];
    $militar_responsavel = $_POST['militar_responsavel'];

    $sql = "INSERT INTO material_carga (qtd, bmp, nome_carga, modelo, numero_serie, setor, militar_responsavel) 
            VALUES (:qtd, :bmp, :nome_carga, :modelo, :numero_serie, :setor, :militar_responsavel)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':qtd' => $qtd,  // O bindParam() é mais seguro que o bindValue() pois evita SQL Injection
        ':bmp' => $bmp,
        ':nome_carga' => $nome_carga,
        ':modelo' => $modelo,
        ':numero_serie' => $numero_serie,
        ':setor' => $setor,
        ':militar_responsavel' => $militar_responsavel
    ]);

    // Limpa o formulário *antes* do redirecionamento (MUITO IMPORTANTE)
    $_POST = array();  // Limpa o $_POST
    // Mensagem de sucesso (armazenada na sessão)
    $_SESSION['success_message'] = "<div class='alert alert-success' role='alert'>Material de carga cadastrado com sucesso!</div>";

    // Redireciona para a mesma página (GET)
    header("Location: " . $_SERVER['PHP_SELF']);  // Redirecionamento crucial!
    exit(); // Interrompe o script após o redirecionamento
}

// Exibe as mensagens (se houverem)
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : "";
unset($_SESSION['success_message']); // Limpa a mensagem da sessão

// Mensagem de erro (se houver) - você pode adicionar tratamento de erros aqui
$error_message = ""; // Implemente a lógica de erro, se necessário
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Material de Carga</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ADD8E6; /* Azul aeronáutico */
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
            padding: 10px; /* Aumentei um pouco o padding para melhor aparência */
            transition: background-color 0.3s;
            background-color: #007BFF;
            cursor: pointer;
            display: block; /* Faz o botão ocupar a largura total */
            width: 100%;      /* Garante que ocupe 100% da largura do seu contêiner pai */
            box-sizing: border-box; /* Inclui padding e borda na largura total */
}
    </style>
</head>

<body>
    <div class="container">
        <h2>Cadastro de Material de Carga</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
                <label for="qtd">Quantidade:</label>
                <input type="number" class="form-control" name="qtd" id="qtd">
            </div>
            <div class="form-group">
                <label for="bmp">BMP:</label>
                <input type="text" class="form-control" name="bmp" id="bmp">
            </div>
            <div class="form-group">
                <label for="nome_carga">Nome da Carga:</label>
                <input type="text" class="form-control" name="nome_carga" id="nome_carga" required>
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
                <label for="setor">Setor:</label>
                <input type="text" class="form-control" name="setor" id="setor" required>
            </div>
            <div class="form-group">
                <label for="militar_responsavel">Militar Responsável:</label>
                <input type="text" class="form-control" name="militar_responsavel" id="militar_responsavel" required>
            </div>
            <button type="submit" id="cadastrar" class="btn btn-primary" name="cadastrar">Cadastrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>