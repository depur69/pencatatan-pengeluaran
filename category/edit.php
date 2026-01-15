<?php
// Menghubungkan file konfigurasi database
include "../config/database.php";

// Ambil parameter 'id' dari URL (GET request)
$id = $_GET['id'];

// Jika form disubmit (ada data POST)
if ($_POST) {
    // Jalankan query UPDATE untuk mengubah nama kategori berdasarkan id
    mysqli_query(
        $conn,
        "UPDATE categories 
         SET name='{$_POST['name']}' 
         WHERE id='$id'"
    );

    // Setelah update, redirect kembali ke halaman index.php
    header("Location: index.php");
    exit; // Pastikan script berhenti setelah redirect
}

// Ambil data kategori berdasarkan id untuk ditampilkan di form
$c = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM categories WHERE id='$id'")
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
    <!-- Memanggil file CSS untuk styling -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Edit Kategori</h2>
    <!-- Link kembali ke halaman daftar kategori -->
    <a href="index.php">Kembali</a>
</div>

<div class="container">

    <!-- FORM BOX -->
    <div class="form-box">
        <h3>Form Edit Kategori</h3>

        <!-- Form untuk mengedit kategori -->
        <form method="post">
            <!-- Input text untuk nama kategori -->
            <input 
                type="text" 
                name="name" 
                value="<?= htmlspecialchars($c['name']); ?>" 
                required
            >

            <!-- Tombol submit untuk update -->
            <button type="submit">Update</button>
        </form>
    </div>

</div>

</body>
</html>
