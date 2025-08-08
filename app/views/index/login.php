<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login</title>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f0f2f5;
    height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .login-container {
    background: #fff;
    padding: 2.5rem 3rem;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    width: 320px;
  }

  h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    color: #333;
  }

  label {
    font-weight: 600;
    display: block;
    margin-bottom: 0.3rem;
    color: #444;
  }

  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 0.45rem 0.75rem;
    margin-bottom: 1.2rem;
    border: 1.5px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
  }

  input[type="email"]:focus,
  input[type="password"]:focus {
    border-color: #3b82f6;
    outline: none;
  }

  button {
    width: 100%;
    padding: 0.6rem 0;
    background-color: #3b82f6;
    border: none;
    border-radius: 5px;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.25s ease;
  }

  button:hover {
    background-color: #2563eb;
  }

  .forgot-password {
    text-align: right;
    margin-top: 0.5rem;
  }

  .forgot-password a {
    font-size: 0.9rem;
    color: #3b82f6;
    text-decoration: none;
  }

  .forgot-password a:hover {
    text-decoration: underline;
  }

  .register-link {
    margin-top: 1rem;
    text-align: center;
  }

  .register-link a {
    font-size: 0.95rem;
    color: #3b82f6;
    text-decoration: none;
    font-weight: 600;
  }

  .register-link a:hover {
    text-decoration: underline;
  }

  .error-msg {
    margin-top: 1rem;
    text-align: center;
    color: #ef4444;
    font-weight: 600;
  }
</style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="/login" novalidate>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required placeholder="Digite seu email" />

        <label for="password">Senha:</label>
        <input id="password" type="password" name="password" required placeholder="Digite sua senha" />

        <button type="submit">Entrar</button>

        <div class="forgot-password">
          <a href="/recuperar">Esqueceu a senha?</a>
        </div>
    </form>

    <div class="register-link">
      <a href="/cadastrar">Cadastrar</a>
    </div>

    <?php if (!empty($error)): ?>
        <p class="error-msg"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
  </div>
</body>
</html>
