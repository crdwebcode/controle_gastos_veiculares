<?php
session_start();
include 'includes/db.php';
include 'includes/functions.php';
verificar_autenticacao();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <h2>Bem-vindo ao Dashboard</h2>
    <?php include 'includes/footer.php'; ?>
</body>
</html>