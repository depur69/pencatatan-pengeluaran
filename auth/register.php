<?php
// Menghubungkan file konfigurasi database
include "../config/database.php";

// Mengecek apakah form disubmit (ada data POST)
if ($_POST) {
    // Ambil data dari form
    $name  = $_POST['name'];
    $email = $_POST['email'];
    // Hash password agar lebih aman sebelum disimpan ke database
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Query untuk menyimpan data user baru ke tabel users
    // NULL digunakan untuk kolom id (auto increment)
    mysqli_query($conn, "INSERT INTO users VALUES(NULL,'$name','$email','$pass')");

    // Setelah registrasi berhasil, redirect ke halaman login
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Pengeluaran</title>
    <!-- Memanggil file CSS untuk styling -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="login-page"> 
<div class="login-box">
    <h2>Daftar Akun</h2>

    <!-- Form registrasi -->
    <form method="post">
        <!-- Input nama lengkap -->
        <input name="name" placeholder="Nama Lengkap" required>
        <!-- Input email -->
        <input name="email" type="email" placeholder="Email" required>
        <!-- Input password -->
        <input type="password" name="password" placeholder="Password" required>
        <!-- Tombol submit -->
        <button type="submit">Register</button>
    </form>
    
    <!-- Link ke halaman login jika sudah punya akun -->
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>

</body>
</html>
