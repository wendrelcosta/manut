<?php
include 'conexao.php';
include 'header.php';

$sql = "SELECT * FROM transferencia";
$stmt = $conn->query($sql);
$transferencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Transferências</title>
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
            /* Largura aumentada para telas maiores (ex: 1200px) */
            max-width: 1600px; /* Ajuste conforme sua preferência */
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

         /* Estilos para telas menores (responsividade) */
        @media (max-width: 992px) { /* Ajuste o breakpoint conforme necessário */
            .container {
                max-width: 90%; /* Ocupa 90% da largura da tela */
                padding: 10px;
            }
        }
    </style>
</head>

<body>
<div class="container">
        <h2>Listagem de Transferências</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Quantidade</th>
                        <th>Nome do Material</th>
                        <th>Modelo</th>
                        <th>Número de Série</th>
                        <th>BMP</th>
                        <th>Setor de Origem</th>
                        <th>Setor de Destino</th>
                        <th>Militar Responsável</th>
                        <th>Militar de Destino</th>
                        <th>Data de Transferência</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transferencias as $transferencia): ?>
                    <tr>
                        <td><?php echo $transferencia['id']; ?></td>
                        <td><?php echo $transferencia['qtd']; ?></td>
                        <td><?php echo $transferencia['nome_material']; ?></td>
                        <td><?php echo $transferencia['modelo']; ?></td>
                        <td><?php echo $transferencia['numero_serie']; ?></td>
                        <td><?php echo $transferencia['bmp']; ?></td>
                        <td><?php echo $transferencia['setor_origem']; ?></td>
                        <td><?php echo $transferencia['setor_destino']; ?></td>
                        <td><?php echo $transferencia['militar_responsavel']; ?></td>
                        <td><?php echo $transferencia['militar_de_destino']; ?></td>
                        <td>
                            <?php
                            $data_original = $transferencia['data_transferencia'];
                            if ($data_original != null && $data_original != '0000-00-00 00:00:00') {
                                $data_formatada = date('d/m/y', strtotime($data_original)); // Formatação aqui
                                echo $data_formatada;
                            } else {
                                echo ""; // Ou outra mensagem que desejar, como "Data não definida"
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