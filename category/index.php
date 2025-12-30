<?php
include "../config/database.php";

$q = mysqli_query(
    $conn,
    "SELECT * FROM categories 
     WHERE user_id='{$_SESSION['user']['id']}'"
);
$no = 1;
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="header">
    <h2>Menu Kategori</h2>
    <a href="../dashboard.php">Dashboard</a>
</div>

<div class="container">

    <div class="top-action">
        <h2>Daftar Kategori</h2>
        <a href="add.php">+ Tambah Kategori</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>

        <?php while($c = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $c['name']; ?></td>
            <td class="action">
                <a href="edit.php?id=<?= $c['id']; ?>" class="edit">
                    Edit
                </a>
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
