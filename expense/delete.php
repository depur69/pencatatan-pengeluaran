<?php
// Menghubungkan ke database
include "../config/database.php";

// Mengambil ID pengeluaran dari URL
$id = $_GET['id'];

// Menghapus data pengeluaran berdasarkan ID
mysqli_query(
    $conn,
    "DELETE FROM expenses WHERE id='$id'"
);

// Redirect kembali ke halaman index
header("Location: index.php");
exit;
?>
