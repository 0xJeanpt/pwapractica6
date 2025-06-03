<?php
session_start();
if (!isset($_SESSION["user"]) || $_SESSION["user"]["role_id"] != 1) {
    header("Location: ../login.php");
    exit();
}
include "../includes/header.php";
?>

<div class="container mt-5">
    <h2>Panel del Administrador</h2>
    <p>Bienvenido, <?= $_SESSION["user"]["username"] ?>. Aquí puedes gestionar el sistema completo.</p>
    <a href="../logout.php" class="btn btn-danger">Cerrar Sesión</a>
</div>

<?php include "../includes/footer.php"; ?>
