<form method="POST" action="/login">
    <label>Email:</label><br/>
    <input type="email" name="email" required /><br/>
    <label>Senha:</label><br/>
    <input type="password" name="password" required /><br/>
    <button type="submit">Entrar</button>
</form>

<?php if (!empty($error)): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
