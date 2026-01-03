<?php
include "../config/database.php";

$uid = $_SESSION['user']['id'];

$q = mysqli_query(
    $conn,
    "SELECT e.*, c.name 
     FROM expenses e 
     JOIN categories c ON e.category_id = c.id 
     WHERE e.user_id = '$uid'"
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengeluaran</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Pengeluaran</h2>
    <a href="../dashboard.php">Dashboard</a>
</div>

<div class="container">

    <!-- TOP ACTION -->
    <div class="top-action">
        <h2>Daftar Pengeluaran</h2>
        <a href="add.php">+ Tambah Pengeluaran</a>
    </div>

    <!-- TABLE -->
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>

        <?php while ($e = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $e['expense_date']; ?></td>
            <td><?= $e['name']; ?></td>
            <td>Rp <?= number_format($e['amount'],0,',','.'); ?></td>
            <td class="action">
                <a href="edit.php?id=<?= $e['id']; ?>" class="edit">Edit</a>
                <a href="delete.php?id=<?= $e['id']; ?>" class="delete"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>

</div>

</body>
</html>
