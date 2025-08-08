<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #444;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-btn {
            background-color: #6c757d;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Recuperar Senha</h2>
        <form method="POST" action="/recuperar/enviar">
            <label for="email">Digite seu e-mail:</label>
            <input type="email" name="email" required>
            <button type="submit">Enviar link</button>
        </form>
        <form action="/login" method="get">
            <button type="submit" class="back-btn">Voltar ao Login</button>
        </form>
    </div>
</body>
</html>
