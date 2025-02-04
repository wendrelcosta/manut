<?php
session_start();

// Função para gerar links do menu (destaca a página ativa)
function gerarLinkMenu($url, $texto) {
    $caminho_atual = parse_url($_SERVER['PHP_SELF'], PHP_URL_PATH);
    $caminho_link = parse_url($url, PHP_URL_PATH);
    $classe = basename($caminho_atual) == basename($caminho_link) ? 'active' : '';
    return "<li><a href=\"$url\" class=\"$classe\">$texto</a></li>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Carga</title>
    <style>
        /* Estilos para o cabeçalho e menu */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
            margin-bottom: 10px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        nav ul li a.active {
            background-color: #007BFF;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistema de Gerenciamento de Carga</h1>
        <nav>
            <ul>
                <?php
                echo gerarLinkMenu("index.php", "LISTAR CARGA DA STIC");
                echo gerarLinkMenu("../projeto-manut/cadastro_material.php", "CADASTRAR MATERIAL");
                echo gerarLinkMenu("../projeto-manut/cadastro_transferencia.php", "CADASTRAR TRANSFERENCIA");
                echo gerarLinkMenu("../projeto-manut/listagem_transferencia.php", "LISTAR TRANSFERENCIA");
                echo gerarLinkMenu("../projeto-manut/descarga_material.php", "DESCARREGAR MATERIAL");
                ?>
            </ul>
        </nav>
    </header>

    <main>
        </main>
</body>
</html>