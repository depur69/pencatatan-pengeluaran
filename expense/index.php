<?php
// Menghubungkan file konfigurasi database
// Termasuk koneksi database dan session
include "../config/database.php";

// Mengambil ID user yang sedang login dari session
$uid = $_SESSION['user']['id'];

// Query untuk mengambil data pengeluaran
// Menggabungkan tabel expenses dan categories
// Agar nama kategori bisa ditampilkan
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
    <!-- Judul halaman -->
    <title>Pengeluaran</title>

    <!-- Menghubungkan file CSS utama -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- ================= HEADER ================= -->
<!-- Header halaman daftar pengeluaran -->
<div class="header">
    <h2>Pengeluaran</h2>
    <a href="../dashboard.php">Dashboard</a>
</div>

<!-- ================= CONTAINER ================= -->
<div class="container">

    <!-- ================= TOP ACTION ================= -->
    <!-- Bagian judul dan tombol tambah pengeluaran -->
    <div class="top-action">
        <h2>Daftar Pengeluaran</h2>
        <a href="add.php">+ Tambah Pengeluaran</a>
    </div>

    <!-- ================= TABLE ================= -->
    <!-- Tabel untuk menampilkan data pengeluaran -->
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>

        <!-- Looping data pengeluaran dari database -->
        <?php while ($e = mysqli_fetch_assoc($q)): ?>
        <tr>
            <!-- Menampilkan tanggal pengeluaran -->
            <td><?= $e['expense_date']; ?></td>

            <!-- Menampilkan nama kategori -->
            <td><?= $e['name']; ?></td>

            <!-- Menampilkan jumlah pengeluaran dengan format rupiah -->
            <td>Rp <?= number_format($e['amount'], 0, ',', '.'); ?></td>

            <!-- Kolom aksi: edit dan hapus -->
            <td class="action">

                <!-- Link menuju halaman edit pengeluaran -->
                <a href="edit.php?id=<?= $e['id']; ?>" class="edit">
                    Edit
                </a>

                <!-- Link untuk menghapus data pengeluaran -->
                <!-- Dilengkapi konfirmasi agar tidak terhapus tidak sengaja -->
                <a href="delete.php?id=<?= $e['id']; ?>" 
                   class="delete"
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
