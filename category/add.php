<?php
// FILE : category/add.php
// FUNGSI : Menampilkan form dan menyimpan data kategori baru

// Memanggil file koneksi database dan session
include "../config/database.php";

// PROSES SIMPAN DATA

// Mengecek apakah form telah dikirim (method POST)
if ($_POST) {

    // Query untuk menambahkan data kategori ke tabel categories
    // NULL            -> id (auto increment)
    // session user id -> relasi kategori dengan user
    // $_POST['name']  -> nama kategori dari input form
    mysqli_query(
        $conn,
        "INSERT INTO categories VALUES (
            NULL,
            '{$_SESSION['user']['id']}',
            '{$_POST['name']}'
        )"
    );

    // Redirect kembali ke halaman daftar kategori
    header("Location: index.php");

    // Menghentikan eksekusi script setelah redirect
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Judul halaman -->
    <title>Tambah Kategori</title>

    <!-- Menghubungkan file CSS utama -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- =====================================================
     HEADER
===================================================== -->
<div class="header">
    <!-- Judul halaman -->
    <h2>Tambah Kategori</h2>

    <!-- Tombol kembali ke halaman kategori -->
    <a href="index.php">Kembali</a>
</div>

<div class="container">

    <!-- =================================================
         FORM BOX
    ================================================== -->
    <div class="form-box">
        <!-- Judul form -->
        <h3>Form Kategori</h3>

        <!-- Form input kategori -->
        <!-- method POST agar data dikirim secara aman -->
        <form method="post">

            <!-- Input nama kategori -->
            <input 
                type="text" 
                name="name" 
                placeholder="Nama kategori" 
                required
            >

            <!-- Tombol simpan data -->
            <button type="submit">Simpan</button>

        </form>
    </div>

</div>

</body>
</html>
