<?php
session_start(); 
// Memulai session agar data session (seperti login user) bisa diakses

if (isset($_SESSION['user'])) {
    // Mengecek apakah session 'user' sudah ada (artinya user sudah login)
    
    header("Location: dashboard.php");
    // Jika sudah login, arahkan pengguna ke halaman dashboard
} else {
    // Jika session 'user' tidak ada (belum login)
    
    header("Location: auth/login.php");
    // Arahkan pengguna ke halaman login
}
?>
