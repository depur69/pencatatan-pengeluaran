<?php
// Menghubungkan file ini dengan konfigurasi database dan session
include "../config/database.php";

// Mengambil ID pengeluaran dari parameter URL (?id=...)
$id = $_GET['id'];

// Mengecek apakah form telah disubmit
// Jika tombol Update ditekan, maka $_POST akan berisi data
if ($_POST) {

    // Query untuk memperbarui data pengeluaran berdasarkan ID
    // Data yang diperbarui: jumlah, keterangan, dan tanggal
    mysqli_query(
        $conn,
        "UPDATE expenses SET 
            amount='{$_POST['amount']}',
            description='{$_POST['desc']}',
            expense_date='{$_POST['date']}'
         WHERE id='$id'"
    );

    // Setelah proses update berhasil,
    // user diarahkan kembali ke halaman index pengeluaran
    header("Location: index.php");

    // Menghentikan eksekusi script setelah redirect
    exit;
}

// Mengambil data pengeluaran berdasarkan ID
// Data ini digunakan untuk mengisi form edit
$e = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM expenses WHERE id='$id'")
);
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Judul halaman -->
    <title>Edit Pengeluaran</title>

    <!-- Menghubungkan file CSS utama -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- ================= HEADER ================= -->
<!-- Header halaman edit pengeluaran -->
<div class="header">
    <h2>Edit Pengeluaran</h2>
    <a href="index.php">Kembali</a>
</div>

<!-- ================= CONTAINER ================= -->
<div class="container">

    <!-- ================= FORM BOX ================= -->
    <!-- Box form agar tampilan rapi dan terpusat -->
    <div class="form-box">

        <!-- Judul form edit -->
        <h3>Form Edit Pengeluaran</h3>

        <!-- Form untuk mengubah data pengeluaran -->
        <form method="post">

            <!-- Input tanggal pengeluaran -->
            <input 
                type="date" 
                name="date" 
                value="<?= $e['expense_date']; ?>" 
                required
            >

            <!-- Input jumlah pengeluaran -->
            <input 
                type="number" 
                name="amount" 
                value="<?= $e['amount']; ?>" 
                required
            >

            <!-- Textarea untuk keterangan pengeluaran -->
            <!-- htmlspecialchars digunakan untuk mencegah HTML injection -->
            <textarea 
                name="desc" 
                placeholder="Keterangan"
            ><?= htmlspecialchars($e['description']); ?></textarea>

            <!-- Tombol untuk menyimpan perubahan -->
            <button type="submit">Update</button>

        </form>
    </div>

</div>

</body>
</html>
