<?php
include 'conexao.php';
include 'header.php';

// Consulta os materiais
$sql = "SELECT * FROM material_carga";
$stmt = $conn->query($sql);
$materiais = $stmt->fetchAll(PDO::FETCH_ASSOC);
date_default_timezone_set('America/Manaus');

// Processamento de descarregamento individual
if (isset($_POST['descarregar_individual'])) {
    $material_id = $_POST['descarregar_individual'];
    $data_descarga = date('Y-m-d H:i:s'); // Data e hora atual

    $sql_update = "UPDATE material_carga SET descarregado = 1, data_descarga = :data_descarga WHERE id = :id";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->execute([':id' => $material_id, ':data_descarga' => $data_descarga]);

    if ($stmt_update->rowCount() > 0) {
        echo "status atualizado com sucesso";
    } else {
        echo "Erro ao atualizar status";
    }
    // Armazena o ID do material descarregado na sessão
    $_SESSION['material_descarregado'] = $material_id;

    header("Location: index.php"); // Redireciona para index.php
    exit();
}

// Limpa a variável de sessão após usá-la
if (isset($_SESSION['material_descarregado'])) {
    unset($_SESSION['material_descarregado']);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Materiais</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ADD8E6;
        }

        .container {
            margin-top: 50px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1600px;
            margin-left: auto;
            margin-right: auto;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .table-responsive {
            overflow-x: auto;
        }

        @media (max-width: 992px) {
            .container {
                max-width: 90%;
                padding: 10px;
            }
        }

        .descarregado {
            background-color: #FFC0CB;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Listagem de Materiais</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Quantidade</th>
                        <th>BMP</th>
                        <th>Nome da Carga</th>
                        <th>Modelo</th>
                        <th>Número de Série</th>
                        <th>Setor</th>
                        <th>Militar Responsável</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($materiais as $material): 
                        $descarregado = $material['descarregado'] ? 'descarregado' : ''; // Verifica se está descarregado no BD
                        ?>
                    <tr class="<?php echo $descarregado; ?>">
                        <td>
                            <?php echo $material['id']; ?>
                        </td>
                        <td>
                            <?php echo $material['qtd']; ?>
                        </td>
                        <td>
                            <?php echo $material['bmp']; ?>
                        </td>
                        <td>
                            <?php echo $material['nome_carga']; ?>
                        </td>
                        <td>
                            <?php echo $material['modelo']; ?>
                        </td>
                        <td>
                            <?php echo $material['numero_serie']; ?>
                        </td>
                        <td>
                            <?php echo $material['setor']; ?>
                        </td>
                        <td>
                            <?php echo $material['militar_responsavel']; ?>
                        </td>
                        <td>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="descarregar_individual"
                                    value="<?php echo $material['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Descarregar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>