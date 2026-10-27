<?php
session_start();

// Verifica se o usuário está logado
if(!isset($_SESSION['usuario'])) {
    header("Location: 15d_login.php");
    exit();
}

// Recupera a cor da sessão
$cor_selecionada = $_SESSION['cor'] ?? 'branco';

// Mapeamento de cores de fundo e de texto para legibilidade
switch ($cor_selecionada) {
    case 'vermelho':
        $bg_color = '#ef4444'; $text_color = '#ffffff'; break;
    case 'creme':
        $bg_color = '#fef3c7'; $text_color = '#451a03'; break;
    case 'laranja':
        $bg_color = '#f97316'; $text_color = '#ffffff'; break;
    case 'amarelo':
        $bg_color = '#fde047'; $text_color = '#713f12'; break;
    case 'verde claro':
        $bg_color = '#86efac'; $text_color = '#14532d'; break;
    case 'verde escuro':
        $bg_color = '#15803d'; $text_color = '#ffffff'; break;
    case 'azul claro':
        $bg_color = '#93c5fd'; $text_color = '#1e3a8a'; break;
    case 'azul escuro':
        $bg_color = '#1e40af'; $text_color = '#ffffff'; break;
    case 'ciano':
        $bg_color = '#06b6d4'; $text_color = '#ffffff'; break;
    case 'roxo':
        $bg_color = '#7e22ce'; $text_color = '#ffffff'; break;
    case 'lilás':
        $bg_color = '#d8b4fe'; $text_color = '#581c87'; break;
    case 'rosa':
        $bg_color = '#f472b6'; $text_color = '#831843'; break;
    case 'marrom':
        $bg_color = '#78350f'; $text_color = '#ffffff'; break;
    case 'preto':
        $bg_color = '#18181b'; $text_color = '#ffffff'; break;
    case 'branco':
    default:
        $bg_color = '#ffffff'; $text_color = '#18181b'; break;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <style>
        body {
            background-color: <?php echo $bg_color; ?>;
            color: <?php echo $text_color; ?>;
            font-family: Arial, sans-serif;
            padding: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        a {
            color: inherit;
        }
    </style>
</head>
<body>
    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
    <p>A cor escolhida foi: <strong><?php echo htmlspecialchars($cor_selecionada); ?></strong></p>
    
    <a href="15d_logout.php">Logout</a>
</body>
</html>