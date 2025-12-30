<?php
include "config/database.php";

if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}

$uid = $_SESSION['user']['id'];

/* TOTAL */
$qTotal = mysqli_query($conn,
    "SELECT SUM(amount) AS total FROM expenses WHERE user_id='$uid'"
);
$total = mysqli_fetch_assoc($qTotal)['total'] ?? 0;

/* BULAN INI */
$qMonth = mysqli_query($conn,
    "SELECT SUM(amount) AS total FROM expenses 
     WHERE user_id='$uid'
     AND MONTH(expense_date)=MONTH(CURDATE())
     AND YEAR(expense_date)=YEAR(CURDATE())"
);
$month = mysqli_fetch_assoc($qMonth)['total'] ?? 0;

/* JUMLAH TRANSAKSI */
$qCount = mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM expenses WHERE user_id='$uid'"
);
$count = mysqli_fetch_assoc($qCount)['total'] ?? 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="header">
    <h2>Dashboard</h2>
    <a href="auth/logout.php">Logout</a>
</div>

<div class="container">

    <div class="menu">
        <a href="category/index.php">📂 Kategori</a>
        <a href="expense/index.php">💰 Pengeluaran</a>
    </div>

    <div class="summary">
        <div class="card">
            <h3>Total Pengeluaran</h3>
            <p>Rp <?= number_format($total,0,',','.'); ?></p>
        </div>

        <div class="card">
            <h3>Pengeluaran Bulan Ini</h3>
            <p>Rp <?= number_format($month,0,',','.'); ?></p>
        </div>

        <div class="card">
            <h3>Jumlah Transaksi</h3>
            <p><?= $count; ?></p>
        </div>
    </div>

</div>

</body>
</html>
