<?php
// Memulai session agar bisa diakses/dihapus
session_start();

// Menghancurkan semua data session (logout user)
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: login.php");
