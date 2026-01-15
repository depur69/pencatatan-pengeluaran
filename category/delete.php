<?php
// Memanggil file database untuk koneksi dan session
include "../config/database.php";

// Mengambil id kategori dari parameter URL
$id = $_GET['id'];

// Menjalankan query untuk menghapus data kategori
// berdasarkan id yang dipilih
mysqli_query(
    $conn,
    "DELETE FROM categories WHERE id='$id'"
);

// Mengarahkan kembali ke halaman index kategori
header("Location: index.php");

// Menghentikan eksekusi script
exit;
