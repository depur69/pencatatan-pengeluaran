<?php
include "../config/database.php";

$cat = mysqli_query(
    $conn,
    "SELECT * FROM categories WHERE user_id='{$_SESSION['user']['id']}'"
);

if ($_POST) {
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
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengeluaran</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Tambah Pengeluaran</h2>
    <a href="index.php">Kembali</a>
</div>

<div class="container">

    <!-- FORM -->
    <div class="form-box">
        <h3>Form Pengeluaran</h3>

        <form method="post">
            <input 
                type="date" 
                name="date" 
                required
            >

            <input 
                type="number" 
                name="amount" 
                placeholder="Jumlah pengeluaran" 
                required
            >

            <select name="cat" required>
                <option value="">-- Pilih Kategori --</option>
                <?php while ($c = mysqli_fetch_assoc($cat)): ?>
                    <option value="<?= $c['id']; ?>">
                        <?= $c['name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <textarea 
                name="desc" 
                placeholder="Keterangan (opsional)"
            ></textarea>

            <button type="submit">Simpan</button>
        </form>
    </div>

</div>

</body>
</html>
