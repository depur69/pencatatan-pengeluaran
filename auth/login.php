<?php
// Menghubungkan file konfigurasi database
include_once "../config/database.php";

// Variabel untuk menampung pesan error (kosong di awal)
$error = "";

// Mengecek apakah request datang dari form POST (submit login)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data email dan password dari form
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan email
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user  = mysqli_fetch_assoc($query);

    // Jika user ditemukan dan password sesuai (diverifikasi dengan hash)
    if ($user && password_verify($password, $user['password'])) {
        // Simpan data user ke session
        $_SESSION['user'] = $user;

        // Redirect ke dashboard setelah login berhasil
        header("Location: ../dashboard.php");
        exit; // Hentikan eksekusi script setelah redirect
    } else {
        // Jika login gagal, tampilkan pesan error
        $error = "Email atau password salah";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pengeluaran</title>
    <!-- Memanggil file CSS untuk styling -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="login-page"> 
<div class="login-box">
    <h2>Login</h2>

    <!-- Menampilkan pesan error jika login gagal -->
    <?php if ($error): ?>
        <div class="error-msg"><?= $error ?></div>
    <?php endif; ?>

    <!-- Form login -->
    <form method="post">
        <!-- Input email -->
        <input type="email" name="email" placeholder="Email" required>
        <!-- Input password -->
        <input type="password" name="password" placeholder="Password" required>
        <!-- Tombol submit -->
        <button type="submit">Login</button>
    </form>

    <!-- Link ke halaman register -->
    <p>Belum punya akun? <a href="register.php">Register</a></p>
</div>

</body>
</html>
