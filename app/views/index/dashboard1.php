<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}

$userName = htmlspecialchars($_SESSION['user_name']);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .sidebar {
            width: 220px;
            background: #2c3e50;
            height: 100vh;
            position: fixed;
            color: white;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .main-content {
            margin-left: 220px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logout {
            text-decoration: none;
            background: #e74c3c;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .card h3 {
            margin-top: 0;
        }

        .notification {
            background: #ecf0f1;
            padding: 10px;
            margin-bottom: 10px;
            border-left: 4px solid #3498db;
        }

        .chart {
            width: 100%;
            height: 200px;
            background: #ddd;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #555;
            font-size: 18px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Menu</h2>
    <a href="#">Painel</a>
    <a href="#">Cursos</a>
    <a href="#">Usuários</a>
    <a href="#">Relatórios</a>
</div>

<div class="main-content">
    <div class="header">
        <h1>Bem-vindo, <?= $userName ?></h1>
        <a class="logout" href="/logout">Logout</a>
    </div>

    <div class="card">
        <h3>Notificações</h3>
        <div class="notification">Você tem 2 novos alunos registrados.</div>
        <div class="notification">O curso de PHP foi atualizado.</div>
    </div>

    <div class="card">
        <h3>Estatísticas</h3>
        <div class="chart">[ Gráfico Simulado ]</div>
    </div>
</div>

</body>
</html>
