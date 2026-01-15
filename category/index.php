<?php
// Menghubungkan file konfigurasi database
include "../config/database.php";

// Query untuk mengambil semua kategori milik user yang sedang login
$q = mysqli_query(
    $conn,
    "SELECT * FROM categories 
     WHERE user_id='{$_SESSION['user']['id']}'"
);

// Variabel untuk nomor urut tabel
$no = 1;
?>

<!-- Memanggil file CSS untuk styling -->
<link rel="stylesheet" href="../assets/css/style.css">

<!-- HEADER -->
<div class="header">
    <h2>Menu Kategori</h2>
    <!-- Link kembali ke dashboard -->
    <a href="../dashboard.php">Dashboard</a>
</div>

<div class="container">

    <!-- Bagian atas: judul + tombol tambah -->
    <div class="top-action">
        <h2>Daftar Kategori</h2>
        <!-- Link ke halaman tambah kategori -->
        <a href="add.php">+ Tambah Kategori</a>
    </div>

    <!-- TABEL DAFTAR KATEGORI -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>

        <!-- Looping data kategori dari query -->
        <?php while($c = mysqli_fetch_assoc($q)): ?>
        <tr>
            <!-- Nomor urut -->
            <td><?= $no++; ?></td>
            <!-- Nama kategori -->
            <td><?= $c['name']; ?></td>
            <!-- Aksi edit dan hapus -->
            <td class="action">
                <!-- Link edit kategori -->
                <a href="edit.php?id=<?= $c['id']; ?>" class="edit">
                    Edit
                </a>
                <!-- Link hapus kategori dengan konfirmasi -->
                <a href="delete.php?id=<?= $c['id']; ?>" 
                   class="delete"
                   onclick="return confirm('Yakin hapus kategori ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>
