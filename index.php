<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Controle de Gastos Veiculares</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="senha" required placeholder="Senha">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>