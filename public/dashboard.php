<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}
?>
<?php
// Inicia a sessão se não estiver ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado, se não, redireciona para login
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}
?>

<!-- Aqui começa o HTML da página protegida -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo, <?= htmlspecialchars($_SESSION['user_name']) ?></h1>
    <a href="/logout">Sair</a>
</body>
</html>
