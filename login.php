<?php
session_start();
include "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user;

            // Redireccionar según el rol
            switch ($user["role_id"]) {
                case 1: header("Location: pages/admin.php"); break;
                case 2: header("Location: pages/chef.php"); break;
                case 3: header("Location: pages/waiter.php"); break;
                case 4: header("Location: pages/client.php"); break;
            }
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!-- HTML -->
<?php include "includes/header.php"; ?>
<div class="container mt-5">
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="post">
        <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
        <input class="form-control mb-2" name="password" type="password" placeholder="Contraseña" required>
        <button class="btn btn-primary" type="submit">Entrar</button>
    </form>
</div>
<?php include "includes/footer.php"; ?>
