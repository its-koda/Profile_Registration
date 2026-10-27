<?php
session_start(); // Sempre no topo do arquivo!

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $cor = $_POST['cor'] ?? 'branco'; // Pega a cor selecionada

    // Conecta com o banco de dados
    $server = "localhost";
    $username = "root";
    $password = "Senai@118";
    $dbname = "exercicio";

    $conn = new mysqli($server, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Consulta usuário no BD
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = $conn->query($sql);

    // Verifica se encontrou o usuário
    if ($result->num_rows > 0) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['cor'] = $cor; // Salva a cor escolhida na sessão

        header("Location: 15b_restrita.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if (isset($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="cor">Escolha uma cor:</label>
        <select id="cor" name="cor">
            <option value="vermelho">vermelho</option>
            <option value="creme">creme</option>
            <option value="laranja">laranja</option>
            <option value="amarelo">amarelo</option>
            <option value="verde claro">verde claro</option>
            <option value="verde escuro">verde escuro</option>
            <option value="azul claro">azul claro</option>
            <option value="azul escuro">azul escuro</option>
            <option value="ciano">ciano</option>
            <option value="roxo">roxo</option>
            <option value="lilás">lilás</option>
            <option value="rosa">rosa</option>
            <option value="marrom">marrom</option>
            <option value="preto">preto</option>
            <option value="branco">branco</option>
        </select><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>