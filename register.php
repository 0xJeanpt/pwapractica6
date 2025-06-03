<?php
include "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role_id = 4; // Cliente

    $sql = "INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $email, $password, $role_id);
    
    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!-- HTML -->
<?php include "includes/header.php"; ?>
<div class="container mt-5">
    <h2>Registro</h2>
    <form method="post">
        <input class="form-control mb-2" name="username" placeholder="Usuario" required>
        <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
        <input class="form-control mb-2" name="password" type="password" placeholder="Contraseña" required>
        <button class="btn btn-success" type="submit">Registrarse</button>
    </form>
</div>
<?php include "includes/footer.php"; ?>
