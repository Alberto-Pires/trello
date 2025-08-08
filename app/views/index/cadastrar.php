<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>User Registration</title>
<style>
    /* Simple styling for the form */
    body {
        font-family: Arial, sans-serif;
        background: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .register-container {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        width: 320px;
    }

    label {
        font-weight: bold;
        margin-top: 1rem;
        display: block;
    }

    input {
        width: 100%;
        padding: 0.5rem;
        margin-top: 0.3rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        margin-top: 1.5rem;
        width: 100%;
        padding: 0.6rem;
        background-color: #3b82f6;
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #2563eb;
    }

    .errors {
        background: #ffdddd;
        border: 1px solid #ff5c5c;
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 5px;
        color: #b00;
    }

    a {
        display: block;
        margin-top: 1rem;
        text-align: center;
        color: #3b82f6;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <div class="register-container">
        <h2>Cadastro do Usuário</h2>

        <?php if (!empty($errors)): ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/cadastrar" method="POST" novalidate>
            <label for="name">Name:</label>
            <input id="name" name="name" type="text" required />

            <label for="email">Email:</label>
            <input id="email" name="email" type="email" required />

            <label for="password">Password:</label>
            <input id="password" name="password" type="password" required minlength="6" />

            <label for="confirm">Confirm Password:</label>
            <input id="confirm" name="confirm" type="password" required minlength="6" />

            <button type="submit">Cadastrar</button>
        </form>

        <a class="logout" href="/logout">ir ao login</a>
    </div>
</body>
</html>
