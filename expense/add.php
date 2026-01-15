<?php
// Menghubungkan file ini dengan konfigurasi database dan session
include "../config/database.php";

// Menjalankan query untuk mengambil seluruh kategori
// yang dimiliki oleh user yang sedang login
$cat = mysqli_query(
    $conn,
    "SELECT * FROM categories WHERE user_id='{$_SESSION['user']['id']}'"
);

// Mengecek apakah form telah disubmit
// $_POST akan terisi jika tombol Simpan ditekan
if ($_POST) {

    // Menyimpan data pengeluaran ke dalam tabel expenses
    // NULL digunakan untuk id karena id bersifat auto increment
    mysqli_query(
        $conn,
        "INSERT INTO expenses VALUES (
            NULL,
            '{$_SESSION['user']['id']}',
            '{$_POST['cat']}',
            '{$_POST['amount']}',
            '{$_POST['desc']}',
            '{$_POST['date']}'
        )"
    );

    // Setelah data berhasil disimpan,
    // user diarahkan kembali ke halaman index pengeluaran
    header("Location: index.php");

    // Menghentikan eksekusi script setelah redirect
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Judul halaman -->
    <title>Tambah Pengeluaran</title>

    <!-- Menghubungkan file CSS utama -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- ================= HEADER ================= -->
<!-- Header halaman yang menampilkan judul dan tombol kembali -->
<div class="header">
    <h2>Tambah Pengeluaran</h2>
    <a href="index.php">Kembali</a>
</div>

<!-- ================= CONTAINER ================= -->
<div class="container">

    <!-- Box form agar tampilan rapi dan terpusat -->
    <div class="form-box">

        <!-- Judul form -->
        <h3>Form Pengeluaran</h3>

        <!-- Form input data pengeluaran -->
        <form method="post">

            <!-- Input tanggal pengeluaran -->
            <input 
                type="date" 
                name="date" 
                required
            >

            <!-- Input jumlah pengeluaran -->
            <input 
                type="number" 
                name="amount" 
                placeholder="Jumlah pengeluaran" 
                required
            >

            <!-- Dropdown pilihan kategori -->
            <select name="cat" required>

                <!-- Option default -->
                <option value="">-- Pilih Kategori --</option>

                <?php
                // Looping untuk menampilkan kategori
                // Setiap kategori ditampilkan sebagai option
                while ($c = mysqli_fetch_assoc($cat)):
                ?>
                    <option value="<?= $c['id']; ?>">
                        <?= $c['name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <!-- Textarea untuk keterangan pengeluaran -->
            <textarea 
                name="desc" 
                placeholder="Keterangan (opsional)"
            ></textarea>

            <!-- Tombol untuk menyimpan data -->
            <button type="submit">Simpan</button>

        </form>
    </div>

</div>

</body>
</html>
