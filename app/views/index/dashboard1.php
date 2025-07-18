<?php
  session_start();
  if (!isset($_SESSION['user_id'])) {
      header("Location: /login");
      exit;
  }
?>
<h1>Bem-vindo, <?= htmlspecialchars($_SESSION['user_name']) ?></h1>
<a href="/logout">Sair</a>
