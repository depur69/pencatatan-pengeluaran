<?php
include "../config/database.php";
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users VALUES(NULL,'$name','$email','$pass')");
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Pengeluaran</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="login-page"> <div class="login-box">
    <h2>Daftar Akun</h2>
    <form method="post">
        <input name="name" placeholder="Nama Lengkap" required>
        <input name="email" type="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>

</body>
</html>