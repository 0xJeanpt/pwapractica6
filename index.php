<?php
session_start();
include "includes/header.php";
?>

<div class="container mt-5">
    <h1 class="text-center">Bienvenido al Sistema de Restaurante</h1>
    <p class="text-center">
        <a href="login.php" class="btn btn-primary">Iniciar Sesión</a>
        <a href="register.php" class="btn btn-secondary">Registrarse</a>
    </p>
</div>

<?php include "includes/footer.php"; ?>
