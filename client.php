<?php
session_start();
if (!isset($_SESSION["user"]) || $_SESSION["user"]["role_id"] != 4) {
    header("Location: ../login.php");
    exit();
}
include "../includes/header.php";
?>

<div class="container mt-5">
    <h2>Panel del Cliente</h2>
    <p>Hola <?= $_SESSION["user"]["username"] ?>. Aquí puedes ver el menú y hacer pedidos.</p>
    <a href="../logout.php" class="btn btn-danger">Cerrar Sesión</a>
</div>

<?php include "../includes/footer.php"; ?>
