<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Nova Senha</title>
</head>
<body>
    <h2>Redefinir Senha</h2>
    <form method="POST" action="/recuperar/atualizar">
        <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">
        <label for="nova_senha">Nova senha:</label><br>
        <input type="password" name="nova_senha" required><br><br>
        <button type="submit">Atualizar senha</button>
    </form>
</body>
</html>
