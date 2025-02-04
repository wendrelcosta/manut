<?php
// index.php
include 'conexao.php';
include 'header.php';

// Consulta os materiais
$sql = "SELECT * FROM material_carga";
$stmt = $conn->query($sql);
$materiais = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
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
            text-align: left;
            border-bottom: 1px solid #ddd;
            text-align: center;
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
                        <th>Data de Descarga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($materiais as $material): ?>
                    <tr class="<?php echo $material['descarregado'] ? 'descarregado' : ''; ?>">
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
                        <?php
                            if ($material['data_descarga'] != null && $material['data_descarga'] != '0000-00-00 00:00:00') {
                                echo date('d/m/Y H:i:s', strtotime($material['data_descarga']));
                            } else {
                                echo "";
                            }
                        ?>
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