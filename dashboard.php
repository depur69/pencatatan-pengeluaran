<?php
include "config/database.php"; 
// Menghubungkan file konfigurasi database

// Mengecek apakah user sudah login
if (!isset($_SESSION['user'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: auth/login.php");
    exit;
}

// Mengambil ID user yang sedang login dari session
$uid = $_SESSION['user']['id'];

/* TOTAL */
// Query untuk menghitung total seluruh pengeluaran user
$qTotal = mysqli_query($conn,
    "SELECT SUM(amount) AS total FROM expenses WHERE user_id='$uid'"
);
$total = mysqli_fetch_assoc($qTotal)['total'] ?? 0;
// Menyimpan total pengeluaran, jika kosong maka bernilai 0

/* BULAN INI */
// Query untuk menghitung total pengeluaran user pada bulan dan tahun berjalan
$qMonth = mysqli_query($conn,
    "SELECT SUM(amount) AS total FROM expenses 
     WHERE user_id='$uid'
     AND MONTH(expense_date)=MONTH(CURDATE())
     AND YEAR(expense_date)=YEAR(CURDATE())"
);
$month = mysqli_fetch_assoc($qMonth)['total'] ?? 0;
// Menyimpan total pengeluaran bulan ini

/* JUMLAH TRANSAKSI */
// Query untuk menghitung jumlah transaksi pengeluaran user
$qCount = mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM expenses WHERE user_id='$uid'"
);
$count = mysqli_fetch_assoc($qCount)['total'] ?? 0;
// Menyimpan jumlah transaksi
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Menghubungkan file CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="header">
    <!-- Judul halaman dashboard -->
    <h2>Dashboard</h2>
    <!-- Link untuk logout -->
    <a href="auth/logout.php">Logout</a>
</div>

<div class="container">

    <div class="menu">
        <!-- Menu navigasi -->
        <a href="category/index.php">📂 Kategori</a>
        <a href="expense/index.php">💰 Pengeluaran</a>
    </div>

    <div class="summary">
        <!-- Kartu ringkasan total pengeluaran -->
        <div class="card">
            <h3>Total Pengeluaran</h3>
            <p>Rp <?= number_format($total,0,',','.'); ?></p>
        </div>

        <!-- Kartu ringkasan pengeluaran bulan ini -->
        <div class="card">
            <h3>Pengeluaran Bulan Ini</h3>
            <p>Rp <?= number_format($month,0,',','.'); ?></p>
        </div>

        <!-- Kartu jumlah transaksi -->
        <div class="card">
            <h3>Jumlah Transaksi</h3>
            <p><?= $count; ?></p>
        </div>
    </div>

</div>

</body>
</html>
